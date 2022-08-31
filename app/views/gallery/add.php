<?php require APPROOT . '/views/inc/header_admin.php'; ?>
<main class="admin dataInput">
                <section class="pageSpecificHeader">
                </section>
                <section class="mainContent adminForm alumGallery">
                    <form action="" id="form-add-gallery" method="POST">
                        <div class="form">
                            <h2>
                                Contents
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.47149 19.0139C9.23783 19.0143 9.0114 18.9329 8.83149 18.7839C8.73023 18.6999 8.64653 18.5968 8.58517 18.4805C8.52382 18.3641 8.48603 18.2368 8.47395 18.1058C8.46187 17.9749 8.47576 17.8428 8.5148 17.7172C8.55385 17.5916 8.61728 17.4749 8.70149 17.3739L13.1815 12.0139L8.86149 6.64386C8.77842 6.54157 8.71639 6.42387 8.67896 6.29753C8.64153 6.17119 8.62943 6.0387 8.64337 5.90767C8.65731 5.77665 8.69701 5.64966 8.76018 5.53403C8.82335 5.41839 8.90876 5.31638 9.01149 5.23386C9.11495 5.14282 9.23612 5.07415 9.36738 5.03216C9.49864 4.99017 9.63717 4.97577 9.77426 4.98986C9.91135 5.00394 10.0441 5.04621 10.164 5.11401C10.284 5.18181 10.3887 5.27368 10.4715 5.38386L15.3015 11.3839C15.4486 11.5628 15.529 11.7872 15.529 12.0189C15.529 12.2505 15.4486 12.4749 15.3015 12.6539L10.3015 18.6539C10.2012 18.7749 10.0737 18.8705 9.92953 18.9331C9.78532 18.9956 9.62839 19.0233 9.47149 19.0139Z" fill="#A63F3F"/>
                                </svg>
                                Gallery
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.47149 19.0139C9.23783 19.0143 9.0114 18.9329 8.83149 18.7839C8.73023 18.6999 8.64653 18.5968 8.58517 18.4805C8.52382 18.3641 8.48603 18.2368 8.47395 18.1058C8.46187 17.9749 8.47576 17.8428 8.5148 17.7172C8.55385 17.5916 8.61728 17.4749 8.70149 17.3739L13.1815 12.0139L8.86149 6.64386C8.77842 6.54157 8.71639 6.42387 8.67896 6.29753C8.64153 6.17119 8.62943 6.0387 8.64337 5.90767C8.65731 5.77665 8.69701 5.64966 8.76018 5.53403C8.82335 5.41839 8.90876 5.31638 9.01149 5.23386C9.11495 5.14282 9.23612 5.07415 9.36738 5.03216C9.49864 4.99017 9.63717 4.97577 9.77426 4.98986C9.91135 5.00394 10.0441 5.04621 10.164 5.11401C10.284 5.18181 10.3887 5.27368 10.4715 5.38386L15.3015 11.3839C15.4486 11.5628 15.529 11.7872 15.529 12.0189C15.529 12.2505 15.4486 12.4749 15.3015 12.6539L10.3015 18.6539C10.2012 18.7749 10.0737 18.8705 9.92953 18.9331C9.78532 18.9956 9.62839 19.0233 9.47149 19.0139Z" fill="#A63F3F"/>
                                </svg>
                                New Album
                            </h2>
                            <!-- boss jess this you append when you create pictures -->
                            <div class="album-list" id="parent-album">
                            </div>
                        </div>
                        <div class="form">
                            <a href="<?php echo URLROOT;?>/admin/gallery" class="closeIcon">
                                <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.7624 15L22.1374 9.63749C22.3728 9.40211 22.505 9.08287 22.505 8.74999C22.505 8.41711 22.3728 8.09787 22.1374 7.86249C21.902 7.62711 21.5828 7.49487 21.2499 7.49487C20.917 7.49487 20.5978 7.62711 20.3624 7.86249L14.9999 13.2375L9.63742 7.86249C9.40204 7.62711 9.0828 7.49487 8.74992 7.49487C8.41705 7.49487 8.0978 7.62711 7.86242 7.86249C7.62704 8.09787 7.49481 8.41711 7.49481 8.74999C7.49481 9.08287 7.62704 9.40211 7.86242 9.63749L13.2374 15L7.86242 20.3625C7.74526 20.4787 7.65227 20.6169 7.58881 20.7693C7.52535 20.9216 7.49268 21.085 7.49268 21.25C7.49268 21.415 7.52535 21.5784 7.58881 21.7307C7.65227 21.883 7.74526 22.0213 7.86242 22.1375C7.97863 22.2547 8.11688 22.3476 8.2692 22.4111C8.42153 22.4746 8.58491 22.5072 8.74992 22.5072C8.91494 22.5072 9.07832 22.4746 9.23064 22.4111C9.38297 22.3476 9.52122 22.2547 9.63742 22.1375L14.9999 16.7625L20.3624 22.1375C20.4786 22.2547 20.6169 22.3476 20.7692 22.4111C20.9215 22.4746 21.0849 22.5072 21.2499 22.5072C21.4149 22.5072 21.5783 22.4746 21.7306 22.4111C21.883 22.3476 22.0212 22.2547 22.1374 22.1375C22.2546 22.0213 22.3476 21.883 22.411 21.7307C22.4745 21.5784 22.5072 21.415 22.5072 21.25C22.5072 21.085 22.4745 20.9216 22.411 20.7693C22.3476 20.6169 22.2546 20.4787 22.1374 20.3625L16.7624 15Z" fill="black" fill-opacity="0.87"/>
                                </svg>
                            </a>
                            <div class="input-container">
                                <label for="gallery-title" class="outsideLabel">Album Name:</label>
                                <div class="textFieldContainer">
                                    <input type="text" name="album_name" id="gallery-title"required>
                                    <span class="error"></span>
                                </div>
                                <label for="upload-photo">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.8811 3.39474H14.6053V2.11895C14.6053 1.77789 14.3274 1.5 13.9863 1.5H13.9674C13.62 1.5 13.3421 1.77789 13.3421 2.11895V3.39474H12.0726C11.7316 3.39474 11.4537 3.67263 11.4474 4.01368V4.03263C11.4474 4.38 11.7253 4.65789 12.0726 4.65789H13.3421V5.92737C13.3421 6.26842 13.62 6.55263 13.9674 6.54632H13.9863C14.3274 6.54632 14.6053 6.26842 14.6053 5.92737V4.65789H15.8811C16.2221 4.65789 16.5 4.38 16.5 4.03895V4.01368C16.5 3.67263 16.2221 3.39474 15.8811 3.39474ZM12.7105 5.92737V5.28947H12.0726C11.7379 5.28947 11.4221 5.15684 11.1821 4.92316C10.9484 4.68316 10.8158 4.36737 10.8158 4.01368C10.8158 3.78632 10.8789 3.57789 10.9863 3.39474H5.76316C5.06842 3.39474 4.5 3.96316 4.5 4.65789V12.2368C4.5 12.9316 5.06842 13.5 5.76316 13.5H13.3421C14.0368 13.5 14.6053 12.9316 14.6053 12.2368V7.00737C14.4158 7.11474 14.2011 7.18421 13.9611 7.18421C13.6293 7.1809 13.3122 7.04722 13.0782 6.81205C12.8442 6.57688 12.7122 6.25911 12.7105 5.92737ZM12.6853 12.2368H6.39474C6.33609 12.2368 6.2786 12.2205 6.22872 12.1897C6.17883 12.1588 6.13851 12.1147 6.11229 12.0623C6.08606 12.0098 6.07496 11.9511 6.08022 11.8927C6.08549 11.8343 6.10692 11.7785 6.14211 11.7316L7.39263 10.0705C7.52526 9.89368 7.78421 9.90632 7.91053 10.0832L8.92105 11.6053L10.5695 9.40737C10.6958 9.24316 10.9421 9.23684 11.0684 9.40105L12.9316 11.7253C13.0958 11.9337 12.9505 12.2368 12.6853 12.2368Z" fill="black" fill-opacity="0.87"/>
                                        <path d="M2.25 6V14.5312C2.25 15.2016 2.79844 15.75 3.46875 15.75H12V14.5312H3.46875V6H2.25Z" fill="black" fill-opacity="0.87"/>
                                    </svg>
                                    Upload Photos
                                </label>
                                <input type="file" name="uploadPhoto" id="upload-photo" accept="image/*" multiple>
                            </div>
                            <div class="btnGroupContainer">
                                <button class="save">
                                    <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.75 15.75H14.25C14.6478 15.75 15.0294 15.592 15.3107 15.3107C15.592 15.0294 15.75 14.6478 15.75 14.25V6L12 2.25H3.75C3.35218 2.25 2.97064 2.40804 2.68934 2.68934C2.40804 2.97064 2.25 3.35218 2.25 3.75V14.25C2.25 14.6478 2.40804 15.0294 2.68934 15.3107C2.97064 15.592 3.35218 15.75 3.75 15.75ZM5.25 3.75H8.25V5.25H9.75V3.75H11.25V6.75H5.25V3.75ZM5.25 9.75H12.75V14.25H5.25V9.75Z" fill="white"/>
                                    </svg>
                                    Save album
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
            </main>
        </div>
    </div>

    <script>
         $(document).ready(function(){
            let filesArr = new Array();

            $('#upload-photo').change(function(e){
                const files = e.target.files;
                for(let i = 0; i < files.length; i++){ 
                    const rand_id = Math.random().toString(36).substring(7);
                    const rand_img_id = Math.random().toString(36).substring(7);
                    const rand_desc_id = Math.random().toString(36).substring(7);
                    
                    const reader = new FileReader();
                    const img = document.createElement('img');
                    const opt = `<div class="album-con" id="${rand_id}">
                                        <div class="album-cover">
                                            <div class="option">
                                                <button type="button" class="btn-eks-new">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.4099 12.0002L17.7099 7.71019C17.8982 7.52188 18.004 7.26649 18.004 7.00019C18.004 6.73388 17.8982 6.47849 17.7099 6.29019C17.5216 6.10188 17.2662 5.99609 16.9999 5.99609C16.7336 5.99609 16.4782 6.10188 16.2899 6.29019L11.9999 10.5902L7.70994 6.29019C7.52164 6.10188 7.26624 5.99609 6.99994 5.99609C6.73364 5.99609 6.47824 6.10188 6.28994 6.29019C6.10164 6.47849 5.99585 6.73388 5.99585 7.00019C5.99585 7.26649 6.10164 7.52188 6.28994 7.71019L10.5899 12.0002L6.28994 16.2902C6.19621 16.3832 6.12182 16.4938 6.07105 16.6156C6.02028 16.7375 5.99414 16.8682 5.99414 17.0002C5.99414 17.1322 6.02028 17.2629 6.07105 17.3848C6.12182 17.5066 6.19621 17.6172 6.28994 17.7102C6.3829 17.8039 6.4935 17.8783 6.61536 17.9291C6.73722 17.9799 6.86793 18.006 6.99994 18.006C7.13195 18.006 7.26266 17.9799 7.38452 17.9291C7.50638 17.8783 7.61698 17.8039 7.70994 17.7102L11.9999 13.4102L16.2899 17.7102C16.3829 17.8039 16.4935 17.8783 16.6154 17.9291C16.7372 17.9799 16.8679 18.006 16.9999 18.006C17.132 18.006 17.2627 17.9799 17.3845 17.9291C17.5064 17.8783 17.617 17.8039 17.7099 17.7102C17.8037 17.6172 17.8781 17.5066 17.9288 17.3848C17.9796 17.2629 18.0057 17.1322 18.0057 17.0002C18.0057 16.8682 17.9796 16.7375 17.9288 16.6156C17.8781 16.4938 17.8037 16.3832 17.7099 16.2902L13.4099 12.0002Z" fill="white"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <button type="button" id="${rand_img_id}">
                                                
                                            </button>
                                        </div>
                                        <div class="album-body">
                                            <div class="input" role="textbox" maxlength="200" contenteditable id="${rand_desc_id}"></div>
                                        </div>
                                </div>`;
                    

                    $('#parent-album').append(opt);

                    reader.readAsDataURL(files[i]);
                    reader.addEventListener('load',function(event){
                        img.src=event.target.result;
                    })
                    img.alt=files[i].name;
                    img.id=rand_id;
                    
                    $('#'+rand_img_id).append(img);

                    filesArr.push(
                        {
                            file: files[i],
                            id:rand_id,
                            desc_id: rand_desc_id
                        });
                }
                
                btnCancel();
                console.log(filesArr);
                $('#upload-photo').val(null);
            })

            
            function btnCancel(){
                $('.btn-eks-new').click(function(){
                    const parentEl = $(this.parentNode.parentNode.parentNode);
                    const image = $(this.parentNode.nextElementSibling.children[0]);
                    //console.log(parentEl)
                    const albumId = parentEl.attr('id');
                    //const imgName = image.attr('alt');
                    //const imgId = image.attr('id');
                    filesArr.forEach((album,index) =>{
                        if(album.id == albumId){
                            filesArr.splice(index,1);
                         
                        }  
                    });
                
                    parentEl.remove();
                    console.log(filesArr);
                })
            }


            $('#form-add-gallery').submit(function(e){
                e.preventDefault();
                let descArr = new Array();
                
                var newFData = new FormData();
                var g_title = $('#gallery-title').val();

                filesArr.forEach((album,index) => {
                    newFData.append(`${index}`,album.file);
                    newFData.append(`description${index}`,$('#'+album.desc_id).text());
                });

                newFData.append('gallery_title', g_title);            
                
                $.ajax({ 
                    url:'<?php echo URLROOT;?>/galleries/multi_add',
                    data: newFData, 
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    type: 'POST',
                    success:function(res){
                        if(res == 1){
                            location.replace('<?php echo URLROOT;?>/admin/gallery');
                        }
                    }, 
                    error: function(er){
                        console.log(er);
                    }
                })
            })

        })
    </script>
    <script> 
        // $('.yes').click(function(){
            
        //     $('#fileUpload').addClass('show');
        // })

        // $('.no').click(function(){
        //     $('#fileUpload').removeClass('show');
        // })
       
       

        // const fileUpload_gal = document.getElementById('upload-photo');
        // const parentGalleryBox = document.getElementById('parent-album');
        
        
        // let filesArr = new Array();

        // fileUpload_gal.addEventListener('change',function(event){
             
        //     let files = event.target.files;
        //      for(let i = 0; i < files.length; i++){
        //         const reader = new FileReader();

        //         // let newImgBox = document.createElement('div');
        //         // newImgBox.classList.add('multi-img');

        //         // let img = document.createElement('img');
        //         // let spanEks = document.createElement('span');
        //         // spanEks.textContent = 'X';
        //         // spanEks.classList.add('eks-img');

        //         // let labelBox = document.createElement('label');
        //         // labelBox.appendChild(document.createTextNode('Description'));

        //         // let descBox = document.createElement('input');
        //         // descBox.setAttribute('type','text');
        //         // descBox.setAttribute('id', 'description' + i);

        //         // newImgBox.append(spanEks);
        //         // newImgBox.append(img);
        //         // newImgBox.append(labelBox);
        //         // newImgBox.append(descBox);

        //         let opt += `
        //                     <div class="album-con">
        //                             <div class="album-cover">
        //                                 <div class="option" tabindex="0">
        //                                     <button type="button" class="btn-eks-new" data-url="kweeee/">
        //                                         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        //                                             <path d="M13.4099 12.0002L17.7099 7.71019C17.8982 7.52188 18.004 7.26649 18.004 7.00019C18.004 6.73388 17.8982 6.47849 17.7099 6.29019C17.5216 6.10188 17.2662 5.99609 16.9999 5.99609C16.7336 5.99609 16.4782 6.10188 16.2899 6.29019L11.9999 10.5902L7.70994 6.29019C7.52164 6.10188 7.26624 5.99609 6.99994 5.99609C6.73364 5.99609 6.47824 6.10188 6.28994 6.29019C6.10164 6.47849 5.99585 6.73388 5.99585 7.00019C5.99585 7.26649 6.10164 7.52188 6.28994 7.71019L10.5899 12.0002L6.28994 16.2902C6.19621 16.3832 6.12182 16.4938 6.07105 16.6156C6.02028 16.7375 5.99414 16.8682 5.99414 17.0002C5.99414 17.1322 6.02028 17.2629 6.07105 17.3848C6.12182 17.5066 6.19621 17.6172 6.28994 17.7102C6.3829 17.8039 6.4935 17.8783 6.61536 17.9291C6.73722 17.9799 6.86793 18.006 6.99994 18.006C7.13195 18.006 7.26266 17.9799 7.38452 17.9291C7.50638 17.8783 7.61698 17.8039 7.70994 17.7102L11.9999 13.4102L16.2899 17.7102C16.3829 17.8039 16.4935 17.8783 16.6154 17.9291C16.7372 17.9799 16.8679 18.006 16.9999 18.006C17.132 18.006 17.2627 17.9799 17.3845 17.9291C17.5064 17.8783 17.617 17.8039 17.7099 17.7102C17.8037 17.6172 17.8781 17.5066 17.9288 17.3848C17.9796 17.2629 18.0057 17.1322 18.0057 17.0002C18.0057 16.8682 17.9796 16.7375 17.9288 16.6156C17.8781 16.4938 17.8037 16.3832 17.7099 16.2902L13.4099 12.0002Z" fill="white"/>
        //                                         </svg>
        //                                     </button>
        //                                 </div>
        //                                 <button type="button">
        //                                     <img src="../images/portrait-image-sample.jpg" alt="asd">
        //                                 </button>
        //                             </div>
        //                             <div class="album-body">
        //                                 <div class="input" role="textbox" maxlength="200" contenteditable></div>
        //                             </div>
        //                     </div>
        //                   `;

        //         parentGalleryBox.append(opt);
        //         //parentImgBox.append(newImgBox);

        //         // reader.readAsDataURL(files[i]);
        //         // reader.addEventListener('load',function(event){
        //         //     img.src=event.target.result;
        //         //     img.alt=files[i].name;
        //         // })
                
        //         filesArr.push(files[i]);

        //        //end loop 
        //     }
        //     btnCancel(); 
        //     console.log(filesArr);   
        // }) 
        
        //btnCancel()
        // function btnCancel(){
        //     const btnEks = document.querySelectorAll('.btn-eks-new');
        //     btnEks.forEach(eks => eks.addEventListener('click', function(){
        //     const parentEl = eks.parentNode.parentNode.parentNode;
        //     const imgName = eks.parentNode.nextElementSibling.children[0].alt;
        //         // filesArr.forEach((file,index) =>{
        //         //     if(file.name == imgName){
        //         //         filesArr.splice(index,1);
        //         //     }
        //         // });
        //     // console.log(parentEl);
        //     // console.log(imgName);
        //     parentEl.remove();
        //     }))
        // }

        
        


        // function coverPhotoPreview(){
        //     const coverPhotoUpload = document.getElementById('fileUploadCoverPhoto');
        //     const coverPhotoBox = document.getElementById('cover-photo');
        //     const reader = new FileReader();

        //     coverPhotoUpload.addEventListener('change', function(event){
        //         const files = event.target.files;
        //         const file = files[0];
        //         reader.readAsDataURL(file);
        //         reader.addEventListener('load', function(event){
        //             coverPhotoBox.src = event.target.result;
        //             coverPhotoBox.alt = file.name; 
        //         })   
        //     })
        // }
        
        // coverPhotoPreview(); 
        
    </script>

<?php require APPROOT . '/views/inc/footer.php'; ?>