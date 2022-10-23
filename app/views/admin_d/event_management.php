<?php require APPROOT . '/views/inc/header_admin.php';?>
<main class="admin jobPortal">
                <section class="pageSpecificHeader">
                    <div>
                        <h2>Content
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.47246 19.0139C9.23881 19.0143 9.01237 18.9329 8.83246 18.7839C8.7312 18.6999 8.6475 18.5968 8.58615 18.4805C8.5248 18.3641 8.487 18.2368 8.47493 18.1058C8.46285 17.9749 8.47673 17.8428 8.51578 17.7172C8.55482 17.5916 8.61826 17.4749 8.70246 17.3739L13.1825 12.0139L8.86246 6.64386C8.7794 6.54157 8.71737 6.42387 8.67993 6.29753C8.6425 6.17119 8.63041 6.0387 8.64435 5.90767C8.65829 5.77665 8.69798 5.64966 8.76116 5.53403C8.82433 5.41839 8.90974 5.31638 9.01246 5.23386C9.11593 5.14282 9.23709 5.07415 9.36836 5.03216C9.49962 4.99017 9.63814 4.97577 9.77524 4.98986C9.91233 5.00394 10.045 5.04621 10.165 5.11401C10.285 5.18181 10.3897 5.27368 10.4725 5.38386L15.3025 11.3839C15.4495 11.5628 15.53 11.7872 15.53 12.0189C15.53 12.2505 15.4495 12.4749 15.3025 12.6539L10.3025 18.6539C10.2021 18.7749 10.0747 18.8705 9.9305 18.9331C9.78629 18.9956 9.62937 19.0233 9.47246 19.0139Z" fill="white"/>
                        </svg>
                        Event Management</h2>
                    </div>
                    <div class="container">
                        <!-- search -->
                    </div>
                </section>
                <section class="mainContent">
                <form class="table-form" id="page-form" action="<?php echo URLROOT;?>/event_management/delete" method="POST">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Posted by</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="search_insert">
                            <?php 
                            if (!empty($data)) {
                            foreach($data as $eventManagement) : ?>
                            <tr>
                            <td><input type="checkbox" name="checkbox[]" value="<?php echo $eventManagement->id; ?>"></td>
                            <td><img src="<?php echo URLROOT;?>/uploads/<?php echo $eventManagement->image?>"></td>
                            <td><p class="title"><?php echo $eventManagement->title; ?></p></td>
                            <td><p class="description"><?php echo $eventManagement->description; ?></p></td>
                            <td><time datetime="0000-09-02">
                                <?php echo date("M. d, Y h:i A", strtotime($eventManagement->start)).' to '.date("M. d, Y h:i A", strtotime($eventManagement->end))
                                ?>
                                </time></td>
                            <td><p class="jobTitle"><?php echo $eventManagement->name; ?></p></td>
                            <td><p class="workType <?php echo ($eventManagement->isApproved == '1') ? 'fullTime' : 'partTime' ?>">
                            <?php echo ($eventManagement->isApproved == '0' ? "For Approval" :
                                        ($eventManagement->isApproved == '1' ? "Approved" :
                                        ($eventManagement->isApproved == '2' ? "Rejected" : "")));?>
                        
                            </p></td>
                            <td><div class="option" tabindex="0">
                                    <span class="optionSpan icon">&#8942</span>
                                    <div class="optionModal">
                                        <a href="<?php echo URLROOT; ?>/event_management/viewEvent/<?php echo $eventManagement->id?>">View</a>

                                        <button type="button" data-id="<?php echo $eventManagement->id ?>" data-url="<?php echo URLROOT; ?>/event_management/deleteRow" class="btnDeleteInline">
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
                    </div>
                </form>
                </section>
            </main>
        </div>
    </div>

<?php flash('event_delete_success')?>
<?php flash('job_portal_add_success')?>
<?php flash('job_portal_edit_success')?>

<script>
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