
<?php echo ($data['isAnswer'] == 1) ? redirect('pages') : require APPROOT . '/views/inc/header.php'; ?>
<main class="alumni">

        <section class="heroBox">
        </section>
        <section class="mainContent questionnaire">
            <div class="container">
                <form action="" class="form" id="manage-survey" method="POST">
                    <input type="hidden" name="survey_id" value="<?php echo $data['survey']->id?>">
                    <input type="hidden" name="user_id"   value="<?php echo $_SESSION['id']?>" >
                    <h2>PUP-Institute of Technology Survey</h2>
                    <?php 
                    $i = 0;
                    foreach($data['questions'] as $row):
                    $i++; ?>
                    <div class="questionCon">
                        <div class="questionHeader">
                            <input type="hidden" name="qid[<?php echo $row->id?>]" value="<?php echo $row->id?>">
                            <input type="hidden" name="type[<?php echo $row->id?>]" value="<?php echo $row->type?>">
                            <h3>
                                <span><?php echo $i;?>.</span>
                                <?php echo $row->question?>
                            </h3>
                            <span class="questionType"><?php echo ($row->type == 'check' || $row->type == 'radio') ? 'Multiple Choice': 'Paragraph'?></span>
                        </div>
                        <!-- Multiple Choice -->
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
                   
                   
                   
                   
                    <button type="submit">Submit Response</button>
                </form>
            </div>
        </section>
    </main>

    <script>

    $('#manage-survey').submit(function(e){
        e.preventDefault();
        // console.log($(this).attr('data-id'));
        // console.log(php echo $data['id']?>);
        console.log($(this).serialize());
        $.ajax({ 
                url:'<?php echo URLROOT;?>/survey_widget/answer',
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