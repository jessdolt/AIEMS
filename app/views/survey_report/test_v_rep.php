
<?php require APPROOT . '/views/inc/header.php'; ?>


<main class="alumni">
<a href="<?php echo URLROOT;?>/admin/survey_report">Run it back</a>
        <section class="heroBox">
        </section>
        <section class="mainContent questionnaire">
            <div class="container">
            
                <form action="" class="form" id="manage-survey" method="POST">
                    <input type="hidden" name="survey_id" value="<?php echo $data['survey']->id?>">
                    <input type="hidden" name="user_id"   value="<?php echo $_SESSION['id']?>" >
                    <h2>PUP-Institute of Technology Survey</h2>
                    <button id="print">Print</button>
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
                            <?php if($row->type != 'textfield_s'):?>
                               
                                <ul>
                                    <?php foreach(json_decode($row->frm_option) as $k => $v):
                                          $progress = ((isset($data['answers'][$row->id][$k]) ? count($data['answers'][$row->id][$k]) : 0) / $data['taken']) * 100;
                                          $progress = round($progress,2);
                                          
                                    ?>
                                        <li>
                                            <div>
                                                <b><?php echo $v?></b>
                                            </div>
                                            <div>
                                                <span><?php echo isset($data['answers'][$row->id][$k]) ? count($data['answers'][$row->id][$k]) : 0 ?>/<?php echo $data['taken']?></span>
                                                <div>
                                                    <div>
                                                    </div>
                                                </div>
                                                <span style="border: 1px solid black; padding: 1px; border-radius: 5px"><?php echo $progress?>%</span>
                                            </div>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            <?php else:?>
                                <div>
                                    <?php if(isset($data['answers'][$row->id])):?>
                                        <?php foreach($data['answers'][$row->id] as $val):?>
                                            <blockquote><?php echo $val?></blockquote>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <?php endforeach;?>
                   
                
                </form>
            </div>
        </section>
    </main>

    <script>
        $('#print').click(function(){
            var new_window = window.open("<?php echo URLROOT;?>/survey_report/print_report/<?php echo $data['survey']->id?>", "", "width = 850, height =700")
           
        })        

    </script>
