const btnChart = document.getElementById('view-chart');
btnChart.addEventListener('click', function(){
    viewChart()
    getApi()
    changeButton()
    // checkOnly()
})

function changeButton(){
    const btnReturn = document.getElementById('return-normal');
    btnReturn.style.removeProperty('display');
    btnChart.style.display = "none";
}

function viewChart(){
    const questionContainer = document.querySelectorAll('.questionCon');
    questionContainer.forEach(questCon => questCon.remove());
}


function checkOnly(){
    const survey_id = document.getElementById('survey-id').value;
    console.log(survey_id);
}


function getApi(){
    const chartContainer = document.getElementById('answer-form');
    const webURL = document.getElementById('url-web').value; 
    const survey_id = document.getElementById('survey-id').value;
    
    fetch(`${webURL}/api/single/survey/${survey_id}`).then(res => res.json())
    .then(data => {
        console.log(data)
        //const survey_title = data.data[0].survey[0].title;
        const questions = data.data[1].question;
        const answers = data.data[2].answer;
        //survey_title_container.textContent = survey_title;
        
        //chartContainer.innerHTML += chartDiv;
        questions.forEach((question, index) => {
            //console.log(question);
            if(question.type !== 'textfield_s'){
                let chartDiv = `
                        <div class="questionCon">
                            <div class="questionHeader">
                                <h3>${question.question}</h3>
                            </div>
                            <div class="answerCon" id="textfieldAnswer${index}" >
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

                    setTimeout(() => {
                        showPieChart(answerObject, `myChart${index}`);
                    });
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
                    setTimeout(() => {
                        showBarChart(answerObject, `myChart${index}`);
                    });
                    // showBarChart(answerObject, `myChart${index}`, index);
                }
                
                
            }
            else{
                let chartDiv = `
                            <div class="questionCon">
                                <div class="questionHeader">
                                    <h3>Question Sample:</h3>
                                </div>
                                <div class="answerCon" id="textfieldAnswer${index}">
                                    <textarea name="q2a" id="answer-para" readonly>Margaux Balew Shesh
                                    </textarea>
                                </div>
                            </div>
                            `;

                chartContainer.innerHTML += chartDiv;
                answers.map(answer=> {
                    if(question.id == answer.question_id){
                            const textAnsDiv = document.getElementById(`textfieldAnswer${index}`);
                            let textDiv = `
                                        <textarea name="q2a" id="answer-para" readonly>${answer.answer}</textarea>
                                        `;

                            textAnsDiv.innerHTML += textDiv;
                    }
                });
            }


        })

        //console.log(data);
    })
}

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


function getRandomRgb() {
    var num = Math.round(0xffffff * Math.random());
    var r = num >> 200;
    var g = num >> 8 & 255;
    var b = num & 255;
    return 'rgb(' + r + ', ' + g + ', ' + b + ')';
}

function getColor($index) {
    var GenColor = [
        'rgb(250,72,72)',
        'rgb(230,151,66)',
        'rgb(233,115,115)',
        'rgb(78,241,86)' ,
        'rgb(67,28,240)',
        'rgb(240,28,226)',
        'rgb(233,115,115)'
    ];
    return GenColor[$index];
}
  

function showPieChart(ansObj, chartDiv){
    // var divNew = document.getElementById(chartDiv);
  
    //console.log(divNew);
    // console.log('new div');
    // console.log(document.getElementById(chartDiv));

    const labels = [];
    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: [],
            borderColor: [],
            data: [],
        }]
    };

    ansObj.labels.forEach(label => labels.push(label));
    
    ansObj.data.forEach((ans,index) => {
        for(key in ans){
            var value = ans[key];
            data.datasets[0].data.push(value);
        }
        //console.log(index);
        var randColor = getColor(index);
        data.datasets[0].backgroundColor.push(randColor);
        data.datasets[0].borderColor.push(randColor);
    });

    //console.log(labels);
 
    const config = {
        type: 'pie',
        data,
        options:{
            title:{
                display:true,
                text: "HELLO"
            },
            legend:{
                display:true,
                position: 'right',
                labels:{
                    fontColor: '#000'
                }
            },
            plugins:{
                legend:{
                    display:true,
                    position: 'right'
                },
                title:{
                    display: true,
                    
                }
            }
        }
    };

    var myChart = new Chart(
        document.getElementById(chartDiv).getContext("2d"),
        config
    );
}

function showBarChart(ansObj, chartDiv){
    // var divNew = document.getElementById(chartDiv);
  
    //console.log(divNew);
    // console.log('new div');
    // console.log(document.getElementById(chartDiv));

    const labels = [];
    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: [],
            borderColor: [],
            data: [],
            barThickness: 55,
        }]
    };

    ansObj.labels.forEach(label => labels.push(label));
    
    ansObj.data.forEach((ans,index) => {
        for(key in ans){
            var value = ans[key];
            data.datasets[0].data.push(value);
        }
        var randColor = getColor(index);
        data.datasets[0].backgroundColor.push(randColor);
        data.datasets[0].borderColor.push(randColor);
    });

    //console.log(labels);
 
    const config = {
        type: 'bar',
        data,
        options: {}
    };

    var myChart = new Chart(
        document.getElementById(chartDiv).getContext("2d"),
        config
    );
}