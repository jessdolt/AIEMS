<?php require APPROOT . '/views/inc/header_admin.php'; ?>
<main class="admin">
        <section class="pageSpecificHeader">
            <div>
                <h2>
                    Contents 
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.47246 19.0139C9.23881 19.0143 9.01237 18.9329 8.83246 18.7839C8.7312 18.6999 8.6475 18.5968 8.58615 18.4805C8.5248 18.3641 8.487 18.2368 8.47493 18.1058C8.46285 17.9749 8.47673 17.8428 8.51578 17.7172C8.55482 17.5916 8.61826 17.4749 8.70246 17.3739L13.1825 12.0139L8.86246 6.64386C8.7794 6.54157 8.71737 6.42387 8.67993 6.29753C8.6425 6.17119 8.63041 6.0387 8.64435 5.90767C8.65829 5.77665 8.69798 5.64966 8.76116 5.53403C8.82433 5.41839 8.90974 5.31638 9.01246 5.23386C9.11593 5.14282 9.23709 5.07415 9.36836 5.03216C9.49962 4.99017 9.63814 4.97577 9.77524 4.98986C9.91233 5.00394 10.045 5.04621 10.165 5.11401C10.285 5.18181 10.3897 5.27368 10.4725 5.38386L15.3025 11.3839C15.4495 11.5628 15.53 11.7872 15.53 12.0189C15.53 12.2505 15.4495 12.4749 15.3025 12.6539L10.3025 18.6539C10.2021 18.7749 10.0747 18.8705 9.9305 18.9331C9.78629 18.9956 9.62937 19.0233 9.47246 19.0139Z" fill="white"/>
                    </svg>
                    Gallery
                </h2>
                <div class="btnContainer">
                    <a href="<?php echo URLROOT;?>/galleries/new_gallery">
                        new album
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 12H8M12 8V12V8ZM12 12V16V12ZM12 12H16H12Z" stroke="black" stroke-opacity="0.87" stroke-width="2" stroke-linecap="round"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="black" stroke-opacity="0.87" stroke-width="2"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="container">
            </div>
        </section>
        <section class="mainContent alumGallery">

            <?php foreach($data['gallery'] as $gal):?>
            <div class="album-con">
                <div class="album-cover">
                    <div class="option" tabindex="0">
                        <span class="optionSpan icon">
                            &#8943
                        </span>
                        <div class="optionModal">
                            <button class="changePic" type="button" data-id="<?php echo $gal->id?>">Change Cover</button>
                            <a href="<?php echo URLROOT;?>/galleries/editGallery/<?php echo $gal->id?>" class="view">
                                <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.8233 1.67676L18.3233 4.17676L16.4175 6.08342L13.9175 3.58342L15.8233 1.67676Z" fill="black" fill-opacity="0.87"/>
                                    <path d="M6.6665 13.3332H9.1665L15.239 7.26074L12.739 4.76074L6.6665 10.8332V13.3332Z" fill="black" fill-opacity="0.87"/>
                                    <path d="M15.8333 15.8333H6.79833C6.77667 15.8333 6.75417 15.8417 6.7325 15.8417C6.705 15.8417 6.6775 15.8342 6.64917 15.8333H4.16667V4.16667H9.8725L11.5392 2.5H4.16667C3.2475 2.5 2.5 3.24667 2.5 4.16667V15.8333C2.5 16.7533 3.2475 17.5 4.16667 17.5H15.8333C16.2754 17.5 16.6993 17.3244 17.0118 17.0118C17.3244 16.6993 17.5 16.2754 17.5 15.8333V8.61L15.8333 10.2767V15.8333Z" fill="black" fill-opacity="0.87"/>
                                </svg>
                            </a>
                            <button class="btnDeleteInline" data-url="<?php echo URLROOT;?>/galleries/deleteGallery/<?php echo $gal->id?>">
                                <svg viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.75 1.875H2.25C1.62868 1.875 1.125 2.43464 1.125 3.125V3.75C1.125 4.44036 1.62868 5 2.25 5H15.75C16.3713 5 16.875 4.44036 16.875 3.75V3.125C16.875 2.43464 16.3713 1.875 15.75 1.875Z"/>
                                    <path d="M2.61724 6.25C2.57772 6.24977 2.53859 6.25879 2.50242 6.27648C2.46624 6.29417 2.43383 6.32014 2.40729 6.35268C2.38076 6.38523 2.36069 6.42362 2.34841 6.46536C2.33612 6.5071 2.33189 6.55125 2.33599 6.59493L3.26095 16.4606C3.26076 16.4634 3.26076 16.4663 3.26095 16.4691C3.30928 16.9255 3.50672 17.3462 3.81579 17.6514C4.12486 17.9567 4.52404 18.1252 4.93755 18.125H13.0618C13.4752 18.125 13.8742 17.9564 14.1831 17.6512C14.4921 17.3459 14.6894 16.9253 14.7377 16.4691V16.4609L15.6613 6.59493C15.6654 6.55125 15.6611 6.5071 15.6488 6.46536C15.6366 6.42362 15.6165 6.38523 15.59 6.35268C15.5634 6.32014 15.531 6.29417 15.4948 6.27648C15.4587 6.25879 15.4195 6.24977 15.38 6.25H2.61724ZM11.3662 13.3082C11.4197 13.3659 11.4623 13.4349 11.4916 13.5111C11.5209 13.5873 11.5362 13.6692 11.5367 13.752C11.5373 13.8349 11.523 13.917 11.4947 13.9937C11.4664 14.0703 11.4246 14.1399 11.3719 14.1985C11.3192 14.2571 11.2565 14.3034 11.1875 14.3348C11.1185 14.3662 11.0446 14.3821 10.97 14.3814C10.8955 14.3808 10.8217 14.3637 10.7532 14.3312C10.6846 14.2986 10.6226 14.2512 10.5706 14.1918L8.99986 12.4465L7.42872 14.1918C7.32275 14.3062 7.18051 14.3697 7.03276 14.3685C6.885 14.3674 6.74359 14.3016 6.63908 14.1856C6.53458 14.0695 6.47537 13.9124 6.47426 13.7482C6.47315 13.5841 6.53022 13.426 6.63314 13.3082L8.20427 11.5625L6.63314 9.8168C6.53022 9.699 6.47315 9.54093 6.47426 9.37676C6.47537 9.21259 6.53458 9.05549 6.63908 8.93942C6.74359 8.82336 6.885 8.75764 7.03276 8.75648C7.18051 8.75532 7.32275 8.8188 7.42872 8.93321L8.99986 10.6785L10.5706 8.93321C10.6766 8.8188 10.8188 8.75532 10.9666 8.75648C11.1144 8.75764 11.2558 8.82336 11.3603 8.93942C11.4648 9.05549 11.524 9.21259 11.5251 9.37676C11.5262 9.54093 11.4691 9.699 11.3662 9.8168L9.79509 11.5625L11.3662 13.3082Z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <a href="<?php echo URLROOT;?>/galleries/editGallery/<?php echo $gal->id?>">
                        <?php foreach($data['images'] as $img):?>
                        <?php if($gal->id == $img->gallery_id):?>
                            <?php if($img->isCover == 1):?>
                            <img src="<?php echo URLROOT;?>/uploads/<?php echo $img->image?>">
                            <?php endif;?>
                        <?php endif;?>
                        <?php endforeach;?>
                    </a>
                </div>
                <div class="album-body">
                    <h3><?php echo $gal->gallery_title?></h3>
                        <?php 
                            $i = 0;
                            foreach($data['images'] as $img){
                                 if($gal->id == $img->gallery_id){
                                 $i++;
                                 }
                            }
                        ?>
                    <span class="item-count"><?php echo $i?> Photos</span>
                </div>
            </div>
            <?php endforeach;?>


           
        </section>
            </main>
        </div>
    </div>

    

        <div id="cover_photo_modal">

        </div>



    <?php flash('gallery_add_success')?>
    <?php flash('gallery_edit_success')?>
    <?php flash('gallery_delete_success')?>
    <?php flash('gallery_cover_change_success')?>
    <script>
        $(document).ready(function(){
            $('.changePic').click(function(){
            
            var gallery_id = $(this).attr('data-id');
                 $.ajax({ 
                    url:'<?php echo URLROOT;?>/galleries/showChangeModal',
                    data: { gid: gallery_id },
                    method: 'POST',
                    type: 'POST',
                    success:function(res){
                        $('#cover_photo_modal').html(res);
                        previewChangeCover();
                    }, 
                    error: function(er){
                        console.log(er);
                    }
                })
            })
        })
    
    </script>
   
<script>
    alertEvents();
    function alertEvents(){
        const alertModal = document.getElementById('alert-modal-global');
        const insideAlertModal = document.getElementById('alert-modal-inside');
        const okAlertModal = document.getElementById('alert-ok-btn');

        okAlertModal.addEventListener('click',function(){
            alertModal.classList.remove('show');
            insideAlertModal.classList.remove('show');
            
        })
    }
</script>
    





<?php require APPROOT . '/views/inc/footer.php'; ?>