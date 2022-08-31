<?php require APPROOT . '/views/inc/header_admin.php';?>
        
        <button id="btn_email" >SEND EMAIL TO ALL</button>
<script>


$(document).ready(function(){
        $('#btn_email').click(function(){
                $.ajax({ 
                    url:'<?php echo URLROOT;?>/email/sendToAll',
                    method: 'POST',
                    type: 'POST',
                    success:function(res){
                        console.log(res);
                    }, 
                    error: function(er){
                        console.log(er);
                    }
                })
        })
})
</script>
<?php require APPROOT . '/views/inc/footer.php';?>