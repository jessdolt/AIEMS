<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JESS WEBSITE</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    body{
        position:relative;
    }
    .root-container{

        border: 1px solid black;
        border-radius: 5px;
        width: 800px;
        padding: 20px;
        position:absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%);
    }
    .charts{
        width: 100%;
        
        border: 1px solid black;
        border-radius: 5px;
        padding: 20px 15px;
        margin: 20px 0;
    }
    .textAnswer{
        height: 235px;
        width: 100%;
        padding: 5px;
        margin-top: 10px;
        overflow:scroll;
    }
    .textDiv{
        background: lightgrey;
        padding: 10px;
        margin-bottom: 10px;
    }
    
</style>

<a href="<?php echo URLROOT;?>/admin/dashboard">Run it back!</a>
   
   

    <button id="api-news">API NEWS</button>
    <button id="api-events">API EVENTS</button>
    <button id="api-survey">API SURVEY</button>

    <div class="root-container" id="chart-container">
            <h2 id="survey-title"></h2>
            <!-- <div class="charts">
                <h2>Question it is</h2>
                <div class='textAnswer'>
                    <div class="textDiv">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, esse!</div>
                  
                </div>
            </div> -->

            
            <div class="charts">
                <h2>First Chart</h2>
                <canvas id="myChart0"></canvas>
            </div> 
            <!-- <div class="charts">
                <h2>Second Chart</h2>
                <canvas id="myChart1"></canvas>
            </div>  -->
    </div>

<script>
        const apiNews = document.getElementById('api-news');
        const apiEvents = document.getElementById('api-events');
        const apiSurvey = document.getElementById('api-survey');
        const survey_title_container = document.getElementById('survey-title');
        const chartContainer = document.getElementById('chart-container');

        apiNews.addEventListener('click', function(){
            fetch('<?php echo URLROOT;?>/api/posts/read').then(res => res.json()).then(data => console.log(data))
        })

        apiEvents.addEventListener('click', function(){
            fetch('<?php echo URLROOT;?>/api/events/read').then(res => res.json()).then(data => console.log(data))
        })

        apiSurvey.addEventListener('click', function(){
            fetch('<?php echo URLROOT;?>/api/survey/read/27').then(res => res.json())
            .then(data => {
                const survey_title = data.data[0].survey[0].title;
                const survey_id = data.data[0].survey[0].id;
                const questions = data.data[1].question;
                const answers = data.data[2].answer;
                survey_title_container.textContent = survey_title;
                
                //chartContainer.innerHTML += chartDiv;
                questions.forEach((question, index) => {
                    //console.log(question);
                    if(question.type !== 'textfield_s'){
                        let chartDiv = `
                            <div class="charts">
                                <h3>${question.question}</h3>
                                <div>
                                <canvas id="myChart${index}"></canvas>
                                </div>
                            </div>
                            `;
                    
                        chartContainer.innerHTML += chartDiv;
                        const frm_option = question.frm_option;
                        const answerObject = {};
                        const labelsArr = [];

                        if(question.type == 'radio'){
                            answers.forEach(answer=> {
                                if(question.id == answer.question_id){
                                    labelsArr.push(frm_option[answer.answer]); 
                                }
                            })
                        }
                        else{
                            answers.forEach(answer=> {
                                if(question.id == answer.question_id){
                                    let checkAns = answer.answer;
                                    const checkAnsArr = checkAns.split(',');
                                    checkAnsArr.forEach(ans => {
                                        const newLabel = removeBracket(ans);
                                        labelsArr.push(frm_option[newLabel]);
                                    });
                                    //console.log(checkAnsArr);
                                }
                            })
                        }

                        answerObject.labels = pushUniqueValue(labelsArr);
                   
                        if(question.type == 'radio'){
                            answerObject.data = answerObject.labels.map(label => {
                                var localObj = {
                                    [label] : 0
                                };
                                answers.forEach(answer=> {
                                    if(question.id == answer.question_id){
                                        if(frm_option[answer.answer] == label){
                                            localObj[label]++;
                                        } 
                                    }
                                });
                                return localObj;
                            })
                            // showPieChart(answerObject, `myChart${index}`);
                        }
                        else{
                            answerObject.data = answerObject.labels.map(label => {
                                var localObj = {
                                    [label] : 0
                                };
                                answers.forEach(answer=> {
                                    if(question.id == answer.question_id){
                                        let checkAns = answer.answer;
                                        const checkAnsArr = checkAns.split(',');
                                        checkAnsArr.forEach(ans => {
                                            const newLabel = removeBracket(ans);
                                            if(frm_option[newLabel] == label){
                                                localObj[label]++;
                                            } 
                                        });
                                    }
                                });
                                return localObj;
                            });
                            // showBarChart(answerObject, `myChart${index}`, index);
                        }
                        
                        setTimeout(() => {
                            showChart(answerObject, `myChart${index}`);
                        });
                    }
                    else{
                        let chartDiv = `
                                    <div class="charts">
                                        <h2>${question.question}</h2>
                                        <div class='textAnswer' id="textAnswer${index}">
                                            
                                        </div>
                                    </div>
                                    `;

                        chartContainer.innerHTML += chartDiv;

                        answers.map(answer=> {
                            if(question.id == answer.question_id){
                                    const textAnsDiv = document.getElementById(`textAnswer${index}`);
                                    let textDiv = `
                                                <div class="textDiv">
                                                    ${answer.answer}
                                                </div>
                                                `;

                                    textAnsDiv.innerHTML += textDiv;
                            }
                        });
                    }


                })

                //console.log(data);
            })
        });

        function pushUniqueValue(arr){
            const uniqueArr = [];
            for(let i=0 ; i < arr.length; i++){
                if(uniqueArr.indexOf(arr[i]) === -1){
                    uniqueArr.push(arr[i]);
                }
            }
            return uniqueArr;
        }
        
        function removeBracket(ans){
            const clearBracket = ans.replace("[", "");
            const cleanedAns = clearBracket.replace("]", "");
            return cleanedAns;
        }

        function showChart(ansObj, chartDiv){
            // var divNew = document.getElementById(chartDiv);
          
            //console.log(divNew);
            console.log('new div');
            console.log(document.getElementById(chartDiv));
            const labels = [];
            const data = {
                labels: labels,
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [],
                }]
            };

            ansObj.labels.forEach(label => labels.push(label));
            
            ansObj.data.forEach(ans => {
                for(key in ans){
                    var value = ans[key];
                    data.datasets[0].data.push(value);
                }
            });

            //console.log(labels);
         
            const config = {
                type: 'pie',
                data,
                options: {}
            };

            var myChart = new Chart(
                document.getElementById(chartDiv).getContext("2d"),
                config
            );
        }

        // function showBarChart(ansObj, chartDiv){
        //     const labels = [];
        //     const data = {
        //         labels: labels,
        //         datasets: [{
        //             label: 'My First dataset',
        //             backgroundColor: 'rgb(255, 99, 132)',
        //             borderColor: 'rgb(255, 99, 132)',
        //             data: [],
        //         }]
        //     };

        //     ansObj.labels.forEach(label => labels.push(label));
            
        //     ansObj.data.forEach(ans => {
        //         for(key in ans){
        //             var value = ans[key];
        //             data.datasets[0].data.push(value);
        //         }
        //     });

        //     console.log(labels);
         
        //     const config = {
        //         type: 'bar',
        //         data,
        //         options: {}
        //     };

        //     var myChart = new Chart(
        //         document.getElementById(`${chartDiv}`).getContext("2d"),
        //         config
        //     );
        // }

</script>

<script>

    // const forTest = [
    //     {
    //         labels: ['JESS', 'ANGEL', 'ROQUE'],
    //         data: [{JESS: 3}, {ANGEL: 2}, {ROQUE:4}]
    //     },
    //     {
    //         labels: ['WOOH', 'YEAH', 'THERE'],
    //         data: [{WOOH: 3}, {YEAH: 2}, {THERE:4}]
    //     }
    // ];
    
    // forTest.forEach((test,index) => {
    //     showChart(test,index);
    // });

    showChart();
    function showChart(){
        const labels = [
            'Jess',
            'Angel'
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [2],
            }]
        };

        // ansObj.labels.forEach(label => labels.push(label));
            
        // ansObj.data.forEach(ans => {
        //     for(key in ans){
        //         var value = ans[key];
        //         data.datasets[0].data.push(value);
        //     }
        // });

        const config = {
            type: 'bar',
            data,
            options: {
                indexAxis: 'y'
            }
        };

        var myChart = new Chart(
            document.getElementById(`myChart0`).getContext('2d'),
            config
        );
    }
   
</script>
</body>
</html>