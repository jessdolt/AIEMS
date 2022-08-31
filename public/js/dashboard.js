//showBarChart();
count = 0;




function showBarChart(alumniArr){
   
    const labels = [];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Alumni',
            backgroundColor: 
            [
            'rgba(166, 63, 63, 0.37)',
            'rgba(166, 63, 63, 0.7)'
            ],
            borderColor: [
            'rgba(166, 63, 63, 0.37)',
            'rgba(166, 63, 63, 0.7)'
            ],
            hoverBackgroundColor: 
            [
            'rgba(166, 63, 63)'
            ],
            barThickness: 55,
            data: []
        }]
    };

    alumniArr[1].course.forEach(label => {
        labels.push(label.code);
        //console.log(label.code);
    });
    
    alumniArr[0].data.forEach((ans,index) => {
        for(key in ans){
            var value = ans[key];
            data.datasets[0].data.push(value);
            // console.log('this is ' + ans[key]);
            // console.log(value);
        }
    });

    // //console.log(labels);
 
    const config = {
        type: 'bar',
        data,
        options: {
            plugins:{
                legend:{
                    display:false
                }
            } 
        }
    };


    var myChart = new Chart(
        document.getElementById('my-chart-alumni').getContext("2d"),
        config
    );

   
    Chart.defaults.animation = 4000;
    Chart.defaults.font.family = 'Open Sans';
    Chart.defaults.font.weight = 600;
    Chart.defaults.font.size = 13;
    

}

function clearChart(){
    const chartContainer = document.getElementById('chart-con-alumni');
    if(chartContainer.children.length != 0){
        chartContainer.children[0].remove();
        createChartContainer();
    }
    else{
        createChartContainer();
    }
}

function createChartContainer(){
    const chartContainer = document.getElementById('chart-con-alumni');
    let canvas = `
                <canvas id='my-chart-alumni'></canvas>
                `;
    chartContainer.innerHTML = canvas;
}


function surveyChart(taken,total){
    const notTaken = total - taken;

    const labels = ['Responded', 'Not yet'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: ['rgba(133, 55, 55, 1)', 
                            'rgba(229, 109, 109, 1)' ],
            borderColor: ['rgba(133, 55, 55, 1)', 
                            'rgba(229, 109, 109, 1)' ],
            hoverBackgroundColor: ['rgba(133, 55, 55, 1)', 
                            'rgba(229, 109, 109, 1)' ],
            hoverBorderColor: ['rgba(133, 55, 55, 5)', 
                            'rgba(229, 109, 109, 5)' ],
            data: [taken,notTaken]
  
        }]
    };
 
    const config = {
        type: 'doughnut',
        data,
        options: {
            plugins:{
                legend:{
                    display:true,
                    position: 'left'
                },
                title:{
                    display: true,
                    
                }
            }
        }
    };

    var myChart = new Chart(
        document.getElementById('my-chart-survey').getContext("2d"),
        config
    );
}