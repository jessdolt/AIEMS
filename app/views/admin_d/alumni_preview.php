<div class="modalContainer show">
        <div class="modalPreview">
            <table class="data-table">
                <thead class="bigger">
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Course</th>
                        <th>Batch</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(count($data['alumniList'])):?>
                    <?php foreach($data['alumniList'] as $alumni): ?>
                        <tr>
                            <td><p class="studentID"><?php echo $alumni[0]?></p></td>
                            <td><p class="studentName"><?php echo $alumni[2] . ' '. (!empty($alumni[3]) ? substr($alumni[3],0,1) . '.' : '') . ' ' . $alumni[1] ?></p></td>
                            <td><p class="studentEmail"><?php echo $alumni[6]?></p></td>
                            <td><p class="gender"><?php echo $alumni[4]?></p></td>
                            <td><p class="course"><?php echo $alumni[8]?></p></td>
                            <td><p class="batch"><?php echo $alumni[9]?></p></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif;?>
                </tbody>
            </table>
            
            <div class="pagination">
                <h3>Import Review</h3>
                <div class="fileNameCon">
                    <span>From:</span>
                    <span class="filename">
                        <?php if(!empty($data['fileName'])): echo $data['fileName'] ?>
                        <?php endif;?>
                    </span>
                </div>
                <div class="btnContainer">
                    <button class="cancel cancelModal" >
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.4086 8.99915L14.7045 4.71268C14.8926 4.52453 14.9983 4.26935 14.9983 4.00326C14.9983 3.73718 14.8926 3.482 14.7045 3.29385C14.5164 3.1057 14.2612 3 13.9952 3C13.7291 3 13.474 3.1057 13.2859 3.29385L9 7.59031L4.71414 3.29385C4.52602 3.1057 4.27087 3 4.00483 3C3.73878 3 3.48363 3.1057 3.29551 3.29385C3.10739 3.482 3.0017 3.73718 3.0017 4.00326C3.0017 4.26935 3.10739 4.52453 3.29551 4.71268L7.59136 8.99915L3.29551 13.2856C3.20187 13.3785 3.12755 13.489 3.07683 13.6108C3.02611 13.7325 3 13.8631 3 13.995C3 14.1269 3.02611 14.2575 3.07683 14.3793C3.12755 14.501 3.20187 14.6116 3.29551 14.7044C3.38839 14.7981 3.49888 14.8724 3.62062 14.9232C3.74236 14.9739 3.87294 15 4.00483 15C4.13671 15 4.26729 14.9739 4.38903 14.9232C4.51077 14.8724 4.62127 14.7981 4.71414 14.7044L9 10.408L13.2859 14.7044C13.3787 14.7981 13.4892 14.8724 13.611 14.9232C13.7327 14.9739 13.8633 15 13.9952 15C14.1271 15 14.2576 14.9739 14.3794 14.9232C14.5011 14.8724 14.6116 14.7981 14.7045 14.7044C14.7981 14.6116 14.8724 14.501 14.9232 14.3793C14.9739 14.2575 15 14.1269 15 13.995C15 13.8631 14.9739 13.7325 14.9232 13.6108C14.8724 13.489 14.7981 13.3785 14.7045 13.2856L10.4086 8.99915Z"/>
                        </svg>
                        Cancel
                    </button>
                    <button class="upload" form="hidden-form-id">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.5 11.25V13.5H4.5V11.25H3V13.5C3 14.325 3.675 15 4.5 15H13.5C14.325 15 15 14.325 15 13.5V11.25H13.5ZM5.25 6.75L6.3075 7.8075L8.25 5.8725V12H9.75V5.8725L11.6925 7.8075L12.75 6.75L9 3L5.25 6.75Z"/>
                        </svg>
                        Upload
                    </button>
                </div>
            </div>
        </div>

        <form action="<?php echo URLROOT;?>/alumni/addBulk" class="hidden-form" id="hidden-form-id" method="POST">
                <?php if(!empty($data['alumniList'])):?>
                <?php foreach($data['alumniList'] as $key => $value){?>
                        <input type="hidden" name="alumni[<?php echo $key?>][student_no]" value="<?php echo $value[0]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][last_name]" value="<?php echo $value[1]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][first_name]" value="<?php echo $value[2]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][middle_name]" value="<?php echo $value[3]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][gender]" value="<?php echo $value[4]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][birth_date]" value="<?php echo $value[5]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][email]" value="<?php echo $value[6]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][contact_no]" value="<?php echo $value[7]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][course]" value="<?php echo $value[8]?>">
                        <input type="hidden" name="alumni[<?php echo $key?>][batch]" value="<?php echo $value[9]?>">
                <?php }?>
                <?php endif; ?>
        </form>
</div>

