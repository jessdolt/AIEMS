
<?php echo ($data['isAnswer'] == 1) ? redirect('pages') : require APPROOT . '/views/inc/header.php'; ?>
<main class="alumni">

        <section class="heroBox">
        </section>
        <section class="mainContent questionnaire">
            <div class="container">
                <form action="" class="form" id="manage-survey" method="POST">
                    <input type="hidden" name="survey_id" value="<?php echo $data['survey']->id?>">
                    <input type="hidden" name="user_id"   value="<?php echo $_SESSION['id']?>" >
                    <input type="hidden" name="alumni_id"   value="<?php echo $_SESSION['alumni_id']?>" >
                 
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
                   
                   
                   
                   
                    <button type="submit" >Submit Response</button>

                </form>
            </div>
        </section>
    </main>

    <script src="<?= URLROOT?>/js/Survey/Answer.js"></script>

<?php require APPROOT . '/views/inc/footer_u.php'; ?>