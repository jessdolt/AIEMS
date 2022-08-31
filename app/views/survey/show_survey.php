<?php require APPROOT . '/views/inc/header_admin.php';?>

<main class="admin dataInput">
                <section class="pageSpecificHeader"></section>
                <section class="mainContent adminForm questionnaire">
                    <form action="" id="manage_sort">
                        <div class="form ui-sortable">
                            <h2>
                                Survey
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.47149 19.0139C9.23783 19.0143 9.0114 18.9329 8.83149 18.7839C8.73023 18.6999 8.64653 18.5968 8.58517 18.4805C8.52382 18.3641 8.48603 18.2368 8.47395 18.1058C8.46187 17.9749 8.47576 17.8428 8.5148 17.7172C8.55385 17.5916 8.61728 17.4749 8.70149 17.3739L13.1815 12.0139L8.86149 6.64386C8.77842 6.54157 8.71639 6.42387 8.67896 6.29753C8.64153 6.17119 8.62943 6.0387 8.64337 5.90767C8.65731 5.77665 8.69701 5.64966 8.76018 5.53403C8.82335 5.41839 8.90876 5.31638 9.01149 5.23386C9.11495 5.14282 9.23612 5.07415 9.36738 5.03216C9.49864 4.99017 9.63717 4.97577 9.77426 4.98986C9.91135 5.00394 10.0441 5.04621 10.164 5.11401C10.284 5.18181 10.3887 5.27368 10.4715 5.38386L15.3015 11.3839C15.4486 11.5628 15.529 11.7872 15.529 12.0189C15.529 12.2505 15.4486 12.4749 15.3015 12.6539L10.3015 18.6539C10.2012 18.7749 10.0737 18.8705 9.92953 18.9331C9.78532 18.9956 9.62839 19.0233 9.47149 19.0139Z" fill="#A63F3F"/>
                                </svg>
                                Questionnaire
                                <button type="button" class="addNewQuestion" id="btn-question">
                                    New Question
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 8V12M12 12V16M12 12H16M12 12H8" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            </h2>

                            <?php foreach($data['questions'] as $row):?>
                                <div class="questionCon">
                                    <div class="questionHeader">
                                        <input type="hidden" name="qid[]" value="<?php echo $row->id?>">
                                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.8233 1.67676L18.3233 4.17676L16.4175 6.08342L13.9175 3.58342L15.8233 1.67676Z" fill="black" fill-opacity="0.87"/>
                                            <path d="M6.6665 13.3332H9.1665L15.239 7.26074L12.739 4.76074L6.6665 10.8332V13.3332Z" fill="black" fill-opacity="0.87"/>
                                            <path d="M15.8333 15.8333H6.79833C6.77667 15.8333 6.75417 15.8417 6.7325 15.8417C6.705 15.8417 6.6775 15.8342 6.64917 15.8333H4.16667V4.16667H9.8725L11.5392 2.5H4.16667C3.2475 2.5 2.5 3.24667 2.5 4.16667V15.8333C2.5 16.7533 3.2475 17.5 4.16667 17.5H15.8333C16.2754 17.5 16.6993 17.3244 17.0118 17.0118C17.3244 16.6993 17.5 16.2754 17.5 15.8333V8.61L15.8333 10.2767V15.8333Z" fill="black" fill-opacity="0.87"/>
                                        </svg>
                                        <h3><?php echo $row->question?></h3>
                                        <span class="questionType">
                                        <?php echo ($row->type == 'check' || $row->type == 'radio') ? 'Multiple Choice': 'Paragraph'?>
                                        </span>
                                        <div class="option icon" tabindex="0">
                                            <span class="optionSpan">&#8942</span>
                                            <div class="optionModal">
                                                <button type="button" class="btnEditInline btn-edit-question" data-id="<?php echo $row->id?>" >
                                                    <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15.8233 1.67676L18.3233 4.17676L16.4175 6.08342L13.9175 3.58342L15.8233 1.67676Z" fill="black" fill-opacity="0.87"/>
                                                        <path d="M6.6665 13.3332H9.1665L15.239 7.26074L12.739 4.76074L6.6665 10.8332V13.3332Z" fill="black" fill-opacity="0.87"/>
                                                        <path d="M15.8333 15.8333H6.79833C6.77667 15.8333 6.75417 15.8417 6.7325 15.8417C6.705 15.8417 6.6775 15.8342 6.64917 15.8333H4.16667V4.16667H9.8725L11.5392 2.5H4.16667C3.2475 2.5 2.5 3.24667 2.5 4.16667V15.8333C2.5 16.7533 3.2475 17.5 4.16667 17.5H15.8333C16.2754 17.5 16.6993 17.3244 17.0118 17.0118C17.3244 16.6993 17.5 16.2754 17.5 15.8333V8.61L15.8333 10.2767V15.8333Z" fill="black" fill-opacity="0.87"/>
                                                    </svg>
                                                </button>
                                                <button type="button" class="btnDeleteInline" data-url="<?php echo URLROOT;?>/surveys/delete_question/<?php echo $row->id?>/<?php echo $data['id']?>">
                                                    <svg viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15.75 1.875H2.25C1.62868 1.875 1.125 2.43464 1.125 3.125V3.75C1.125 4.44036 1.62868 5 2.25 5H15.75C16.3713 5 16.875 4.44036 16.875 3.75V3.125C16.875 2.43464 16.3713 1.875 15.75 1.875Z"/>
                                                        <path d="M2.61724 6.25C2.57772 6.24977 2.53859 6.25879 2.50242 6.27648C2.46624 6.29417 2.43383 6.32014 2.40729 6.35268C2.38076 6.38523 2.36069 6.42362 2.34841 6.46536C2.33612 6.5071 2.33189 6.55125 2.33599 6.59493L3.26095 16.4606C3.26076 16.4634 3.26076 16.4663 3.26095 16.4691C3.30928 16.9255 3.50672 17.3462 3.81579 17.6514C4.12486 17.9567 4.52404 18.1252 4.93755 18.125H13.0618C13.4752 18.125 13.8742 17.9564 14.1831 17.6512C14.4921 17.3459 14.6894 16.9253 14.7377 16.4691V16.4609L15.6613 6.59493C15.6654 6.55125 15.6611 6.5071 15.6488 6.46536C15.6366 6.42362 15.6165 6.38523 15.59 6.35268C15.5634 6.32014 15.531 6.29417 15.4948 6.27648C15.4587 6.25879 15.4195 6.24977 15.38 6.25H2.61724ZM11.3662 13.3082C11.4197 13.3659 11.4623 13.4349 11.4916 13.5111C11.5209 13.5873 11.5362 13.6692 11.5367 13.752C11.5373 13.8349 11.523 13.917 11.4947 13.9937C11.4664 14.0703 11.4246 14.1399 11.3719 14.1985C11.3192 14.2571 11.2565 14.3034 11.1875 14.3348C11.1185 14.3662 11.0446 14.3821 10.97 14.3814C10.8955 14.3808 10.8217 14.3637 10.7532 14.3312C10.6846 14.2986 10.6226 14.2512 10.5706 14.1918L8.99986 12.4465L7.42872 14.1918C7.32275 14.3062 7.18051 14.3697 7.03276 14.3685C6.885 14.3674 6.74359 14.3016 6.63908 14.1856C6.53458 14.0695 6.47537 13.9124 6.47426 13.7482C6.47315 13.5841 6.53022 13.426 6.63314 13.3082L8.20427 11.5625L6.63314 9.8168C6.53022 9.699 6.47315 9.54093 6.47426 9.37676C6.47537 9.21259 6.53458 9.05549 6.63908 8.93942C6.74359 8.82336 6.885 8.75764 7.03276 8.75648C7.18051 8.75532 7.32275 8.8188 7.42872 8.93321L8.99986 10.6785L10.5706 8.93321C10.6766 8.8188 10.8188 8.75532 10.9666 8.75648C11.1144 8.75764 11.2558 8.82336 11.3603 8.93942C11.4648 9.05549 11.524 9.21259 11.5251 9.37676C11.5262 9.54093 11.4691 9.699 11.3662 9.8168L9.79509 11.5625L11.3662 13.3082Z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="answerCon">
                                        <?php if($row->type == 'radio'):?>
                                            <?php foreach(json_decode($row->frm_option) as $key => $value):?>
                                                <div>
                                                    <input type="radio" id="option_<?php echo $key?>" name="answer[<?php echo $row->id?>]" value="<?php echo $key?>" checked="">
                                                    <label for="option_<?php echo $key?>"><?php echo $value?></label>
                                                </div>
                                            <?php endforeach; ?>
                        
                                        <?php elseif($row->type == 'check'):?>
                                            <?php foreach(json_decode($row->frm_option) as $key => $value):?>
                                                <div>
                                                    <input type="checkbox" id="option_<?php echo $key?>" name="answer[<?php echo $row->id?>][]" value="<?php echo $key?>">
                                                    <label for="option_<?php echo $key?>"><?php echo $value?></label>
                                                </div>
                                            <?php endforeach; ?>
                                       
                                        <?php else:?>
                                                <textarea name="answer[<?php echo $row->id?>]" id="answer-para" ></textarea>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            
                            
                          
                        </div>


                        <div class="form">
                            <a href="<?php echo URLROOT;?>/admin/survey_list" class="closeIcon">
                                <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.7624 15L22.1374 9.63749C22.3728 9.40211 22.505 9.08287 22.505 8.74999C22.505 8.41711 22.3728 8.09787 22.1374 7.86249C21.902 7.62711 21.5828 7.49487 21.2499 7.49487C20.917 7.49487 20.5978 7.62711 20.3624 7.86249L14.9999 13.2375L9.63742 7.86249C9.40204 7.62711 9.0828 7.49487 8.74992 7.49487C8.41705 7.49487 8.0978 7.62711 7.86242 7.86249C7.62704 8.09787 7.49481 8.41711 7.49481 8.74999C7.49481 9.08287 7.62704 9.40211 7.86242 9.63749L13.2374 15L7.86242 20.3625C7.74526 20.4787 7.65227 20.6169 7.58881 20.7693C7.52535 20.9216 7.49268 21.085 7.49268 21.25C7.49268 21.415 7.52535 21.5784 7.58881 21.7307C7.65227 21.883 7.74526 22.0213 7.86242 22.1375C7.97863 22.2547 8.11688 22.3476 8.2692 22.4111C8.42153 22.4746 8.58491 22.5072 8.74992 22.5072C8.91494 22.5072 9.07832 22.4746 9.23064 22.4111C9.38297 22.3476 9.52122 22.2547 9.63742 22.1375L14.9999 16.7625L20.3624 22.1375C20.4786 22.2547 20.6169 22.3476 20.7692 22.4111C20.9215 22.4746 21.0849 22.5072 21.2499 22.5072C21.4149 22.5072 21.5783 22.4746 21.7306 22.4111C21.883 22.3476 22.0212 22.2547 22.1374 22.1375C22.2546 22.0213 22.3476 21.883 22.411 21.7307C22.4745 21.5784 22.5072 21.415 22.5072 21.25C22.5072 21.085 22.4745 20.9216 22.411 20.7693C22.3476 20.6169 22.2546 20.4787 22.1374 20.3625L16.7624 15Z" fill="black" fill-opacity="0.87"/>
                                </svg>
                            </a>
                            <div class="surveyInfoCon">
                                <h4>Title:</h4>
                                <p class="surveyTitle"><?php echo $data['survey']->title?></p>
                                <h4>Description:</h4>
                                <p class="surveyDescription"><?php echo $data['survey']->description?></p>
                            </div>
                            <div class="dateInfo">
                                <h4>Start Date:</h4>
                                <p class="created-date"><?php echo date('F j' .','. ' Y ', strtotime($data['survey']->start_date))?></p>
                                <h4>End Date:</h4>
                                <p class="created-date"><?php echo date('F j' .','. ' Y ', strtotime($data['survey']->end_date))?></p>
                                <h4>Created On:</h4>
                                <p class="created-date"><?php echo date('F j' .','. ' Y ', strtotime($data['survey']->date_created))?></p>
                            </div>
                            
                            <div class="btnGroupContainer">
                                <button class="reset">
                                    <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.8233 1.67676L18.3233 4.17676L16.4175 6.08342L13.9175 3.58342L15.8233 1.67676Z" fill="black" fill-opacity="0.87"/>
                                        <path d="M6.6665 13.3332H9.1665L15.239 7.26074L12.739 4.76074L6.6665 10.8332V13.3332Z" fill="black" fill-opacity="0.87"/>
                                        <path d="M15.8333 15.8333H6.79833C6.77667 15.8333 6.75417 15.8417 6.7325 15.8417C6.705 15.8417 6.6775 15.8342 6.64917 15.8333H4.16667V4.16667H9.8725L11.5392 2.5H4.16667C3.2475 2.5 2.5 3.24667 2.5 4.16667V15.8333C2.5 16.7533 3.2475 17.5 4.16667 17.5H15.8333C16.2754 17.5 16.6993 17.3244 17.0118 17.0118C17.3244 16.6993 17.5 16.2754 17.5 15.8333V8.61L15.8333 10.2767V15.8333Z" fill="black" fill-opacity="0.87"/>
                                    </svg>
                                    Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
            </main>
        </div>
    </div>

    <div id="modal_new"> </div>

    <script>
    $(document).ready(function(){
        //console.log($('#manage_sort').serialize());
        $('.ui-sortable').sortable({
            update: function( ) {
		        $.ajax({
		        	url:"<?php echo URLROOT;?>/surveys/update_question_sort",
		        	method:'POST',
		        	data:$('#manage_sort').serialize(),
		        	success:function(resp){
		        		//alert_toast("Question order sort successfully saved.","success")
                        //console.log(resp);
		        	}
		        })
		    }
        })
    }) 

    $('.btn-edit-question').click(function(){
        // console.log($(this).attr('data-id'));
        // console.log(php echo $data['id']?>);
        $.ajax({ 
                url:'<?php echo URLROOT;?>/surveys/question_modal',
                data: { sid: <?php echo $data['id'] ?>, qid: $(this).attr('data-id')},
                method: 'POST',
                type: 'POST',
                success:function(res){
                    //console.log(res);
                     $('#modal_new').html(res);
                     previewSurvey();
                }, 
                error: function(er){
                    console.log(er);
                }
            })
    })

    $('.btn-delete-question').click(function(){
        // console.log($(this).attr('data-id'));
        // console.log(php echo $data['id']?>);
        if(confirm("Are you sure you want to delete this question?")){
            $.ajax({ 
                url:'<?php echo URLROOT;?>/surveys/delete_question',
                data: { sid: <?php echo $data['id'] ?>, qid: $(this).attr('data-id')},
                method: 'POST',
                type: 'POST',
                success:function(res){
                    //console.log(res);
                    location.reload();
                }, 
                error: function(er){
                    console.log(er);
                }
            })
        }
    })

    $('#btn-question').click(function(){
        $.ajax({ 
                url:'<?php echo URLROOT;?>/surveys/question_modal',
                data: { sid: <?php echo $data['id'] ?>},
                method: 'POST',
                type: 'POST',
                success:function(res){
                    //console.log(res);
                    $('#modal_new').html(res);
                    previewSurvey();
                    
                }, 
                error: function(er){
                    console.log(er);
                }
            })
    })

</script>


<?php require APPROOT . '/views/inc/footer.php';?>