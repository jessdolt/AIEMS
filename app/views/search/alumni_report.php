<?php if(!empty($data['alumni'])):?>    
<?php foreach($data['alumni'] as $alumni) : ?>
    <tr>
        <td><p class="studentID"><?php echo $alumni->student_no?></p></td>
        <td><p class="studentName"><?php echo $alumni->first_name  . ' ' .  (!empty($alumni->middle_name) ? substr($alumni->middle_name,0,1) . '.' : ''). ' ' . $alumni->last_name?></td>
        <td><p class="course"><?php echo $alumni->course?></p></td>
        <td><p class="batch"><?php echo $alumni->year?></p></td>
        <td><p class="emp-stat"><?php echo $alumni->status?></p></td>
        <td><time><?php echo date('F j' .','. ' Y ', strtotime($alumni->date_responded))?></time></td>
        <td><span data-employment_id='<?php echo $alumni->employment_id?>' class="viewAlumni"><svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="28" height="28" rx="14" fill="#EEEEEE"/>
                <path d="M17.4756 19.5C18.0279 19.5 18.4756 19.0523 18.4756 18.5C18.4756 17.9477 18.0279 17.5 17.4756 17.5C16.9233 17.5 16.4756 17.9477 16.4756 18.5C16.4756 19.0523 16.9233 19.5 17.4756 19.5Z" fill="black" fill-opacity="0.87"/>
                <path d="M21.3641 18.2395C21.0551 17.4524 20.522 16.7733 19.8308 16.2864C19.1396 15.7994 18.3207 15.526 17.4756 15.5C16.6305 15.526 15.8116 15.7994 15.1203 16.2864C14.4291 16.7733 13.896 17.4524 13.5871 18.2395L13.4756 18.5L13.5871 18.7605C13.896 19.5476 14.4291 20.2267 15.1203 20.7136C15.8116 21.2006 16.6305 21.474 17.4756 21.5C18.3207 21.474 19.1396 21.2006 19.8308 20.7136C20.522 20.2267 21.0551 19.5476 21.3641 18.7605L21.4756 18.5L21.3641 18.2395ZM17.4756 20.5C17.08 20.5 16.6933 20.3827 16.3644 20.1629C16.0355 19.9432 15.7792 19.6308 15.6278 19.2654C15.4765 18.8999 15.4368 18.4978 15.514 18.1098C15.5912 17.7219 15.7817 17.3655 16.0614 17.0858C16.3411 16.8061 16.6974 16.6156 17.0854 16.5384C17.4734 16.4613 17.8755 16.5009 18.241 16.6522C18.6064 16.8036 18.9188 17.06 19.1385 17.3889C19.3583 17.7178 19.4756 18.1044 19.4756 18.5C19.4749 19.0302 19.264 19.5386 18.8891 19.9135C18.5141 20.2884 18.0058 20.4993 17.4756 20.5Z" fill="black" fill-opacity="0.87"/>
                <path d="M11.7755 20.4286H9.57557V7.5716H13.9755V10.7858C13.9764 11.0697 14.0925 11.3418 14.2986 11.5425C14.5047 11.7433 14.784 11.8564 15.0755 11.8573H18.3754V14.0001H19.4754V10.7858C19.4773 10.7154 19.4636 10.6455 19.4351 10.5807C19.4066 10.516 19.3641 10.458 19.3104 10.4108L15.4605 6.66089C15.4121 6.60858 15.3526 6.56712 15.2861 6.53937C15.2196 6.51163 15.1478 6.49826 15.0755 6.50018H9.57557C9.2841 6.50103 9.00482 6.61418 8.79872 6.81493C8.59263 7.01568 8.47646 7.2877 8.47559 7.5716V20.4286C8.47646 20.7125 8.59263 20.9845 8.79872 21.1853C9.00482 21.386 9.2841 21.4992 9.57557 21.5H11.7755V20.4286ZM15.0755 7.78588L18.1554 10.7858H15.0755V7.78588Z" fill="black" fill-opacity="0.87"/>
                </svg>
            </span>
        </div></td>
    </tr>
    <?php endforeach;?>
    <?php else:?>     
    <?php endif;?>
<script>
    $(document).ready(function(){
           $('.viewAlumni').click(function(){
                var employment_id = $(this).attr('data-employment_id');
                // console.log(employment_id);
                $.ajax({
                    url:'<?php echo URLROOT;?>/alumni_report/report',
                    data: { id : employment_id},
                    method: 'POST',
                    type: 'POST',
                    success:function(res){
                        // console.log(res);
                        $('#manageModal').html(res);
                        $('#manageModal').addClass('show');
                        closeModal();
                    }, 
                    error: function(er){
                        console.log(er);
                    }
                });
            })  
            
            function closeModal() {
                $('.close-btn').click(function() {
                    $('#manageModal').removeClass('show');
                })
            }
    })
</script>
<script src="<?php echo URLROOT;?>/js/index.js" defer></script>