<?php require APPROOT . '/views/inc/header.php'; ?>
<main class="alumni forum">
        <section class="mainContent forumView">
            <div class="container forumCon">
                <div class="forum-link">
                    <?php if($data['user']->user_type == 1 || $data['user']->user_type == 2 || $data['user']->user_type == 3):?>
                        <?php if(!empty($data['admin']->image)) :?>
                            <img class="forum-image" src="<?php echo URLROOT;?>/uploads/<?php echo $data['admin']->image?>" id="myImg">
                        <?php else: ?>
                            <img class="forum-image" src="<?php echo URLROOT;?>/images/official-default-avatar.svg" id="myImg">
                        <?php endif; ?>
                    <?php else:?>
                        <?php if(!empty($data['alumni']->image)) :?>
                            <img class="forum-image" src="<?php echo URLROOT;?>/uploads/<?php echo $data['alumni']->image ?>" id="myImg">
                        <?php else: ?>
                            <img class="forum-image" src="<?php echo URLROOT;?>/images/official-default-avatar.svg" id="myImg">
                        <?php endif; ?>
                    <?php endif;?>
                    <div class="forum-details-con">
                        <div class="forum-details">
                            <h3><?php echo $data['post']->title?></h3>
                            <span class="author">Posted by <b><?php echo $data['user']->name?></b></span>
                            <span class="midot">&middot</span>
                            <span class="time-elapsed"><?php echo time_elapsed_string($data['post']->created_at);?></span>
                            <span class="midot">·</span>
                            <span class="forum-type"><?php echo $data['post']->category_name ?></span>
                        </div>
                        <?php if(($data['post']->topic_author == $_SESSION['id'])||($_SESSION['user_type'] == 'Super Admin')||($_SESSION['user_type'] == 'Admin')): ?>
                        <span class="optionCon">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.9375 12.4688C3.41536 12.4688 2.9146 12.2613 2.54538 11.8921C2.17617 11.5229 1.96875 11.0221 1.96875 10.5C1.96875 9.97786 2.17617 9.4771 2.54538 9.10788C2.9146 8.73867 3.41536 8.53125 3.9375 8.53125C4.45965 8.53125 4.9604 8.73867 5.32962 9.10788C5.69883 9.4771 5.90625 9.97786 5.90625 10.5C5.90625 11.0221 5.69883 11.5229 5.32962 11.8921C4.9604 12.2613 4.45965 12.4688 3.9375 12.4688ZM10.5 12.4688C9.97785 12.4688 9.4771 12.2613 9.10788 11.8921C8.73867 11.5229 8.53125 11.0221 8.53125 10.5C8.53125 9.97786 8.73867 9.4771 9.10788 9.10788C9.4771 8.73867 9.97785 8.53125 10.5 8.53125C11.0221 8.53125 11.5229 8.73867 11.8921 9.10788C12.2613 9.4771 12.4688 9.97786 12.4688 10.5C12.4688 11.0221 12.2613 11.5229 11.8921 11.8921C11.5229 12.2613 11.0221 12.4688 10.5 12.4688ZM17.0625 12.4688C16.5404 12.4688 16.0396 12.2613 15.6704 11.8921C15.3012 11.5229 15.0938 11.0221 15.0938 10.5C15.0938 9.97786 15.3012 9.4771 15.6704 9.10788C16.0396 8.73867 16.5404 8.53125 17.0625 8.53125C17.5846 8.53125 18.0854 8.73867 18.4546 9.10788C18.8238 9.4771 19.0312 9.97786 19.0312 10.5C19.0312 11.0221 18.8238 11.5229 18.4546 11.8921C18.0854 12.2613 17.5846 12.4688 17.0625 12.4688Z" fill="black" fill-opacity="0.87"/>
                            </svg>
                            <div class="optionModal">
                                <button type="button" class="btnEditPost" data-url="questionnaire1/ewan">
                                    <svg width="20px" height="20px" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.8233 1.67676L18.3233 4.17676L16.4175 6.08342L13.9175 3.58342L15.8233 1.67676Z" fill="black" fill-opacity="0.87"/>
                                        <path d="M6.6665 13.3332H9.1665L15.239 7.26074L12.739 4.76074L6.6665 10.8332V13.3332Z" fill="black" fill-opacity="0.87"/>
                                        <path d="M15.8333 15.8333H6.79833C6.77667 15.8333 6.75417 15.8417 6.7325 15.8417C6.705 15.8417 6.6775 15.8342 6.64917 15.8333H4.16667V4.16667H9.8725L11.5392 2.5H4.16667C3.2475 2.5 2.5 3.24667 2.5 4.16667V15.8333C2.5 16.7533 3.2475 17.5 4.16667 17.5H15.8333C16.2754 17.5 16.6993 17.3244 17.0118 17.0118C17.3244 16.6993 17.5 16.2754 17.5 15.8333V8.61L15.8333 10.2767V15.8333Z" fill="black" fill-opacity="0.87"/>
                                    </svg>
                                </button>
                                <button type="button" class="btnDeletePost" data-url="<?php echo URLROOT;?>/forum/delete/<?php echo $data['post']->topic_id?>" >
                                    <svg width="18px" height="20px" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.75 1.875H2.25C1.62868 1.875 1.125 2.43464 1.125 3.125V3.75C1.125 4.44036 1.62868 5 2.25 5H15.75C16.3713 5 16.875 4.44036 16.875 3.75V3.125C16.875 2.43464 16.3713 1.875 15.75 1.875Z"/>
                                        <path d="M2.61724 6.25C2.57772 6.24977 2.53859 6.25879 2.50242 6.27648C2.46624 6.29417 2.43383 6.32014 2.40729 6.35268C2.38076 6.38523 2.36069 6.42362 2.34841 6.46536C2.33612 6.5071 2.33189 6.55125 2.33599 6.59493L3.26095 16.4606C3.26076 16.4634 3.26076 16.4663 3.26095 16.4691C3.30928 16.9255 3.50672 17.3462 3.81579 17.6514C4.12486 17.9567 4.52404 18.1252 4.93755 18.125H13.0618C13.4752 18.125 13.8742 17.9564 14.1831 17.6512C14.4921 17.3459 14.6894 16.9253 14.7377 16.4691V16.4609L15.6613 6.59493C15.6654 6.55125 15.6611 6.5071 15.6488 6.46536C15.6366 6.42362 15.6165 6.38523 15.59 6.35268C15.5634 6.32014 15.531 6.29417 15.4948 6.27648C15.4587 6.25879 15.4195 6.24977 15.38 6.25H2.61724ZM11.3662 13.3082C11.4197 13.3659 11.4623 13.4349 11.4916 13.5111C11.5209 13.5873 11.5362 13.6692 11.5367 13.752C11.5373 13.8349 11.523 13.917 11.4947 13.9937C11.4664 14.0703 11.4246 14.1399 11.3719 14.1985C11.3192 14.2571 11.2565 14.3034 11.1875 14.3348C11.1185 14.3662 11.0446 14.3821 10.97 14.3814C10.8955 14.3808 10.8217 14.3637 10.7532 14.3312C10.6846 14.2986 10.6226 14.2512 10.5706 14.1918L8.99986 12.4465L7.42872 14.1918C7.32275 14.3062 7.18051 14.3697 7.03276 14.3685C6.885 14.3674 6.74359 14.3016 6.63908 14.1856C6.53458 14.0695 6.47537 13.9124 6.47426 13.7482C6.47315 13.5841 6.53022 13.426 6.63314 13.3082L8.20427 11.5625L6.63314 9.8168C6.53022 9.699 6.47315 9.54093 6.47426 9.37676C6.47537 9.21259 6.53458 9.05549 6.63908 8.93942C6.74359 8.82336 6.885 8.75764 7.03276 8.75648C7.18051 8.75532 7.32275 8.8188 7.42872 8.93321L8.99986 10.6785L10.5706 8.93321C10.6766 8.8188 10.8188 8.75532 10.9666 8.75648C11.1144 8.75764 11.2558 8.82336 11.3603 8.93942C11.4648 9.05549 11.524 9.21259 11.5251 9.37676C11.5262 9.54093 11.4691 9.699 11.3662 9.8168L9.79509 11.5625L11.3662 13.3082Z"/>
                                    </svg>
                                </button>
                            </div>
                        </span>
                        <?php endif; ?>
                    </div>
                    <p class="description">
                        <?php echo$data['post']->body ?>
                    </p>
                </div>
                <div class="vote-con" id="vote-form" votetype='<?php 
                if(empty($data['vote'])) {
                    echo 'normal';
                 }
                elseif(!empty($data['vote'])) {
                    if($data['vote'][0]->vote == 1) {
                        echo 'up';
                    }
                    else {
                        echo 'down';
                    }
                }
            ?>'>
                    <!-- ilmer use "selected" class to highlight vote -->
                    <button  class="up-vote" type="button"  data-up="1">
                        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.3671 7.38483C21.2142 7.16277 21.0096 6.98119 20.7709 6.85576C20.5322 6.73032 20.2667 6.66478 19.9971 6.66478C19.7274 6.66478 19.4619 6.73032 19.2232 6.85576C18.9845 6.98119 18.78 7.16277 18.6271 7.38483L3.62705 29.0515C3.45343 29.3014 3.35161 29.5941 3.33266 29.8978C3.31372 30.2015 3.37836 30.5046 3.51958 30.7742C3.66079 31.0437 3.87318 31.2694 4.13366 31.4267C4.39414 31.5841 4.69275 31.667 4.99705 31.6665L34.9971 31.6665C35.3006 31.6652 35.5982 31.5813 35.8576 31.4236C36.117 31.2659 36.3285 31.0404 36.4694 30.7715C36.6103 30.5026 36.6752 30.2003 36.6572 29.8973C36.6392 29.5942 36.5389 29.3018 36.3671 29.0515L21.3671 7.38483Z"/>
                        </svg>
                        </button>
                        <span class="vote-count" id="vote-count">0</span>
                    <button class="down-vote" type="button" data-down="-1">
                        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.3671 7.38483C21.2142 7.16277 21.0096 6.98119 20.7709 6.85576C20.5322 6.73032 20.2667 6.66478 19.9971 6.66478C19.7274 6.66478 19.4619 6.73032 19.2232 6.85576C18.9845 6.98119 18.78 7.16277 18.6271 7.38483L3.62705 29.0515C3.45343 29.3014 3.35161 29.5941 3.33266 29.8978C3.31372 30.2015 3.37836 30.5046 3.51958 30.7742C3.66079 31.0437 3.87318 31.2694 4.13366 31.4267C4.39414 31.5841 4.69275 31.667 4.99705 31.6665L34.9971 31.6665C35.3006 31.6652 35.5982 31.5813 35.8576 31.4236C36.117 31.2659 36.3285 31.0404 36.4694 30.7715C36.6103 30.5026 36.6752 30.2003 36.6572 29.8973C36.6392 29.5942 36.5389 29.3018 36.3671 29.0515L21.3671 7.38483Z"/>
                        </svg>
                    </button>
                </div>
                <div class="comment-main-con">
                    <?php $cmt = $data['comment-counter']?>
                    <?php $rmt = $data['reply-counter']?>
                    <?php if($cmt->counter == 0):?>
                        <h3 class="comment-count"><?php echo $cmt->counter?> Comments</h3>
                    <?php else: ?>
                        <h3 class="comment-count"><?php echo $cmt->counter + $rmt->replies?> Comments</h3>
                    <?php endif;?>
                    <!-- primary comment -->
                    <form action="<?php echo URLROOT;?>/forum/comment/<?php echo $data['post']->topic_id;?>" method="POST" class="comment-con">
                        <?php if(!empty($data['current']->image)): ?>
                            <img src="<?php echo URLROOT;?>/uploads/<?php echo ($data['current']->image) ?>" >
                        <?php else: ?>
                            <img src="<?php echo URLROOT;?>/images/official-default-avatar.svg">
                        <?php endif; ?>
                        <div class="textFieldContainer">
                            <textarea name="comment" required></textarea>
                            <span class="error"></span>
                        </div>
                        <button>Add Comment</button>
                    </form>
                    <!-- direct comment -->
                    <ul class="comment-list" >
                    <?php foreach($data['comment'] as $comment): ?>
                            <?php if($comment->comment_for == $data['post']->topic_id): ?>
                        <li class="list-item" id="<?php echo $comment->comment_id?>">
                            <form action="" class="comment-con-thread">
                                
                                <?php if($comment->user_type == 1||$comment->user_type == 2||$comment->user_type == 3): ?>
                                <img src="<?php echo URLROOT;?>/uploads/<?php echo $comment->admin_image?>" width="40px" height="40px">
                                <?php else: ?>
                                <img src="<?php echo URLROOT;?>/uploads/<?php echo $comment->image?>" width="40px" height="40px">
                                <?php endif; ?>
                                <div class="commentInfo">
                                    <span class="account-name"><?php echo $comment->user_name?></span>
                                    <span class="midot">·</span>
                                    <span class="date-posted"><?php echo time_elapsed_string($comment->commented_at);?></span>
                                </div>
                                <div class="input" role="textbox" maxlength="1000" readonly>
                                   <?php echo $comment->comment?>
                                </div>
                                <div class="btn-con">
                                    <a href="#reply-con" name="btn-reply" class="btn-reply">
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.84032 3.92016C4.59628 3.92016 4.36223 4.01711 4.18967 4.18967C4.01711 4.36223 3.92016 4.59628 3.92016 4.84032V12.2016C3.92016 12.4457 4.01711 12.6797 4.18967 12.8523C4.36223 13.0248 4.59628 13.1218 4.84032 13.1218H13.661C14.149 13.1219 14.617 13.3158 14.9621 13.661L16.8024 15.5013V4.84032C16.8024 4.59628 16.7055 4.36223 16.5329 4.18967C16.3603 4.01711 16.1263 3.92016 15.8823 3.92016H4.84032ZM15.8823 3C16.3703 3 16.8384 3.19389 17.1836 3.53902C17.5287 3.88415 17.7226 4.35224 17.7226 4.84032V16.6119C17.7226 16.703 17.6955 16.792 17.6449 16.8676C17.5943 16.9433 17.5224 17.0023 17.4382 17.037C17.3541 17.0718 17.2616 17.0808 17.1723 17.063C17.083 17.0451 17.001 17.0012 16.9368 16.9368L14.3115 14.3115C14.139 14.139 13.905 14.042 13.661 14.0419H4.84032C4.35224 14.0419 3.88415 13.848 3.53902 13.5029C3.19389 13.1578 3 12.6897 3 12.2016V4.84032C3 4.35224 3.19389 3.88415 3.53902 3.53902C3.88415 3.19389 4.35224 3 4.84032 3H15.8823Z" fill="black" fill-opacity="0.6"/>
                                        <path d="M7.60204 8.52099C7.60204 8.76503 7.5051 8.99908 7.33253 9.17164C7.15997 9.34421 6.92592 9.44115 6.68188 9.44115C6.43784 9.44115 6.20379 9.34421 6.03123 9.17164C5.85866 8.99908 5.76172 8.76503 5.76172 8.52099C5.76172 8.27695 5.85866 8.0429 6.03123 7.87034C6.20379 7.69778 6.43784 7.60083 6.68188 7.60083C6.92592 7.60083 7.15997 7.69778 7.33253 7.87034C7.5051 8.0429 7.60204 8.27695 7.60204 8.52099V8.52099ZM11.2827 8.52099C11.2827 8.76503 11.1857 8.99908 11.0132 9.17164C10.8406 9.34421 10.6066 9.44115 10.3625 9.44115C10.1185 9.44115 9.88444 9.34421 9.71187 9.17164C9.53931 8.99908 9.44236 8.76503 9.44236 8.52099C9.44236 8.27695 9.53931 8.0429 9.71187 7.87034C9.88444 7.69778 10.1185 7.60083 10.3625 7.60083C10.6066 7.60083 10.8406 7.69778 11.0132 7.87034C11.1857 8.0429 11.2827 8.27695 11.2827 8.52099ZM14.9633 8.52099C14.9633 8.76503 14.8664 8.99908 14.6938 9.17164C14.5213 9.34421 14.2872 9.44115 14.0432 9.44115C13.7991 9.44115 13.5651 9.34421 13.3925 9.17164C13.22 8.99908 13.123 8.76503 13.123 8.52099C13.123 8.27695 13.22 8.0429 13.3925 7.87034C13.5651 7.69778 13.7991 7.60083 14.0432 7.60083C14.2872 7.60083 14.5213 7.69778 14.6938 7.87034C14.8664 8.0429 14.9633 8.27695 14.9633 8.52099Z" fill="black" fill-opacity="0.6"/>
                                        </svg>
                                        Reply
                                    </a>
                                    <?php if($comment->comment_sender == $_SESSION['id']||$_SESSION['user_type'] == 'Super Admin'||$_SESSION['user_type'] == 'Admin'): ?>
                                        <a href="<?php echo URLROOT;?>/forum/deleteComment/<?php echo $comment->comment_id?>/<?php echo $comment->comment_for?>">
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.6562 6.78125L14.8163 15.9367C14.7895 16.1952 14.6798 16.4335 14.5082 16.6065C14.3366 16.7794 14.1149 16.875 13.8853 16.875H7.11504C6.88538 16.875 6.6637 16.7794 6.49208 16.6065C6.32046 16.4335 6.21083 16.1952 6.18398 15.9367L5.34375 6.78125" stroke="black" stroke-opacity="0.6" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16.5938 4.125H4.40625C4.14737 4.125 3.9375 4.36285 3.9375 4.65625V6.25C3.9375 6.5434 4.14737 6.78125 4.40625 6.78125H16.5938C16.8526 6.78125 17.0625 6.5434 17.0625 6.25V4.65625C17.0625 4.36285 16.8526 4.125 16.5938 4.125Z" stroke="black" stroke-opacity="0.6" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12.1406 9.96875L8.85938 13.6875" stroke="black" stroke-opacity="0.6" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12.1406 13.6875L8.85938 9.96875" stroke="black" stroke-opacity="0.6" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        
                                        Delete
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="btn-con2">
                                    <button type="button" class="cancel">Cancel</button>
                                    <button type="button" class="reply">Reply</button>
                                </div>
                            </form>
                            <ul class="sub-comment-list">
                            <?php foreach($data['reply'] as $reply): ?>
                                <?php if($reply->parent_comment == $comment->comment_id): ?>
                             <li class="list-item">
                                    <form action="<?php echo URLROOT;?>/forum/reply/<?php echo $comment->comment_id;?>/<?php echo $data['post']->topic_id ?>" method = "POST" class="comment-con-thread">
                                        <?php if ($reply->user_type == 1||$reply->user_type == 2||$reply->user_type == 3): ?>
                                        <img src="<?php echo URLROOT;?>/uploads/<?php echo $reply->admin_image?>" width="40px" height="40px">
                                        <?php else: ?>
                                        <img src="<?php echo URLROOT;?>/uploads/<?php echo $reply->image?>" width="40px" height="40px">
                                        <?php endif; ?>
                                        <div class="commentInfo" >
                                            <span class="account-name"><?php echo $reply->user_name?></span>
                                            <span class="midot">·</span>
                                            <span class="date-posted"><?php echo time_elapsed_string($reply->replied_at);?></span>
                                        </div>
                                        <div class="input" role="textbox" maxlength="1000" readonly>
                                            <?php echo $reply->reply?>
                                        </div>
                                        <div class="btn-con">
                                        <?php if($reply->reply_sender == $_SESSION['id']||$_SESSION['user_type'] == 'Super Admin'||$_SESSION['user_type'] == 'Admin'): ?>
                                        <a href="<?php echo URLROOT;?>/forum/deleteReply/<?php echo $reply->reply_id?>/<?php echo $comment->comment_for?>">
                                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.6562 6.78125L14.8163 15.9367C14.7895 16.1952 14.6798 16.4335 14.5082 16.6065C14.3366 16.7794 14.1149 16.875 13.8853 16.875H7.11504C6.88538 16.875 6.6637 16.7794 6.49208 16.6065C6.32046 16.4335 6.21083 16.1952 6.18398 15.9367L5.34375 6.78125" stroke="black" stroke-opacity="0.6" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M16.5938 4.125H4.40625C4.14737 4.125 3.9375 4.36285 3.9375 4.65625V6.25C3.9375 6.5434 4.14737 6.78125 4.40625 6.78125H16.5938C16.8526 6.78125 17.0625 6.5434 17.0625 6.25V4.65625C17.0625 4.36285 16.8526 4.125 16.5938 4.125Z" stroke="black" stroke-opacity="0.6" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12.1406 9.96875L8.85938 13.6875" stroke="black" stroke-opacity="0.6" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12.1406 13.6875L8.85938 9.96875" stroke="black" stroke-opacity="0.6" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>                    
                                        Delete
                                        </a>
                                        <?php endif; ?>
                                            
                                        </div>
                                        <div class="btn-con2">
                                            <button type="button" class="cancel">Cancel</button>
                                            <button type="submit" class="submit-reply">Reply</button>
                                        </div>
                                    </form>
                                </li>
                                <?php endif?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="container catCon">
                <div class="conHeader">
                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.15789 21H6.78947C6.58009 21 6.37929 20.9168 6.23123 20.7688C6.08318 20.6207 6 20.4199 6 20.2105V13.8947C6 13.6854 6.08318 13.4846 6.23123 13.3365C6.37929 13.1884 6.58009 13.1053 6.78947 13.1053H9.15789C9.36728 13.1053 9.56808 13.1884 9.71614 13.3365C9.86419 13.4846 9.94737 13.6854 9.94737 13.8947V20.2105C9.94737 20.4199 9.86419 20.6207 9.71614 20.7688C9.56808 20.9168 9.36728 21 9.15789 21ZM14.6842 21H12.3158C12.1064 21 11.9056 20.9168 11.7575 20.7688C11.6095 20.6207 11.5263 20.4199 11.5263 20.2105V6.78947C11.5263 6.58009 11.6095 6.37929 11.7575 6.23123C11.9056 6.08318 12.1064 6 12.3158 6H14.6842C14.8936 6 15.0944 6.08318 15.2425 6.23123C15.3905 6.37929 15.4737 6.58009 15.4737 6.78947V20.2105C15.4737 20.4199 15.3905 20.6207 15.2425 20.7688C15.0944 20.9168 14.8936 21 14.6842 21ZM20.2105 21H17.8421C17.6327 21 17.4319 20.9168 17.2839 20.7688C17.1358 20.6207 17.0526 20.4199 17.0526 20.2105V11.5263C17.0526 11.3169 17.1358 11.1161 17.2839 10.9681C17.4319 10.82 17.6327 10.7368 17.8421 10.7368H20.2105C20.4199 10.7368 20.6207 10.82 20.7688 10.9681C20.9168 11.1161 21 11.3169 21 11.5263V20.2105C21 20.4199 20.9168 20.6207 20.7688 20.7688C20.6207 20.9168 20.4199 21 20.2105 21Z" fill="black" fill-opacity="0.87"/>
                        </svg>
                    <h3>Stats</h3>
                </div>
                <ul class="category-list">
                    <li class="list-item">
                        <div>
                            <span class="up-vote">
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24.9997 3L5 28.7815H15.7751V47H34.2249V28.7815H45L24.9997 3Z" fill="black" fill-opacity="0.6"/>
                                </svg>
                            </span>
                            <span class="vote-count">0</span>
                        </div>
                        <div>
                            <span class="views">
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M25 31.25C28.4518 31.25 31.25 28.4518 31.25 25C31.25 21.5482 28.4518 18.75 25 18.75C21.5482 18.75 18.75 21.5482 18.75 25C18.75 28.4518 21.5482 31.25 25 31.25Z" fill="black" fill-opacity="0.6"/>
                                    <path d="M48.3431 24.4687C46.5053 19.7151 43.3149 15.6041 39.1662 12.6439C35.0175 9.68368 30.0923 8.00402 24.9993 7.8125C19.9064 8.00402 14.9812 9.68368 10.8325 12.6439C6.68373 15.6041 3.49334 19.7151 1.65559 24.4687C1.53147 24.812 1.53147 25.188 1.65559 25.5313C3.49334 30.2849 6.68373 34.3959 10.8325 37.3561C14.9812 40.3163 19.9064 41.996 24.9993 42.1875C30.0923 41.996 35.0175 40.3163 39.1662 37.3561C43.3149 34.3959 46.5053 30.2849 48.3431 25.5313C48.4672 25.188 48.4672 24.812 48.3431 24.4687V24.4687ZM24.9993 35.1562C22.9906 35.1562 21.027 34.5606 19.3568 33.4446C17.6866 32.3286 16.3849 30.7424 15.6162 28.8866C14.8475 27.0308 14.6464 24.9887 15.0382 23.0186C15.4301 21.0485 16.3974 19.2388 17.8178 17.8184C19.2382 16.3981 21.0478 15.4308 23.0179 15.0389C24.9881 14.647 27.0301 14.8481 28.886 15.6168C30.7418 16.3856 32.328 17.6873 33.4439 19.3575C34.5599 21.0277 35.1556 22.9913 35.1556 25C35.1514 27.6923 34.0801 30.2732 32.1763 32.177C30.2725 34.0808 27.6917 35.1521 24.9993 35.1562V35.1562Z" fill="black" fill-opacity="0.6"/>
                                </svg>
                                <path d="M24.9997 3L5 28.7815H15.7751V47H34.2249V28.7815H45L24.9997 3Z" fill="black" fill-opacity="0.6"/>
                                </svg>
                            </span>
                            <span class="view-count"><?php echo $data['post']->topic_views?></span>
                        </div>
                        <div>
                            <span class="comments">
                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M50 6.25C50 4.5924 49.3415 3.00269 48.1694 1.83058C46.9973 0.65848 45.4076 0 43.75 0L6.25 0C4.5924 0 3.00269 0.65848 1.83058 1.83058C0.65848 3.00269 0 4.5924 0 6.25L0 31.25C0 32.9076 0.65848 34.4973 1.83058 35.6694C3.00269 36.8415 4.5924 37.5 6.25 37.5H36.2063C37.035 37.5002 37.8297 37.8295 38.4156 38.4156L47.3312 47.3312C47.5496 47.5501 47.828 47.6993 48.1311 47.76C48.4343 47.8206 48.7487 47.7899 49.0344 47.6718C49.3201 47.5537 49.5644 47.3535 49.7363 47.0965C49.9081 46.8395 49.9999 46.5373 50 46.2281V6.25ZM15.625 18.75C15.625 19.5788 15.2958 20.3737 14.7097 20.9597C14.1237 21.5458 13.3288 21.875 12.5 21.875C11.6712 21.875 10.8763 21.5458 10.2903 20.9597C9.70424 20.3737 9.375 19.5788 9.375 18.75C9.375 17.9212 9.70424 17.1263 10.2903 16.5403C10.8763 15.9542 11.6712 15.625 12.5 15.625C13.3288 15.625 14.1237 15.9542 14.7097 16.5403C15.2958 17.1263 15.625 17.9212 15.625 18.75V18.75ZM28.125 18.75C28.125 19.5788 27.7958 20.3737 27.2097 20.9597C26.6237 21.5458 25.8288 21.875 25 21.875C24.1712 21.875 23.3763 21.5458 22.7903 20.9597C22.2042 20.3737 21.875 19.5788 21.875 18.75C21.875 17.9212 22.2042 17.1263 22.7903 16.5403C23.3763 15.9542 24.1712 15.625 25 15.625C25.8288 15.625 26.6237 15.9542 27.2097 16.5403C27.7958 17.1263 28.125 17.9212 28.125 18.75ZM37.5 21.875C36.6712 21.875 35.8763 21.5458 35.2903 20.9597C34.7042 20.3737 34.375 19.5788 34.375 18.75C34.375 17.9212 34.7042 17.1263 35.2903 16.5403C35.8763 15.9542 36.6712 15.625 37.5 15.625C38.3288 15.625 39.1237 15.9542 39.7097 16.5403C40.2958 17.1263 40.625 17.9212 40.625 18.75C40.625 19.5788 40.2958 20.3737 39.7097 20.9597C39.1237 21.5458 38.3288 21.875 37.5 21.875Z" fill="black" fill-opacity="0.6"/>
                                    </svg>
                            </span>
                            <?php if($data['comment-counter']->counter  == 0): ?>
                            <span class="comments-count">
                                <?php echo($data['comment-counter']->counter)?>
                            </span>
                            <?php else: ?>
                        <span class="comments-count">
                            <?php echo($data['comment-counter']->counter) + ($data['reply-counter']->replies)?>
                            </span>
                            <?php endif; ?>
                            
                        </div>
                    </li>
                </ul>
            </div>
            <div class="container popCon">
                <div class="conHeader">
                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 20.5315V7.87503C8 7.37774 8.19315 6.90082 8.53697 6.54918C8.88079 6.19755 9.3471 6 9.83333 6H17.1667C17.6529 6 18.1192 6.19755 18.463 6.54918C18.8068 6.90082 19 7.37774 19 7.87503V20.5315C19.0001 20.6129 18.9794 20.6929 18.94 20.7637C18.9007 20.8344 18.844 20.8935 18.7755 20.935C18.7071 20.9765 18.6292 20.9991 18.5496 21.0005C18.4701 21.002 18.3915 20.9822 18.3217 20.9431L13.5 18.2524L8.67833 20.9431C8.60851 20.9822 8.52994 21.002 8.45036 21.0005C8.37078 20.9991 8.29294 20.9765 8.22448 20.935C8.15603 20.8935 8.09933 20.8344 8.05997 20.7637C8.02061 20.6929 7.99994 20.6129 8 20.5315ZM13.6467 9.84382C13.6333 9.81571 13.6124 9.79201 13.5865 9.77543C13.5605 9.75886 13.5306 9.75007 13.5 9.75007C13.4694 9.75007 13.4395 9.75886 13.4135 9.77543C13.3876 9.79201 13.3667 9.81571 13.3533 9.84382L12.7722 11.0485C12.7605 11.0729 12.7433 11.094 12.7219 11.11C12.7005 11.126 12.6756 11.1365 12.6493 11.1404L11.3477 11.3335C11.3177 11.3382 11.2896 11.3513 11.2665 11.3714C11.2434 11.3914 11.2262 11.4177 11.2169 11.4472C11.2076 11.4767 11.2065 11.5082 11.2137 11.5383C11.2209 11.5684 11.2362 11.5959 11.2578 11.6176L12.1983 12.5561C12.2368 12.5945 12.2543 12.6498 12.2451 12.7042L12.0242 14.0298C12.0192 14.0604 12.0226 14.0919 12.0342 14.1206C12.0457 14.1493 12.0648 14.1741 12.0894 14.1924C12.1139 14.2106 12.143 14.2214 12.1732 14.2237C12.2035 14.2259 12.2338 14.2195 12.2607 14.2052L13.4248 13.5789C13.4482 13.5664 13.4741 13.5599 13.5005 13.5599C13.5268 13.5599 13.5527 13.5664 13.5761 13.5789L14.7402 14.2052C14.7671 14.2193 14.7973 14.2255 14.8274 14.2231C14.8575 14.2207 14.8864 14.2098 14.9108 14.1916C14.9352 14.1735 14.9542 14.1487 14.9657 14.1202C14.9772 14.0916 14.9807 14.0603 14.9758 14.0298L14.754 12.7032C14.7493 12.6766 14.751 12.6492 14.759 12.6234C14.767 12.5976 14.781 12.5742 14.7998 12.5551L15.7422 11.6167C15.7638 11.5949 15.7791 11.5675 15.7863 11.5374C15.7935 11.5073 15.7924 11.4757 15.7831 11.4462C15.7738 11.4167 15.7566 11.3905 15.7335 11.3704C15.7104 11.3503 15.6823 11.3372 15.6523 11.3326L14.3507 11.1395C14.3244 11.1355 14.2995 11.1251 14.2781 11.1091C14.2567 11.0931 14.2395 11.072 14.2278 11.0476L13.6467 9.84382Z" fill="black" fill-opacity="0.87"/>
                    </svg>
                    <h3>Popular Discussions</h3>
                </div>
                <ul class="category-list">
                <?php foreach($data['popular'] as $pop): ?>
                    <li class="list-item">
                        <a href="<?php echo URLROOT;?>/forum/show/<?php echo $pop->topic_id?>" title="<?php echo $pop->title ?>">
 
                                <h4 class="forum-title"><?php echo $pop->title ?></h4>

                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
    </main>
    
    <div class="modalConFilterNav">
        <!-- AddNewCourse -->
        <form action="<?php echo URLROOT;?>/forum/edit/<?php echo $data['post']->topic_id?>" method="POST" class="modalFilterNav newCourse">
            <h1>Edit Discussion:</h1>
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.7619 14.9997L22.1369 9.63724C22.3723 9.40186 22.5046 9.08262 22.5046 8.74974C22.5046 8.41687 22.3723 8.09762 22.1369 7.86224C21.9016 7.62686 21.5823 7.49463 21.2494 7.49463C20.9166 7.49463 20.5973 7.62686 20.3619 7.86224L14.9994 13.2372L9.63694 7.86224C9.40156 7.62686 9.08231 7.49463 8.74944 7.49463C8.41656 7.49463 8.09732 7.62686 7.86194 7.86224C7.62656 8.09762 7.49432 8.41687 7.49432 8.74974C7.49432 9.08262 7.62656 9.40186 7.86194 9.63724L13.2369 14.9997L7.86194 20.3622C7.74477 20.4785 7.65178 20.6167 7.58832 20.769C7.52486 20.9214 7.49219 21.0847 7.49219 21.2497C7.49219 21.4148 7.52486 21.5781 7.58832 21.7305C7.65178 21.8828 7.74477 22.021 7.86194 22.1372C7.97814 22.2544 8.11639 22.3474 8.26871 22.4109C8.42104 22.4743 8.58442 22.507 8.74944 22.507C8.91445 22.507 9.07783 22.4743 9.23016 22.4109C9.38248 22.3474 9.52073 22.2544 9.63694 22.1372L14.9994 16.7622L20.3619 22.1372C20.4781 22.2544 20.6164 22.3474 20.7687 22.4109C20.921 22.4743 21.0844 22.507 21.2494 22.507C21.4145 22.507 21.5778 22.4743 21.7302 22.4109C21.8825 22.3474 22.0207 22.2544 22.1369 22.1372C22.2541 22.021 22.3471 21.8828 22.4106 21.7305C22.474 21.5781 22.5067 21.4148 22.5067 21.2497C22.5067 21.0847 22.474 20.9214 22.4106 20.769C22.3471 20.6167 22.2541 20.4785 22.1369 20.3622L16.7619 14.9997Z" fill="black" fill-opacity="0.87"/>
            </svg>
            <div>
                <label for="title-id" class="outsideLabel">Title:</label>
                <div class="textFieldContainer">
                    <input type="text" name="title" id="title-id"required value="<?php echo $data['post']->title?>">
                    <span class="error"></span>
                </div>
            </div>
            <div>
                <label for="text-id" class="outsideLabel">Text:</label>
                <div class="textFieldContainer">
                    <textarea name="body" id="text-id"required><?php echo $data['post']->body?></textarea>
                    <span class="error"></span>
                </div>
            </div>
            
            <div class="btnContainer">
                <button>Edit</button>
            </div>
        </form>
    </div>

    <script>
    $(document).ready(function(){
        
        getVoteCount()
        selected()
        replyHide()

        function replyHide(){
            let container = $('.sub-comment-list');
            console.log(container);
            container.each(function(count, list){
                
                    if(list.children.length > 2){
                        $(list).children().hide();
                        $(list).children().last().show();
                        const show = $('<p class = "show-more" id ="show-more">Show more</p>');
                        show.appendTo(list);
                        $('.show-more').click(function(){
                            $(list).children().show();
                            $(this).remove();
                            }); 
                    }
            });
        }



        function getVoteCount(){
            $.ajax({ 
                url:'<?php echo URLROOT;?>/vote/getVote',
                data: {id:<?php echo $data['post']->topic_id?>}, 
                method: 'POST',
                type: 'POST',
                success:function(res){
                    //console.log(res);
                    if(res == "") {
                        $('.vote-count').html('0');
                    }
                    else {
                        $('.vote-count').html(res);
                    }
                }, 
                error: function(er){
                    console.log(er);
                }
            })
        }

        function selected(){
            let checker = $('.vote-con').attr('votetype')
            
            if(checker == 'up' ){
                let select = $('.up-vote').toggleClass("selected")
                console.log('voteType = up')
            }
            else if(checker == 'down'){
                let select = $('.down-vote').toggleClass("selected")
                console.log('voteType = down')
            }
        }   

        $('.up-vote').click(function() {
            let parent = $(this.parentNode);
            let vote = parent.attr('votetype');

                if(vote == 'normal'){

                    parent.attr('votetype', 'up');

                    $.ajax({
                        url:'<?php echo URLROOT;?>/vote/upVote',
                        data: {
                            topic_id:<?php echo $data['post']->topic_id?>, 
                            user_id:<?php echo $_SESSION['id']?>, 
                            count: 1
                            }, 
                        method: 'POST',
                        type: 'POST',
                        success:function(res){
                            console.log('it work');
                            let select = $('.up-vote').toggleClass("selected")
                            if(res == 1){
                                getVoteCount();
                            }
                        }, 
                        error: function(er){
                            console.log(er);
                        }
                    });

                }
                else if(vote == 'up') {
                console.log('else work')
                parent.attr('votetype','normal');
                    $.ajax({ 
                        url:'<?php echo URLROOT;?>/vote/normalStateVote',
                        data: {
                            topic_id:<?php echo $data['post']->topic_id?>, 
                            user_id:<?php echo $_SESSION['id']?>,
                            }, 
                        method: 'POST',
                        type: 'POST',
                        success:function(res){
                            //console.log(res);
                            if(res == 1){
                                getVoteCount();
                                let select = $('.up-vote').toggleClass("selected");
                                let focus = $('.up-vote').blur();
                            }
                        }, 
                        error: function(er){
                            console.log(er);
                        }

                    });
                }
                
                else if(vote == 'down'){
                console.log("else 2 work")
                parent.attr('votetype', 'up');
                $.ajax({ 
                        url:'<?php echo URLROOT;?>/vote/upVote',
                        data: {
                            topic_id:<?php echo $data['post']->topic_id?>, 
                            user_id:<?php echo $_SESSION['id']?>,
                            count: 1,
                            isVoted: 1
                            }, 
                        method: 'POST',
                        type: 'POST',
                        success:function(res){
                            if(res == 1){
                                getVoteCount();
                                let select = $('.up-vote').toggleClass("selected");
                                let deselect = $('.down-vote').toggleClass("selected");
                            }
                        }, 
                        error: function(er){
                            console.log(er);
                        }
                    });
                } 
        
        });

        $('.down-vote').click(function() {

            let parent = $(this.parentNode);
            let vote = parent.attr('votetype');

                if(vote == 'normal'){

                    parent.attr('votetype', 'down');

                    $.ajax({
                        url:'<?php echo URLROOT;?>/vote/downVote',
                        data: {
                            topic_id:<?php echo $data['post']->topic_id?>, 
                            user_id:<?php echo $_SESSION['id']?>, 
                            count: -1
                            }, 
                        method: 'POST',
                        type: 'POST',
                        success:function(res){
                            console.log('it work');
                            let select = $('.down-vote').toggleClass("selected")
                            if(res == 1){
                                getVoteCount();
                            }
                        }, 
                        error: function(er){
                            console.log(er);
                        }
                    });

                }
                else if(vote == 'down') {
                console.log('else work')
                parent.attr('votetype','normal');
                    $.ajax({ 
                        url:'<?php echo URLROOT;?>/vote/normalStateVote',
                        data: {
                            topic_id:<?php echo $data['post']->topic_id?>, 
                            user_id:<?php echo $_SESSION['id']?>,
                            }, 
                        method: 'POST',
                        type: 'POST',
                        success:function(res){
                            //console.log(res);
                            if(res == 1){
                                getVoteCount();
                                let select = $('.down-vote').toggleClass("selected");
                                let focus = $('.down-vote').blur();

                            }
                        }, 
                        error: function(er){
                            console.log(er);
                        }

                    });
                }
                
                else if(vote == 'up'){
                console.log("else 2 work")
                parent.attr('votetype', 'down');
                $.ajax({ 
                        url:'<?php echo URLROOT;?>/vote/downVote',
                        data: {
                            topic_id:<?php echo $data['post']->topic_id?>, 
                            user_id:<?php echo $_SESSION['id']?>,
                            count: -1,
                            isVoted: 1
                            }, 
                        method: 'POST',
                        type: 'POST',
                        success:function(res){
                            if(res == 1){
                                getVoteCount();
                                let select = $('.down-vote').toggleClass("selected");
                                let deselect = $('.up-vote').toggleClass("selected");
                            }
                        }, 
                        error: function(er){
                            console.log(er);
                        }
                    });
                } 
        

        });

        $('.btn-reply').click(function() {
            let show = $('#show-more');
            show.toggle ();
            var parentContainer = $(this.parentNode.parentNode.parentNode)
            var commentID = parentContainer[0].attributes[1].value
            console.log(parentContainer[0].childNodes[3].children.length)
            let subList = parentContainer[0].childNodes[3]
            let subLength = subList.children.length
            console.log(subList.children)
            var test = $('#reply-con');
            console.log(test); 
            if(subLength == 0){

                let replyContainer = `  
                
                <form action="<?php echo URLROOT;?>/forum/reply/${commentID}/<?php echo $data['post']->topic_id ?>" method = "POST" class="comment-con-thread">
                <img src="../images/heroBoxBg.png">
                    <div class="commentInfo" >
                        <span class="account-name"></span>
                        <span class="midot">·</span>
                        <span class="date-posted">September 00,0000</span>
                    </div>
                    <div class="textFieldContainer" id="reply-con">
                        <textarea name="reply" class="active"  required></textarea>
                        <span class="error"></span>
                    </div>
                    <div class="btn-con">
                        <button type="button">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.84032 3.92016C4.59628 3.92016 4.36223 4.01711 4.18967 4.18967C4.01711 4.36223 3.92016 4.59628 3.92016 4.84032V12.2016C3.92016 12.4457 4.01711 12.6797 4.18967 12.8523C4.36223 13.0248 4.59628 13.1218 4.84032 13.1218H13.661C14.149 13.1219 14.617 13.3158 14.9621 13.661L16.8024 15.5013V4.84032C16.8024 4.59628 16.7055 4.36223 16.5329 4.18967C16.3603 4.01711 16.1263 3.92016 15.8823 3.92016H4.84032ZM15.8823 3C16.3703 3 16.8384 3.19389 17.1836 3.53902C17.5287 3.88415 17.7226 4.35224 17.7226 4.84032V16.6119C17.7226 16.703 17.6955 16.792 17.6449 16.8676C17.5943 16.9433 17.5224 17.0023 17.4382 17.037C17.3541 17.0718 17.2616 17.0808 17.1723 17.063C17.083 17.0451 17.001 17.0012 16.9368 16.9368L14.3115 14.3115C14.139 14.139 13.905 14.042 13.661 14.0419H4.84032C4.35224 14.0419 3.88415 13.848 3.53902 13.5029C3.19389 13.1578 3 12.6897 3 12.2016V4.84032C3 4.35224 3.19389 3.88415 3.53902 3.53902C3.88415 3.19389 4.35224 3 4.84032 3H15.8823Z" fill="black" fill-opacity="0.6"/>
                            <path d="M7.60204 8.52099C7.60204 8.76503 7.5051 8.99908 7.33253 9.17164C7.15997 9.34421 6.92592 9.44115 6.68188 9.44115C6.43784 9.44115 6.20379 9.34421 6.03123 9.17164C5.85866 8.99908 5.76172 8.76503 5.76172 8.52099C5.76172 8.27695 5.85866 8.0429 6.03123 7.87034C6.20379 7.69778 6.43784 7.60083 6.68188 7.60083C6.92592 7.60083 7.15997 7.69778 7.33253 7.87034C7.5051 8.0429 7.60204 8.27695 7.60204 8.52099V8.52099ZM11.2827 8.52099C11.2827 8.76503 11.1857 8.99908 11.0132 9.17164C10.8406 9.34421 10.6066 9.44115 10.3625 9.44115C10.1185 9.44115 9.88444 9.34421 9.71187 9.17164C9.53931 8.99908 9.44236 8.76503 9.44236 8.52099C9.44236 8.27695 9.53931 8.0429 9.71187 7.87034C9.88444 7.69778 10.1185 7.60083 10.3625 7.60083C10.6066 7.60083 10.8406 7.69778 11.0132 7.87034C11.1857 8.0429 11.2827 8.27695 11.2827 8.52099ZM14.9633 8.52099C14.9633 8.76503 14.8664 8.99908 14.6938 9.17164C14.5213 9.34421 14.2872 9.44115 14.0432 9.44115C13.7991 9.44115 13.5651 9.34421 13.3925 9.17164C13.22 8.99908 13.123 8.76503 13.123 8.52099C13.123 8.27695 13.22 8.0429 13.3925 7.87034C13.5651 7.69778 13.7991 7.60083 14.0432 7.60083C14.2872 7.60083 14.5213 7.69778 14.6938 7.87034C14.8664 8.0429 14.9633 8.27695 14.9633 8.52099Z" fill="black" fill-opacity="0.6"/>
                            </svg>
                            Reply
                        </button>
                        <button>
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.6562 6.78125L14.8163 15.9367C14.7895 16.1952 14.6798 16.4335 14.5082 16.6065C14.3366 16.7794 14.1149 16.875 13.8853 16.875H7.11504C6.88538 16.875 6.6637 16.7794 6.49208 16.6065C6.32046 16.4335 6.21083 16.1952 6.18398 15.9367L5.34375 6.78125" stroke="black" stroke-opacity="0.6" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.5938 4.125H4.40625C4.14737 4.125 3.9375 4.36285 3.9375 4.65625V6.25C3.9375 6.5434 4.14737 6.78125 4.40625 6.78125H16.5938C16.8526 6.78125 17.0625 6.5434 17.0625 6.25V4.65625C17.0625 4.36285 16.8526 4.125 16.5938 4.125Z" stroke="black" stroke-opacity="0.6" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.1406 9.96875L8.85938 13.6875" stroke="black" stroke-opacity="0.6" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.1406 13.6875L8.85938 9.96875" stroke="black" stroke-opacity="0.6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Delete
                        </button>
                        
                    </div>
                    <div class="btn-con2">
                        <button type="button" class="cancel">Cancel</button>
                        <button type="submit" class="submit-reply">Reply</button>
                    </div>
                </form>

                `;

                const subComment = $('<li class = "list-item active"> </li>');
                subComment.append(replyContainer);
                subComment.appendTo(subList);
            }
            else {
                
                
                if(!subList.children[subLength-1].classList.contains("active")){

                let replyContainer = `  

                <form action="<?php echo URLROOT;?>/forum/reply/${commentID}/<?php echo $data['post']->topic_id ?>" method = "POST" class="comment-con-thread">
                <img src="../images/heroBoxBg.png">
                    <div class="commentInfo" >
                        <span class="account-name"></span>
                        <span class="midot">·</span>
                        <span class="date-posted">September 00,0000</span>
                    </div>
                    <div class="textFieldContainer" id="reply-con">
                        <textarea name="reply" class="active"   required></textarea>
                        <span class="error"></span>
                    </div>
                    <div class="btn-con">
                        <button type="button">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.84032 3.92016C4.59628 3.92016 4.36223 4.01711 4.18967 4.18967C4.01711 4.36223 3.92016 4.59628 3.92016 4.84032V12.2016C3.92016 12.4457 4.01711 12.6797 4.18967 12.8523C4.36223 13.0248 4.59628 13.1218 4.84032 13.1218H13.661C14.149 13.1219 14.617 13.3158 14.9621 13.661L16.8024 15.5013V4.84032C16.8024 4.59628 16.7055 4.36223 16.5329 4.18967C16.3603 4.01711 16.1263 3.92016 15.8823 3.92016H4.84032ZM15.8823 3C16.3703 3 16.8384 3.19389 17.1836 3.53902C17.5287 3.88415 17.7226 4.35224 17.7226 4.84032V16.6119C17.7226 16.703 17.6955 16.792 17.6449 16.8676C17.5943 16.9433 17.5224 17.0023 17.4382 17.037C17.3541 17.0718 17.2616 17.0808 17.1723 17.063C17.083 17.0451 17.001 17.0012 16.9368 16.9368L14.3115 14.3115C14.139 14.139 13.905 14.042 13.661 14.0419H4.84032C4.35224 14.0419 3.88415 13.848 3.53902 13.5029C3.19389 13.1578 3 12.6897 3 12.2016V4.84032C3 4.35224 3.19389 3.88415 3.53902 3.53902C3.88415 3.19389 4.35224 3 4.84032 3H15.8823Z" fill="black" fill-opacity="0.6"/>
                            <path d="M7.60204 8.52099C7.60204 8.76503 7.5051 8.99908 7.33253 9.17164C7.15997 9.34421 6.92592 9.44115 6.68188 9.44115C6.43784 9.44115 6.20379 9.34421 6.03123 9.17164C5.85866 8.99908 5.76172 8.76503 5.76172 8.52099C5.76172 8.27695 5.85866 8.0429 6.03123 7.87034C6.20379 7.69778 6.43784 7.60083 6.68188 7.60083C6.92592 7.60083 7.15997 7.69778 7.33253 7.87034C7.5051 8.0429 7.60204 8.27695 7.60204 8.52099V8.52099ZM11.2827 8.52099C11.2827 8.76503 11.1857 8.99908 11.0132 9.17164C10.8406 9.34421 10.6066 9.44115 10.3625 9.44115C10.1185 9.44115 9.88444 9.34421 9.71187 9.17164C9.53931 8.99908 9.44236 8.76503 9.44236 8.52099C9.44236 8.27695 9.53931 8.0429 9.71187 7.87034C9.88444 7.69778 10.1185 7.60083 10.3625 7.60083C10.6066 7.60083 10.8406 7.69778 11.0132 7.87034C11.1857 8.0429 11.2827 8.27695 11.2827 8.52099ZM14.9633 8.52099C14.9633 8.76503 14.8664 8.99908 14.6938 9.17164C14.5213 9.34421 14.2872 9.44115 14.0432 9.44115C13.7991 9.44115 13.5651 9.34421 13.3925 9.17164C13.22 8.99908 13.123 8.76503 13.123 8.52099C13.123 8.27695 13.22 8.0429 13.3925 7.87034C13.5651 7.69778 13.7991 7.60083 14.0432 7.60083C14.2872 7.60083 14.5213 7.69778 14.6938 7.87034C14.8664 8.0429 14.9633 8.27695 14.9633 8.52099Z" fill="black" fill-opacity="0.6"/>
                            </svg>
                            Reply
                        </button>
                        <button>
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.6562 6.78125L14.8163 15.9367C14.7895 16.1952 14.6798 16.4335 14.5082 16.6065C14.3366 16.7794 14.1149 16.875 13.8853 16.875H7.11504C6.88538 16.875 6.6637 16.7794 6.49208 16.6065C6.32046 16.4335 6.21083 16.1952 6.18398 15.9367L5.34375 6.78125" stroke="black" stroke-opacity="0.6" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.5938 4.125H4.40625C4.14737 4.125 3.9375 4.36285 3.9375 4.65625V6.25C3.9375 6.5434 4.14737 6.78125 4.40625 6.78125H16.5938C16.8526 6.78125 17.0625 6.5434 17.0625 6.25V4.65625C17.0625 4.36285 16.8526 4.125 16.5938 4.125Z" stroke="black" stroke-opacity="0.6" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.1406 9.96875L8.85938 13.6875" stroke="black" stroke-opacity="0.6" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.1406 13.6875L8.85938 9.96875" stroke="black" stroke-opacity="0.6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Delete
                        </button>
                        
                    </div>
                    <div class="btn-con2">
                        <button type="button" class="cancel">Cancel</button>
                        <button type="submit" class="submit-reply">Reply</button>
                    </div>
                </form>

                `;

                const subComment = $('<li class = "list-item active"> </li>');
                subComment.append(replyContainer);
                subComment.appendTo(subList);
                
                }
                else {
                let finder = parentContainer.find('li.active');
                finder.remove();
                }
            }
           
        });
    });


    </script>

<div class="alertModalContainer">
        <div class="alertModal logoutAlert">
            <svg></svg>
            <h2>Are you leaving?</h2>
            <p>This will logout your account</p>
            <div>
                <button class="cancelBtn">Cancel</button>
                <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
            </div>
        </div>
        <!-- this inline -->
        <div class="alertModal deleteAlert">
            <svg></svg>
            <h2>Are you sure?</h2>
            <p>This will delete the selected data and cannot be undone!</p>
            <div>
                <button class="cancelBtn">Cancel</button>
                <a class="modalDeleteInline"href="#">Delete</a>
            </div>
        </div>
        <!-- this all -->
        <div class="alertModal deleteAlertAll">
            <svg></svg>
            <h2>Are you sure?</h2>
            <p>This will delete all the data selected and cannot be undone!</p>
            <div>
                <button class="cancelBtn">Cancel</button>
                <button form="page-form">Delete</button>
            </div>
        </div>
    </div>
    <?php require APPROOT . '/views/inc/footer_u.php'; ?>
