<?php require APPROOT . '/views/inc/header_admin.php';?>
<main class="admin jobPortal">
                <section class="pageSpecificHeader">
                    <div>
                        <h2>Content
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.47246 19.0139C9.23881 19.0143 9.01237 18.9329 8.83246 18.7839C8.7312 18.6999 8.6475 18.5968 8.58615 18.4805C8.5248 18.3641 8.487 18.2368 8.47493 18.1058C8.46285 17.9749 8.47673 17.8428 8.51578 17.7172C8.55482 17.5916 8.61826 17.4749 8.70246 17.3739L13.1825 12.0139L8.86246 6.64386C8.7794 6.54157 8.71737 6.42387 8.67993 6.29753C8.6425 6.17119 8.63041 6.0387 8.64435 5.90767C8.65829 5.77665 8.69798 5.64966 8.76116 5.53403C8.82433 5.41839 8.90974 5.31638 9.01246 5.23386C9.11593 5.14282 9.23709 5.07415 9.36836 5.03216C9.49962 4.99017 9.63814 4.97577 9.77524 4.98986C9.91233 5.00394 10.045 5.04621 10.165 5.11401C10.285 5.18181 10.3897 5.27368 10.4725 5.38386L15.3025 11.3839C15.4495 11.5628 15.53 11.7872 15.53 12.0189C15.53 12.2505 15.4495 12.4749 15.3025 12.6539L10.3025 18.6539C10.2021 18.7749 10.0747 18.8705 9.9305 18.9331C9.78629 18.9956 9.62937 19.0233 9.47246 19.0139Z" fill="white"/>
                        </svg>
                        Promos / Advertisement</h2>
                    </div>
                    <div class="container">
                        <div class="textFieldContainer">
                            <input type="search" name="searchNews" id="search-jobs" placeholder="Search">
                            <label class="icon" for="search-news">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.5001 13.9999H14.7101L14.4301 13.7299C15.6301 12.3299 16.2501 10.4199 15.9101 8.38989C15.4401 5.60989 13.1201 3.38989 10.3201 3.04989C6.09014 2.52989 2.53014 6.08989 3.05014 10.3199C3.39014 13.1199 5.61014 15.4399 8.39014 15.9099C10.4201 16.2499 12.3301 15.6299 13.7301 14.4299L14.0001 14.7099V15.4999L18.2501 19.7499C18.6601 20.1599 19.3301 20.1599 19.7401 19.7499C20.1501 19.3399 20.1501 18.6699 19.7401 18.2599L15.5001 13.9999ZM9.50014 13.9999C7.01014 13.9999 5.00014 11.9899 5.00014 9.49989C5.00014 7.00989 7.01014 4.99989 9.50014 4.99989C11.9901 4.99989 14.0001 7.00989 14.0001 9.49989C14.0001 11.9899 11.9901 13.9999 9.50014 13.9999Z" fill="black" fill-opacity="0.6"/>
                                </svg>
                            </label>
                        </div>
                    </div>
                </section>
                <section class="mainContent">
                <form class="table-form" id="page-form" action="<?php echo URLROOT;?>/promos_advertisement/delete" method="POST">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Used Quantity</th>
                                <th>Date of Advertisement</th>
                                <th>Posted by</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="search_insert">
                            <?php 
                            if (!empty($data)) {
                            foreach($data as $promoAd) : ?>
                            <tr>
                            <td><input type="checkbox" name="checkbox[]" value="<?php echo $promoAd->promoid; ?>"></td>
                            <td><p class="jobTitle"><?php echo $promoAd->title; ?></p></td>
                            <td><p class="description"><?php echo $promoAd->description; ?></p></td>
                            <td><p class="company"><?php echo $promoAd->quantity; ?></p></td>
                            <td><p class="company"><?php echo $promoAd->used_quantity; ?></p></td>
                            <td><time datetime="0000-09-02"><?php echo $promoAd->date; ?></time></td>
                            <td><p class="jobTitle"><?php echo $promoAd->name; ?></p></td>
                            <td><p class="workType <?php echo ($promoAd->is_approved == '1') ? 'fullTime' : 'partTime' ?>">
                            <?php echo ($promoAd->is_approved == '0' ? "For Approval" :
                                        ($promoAd->is_approved == '1' ? "Approved" :
                                        ($promoAd->is_approved == '2' ? "Rejected" : "")));?>
                        
                            </p></td>
                            <td><div class="option" tabindex="0">
                                    <span class="optionSpan icon">&#8942</span>
                                    <div class="optionModal">
                                        <a href="<?php echo URLROOT; ?>/promos_advertisement/viewPromo/<?php echo $promoAd->promoid?>">View</a>
                                        <?php if($promoAd->is_approved == '0') {?>
                                        <button type="button" data-id="<?php echo $promoAd->promoid ?>" data-url="<?php echo URLROOT; ?>/promos_advertisement/approveRow" class="btnApproval">
                                            <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill="#c8e6c9" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path>
                                                <path fill="#4caf50" d="M34.586,14.586l-13.57,13.586l-5.602-5.586l-2.828,2.828l8.434,8.414l16.395-16.414L34.586,14.586z"></path>
                                            </svg>
                                        </button>
                                        <?php }?>
                                        <button type="button" data-id="<?php echo $promoAd->promoid ?>" data-url="<?php echo URLROOT; ?>/promos_advertisement/deleteRow" class="btnDeleteInline">
                                            <svg viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.75 1.875H2.25C1.62868 1.875 1.125 2.43464 1.125 3.125V3.75C1.125 4.44036 1.62868 5 2.25 5H15.75C16.3713 5 16.875 4.44036 16.875 3.75V3.125C16.875 2.43464 16.3713 1.875 15.75 1.875Z"/>
                                                <path d="M2.61724 6.25C2.57772 6.24977 2.53859 6.25879 2.50242 6.27648C2.46624 6.29417 2.43383 6.32014 2.40729 6.35268C2.38076 6.38523 2.36069 6.42362 2.34841 6.46536C2.33612 6.5071 2.33189 6.55125 2.33599 6.59493L3.26095 16.4606C3.26076 16.4634 3.26076 16.4663 3.26095 16.4691C3.30928 16.9255 3.50672 17.3462 3.81579 17.6514C4.12486 17.9567 4.52404 18.1252 4.93755 18.125H13.0618C13.4752 18.125 13.8742 17.9564 14.1831 17.6512C14.4921 17.3459 14.6894 16.9253 14.7377 16.4691V16.4609L15.6613 6.59493C15.6654 6.55125 15.6611 6.5071 15.6488 6.46536C15.6366 6.42362 15.6165 6.38523 15.59 6.35268C15.5634 6.32014 15.531 6.29417 15.4948 6.27648C15.4587 6.25879 15.4195 6.24977 15.38 6.25H2.61724ZM11.3662 13.3082C11.4197 13.3659 11.4623 13.4349 11.4916 13.5111C11.5209 13.5873 11.5362 13.6692 11.5367 13.752C11.5373 13.8349 11.523 13.917 11.4947 13.9937C11.4664 14.0703 11.4246 14.1399 11.3719 14.1985C11.3192 14.2571 11.2565 14.3034 11.1875 14.3348C11.1185 14.3662 11.0446 14.3821 10.97 14.3814C10.8955 14.3808 10.8217 14.3637 10.7532 14.3312C10.6846 14.2986 10.6226 14.2512 10.5706 14.1918L8.99986 12.4465L7.42872 14.1918C7.32275 14.3062 7.18051 14.3697 7.03276 14.3685C6.885 14.3674 6.74359 14.3016 6.63908 14.1856C6.53458 14.0695 6.47537 13.9124 6.47426 13.7482C6.47315 13.5841 6.53022 13.426 6.63314 13.3082L8.20427 11.5625L6.63314 9.8168C6.53022 9.699 6.47315 9.54093 6.47426 9.37676C6.47537 9.21259 6.53458 9.05549 6.63908 8.93942C6.74359 8.82336 6.885 8.75764 7.03276 8.75648C7.18051 8.75532 7.32275 8.8188 7.42872 8.93321L8.99986 10.6785L10.5706 8.93321C10.6766 8.8188 10.8188 8.75532 10.9666 8.75648C11.1144 8.75764 11.2558 8.82336 11.3603 8.93942C11.4648 9.05549 11.524 9.21259 11.5251 9.37676C11.5262 9.54093 11.4691 9.699 11.3662 9.8168L9.79509 11.5625L11.3662 13.3082Z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            </tr>
                            <?php endforeach; } ?>
                        </tbody>
                    </table>
                    
                    <div class="pagination">
                        <button type="button" class="selectAll">Select All</button>
                        <button type="button" class="deleteSelected"><svg viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.75 1.875H2.25C1.62868 1.875 1.125 2.43464 1.125 3.125V3.75C1.125 4.44036 1.62868 5 2.25 5H15.75C16.3713 5 16.875 4.44036 16.875 3.75V3.125C16.875 2.43464 16.3713 1.875 15.75 1.875Z"/>
                            <path d="M2.61724 6.25C2.57772 6.24977 2.53859 6.25879 2.50242 6.27648C2.46624 6.29417 2.43383 6.32014 2.40729 6.35268C2.38076 6.38523 2.36069 6.42362 2.34841 6.46536C2.33612 6.5071 2.33189 6.55125 2.33599 6.59493L3.26095 16.4606C3.26076 16.4634 3.26076 16.4663 3.26095 16.4691C3.30928 16.9255 3.50672 17.3462 3.81579 17.6514C4.12486 17.9567 4.52404 18.1252 4.93755 18.125H13.0618C13.4752 18.125 13.8742 17.9564 14.1831 17.6512C14.4921 17.3459 14.6894 16.9253 14.7377 16.4691V16.4609L15.6613 6.59493C15.6654 6.55125 15.6611 6.5071 15.6488 6.46536C15.6366 6.42362 15.6165 6.38523 15.59 6.35268C15.5634 6.32014 15.531 6.29417 15.4948 6.27648C15.4587 6.25879 15.4195 6.24977 15.38 6.25H2.61724ZM11.3662 13.3082C11.4197 13.3659 11.4623 13.4349 11.4916 13.5111C11.5209 13.5873 11.5362 13.6692 11.5367 13.752C11.5373 13.8349 11.523 13.917 11.4947 13.9937C11.4664 14.0703 11.4246 14.1399 11.3719 14.1985C11.3192 14.2571 11.2565 14.3034 11.1875 14.3348C11.1185 14.3662 11.0446 14.3821 10.97 14.3814C10.8955 14.3808 10.8217 14.3637 10.7532 14.3312C10.6846 14.2986 10.6226 14.2512 10.5706 14.1918L8.99986 12.4465L7.42872 14.1918C7.32275 14.3062 7.18051 14.3697 7.03276 14.3685C6.885 14.3674 6.74359 14.3016 6.63908 14.1856C6.53458 14.0695 6.47537 13.9124 6.47426 13.7482C6.47315 13.5841 6.53022 13.426 6.63314 13.3082L8.20427 11.5625L6.63314 9.8168C6.53022 9.699 6.47315 9.54093 6.47426 9.37676C6.47537 9.21259 6.53458 9.05549 6.63908 8.93942C6.74359 8.82336 6.885 8.75764 7.03276 8.75648C7.18051 8.75532 7.32275 8.8188 7.42872 8.93321L8.99986 10.6785L10.5706 8.93321C10.6766 8.8188 10.8188 8.75532 10.9666 8.75648C11.1144 8.75764 11.2558 8.82336 11.3603 8.93942C11.4648 9.05549 11.524 9.21259 11.5251 9.37676C11.5262 9.54093 11.4691 9.699 11.3662 9.8168L9.79509 11.5625L11.3662 13.3082Z"/>
                            </svg>
                            </button>
                        <span class="currentRows"></span>
                        <a href="" class="start">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 3C5.75507 3.00003 5.51866 3.08996 5.33563 3.25272C5.15259 3.41547 5.03566 3.63975 5.007 3.883L5 4V20C5.00028 20.2549 5.09788 20.5 5.27285 20.6854C5.44782 20.8707 5.68695 20.9822 5.94139 20.9972C6.19584 21.0121 6.44638 20.9293 6.64183 20.7657C6.83729 20.6021 6.9629 20.3701 6.993 20.117L7 20V4C7 3.73478 6.89464 3.48043 6.70711 3.29289C6.51957 3.10536 6.26522 3 6 3ZM18.707 3.293C18.5348 3.12082 18.3057 3.01739 18.0627 3.00211C17.8197 2.98683 17.5794 3.06075 17.387 3.21L17.293 3.293L9.293 11.293C9.12082 11.4652 9.01739 11.6943 9.00211 11.9373C8.98683 12.1803 9.06075 12.4206 9.21 12.613L9.293 12.707L17.293 20.707C17.473 20.8863 17.7144 20.9905 17.9684 20.9982C18.2223 21.006 18.4697 20.9168 18.6603 20.7488C18.8508 20.5807 18.9703 20.3464 18.9944 20.0935C19.0185 19.8406 18.9454 19.588 18.79 19.387L18.707 19.293L11.414 12L18.707 4.707C18.8945 4.51947 18.9998 4.26516 18.9998 4C18.9998 3.73484 18.8945 3.48053 18.707 3.293Z" fill="black" fill-opacity="0.87"/>
                            </svg>
                        </a>
                        <a href="" class="previous">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.0625 3.00197C16.3056 3.01725 16.5347 3.12068 16.7069 3.29286C16.8943 3.48039 16.9996 3.7347 16.9996 3.99986C16.9996 4.26503 16.8943 4.51933 16.7069 4.70686L9.41386 11.9999L16.7069 19.2929L16.7899 19.3869C16.9453 19.5879 17.0184 19.8405 16.9943 20.0934C16.9702 20.3463 16.8507 20.5806 16.6601 20.7486C16.4696 20.9166 16.2222 21.0058 15.9682 20.9981C15.7143 20.9903 15.4728 20.8862 15.2929 20.7069L7.29286 12.7069L7.20986 12.6129C7.06061 12.4205 6.98669 12.1802 7.00197 11.9372C7.01725 11.6942 7.12068 11.4651 7.29286 11.2929L15.2929 3.29286L15.3869 3.20986C15.5793 3.06061 15.8195 2.98669 16.0625 3.00197Z" fill="black" fill-opacity="0.87"/>
                            </svg> 
                        </a>
                        <a href="" class="next">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.29279 3.29311C7.46498 3.12093 7.69408 3.0175 7.93711 3.00222C8.18013 2.98694 8.42038 3.06085 8.61279 3.21011L8.70679 3.29311L16.7068 11.2931C16.879 11.4653 16.9824 11.6944 16.9977 11.9374C17.013 12.1805 16.939 12.4207 16.7898 12.6131L16.7068 12.7071L8.70679 20.7071C8.52683 20.8865 8.28535 20.9906 8.0314 20.9983C7.77745 21.0061 7.53007 20.9169 7.33951 20.7489C7.14894 20.5808 7.02948 20.3466 7.00539 20.0936C6.98129 19.8407 7.05437 19.5881 7.20979 19.3871L7.29279 19.2931L14.5858 12.0001L7.29279 4.70711C7.10532 4.51958 7 4.26527 7 4.00011C7 3.73494 7.10532 3.48063 7.29279 3.29311Z" fill="black" fill-opacity="0.87"/>
                            </svg>
                        </a>
                        <a href="" class="end">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 3C18.245 3.00003 18.4814 3.08996 18.6644 3.25272C18.8474 3.41547 18.9644 3.63975 18.993 3.883L19 4V20C18.9997 20.2549 18.9022 20.5 18.7272 20.6854C18.5522 20.8707 18.3131 20.9822 18.0586 20.9972C17.8042 21.0121 17.5537 20.9293 17.3582 20.7657C17.1627 20.6021 17.0371 20.3701 17.007 20.117L17 20V4C17 3.73478 17.1054 3.48043 17.2929 3.29289C17.4805 3.10536 17.7348 3 18 3ZM5.29303 3.293C5.46522 3.12082 5.69432 3.01739 5.93735 3.00211C6.18038 2.98683 6.42063 3.06075 6.61303 3.21L6.70703 3.293L14.707 11.293C14.8792 11.4652 14.9826 11.6943 14.9979 11.9373C15.0132 12.1803 14.9393 12.4206 14.79 12.613L14.707 12.707L6.70703 20.707C6.52707 20.8863 6.2856 20.9905 6.03165 20.9982C5.7777 21.006 5.53032 20.9168 5.33975 20.7488C5.14919 20.5807 5.02973 20.3464 5.00563 20.0935C4.98154 19.8406 5.05462 19.588 5.21003 19.387L5.29303 19.293L12.586 12L5.29303 4.707C5.10556 4.51947 5.00024 4.26516 5.00024 4C5.00024 3.73484 5.10556 3.48053 5.29303 3.293Z" fill="black" fill-opacity="0.87"/>
                            </svg>
                        </a>
                    </div>
                </form>
                </section>
            </main>
        </div>
    </div>

<?php flash('promo_delete_success')?>

<?php flash('job_portal_add_success')?>
<?php flash('job_portal_edit_success')?>

<script>
    $(document).on('input', '#search-jobs', function(){
            const searchChar = $(this).val();
            $.ajax({ 
                    url:'<?php echo URLROOT;?>/admin/job_portal',
                    data: { searchKey : searchChar, isSearch : 1},
                    method: 'POST',
                    type: 'POST',
                    success:function(res){
                        // var newObj = jQuery.parseJSON(res);
                        // console.log(newObj[0].title);
                        //console.log(res);
                        $('#search_insert').html(res);
                        // console.log(res);   
                    }, 
                    error: function(er){
                        console.log(er);
                    }
            });
    })


    window.onload = () =>{
        btnApprovalHandler();
    }

    const btnApprovalHandler = () =>{
        const btnApprovals = document.querySelectorAll('.btnApproval');
        btnApprovals.forEach(btn =>{
            btn.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                swal({
                    title: "Approval",
                    text: "Do you wish to approve this promo?",
                    icon: "info",
                    buttons: ["Cancel", "Approve"],
                    dangerMode: true,
                }).then((isConfirm) => {
                    isConfirm && updateData(id);
                });
            })
        })
    }


        const updateData = (id) => {
        // console.log("zxc");
        $.ajax({
            type: "POST",
            url: `/aiems/promos_advertisement/approveRow/${id}`,
            method: "POST",
            success: function (data) {
            const response = JSON.parse(data);
            if (response.isSuccess) {
                swal("Updated Successfully", `${response.message}`, "success").then(
                () => {
                    window.location.replace(`/aiems/admin/promos_advertisement`);
                }
                );
            } else {
                swal("Error", `${response.message}`, "error");
            }
            },
            error: function (xhr, status, error) {
            console.error(error);
            },
        });
        };
</script>
<script src="<?= URLROOT?>/js/PromosAdvertisement/promosAdvertisement.js"></script>
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
<?php require APPROOT . '/views/inc/footer.php';?>