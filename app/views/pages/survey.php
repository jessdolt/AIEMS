<?php require APPROOT . '/views/inc/header.php'; ?>

<main class="alumni">
    
        <section class="heroBox behind">
        </section>
        <section class="mainContent questionnaire">
            <div class="container">
               
                <div class="form">
                    <h1>PUP-Institute of Technology Survey</h1>
                    <p>Before you continue, we need you to partake in the following survey/s</p>
                    <?php $count = 0;?>
                    <?php foreach($data['surveyList'] as $survey):?>
                    <?php $count++;?>
                        <?php if(!isset($data['answers'][$survey->id])):?>
                            <?php if ($survey->s_type == 'built_in'):?>
                                <div class="questionCon surveyCard">
                                    <div class="questionHeader">
                                        <h3><?php echo $survey->title?></h3>
                                    </div>
                                    <p class="description">
                                        <?php echo $survey->description?>
                                    </p>
                                    <a href="<?php echo URLROOT;?>/survey_widget/answer_survey/<?php echo $survey->id?>">Start</a>
                                </div>
                            <?php elseif ($survey->s_type == 'google_form'):?>
                                <form class="google-form">
                                    <div class="questionCon surveyCard googleForm">
                                        <input type="hidden" name='googleFormId' value="<?php echo $survey->id?>">
                                        <div class="questionHeader">
                                            <h3><?php echo $survey->title?></h3>
                                        </div>
                                        <!-- Multiple Choice -->
                                        <p class="description">
                                            <?php echo $survey->description?>
                                        </p>
                                        <div class="check-con">
                                            <input type="checkbox" id="q3-a4" name="nq3-a4" disabled>
                                            <label for="q3-a4">Mark as done</label>
                                        </div>
                                        <a href="<?php echo $survey->google_form_link?>" target="_blank">Start</a>
                                        <button type='button' class="btn-form-ok">Ok</button>    
                                    </div>       
                                </form>

                            <?php endif;?>
                        <?php endif;?>
                    <?php endforeach;?>
                </div>
            </div>
            
        </section>
    </main>


    <script>
        
        $('.btn-form-ok').click(function(){
            const formParent = $(this.parentNode.parentNode)
            formParent.submit();
        })

        $('.google-form').submit(function(e){
            e.preventDefault();
            $.ajax({ 
                url:'<?php echo URLROOT;?>/survey_widget/googleFormDone',
                data: $(this).serialize(), 
                method: 'POST',
                success:function(res){
                    if(res == 1){
                        location.replace('<?php echo URLROOT;?>/survey_widget');
                    }
                }, 
                error: function(er){
                    console.log(er);
                }
            })
        })
    </script>

<?php require APPROOT . '/views/inc/footer_u.php'; ?>