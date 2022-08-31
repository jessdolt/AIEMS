
<div class="addModalContainer">

        <div class="addModal">
            <form action="" id="manage-question">
            
                <input type="hidden" name="qid" value="<?php echo isset($data['qid']) ? $data['qid'] : ''?>">
                <input type="hidden" name="sid" value="<?php echo isset($data['sid']) ? $data['sid'] : ''?>">
              
                <h3>New Question</h3>
                <div class="formContainer">
                    <div>
                        <label for="question_field" class="outsideLabel">Question:</label>
                        <div class="textFieldContainer">
                            <input type="text" name="question_field" id="question-id" value="<?php echo isset($data['question'])? $data['question']->question : ' '?>" required>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div>
                        <label for="question_type" class="outsideLabel">Question Type:</label>
                        <div class="textFieldContainer">
                            <select name="question_type" id="question-type">
                            <option value="radio" <?php echo isset($data['question']->type) && $data['question']->type == 'radio' ? 'selected' :'' ?>>Single Answer/Radio Button</option>
                            <option value="check" <?php echo isset($data['question']->type) && $data['question']->type == 'check' ? 'selected' :'' ?>>Multiple Answer/Check Box</option>
                            <option value="textfield_s" <?php echo isset($data['question']->type) && $data['question']->type == 'textfield_s' ? 'selected' :'' ?>>Open-Ended Question</option>
                            </select>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="preview">
                        
                        <label for="question-id" class="outsideLabel">Answer:</label>
                        <?php if(!isset($data['qid'])):?>
                        <h4 style="text-align:center">Select Question Answer type first</h4>
                        <?php else:?>
                            <div class="callout callout-info">
                                <?php if($data['question']->type != 'textfield_s'):
                                    $type= $data['question']->type == 'radio' ? 'radio' : 'checkbox';   
                                ?>
                                    <table>
                                        <tbody class="table-body">
                                            <?php 
                                                $i = 0;
                                                foreach(json_decode($data['question']->frm_option) as $key => $value):
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div data-count = '1'>
                                                            <input type="<?php echo $type?>" id="<?php echo $type?>Primary<?php echo $i?>" name="<?php echo $type?>"
                                                            <?php echo ($type== 'radio') ? "checked='' " : ''?>>
                                                            <label for="<?php echo $type?>Primary<?php echo $i?>">
                                                            </label>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="textFieldContainer">
                                                            <input type="text" name="label[]" class="form-control" value="<?php echo $value?>">
                                                        </div>
                                                    </td>

                                                    <td class="btn-opt-delete">
                                                        
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>


                                <div class="btn-add-opt">
                                    <button class="btn-add" type="button" onclick="new_<?php echo $type?>($(this))">
                                        Add Option
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 1V5M5 5V9M5 5H9M5 5H1" stroke="black" stroke-opacity="0.87" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    </button>
                                </div>
                                <?php else:?>
                                    <textarea name="frm_opt" id="" class="form-control"  rows="5" placeholder="Write Something here..." disabled></textarea>
                                <?php endif;?>
                            </div>   
                        <?php endif; ?>
                    </div>
                </div>

                <div class="btnContainer">
                    <button type="button" class="cancel" id="btn-survey-cancel">Cancel</button>
                    <button class="add" type='submit'>Add</button>
                </div>
            </form>
        </div>
    </div>

<div id="check_opt_clone" style="display: none;">
    <div class="callout callout-info">
        <table>
            <tbody class="table-body">
                <tr>
                    <td>
                        <div data-count = '1'>
                            <input type="checkbox" id="checkPrimary1" name="check" checked=''>
                            <label for="checkPrimary1">
                            </label>
                        </div>
                    </td>

                    <td>
                        <div class="textFieldContainer">
                            <input type="text" name="label[]" class="form-control">
                        </div>
                    </td>

                    <td class="btn-opt-delete">
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <div data-count = '2'>
                            <input type="checkbox" id="checkPrimary2" name="check" checked=''>
                            <label for="checkPrimary2">
                            </label>
                        </div>
                    </td>

                    <td>
                        <div class="textFieldContainer">
                            <input type="text" name="label[]" class="form-control">
                        </div>
                    </td>

                    <td class="btn-opt-delete">
                        
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="btn-add-opt">
            <button class="btn-add" type="button" onclick="new_check($(this))">
                Add Option
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 1V5M5 5V9M5 5H9M5 5H1" stroke="black" stroke-opacity="0.87" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
    </div>   
</div>

<div id="radio_opt_clone" style="display:none">
    <div class="callout callout-info">
        <table>
            <tbody class="table-body">
                <tr>
                    <td>
                        <div data-count = '1'>
                            <input type="radio" id="radioPrimary1" name="radio">
                            <label for="radioPrimary1">
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="textFieldContainer">
                            <input type="text" name="label[]" class="form-control">
                        </div>
                    </td>
                    <td class="btn-opt-delete">
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <div data-count = '2'>
                            <input type="radio" id="radioPrimary2" name="radio">
                            <label for="radioPrimary2">
                            </label>
                        </div>
                    </td>

                    <td>
                        <div class="textFieldContainer">
                            <input type="text" name="label[]" class="form-control">
                        </div>
                    </td>

                    <td class="btn-opt-delete">
                        
                    </td>
                </tr>

            </tbody>
        </table>


        <div class="btn-add-opt">
            <button class="btn-add" type="button" onclick="new_radio($(this))">
                Add Option
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 1V5M5 5V9M5 5H9M5 5H1" stroke="black" stroke-opacity="0.87" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
    </div>   
</div>

<div id="textfield_opt_clone" style="display: none;">
    <div class="callout callout-info">
        <textarea name="frm_opt" id="" class="form-control"  rows="5" placeholder="Write Something here..." disabled></textarea>
    </div>
</div>


<script>
    $(document).ready(function(){
        $('#manage-question').submit(function(e){
            e.preventDefault();
            //console.log('asd' + $('#manage-question').serialize());
            //console.log(new FormData($(this)[0]));
            $.ajax({ 
                url:'<?php echo URLROOT;?>/surveys/save_question',
                data: new FormData($(this)[0]), 
                cache: false,
		        contentType: false,
		        processData: false,
                method: 'POST',
                type: 'POST',
                success:function(res){
                    console.log(res);
                    setTimeout(function(){
                        location.reload();
                    },1000)
                }, 
                error: function(er){
                    console.log(er);
                }
            })
     })

        $('[name=question_type]').change(function(){
            //console.log('working');
            check($(this).val());
         
        })

        function check(type){
            if(type == 'radio'){
                radio_opt();
            }
            if(type =='check'){
                check_opt();
            }
            if(type == 'textfield_s'){
                textfield_opt();
            }
        }

        function radio_opt(){
            var radio_opt_clone = $('#radio_opt_clone').clone();
            $('.preview').html(radio_opt_clone.html());
        }

        function check_opt(){
            var check_opt_clone = $('#check_opt_clone').clone();
            $('.preview').html(check_opt_clone.html());
        }

        function textfield_opt(){
            var textfield_opt_clone = $('#textfield_opt_clone').clone();
            $('.preview').html(textfield_opt_clone.html());
        }    
    });

        function new_check(_this){
            const tbody = _this.closest('.btn-add-opt').siblings('table').find('tbody');
            let count = tbody.find('tr').last().find('div').attr('data-count');
            count++;
            let opt = ` <td>
                            <div data-count = '${count}'>
                                <input type="checkbox" id="checkPrimary${count}" name="check" checked=''>
                                <label for="checkPrimary${count}">
                                </label>
                            </div>
                        </td>

                        <td>
                            <div class="textFieldContainer">
                                <input type="text" name="label[]" class="form-control">
                            </div>
                        </td>

                        <td class="btn-opt-delete">
                            <button onclick="delete_row($(this))">
                                <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.7624 15L22.1374 9.63749C22.3728 9.40211 22.505 9.08287 22.505 8.74999C22.505 8.41711 22.3728 8.09787 22.1374 7.86249C21.902 7.62711 21.5828 7.49487 21.2499 7.49487C20.917 7.49487 20.5978 7.62711 20.3624 7.86249L14.9999 13.2375L9.63742 7.86249C9.40204 7.62711 9.0828 7.49487 8.74992 7.49487C8.41705 7.49487 8.0978 7.62711 7.86242 7.86249C7.62704 8.09787 7.49481 8.41711 7.49481 8.74999C7.49481 9.08287 7.62704 9.40211 7.86242 9.63749L13.2374 15L7.86242 20.3625C7.74526 20.4787 7.65227 20.6169 7.58881 20.7693C7.52535 20.9216 7.49268 21.085 7.49268 21.25C7.49268 21.415 7.52535 21.5784 7.58881 21.7307C7.65227 21.883 7.74526 22.0213 7.86242 22.1375C7.97863 22.2547 8.11688 22.3476 8.2692 22.4111C8.42153 22.4746 8.58491 22.5072 8.74992 22.5072C8.91494 22.5072 9.07832 22.4746 9.23064 22.4111C9.38297 22.3476 9.52122 22.2547 9.63742 22.1375L14.9999 16.7625L20.3624 22.1375C20.4786 22.2547 20.6169 22.3476 20.7692 22.4111C20.9215 22.4746 21.0849 22.5072 21.2499 22.5072C21.4149 22.5072 21.5783 22.4746 21.7306 22.4111C21.883 22.3476 22.0212 22.2547 22.1374 22.1375C22.2546 22.0213 22.3476 21.883 22.411 21.7307C22.4745 21.5784 22.5072 21.415 22.5072 21.25C22.5072 21.085 22.4745 20.9216 22.411 20.7693C22.3476 20.6169 22.2546 20.4787 22.1374 20.3625L16.7624 15Z" fill="black" fill-opacity="0.87"/>
                                </svg>
                            </button>
                        </td>`;
            const tr =  $('<tr> </tr>');
            tr.append(opt);
            tbody.append(tr);
        }
        
        function new_radio(_this){
            const tbody = _this.closest('.btn-add-opt').siblings('table').find('tbody');
            let count = tbody.find('tr').last().find('div').attr('data-count');
            count++;
            let opt = `<td>
                            <div data-count = '${count}'>
                                <input type="radio" id="radioPrimary${count}" name="radio" checked=''>
                                <label for="radioPrimary${count}">
                                </label>
                            </div>
                        </td>

                        <td>
                            <div class="textFieldContainer">
                                <input type="text" name="label[]" class="form-control">
                            </div>
                        </td>

                        <td class="btn-opt-delete">
                            <button onclick="delete_row($(this))">
                                <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.7624 15L22.1374 9.63749C22.3728 9.40211 22.505 9.08287 22.505 8.74999C22.505 8.41711 22.3728 8.09787 22.1374 7.86249C21.902 7.62711 21.5828 7.49487 21.2499 7.49487C20.917 7.49487 20.5978 7.62711 20.3624 7.86249L14.9999 13.2375L9.63742 7.86249C9.40204 7.62711 9.0828 7.49487 8.74992 7.49487C8.41705 7.49487 8.0978 7.62711 7.86242 7.86249C7.62704 8.09787 7.49481 8.41711 7.49481 8.74999C7.49481 9.08287 7.62704 9.40211 7.86242 9.63749L13.2374 15L7.86242 20.3625C7.74526 20.4787 7.65227 20.6169 7.58881 20.7693C7.52535 20.9216 7.49268 21.085 7.49268 21.25C7.49268 21.415 7.52535 21.5784 7.58881 21.7307C7.65227 21.883 7.74526 22.0213 7.86242 22.1375C7.97863 22.2547 8.11688 22.3476 8.2692 22.4111C8.42153 22.4746 8.58491 22.5072 8.74992 22.5072C8.91494 22.5072 9.07832 22.4746 9.23064 22.4111C9.38297 22.3476 9.52122 22.2547 9.63742 22.1375L14.9999 16.7625L20.3624 22.1375C20.4786 22.2547 20.6169 22.3476 20.7692 22.4111C20.9215 22.4746 21.0849 22.5072 21.2499 22.5072C21.4149 22.5072 21.5783 22.4746 21.7306 22.4111C21.883 22.3476 22.0212 22.2547 22.1374 22.1375C22.2546 22.0213 22.3476 21.883 22.411 21.7307C22.4745 21.5784 22.5072 21.415 22.5072 21.25C22.5072 21.085 22.4745 20.9216 22.411 20.7693C22.3476 20.6169 22.2546 20.4787 22.1374 20.3625L16.7624 15Z" fill="black" fill-opacity="0.87"/>
                                </svg>
                            </button>
                        </td>`;
            const tr =  $('<tr> </tr>');
            tr.append(opt);
            tbody.append(tr);
        }

        function delete_row(_this){
            const trow = _this[0].parentNode.parentNode;
            trow.remove();
        }

        
</script>