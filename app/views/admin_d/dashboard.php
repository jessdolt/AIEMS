<?php require APPROOT . '/views/inc/header_admin.php';?>
<main class="admin dashboard">
                <section class="pageSpecificHeader">
                    <div>
                        <h2>Dashboard</h2>
                        <svg viewBox="0 0 146 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M36.5003 55.125H18.2503C16.6369 55.125 15.0896 54.8484 13.9488 54.3562C12.8079 53.8639 12.167 53.1962 12.167 52.5V31.5C12.167 30.8038 12.8079 30.1361 13.9488 29.6438C15.0896 29.1516 16.6369 28.875 18.2503 28.875H36.5003C38.1137 28.875 39.661 29.1516 40.8019 29.6438C41.9427 30.1361 42.5837 30.8038 42.5837 31.5V52.5C42.5837 53.1962 41.9427 53.8639 40.8019 54.3562C39.661 54.8484 38.1137 55.125 36.5003 55.125ZM79.0837 55.125H60.8337C59.2203 55.125 57.6729 54.8484 56.5321 54.3562C55.3912 53.8639 54.7503 53.1962 54.7503 52.5V7.875C54.7503 7.17881 55.3912 6.51113 56.5321 6.01884C57.6729 5.52656 59.2203 5.25 60.8337 5.25H79.0837C80.6971 5.25 82.2444 5.52656 83.3852 6.01884C84.5261 6.51113 85.167 7.17881 85.167 7.875V52.5C85.167 53.1962 84.5261 53.8639 83.3852 54.3562C82.2444 54.8484 80.6971 55.125 79.0837 55.125ZM121.667 55.125H103.417C101.804 55.125 100.256 54.8484 99.1154 54.3562C97.9746 53.8639 97.3337 53.1962 97.3337 52.5V23.625C97.3337 22.9288 97.9746 22.2611 99.1154 21.7688C100.256 21.2766 101.804 21 103.417 21H121.667C123.28 21 124.828 21.2766 125.969 21.7688C127.109 22.2611 127.75 22.9288 127.75 23.625V52.5C127.75 53.1962 127.109 53.8639 125.969 54.3562C124.828 54.8484 123.28 55.125 121.667 55.125Z" fill="white"/>
                        </svg>
                    </div>
                    <div class="dateTimeContainer">
                        <p class="currentTime">Current Time: <time id="clock"></time></p>
                        <p class="lastUpdatedTime">Last updated: <time datetime="2021-04-07 07:30:00">April 7, 2021 07:30 AM</time></p>
                    </div>
                </section>
                <section class="mainContent">
                    <div class="container">
                        <div class="hor-con">
                            <div class="card-con">
                                <h3 id="spanTimeframe"></h3>
                                <span class="visit-count" id="visit-count">0</span>
                                <svg width="200" height="91" viewBox="0 0 200 91" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="195" cy="33" r="3.5" stroke="#15CC8A" stroke-width="3"/>
                                    <circle cx="148" cy="51" r="3.5" stroke="#15CC8A" stroke-width="3"/>
                                    <circle cx="100" cy="42" r="3.5" stroke="#15CC8A" stroke-width="3"/>
                                    <circle cx="55" cy="61" r="3.5" stroke="#15CC8A" stroke-width="3"/>
                                    <circle cx="5" cy="75" r="3.5" stroke="#15CC8A" stroke-width="3"/>
                                    <line x1="8.62825" y1="73.5468" x2="51.6283" y2="62.5468" stroke="#15CC8A" stroke-width="3"/>
                                    <line x1="58.4179" y1="59.6175" x2="96.4179" y2="43.6175" stroke="#15CC8A" stroke-width="3"/>
                                    <line x1="103.287" y1="42.5278" x2="144.287" y2="50.5278" stroke="#15CC8A" stroke-width="3"/>
                                    <line x1="151.473" y1="49.5955" x2="191.473" y2="34.5955" stroke="#15CC8A" stroke-width="3"/>
                                </svg>
                                <div class="card-footer">
                                    <button id="btn_daily" class="active">D</button>
                                    <button id="btn_monthly">M</button>
                                    <button id="btn_yearly">Y</button>
                                </div>
                            </div>
                            <div class="card-con">
                                <h3>Active Job openings</h3>
                                <span class="job-open-count" id="job-active"></span>
                                <svg width="114" height="91" viewBox="0 0 114 91" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M99.022 26.5461H88.7013V19.6539C88.7013 15.8529 85.6154 12.7617 81.8208 12.7617H61.1794C57.3848 12.7617 54.2989 15.8529 54.2989 19.6539V26.5461H43.9781C40.1836 26.5461 37.0977 29.6372 37.0977 33.4382V47.2226H54.2989V40.3304H61.1794V47.2226H81.8208V40.3304H88.7013V47.2226H105.903V33.4382C105.903 29.6372 102.817 26.5461 99.022 26.5461ZM61.1794 19.6539H81.8208V26.5461H61.1794V19.6539ZM88.7013 57.5608H81.8208V50.6687H61.1794V57.5608H54.2989V50.6687H37.0977V71.3452C37.0977 75.1462 40.1836 78.2373 43.9781 78.2373H99.022C102.817 78.2373 105.903 75.1462 105.903 71.3452V50.6687H88.7013V57.5608Z" fill="#764F47"/>
                                    <path d="M26 57C33.2594 57 39.1429 51.1805 39.1429 44C39.1429 36.8195 33.2594 31 26 31C18.7406 31 12.8571 36.8195 12.8571 44C12.8571 51.1805 18.7406 57 26 57ZM35.8366 60.3109L30.9286 79.75L27.6429 65.9375L30.9286 60.25H21.0714L24.3571 65.9375L21.0714 79.75L16.1634 60.3109C8.84241 60.6562 3 66.5773 3 73.9V78.125C3 80.8164 5.20759 83 7.92857 83H44.0714C46.7924 83 49 80.8164 49 78.125V73.9C49 66.5773 43.1576 60.6562 35.8366 60.3109Z" fill="#818599"/>
                                </svg>
                                <div class="card-footer">
                                    <a href="#">
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.9688 12.125H14.1562C14.0485 12.125 13.9452 12.1678 13.869 12.244C13.7928 12.3202 13.75 12.4235 13.75 12.5312V15.375H5.625V7.25H9.28125C9.38899 7.25 9.49233 7.2072 9.56851 7.13101C9.6447 7.05483 9.6875 6.95149 9.6875 6.84375V6.03125C9.6875 5.92351 9.6447 5.82017 9.56851 5.74399C9.49233 5.6678 9.38899 5.625 9.28125 5.625H5.21875C4.89552 5.625 4.58552 5.7534 4.35696 5.98196C4.1284 6.21052 4 6.52052 4 6.84375V15.7812C4 16.1045 4.1284 16.4145 4.35696 16.643C4.58552 16.8716 4.89552 17 5.21875 17H14.1562C14.4795 17 14.7895 16.8716 15.018 16.643C15.2466 16.4145 15.375 16.1045 15.375 15.7812V12.5312C15.375 12.4235 15.3322 12.3202 15.256 12.244C15.1798 12.1678 15.0765 12.125 14.9688 12.125ZM16.3906 4H13.1406C12.598 4 12.3269 4.65787 12.709 5.04102L13.6162 5.94822L7.42773 12.1344C7.37092 12.191 7.32585 12.2583 7.29509 12.3323C7.26434 12.4064 7.2485 12.4858 7.2485 12.566C7.2485 12.6462 7.26434 12.7257 7.29509 12.7997C7.32585 12.8738 7.37092 12.9411 7.42773 12.9977L8.00334 13.5723C8.05995 13.6291 8.12722 13.6742 8.20129 13.7049C8.27536 13.7357 8.35478 13.7515 8.43498 13.7515C8.51518 13.7515 8.5946 13.7357 8.66867 13.7049C8.74274 13.6742 8.81001 13.6291 8.86662 13.5723L15.052 7.38508L15.959 8.29102C16.3398 8.67188 17 8.40527 17 7.85938V4.60938C17 4.44776 16.9358 4.29276 16.8215 4.17848C16.7072 4.0642 16.5522 4 16.3906 4V4Z" fill="black" fill-opacity="0.87"/>
                                        </svg>
                                        View Job List
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-con">
                            <div class="card-header">
                                <h3>Alumni </h3>
                                <div class="textFieldContainer">
                                    <select name="batch" id="batch_container" required>
                                      
                                    </select>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div class="chart-con" id="chart-con-alumni">
                              
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="card-con">
                            <h3>Latest Survey Status</h3>
                            <span class="res-count">Respondents: <span id="respondents">0</span></span>
                            <div class="chart-con" >
                               <canvas id="my-chart-survey"></canvas>
                            </div>
                            <span class="survey-title" id="survey-title">Survey Title</span>
                            <div class="card-footer">
                                <a href="#">
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.9688 12.125H14.1562C14.0485 12.125 13.9452 12.1678 13.869 12.244C13.7928 12.3202 13.75 12.4235 13.75 12.5312V15.375H5.625V7.25H9.28125C9.38899 7.25 9.49233 7.2072 9.56851 7.13101C9.6447 7.05483 9.6875 6.95149 9.6875 6.84375V6.03125C9.6875 5.92351 9.6447 5.82017 9.56851 5.74399C9.49233 5.6678 9.38899 5.625 9.28125 5.625H5.21875C4.89552 5.625 4.58552 5.7534 4.35696 5.98196C4.1284 6.21052 4 6.52052 4 6.84375V15.7812C4 16.1045 4.1284 16.4145 4.35696 16.643C4.58552 16.8716 4.89552 17 5.21875 17H14.1562C14.4795 17 14.7895 16.8716 15.018 16.643C15.2466 16.4145 15.375 16.1045 15.375 15.7812V12.5312C15.375 12.4235 15.3322 12.3202 15.256 12.244C15.1798 12.1678 15.0765 12.125 14.9688 12.125ZM16.3906 4H13.1406C12.598 4 12.3269 4.65787 12.709 5.04102L13.6162 5.94822L7.42773 12.1344C7.37092 12.191 7.32585 12.2583 7.29509 12.3323C7.26434 12.4064 7.2485 12.4858 7.2485 12.566C7.2485 12.6462 7.26434 12.7257 7.29509 12.7997C7.32585 12.8738 7.37092 12.9411 7.42773 12.9977L8.00334 13.5723C8.05995 13.6291 8.12722 13.6742 8.20129 13.7049C8.27536 13.7357 8.35478 13.7515 8.43498 13.7515C8.51518 13.7515 8.5946 13.7357 8.66867 13.7049C8.74274 13.6742 8.81001 13.6291 8.86662 13.5723L15.052 7.38508L15.959 8.29102C16.3398 8.67188 17 8.40527 17 7.85938V4.60938C17 4.44776 16.9358 4.29276 16.8215 4.17848C16.7072 4.0642 16.5522 4 16.3906 4V4Z" fill="black" fill-opacity="0.87"/>
                                    </svg>
                                    View Survey Report
                                </a>
                            </div>
                        </div>
                        <div class="card-con">
                            <h3>Forum Activity</h3>
                            <ul class="forum-act-list" id="forum-act-container">
                                <!-- <li>
                                    <img src="../images/heroBoxBg.png">
                                    <div>
                                        <p>
                                            <span class="author">Gilmer R Tueres</span>
                                            posted a new thread “is argaasdasd asdasd asdasd asdasdsa asdsad asdasd asdsadas adasd asdasdas asdasdas asdsadux bubu asdasd”
                                        </p>
                                        <span class="time-elapsed">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 1.125C4.65117 1.125 1.125 4.65117 1.125 9C1.125 13.3488 4.65117 16.875 9 16.875C13.3488 16.875 16.875 13.3488 16.875 9C16.875 4.65117 13.3488 1.125 9 1.125ZM12.1025 11.4205L11.5998 12.1061C11.5889 12.121 11.5751 12.1336 11.5593 12.1432C11.5434 12.1528 11.5259 12.1591 11.5076 12.1619C11.4893 12.1647 11.4706 12.1638 11.4527 12.1594C11.4347 12.1549 11.4178 12.1469 11.4029 12.1359L8.49551 10.016C8.47739 10.003 8.46267 9.98584 8.45258 9.96596C8.44248 9.94607 8.43731 9.92406 8.4375 9.90176V5.0625C8.4375 4.98516 8.50078 4.92188 8.57812 4.92188H9.42363C9.50098 4.92188 9.56426 4.98516 9.56426 5.0625V9.41309L12.0709 11.2254C12.1342 11.2693 12.1482 11.3572 12.1025 11.4205Z" fill="black" fill-opacity="0.6"/>
                                            </svg>
                                            2 hours ago
                                        </span>
                                    </div>
                                    
                                </li> -->
                            </ul>
                            <div class="card-footer">
                                <a href="#">
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.9688 12.125H14.1562C14.0485 12.125 13.9452 12.1678 13.869 12.244C13.7928 12.3202 13.75 12.4235 13.75 12.5312V15.375H5.625V7.25H9.28125C9.38899 7.25 9.49233 7.2072 9.56851 7.13101C9.6447 7.05483 9.6875 6.95149 9.6875 6.84375V6.03125C9.6875 5.92351 9.6447 5.82017 9.56851 5.74399C9.49233 5.6678 9.38899 5.625 9.28125 5.625H5.21875C4.89552 5.625 4.58552 5.7534 4.35696 5.98196C4.1284 6.21052 4 6.52052 4 6.84375V15.7812C4 16.1045 4.1284 16.4145 4.35696 16.643C4.58552 16.8716 4.89552 17 5.21875 17H14.1562C14.4795 17 14.7895 16.8716 15.018 16.643C15.2466 16.4145 15.375 16.1045 15.375 15.7812V12.5312C15.375 12.4235 15.3322 12.3202 15.256 12.244C15.1798 12.1678 15.0765 12.125 14.9688 12.125ZM16.3906 4H13.1406C12.598 4 12.3269 4.65787 12.709 5.04102L13.6162 5.94822L7.42773 12.1344C7.37092 12.191 7.32585 12.2583 7.29509 12.3323C7.26434 12.4064 7.2485 12.4858 7.2485 12.566C7.2485 12.6462 7.26434 12.7257 7.29509 12.7997C7.32585 12.8738 7.37092 12.9411 7.42773 12.9977L8.00334 13.5723C8.05995 13.6291 8.12722 13.6742 8.20129 13.7049C8.27536 13.7357 8.35478 13.7515 8.43498 13.7515C8.51518 13.7515 8.5946 13.7357 8.66867 13.7049C8.74274 13.6742 8.81001 13.6291 8.86662 13.5723L15.052 7.38508L15.959 8.29102C16.3398 8.67188 17 8.40527 17 7.85938V4.60938C17 4.44776 16.9358 4.29276 16.8215 4.17848C16.7072 4.0642 16.5522 4 16.3906 4V4Z" fill="black" fill-opacity="0.87"/>
                                    </svg>
                                    View Job List
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

<script src="<?php echo URLROOT;?>/js/dashboard.js" defer></script>

<script>



filterDateCount();
function filterDateCount(){
    const btnDaily = document.getElementById('btn_daily');
    const btnMonthly = document.getElementById('btn_monthly');
    const btnYearly = document.getElementById('btn_yearly');
    const spanTimeframe = document.getElementById('spanTimeframe');
    btnDaily.addEventListener('click', function(){
        getLoginCount('Daily');
        btnDaily.classList.add('active');
        btnMonthly.classList.remove('active');
        btnYearly.classList.remove('active');
        spanTimeframe.textContent = 'Total visit count today';
    })

    btnMonthly.addEventListener('click', function(){
        getLoginCount('Monthly');
        btnMonthly.classList.add('active');
        btnYearly.classList.remove('active');

        btnDaily.classList.remove('active');
        spanTimeframe.textContent = 'Total visit count this month';
    })

    btnYearly.addEventListener('click', function(){
        getLoginCount('Yearly');
        btnYearly.classList.add('active');
        btnMonthly.classList.remove('active');
        btnDaily.classList.remove('active');
        spanTimeframe.textContent = 'Total visit count this year';
    })
}

getLoginCount('Daily');
changeText();
function changeText(){
    const spanTimeframe = document.getElementById('spanTimeframe');
    spanTimeframe.textContent = 'Total visit count today';
}
function getLoginCount(filter){
    const spanVisitCount = document.getElementById('visit-count');
    fetch(`<?php echo URLROOT;?>/api/login_count/${filter}`).then(res => res.json())
    .then(data => {
        spanVisitCount.textContent = data;
    });
}

checkJob();
function checkJob(){
    const spanActiveJobs = document.getElementById('job-active');
    fetch('<?php echo URLROOT;?>/api/job_portal/active').then(res => res.json())
    .then(data => {
        const activeJobs = data.data[0].activeJobs;
        spanActiveJobs.textContent = activeJobs;
    });
}

checkLatestSurvey();
function checkLatestSurvey(){
    const spanRespondents = document.getElementById('respondents');
    const spanSurveyTitle = document.getElementById('survey-title');
    fetch('<?php echo URLROOT;?>/api/survey/latest').then(res => res.json())
    .then(data => {
        //console.log(data);
        const surveyTitle = data.latest[0].latestSurvey[0].title;
        const respondents = data.latest[1].totalUser[0].respondents;
        const surveyData = data.latest[2].taken[0][0].userTaken;
        spanRespondents.textContent = respondents;
        spanSurveyTitle.textContent = surveyTitle;
        console.log(data);
        surveyChart(surveyData,respondents);
    });
}

//checkBatch();
function checkBatch(){
    const batchContainer = document.getElementById('batch_container');
    fetch('<?php echo URLROOT;?>/api/batch/read').then(res=>res.json())
    .then(data=> {
        data.data.forEach((batch, index) => {
            let opt;
            if(index == 0){
                opt= `
                <option value="${batch.id}" data-batch='${batch.year}' selected="selected">Batch ${batch.year}</option>
                `;
            }
            else{
                opt= `
                <option value="${batch.id}" data-batch='${batch.year}'>Batch ${batch.year}</option>
                `; 
            }
            batchContainer.innerHTML += opt;
        })

        setTimeout(() => {
            const batch = document.getElementById('batch_container');
            clearChart();
            getMasterList(batch.value);
        });
    });

    
}

document.addEventListener("DOMContentLoaded", function(event) { 
    checkBatch();
   
});

tryBatch();
function tryBatch(){
    const batchContainer = document.getElementById('batch_container');
    batchContainer.addEventListener('change', function(){
        // getMasterList(this.value);
        clearChart();
        setTimeout(() => {
            getMasterList(this.value);   
        });
    })
}

function getMasterList(batch_id){
    fetch(`<?php echo URLROOT;?>/api/masterlist/read/${batch_id}`).then(res => res.json())
    .then(data =>{
        showBarChart(data.masterlist);
    });
}

forumActivity();
function forumActivity(){
    const forumActContainer = document.getElementById('forum-act-container');
    fetch(`<?php echo URLROOT;?>/api/forum/read`).then(res=>res.json())
    .then(data => {
        console.log(data);
        data.forEach(forum => {
            let imageStr
            if(forum.image === ""){
                imageStr = '<?php echo URLROOT;?>/images/official-default-avatar.svg'
            }
            else{
                imageStr = `<?php echo URLROOT;?>/uploads/${forum.image}`;
            }
            

            if(forum.rType == 'topic'){
                // console.log('topic hit');
            
                let opt = `
                    <li>
                        <img src="${imageStr}">
                        <div>
                            <p>
                                <span class="author">${forum.name}</span>
                                posted a new thread “${forum.title}”
                            </p>
                            <span class="time-elapsed">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 1.125C4.65117 1.125 1.125 4.65117 1.125 9C1.125 13.3488 4.65117 16.875 9 16.875C13.3488 16.875 16.875 13.3488 16.875 9C16.875 4.65117 13.3488 1.125 9 1.125ZM12.1025 11.4205L11.5998 12.1061C11.5889 12.121 11.5751 12.1336 11.5593 12.1432C11.5434 12.1528 11.5259 12.1591 11.5076 12.1619C11.4893 12.1647 11.4706 12.1638 11.4527 12.1594C11.4347 12.1549 11.4178 12.1469 11.4029 12.1359L8.49551 10.016C8.47739 10.003 8.46267 9.98584 8.45258 9.96596C8.44248 9.94607 8.43731 9.92406 8.4375 9.90176V5.0625C8.4375 4.98516 8.50078 4.92188 8.57812 4.92188H9.42363C9.50098 4.92188 9.56426 4.98516 9.56426 5.0625V9.41309L12.0709 11.2254C12.1342 11.2693 12.1482 11.3572 12.1025 11.4205Z" fill="black" fill-opacity="0.6"/>
                                </svg>
                                ${timeSince(forum.rCreated_at)} ago
                            </span>
                        </div>
                    </li>    
                        `;

                forumActContainer.innerHTML += opt;
            }
            else if(forum.rType == 'comment'){
                // console.log('comment hit');
                // console.log(forum);
                
                let opt = `
                    <li>
                        <img src="${imageStr}">
                        <div>
                            <p>
                                <span class="author">${forum.name}</span>
                                commented on the thread “${forum.title}”
                            </p>
                            <span class="time-elapsed">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 1.125C4.65117 1.125 1.125 4.65117 1.125 9C1.125 13.3488 4.65117 16.875 9 16.875C13.3488 16.875 16.875 13.3488 16.875 9C16.875 4.65117 13.3488 1.125 9 1.125ZM12.1025 11.4205L11.5998 12.1061C11.5889 12.121 11.5751 12.1336 11.5593 12.1432C11.5434 12.1528 11.5259 12.1591 11.5076 12.1619C11.4893 12.1647 11.4706 12.1638 11.4527 12.1594C11.4347 12.1549 11.4178 12.1469 11.4029 12.1359L8.49551 10.016C8.47739 10.003 8.46267 9.98584 8.45258 9.96596C8.44248 9.94607 8.43731 9.92406 8.4375 9.90176V5.0625C8.4375 4.98516 8.50078 4.92188 8.57812 4.92188H9.42363C9.50098 4.92188 9.56426 4.98516 9.56426 5.0625V9.41309L12.0709 11.2254C12.1342 11.2693 12.1482 11.3572 12.1025 11.4205Z" fill="black" fill-opacity="0.6"/>
                                </svg>
                                ${timeSince(forum.rCreated_at)} ago
                            </span>
                        </div>
                    </li>    
                        `;
                forumActContainer.innerHTML += opt;
            }
            else {
                let opt = `
                    <li>
                        <img src="${imageStr}">
                        <div>
                            <p>
                                <span class="author">${forum.name}</span>
                                replied on a comment on the thread “${forum.title}”
                            </p>
                            <span class="time-elapsed">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 1.125C4.65117 1.125 1.125 4.65117 1.125 9C1.125 13.3488 4.65117 16.875 9 16.875C13.3488 16.875 16.875 13.3488 16.875 9C16.875 4.65117 13.3488 1.125 9 1.125ZM12.1025 11.4205L11.5998 12.1061C11.5889 12.121 11.5751 12.1336 11.5593 12.1432C11.5434 12.1528 11.5259 12.1591 11.5076 12.1619C11.4893 12.1647 11.4706 12.1638 11.4527 12.1594C11.4347 12.1549 11.4178 12.1469 11.4029 12.1359L8.49551 10.016C8.47739 10.003 8.46267 9.98584 8.45258 9.96596C8.44248 9.94607 8.43731 9.92406 8.4375 9.90176V5.0625C8.4375 4.98516 8.50078 4.92188 8.57812 4.92188H9.42363C9.50098 4.92188 9.56426 4.98516 9.56426 5.0625V9.41309L12.0709 11.2254C12.1342 11.2693 12.1482 11.3572 12.1025 11.4205Z" fill="black" fill-opacity="0.6"/>
                                </svg>
                                ${timeSince(forum.rCreated_at)} ago
                            </span>
                        </div>
                    </li>    
                        `;
                forumActContainer.innerHTML += opt;
            }
        })
    })
}

function timeSince(date) {
   
    var seconds = Math.floor((Date.parse(new Date()) - Date.parse(date)) / 1000);

    var interval = seconds / 31536000;

    if (interval > 1) {
        return Math.floor(interval) + " years";
    }
    interval = seconds / 2592000;
    if (interval > 1) {
        return Math.floor(interval) + " months";
    }
    interval = seconds / 86400;
    if (interval > 1) {
        return Math.floor(interval) + " days";
    }
    interval = seconds / 3600;
    if (interval > 1) {
        return Math.floor(interval) + " hours";
    }
    interval = seconds / 60;
    if (interval > 1) {
        return Math.floor(interval) + " minutes";
    }

    return Math.floor(seconds) + " seconds";


}



</script>


<?php require APPROOT . '/views/inc/footer.php';?>