<?php require APPROOT . '/views/inc/header_admin.php';?>
<main class="admin jobPortal">
                <section class="pageSpecificHeader">
                    <div>
                        <h2>Advertiser(s)</h2>
                    </div>
                    <div class="container">
                    </div>
                </section>
                <section class="mainContent">
                <form class="table-form" id="page-form" action="<?php echo URLROOT;?>/advertiser/delete" method="POST">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact No.</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="search_insert">
                            <?php 
                            if (!empty($data)) {
                            foreach($data as $advertiser) : ?>
                            <tr>
                            <td><input type="checkbox" name="checkbox[]" value="<?php echo $advertiser->user_id; ?>"></td>
                            <td><img src="<?php echo URLROOT;?>/uploads/<?php echo $advertiser->image?>"></td>
                            <td><p class="jobTitle"><?php echo $advertiser->name; ?></p></td>
                            <td><p class="description"><?php echo $advertiser->email; ?></p></td>
                            <td><p class="company"><?php echo $advertiser->contact_no; ?></p></td>
                            <td><p class="company"><?php echo $advertiser->address; ?></p></td>
                            <td><p class="workType <?php echo ($advertiser->is_approved == '1') ? 'fullTime' : 'partTime' ?>">
                            <?php echo ($advertiser->is_approved == '0' ? "For Approval" :
                                        ($advertiser->is_approved == '1' ? "Approved" :
                                        ($advertiser->is_approved == '2' ? "Rejected" : "")));?>
                        
                            </p></td>
                            <td><div class="option" tabindex="0">
                                    <span class="optionSpan icon">&#8942</span>
                                    <div class="optionModal">
                                        <?php if($advertiser->is_approved == '0') {?>
                                        <button type="button" data-id="<?php echo $advertiser->user_id ?>" class="btnApproval">
                                            <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill="#c8e6c9" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path>
                                                <path fill="#4caf50" d="M34.586,14.586l-13.57,13.586l-5.602-5.586l-2.828,2.828l8.434,8.414l16.395-16.414L34.586,14.586z"></path>
                                            </svg>
                                        </button>
                                        <?php }?>
                                        <button type="button" data-id="<?php echo $advertiser->user_id ?>" data-url="<?php echo URLROOT; ?>/advertiser/deleteRow" class="btnDeleteInline">
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

<?php flash('advertiser_delete_success')?>
<?php flash('advertiser_approve_success')?>
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
                    text: "Do you wish to approve this advertiser?",
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
            url: `/aiems/advertiser/approveRow/${id}`,
            method: "POST",
            success: function (data) {
            const response = JSON.parse(data);
            if (response.isSuccess) {
                swal("Updated Successfully", `${response.message}`, "success").then(
                () => {
                    window.location.replace(`/aiems/admin/advertiser`);
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