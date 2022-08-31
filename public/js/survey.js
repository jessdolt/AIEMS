function previewSurvey(){
    const addSurveyModal = document.querySelector('.addModalContainer');
    addSurveyModal.classList.add('show');

    const cancelSurveyModal = document.querySelector('.cancel');
    cancelSurveyModal.addEventListener('click', function(){
        addSurveyModal.classList.remove('show');
    })
}


function previewChangeCover(){
    const changeModalContainer = document.querySelector('.changeModalContainer');
    const changeCoverModal = document.querySelector('.changeCoverModal');
    
    changeModalContainer.classList.add('show');
    changeCoverModal.classList.add('show');


    const cancelCoverModal = document.querySelector('#closeCoverModal');
    cancelCoverModal.addEventListener('click', function(){
       
        changeModalContainer.classList.remove('show');
        changeCoverModal.classList.remove('show');
    })
}




