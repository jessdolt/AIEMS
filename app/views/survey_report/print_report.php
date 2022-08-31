<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo URLROOT;?>/css/style.css" rel="stylesheet">
    <script
     src="https://code.jquery.com/jquery-3.6.0.min.js"
     integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
     crossorigin="anonymous"></script>
</head>

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
                            <?php if($row->type != 'textfield_s'):?>
                               
                                <ul>
                                    <?php foreach(json_decode($row->frm_option) as $k => $v):

                                          if($data['taken'] == 0){
                                              $progress = round(0, 2);
                                          }
                                          else{
                                                $progress = ((isset($data['answers'][$row->id][$k]) ? count($data['answers'][$row->id][$k]) : 0) / $data['taken']) * 100;
                                          $progress = round($progress,2);
                                          }
                                        
                                          
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
        $(document).ready(function(){
            window.print();
        })
        
    </script>
