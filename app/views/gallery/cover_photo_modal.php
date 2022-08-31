<div class="changeModalContainer">
        <div class="changeCoverModal">
            <svg width="30" height="30" id="closeCoverModal" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.7619 14.9997L22.1369 9.63724C22.3723 9.40186 22.5046 9.08262 22.5046 8.74974C22.5046 8.41687 22.3723 8.09762 22.1369 7.86224C21.9016 7.62686 21.5823 7.49463 21.2494 7.49463C20.9166 7.49463 20.5973 7.62686 20.3619 7.86224L14.9994 13.2372L9.63694 7.86224C9.40156 7.62686 9.08231 7.49463 8.74944 7.49463C8.41656 7.49463 8.09732 7.62686 7.86194 7.86224C7.62656 8.09762 7.49432 8.41687 7.49432 8.74974C7.49432 9.08262 7.62656 9.40186 7.86194 9.63724L13.2369 14.9997L7.86194 20.3622C7.74477 20.4785 7.65178 20.6167 7.58832 20.769C7.52486 20.9214 7.49219 21.0847 7.49219 21.2497C7.49219 21.4148 7.52486 21.5781 7.58832 21.7305C7.65178 21.8828 7.74477 22.021 7.86194 22.1372C7.97814 22.2544 8.11639 22.3474 8.26871 22.4109C8.42104 22.4743 8.58442 22.507 8.74944 22.507C8.91445 22.507 9.07783 22.4743 9.23016 22.4109C9.38248 22.3474 9.52073 22.2544 9.63694 22.1372L14.9994 16.7622L20.3619 22.1372C20.4781 22.2544 20.6164 22.3474 20.7687 22.4109C20.921 22.4743 21.0844 22.507 21.2494 22.507C21.4145 22.507 21.5778 22.4743 21.7302 22.4109C21.8825 22.3474 22.0207 22.2544 22.1369 22.1372C22.2541 22.021 22.3471 21.8828 22.4106 21.7305C22.474 21.5781 22.5067 21.4148 22.5067 21.2497C22.5067 21.0847 22.474 20.9214 22.4106 20.769C22.3471 20.6167 22.2541 20.4785 22.1369 20.3622L16.7619 14.9997Z" fill="black" fill-opacity="0.87"/>
            </svg>
             <h3>Change Cover Photo</h3>
             <ul class="uploaded-list">
                 <?php foreach($data['images'] as $image):?>
                    <li class="uploaded-item  <?php echo ($image->isCover == 1) ? 'selected': '' ?>" data-img-id="<?php echo $image->id?>" data-gal-id="<?php echo $image->gallery_id?>">
                        <img src="<?php echo URLROOT;?>/uploads/<?php echo $image->image?>">
                    </li>
                 <?php endforeach;?>
             </ul>
        </div>
    </div>

    <script>
        $('.uploaded-item').click(function(){
         
            var img_id = $(this).attr('data-img-id');
            var gal_id = $(this).attr('data-gal-id');
            
            $.ajax({ 
                url:'<?php echo URLROOT;?>/galleries/changeCover',
                data: { 
                    image_id: img_id, 
                    gallery_id : gal_id},
                method: 'POST',
                type: 'POST',
                success:function(res){
                    //console.log(res);
                    if(res == 1){
                        location.reload();
                    }
                    // $('#new_modal').html(res);
                }, 
                error: function(er){
                    console.log(er);
                }
            })
        })
    </script>