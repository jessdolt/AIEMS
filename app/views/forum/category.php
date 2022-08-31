<?php require APPROOT . '/views/inc/header.php'; ?>
    <main class="alumni forum">
        <section class="heroBox">
            <div class="tint">
                <div class="container">
                    <h1 class="heroBoxText">Forum</h1>
                    <div class="textFieldContainer">
                        <input type="search" name="searchNews" id="search-news" placeholder="Search">
                        <label class="icon" for="search-news">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.5001 13.9999H14.7101L14.4301 13.7299C15.6301 12.3299 16.2501 10.4199 15.9101 8.38989C15.4401 5.60989 13.1201 3.38989 10.3201 3.04989C6.09014 2.52989 2.53014 6.08989 3.05014 10.3199C3.39014 13.1199 5.61014 15.4399 8.39014 15.9099C10.4201 16.2499 12.3301 15.6299 13.7301 14.4299L14.0001 14.7099V15.4999L18.2501 19.7499C18.6601 20.1599 19.3301 20.1599 19.7401 19.7499C20.1501 19.3399 20.1501 18.6699 19.7401 18.2599L15.5001 13.9999ZM9.50014 13.9999C7.01014 13.9999 5.00014 11.9899 5.00014 9.49989C5.00014 7.00989 7.01014 4.99989 9.50014 4.99989C11.9901 4.99989 14.0001 7.00989 14.0001 9.49989C14.0001 11.9899 11.9901 13.9999 9.50014 13.9999Z" fill="black" fill-opacity="0.6"/>
                            </svg>
                        </label>
                    </div>
                </div>
            </div>
        </section>
        <section class="mainContent">
            <div class="container forumCon">
                <ul class="forum-list">
                <?php $post = $data['posts']?>
                <?php foreach($post as $post): ?>
                    
                    <li class="list-item">
                        <a href="<?php echo URLROOT;?>/forum/show/<?php echo $post->topic_id?>" class="forum-link">
                            <?php if($post->category == 1): ?>
                            <span class="forum-image general" src></span><!-- Icon for General -->
                            <?php endif; ?>
                            <?php if($post->category == 2): ?>
                            <span class="forum-image help" src></span><!-- Icon for Help -->
                            <?php endif; ?>
                            <?php if($post->category == 3): ?>
                            <span class="forum-image blog" src></span><!-- Icon for Blog -->
                            <?php endif; ?>
                            <div class="forum-details-con">
                                <div class="forum-details">
                                    <h3><?php echo $post->title?></h3>
                                    <span class="author">Posted by <b> <?php echo $post->name;?> </b></span>
                                    <span class="midot">&middot</span>
                                    <span class="time-elapsed"><?php echo time_elapsed_string($post->created_at);?></span>
                                    <span class="midot">&middot</span>
                                    <span class="forum-type"><?php echo $post->category_name ?></span>
                                </div>
                                
                                <span class="commentCount">
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 2.625C21 1.92881 20.7234 1.26113 20.2312 0.768845C19.7389 0.276562 19.0712 0 18.375 0L2.625 0C1.92881 0 1.26113 0.276562 0.768845 0.768845C0.276562 1.26113 0 1.92881 0 2.625L0 13.125C0 13.8212 0.276562 14.4889 0.768845 14.9812C1.26113 15.4734 1.92881 15.75 2.625 15.75H15.2066C15.5547 15.7501 15.8885 15.8884 16.1346 16.1346L19.8791 19.8791C19.9708 19.9711 20.0877 20.0337 20.2151 20.0592C20.3424 20.0846 20.4744 20.0718 20.5944 20.0222C20.7144 19.9725 20.817 19.8885 20.8892 19.7805C20.9614 19.6726 21 19.5457 21 19.4158V2.625ZM6.5625 7.875C6.5625 8.2231 6.42422 8.55694 6.17808 8.80308C5.93194 9.04922 5.5981 9.1875 5.25 9.1875C4.9019 9.1875 4.56806 9.04922 4.32192 8.80308C4.07578 8.55694 3.9375 8.2231 3.9375 7.875C3.9375 7.5269 4.07578 7.19306 4.32192 6.94692C4.56806 6.70078 4.9019 6.5625 5.25 6.5625C5.5981 6.5625 5.93194 6.70078 6.17808 6.94692C6.42422 7.19306 6.5625 7.5269 6.5625 7.875ZM11.8125 7.875C11.8125 8.2231 11.6742 8.55694 11.4281 8.80308C11.1819 9.04922 10.8481 9.1875 10.5 9.1875C10.1519 9.1875 9.81806 9.04922 9.57192 8.80308C9.32578 8.55694 9.1875 8.2231 9.1875 7.875C9.1875 7.5269 9.32578 7.19306 9.57192 6.94692C9.81806 6.70078 10.1519 6.5625 10.5 6.5625C10.8481 6.5625 11.1819 6.70078 11.4281 6.94692C11.6742 7.19306 11.8125 7.5269 11.8125 7.875ZM15.75 9.1875C15.4019 9.1875 15.0681 9.04922 14.8219 8.80308C14.5758 8.55694 14.4375 8.2231 14.4375 7.875C14.4375 7.5269 14.5758 7.19306 14.8219 6.94692C15.0681 6.70078 15.4019 6.5625 15.75 6.5625C16.0981 6.5625 16.4319 6.70078 16.6781 6.94692C16.9242 7.19306 17.0625 7.5269 17.0625 7.875C17.0625 8.2231 16.9242 8.55694 16.6781 8.80308C16.4319 9.04922 16.0981 9.1875 15.75 9.1875Z" fill="#A63F3F"/>
                                    </svg>
                                    

                                    <?php 
                                       $replyCounter = 0;
                                       $commentCounter = 0;
                                       $commentChecker = 0;
                                       $replyBoolean = 0;
                                       $counterChecker = 0;
                                        if($post->topic_id == $post->comment_for) {
                                            
                                                if(!empty($data['reply'])){
                                                    
                                                    if($post->comment > 0) {
                                                        
                                                            foreach($data['reply'] as $reply) {

                                                                    if($post->topic_id == $reply->topic_id) {
                                                                        if($reply->replies == 0) {
                                                                            $commentCounter++;
                                                                            $counterChecker = 0;
                                                                        }
                                                                        else if($reply->replies > 0) {
                                                                            if($post->comment >= 1) {
                                                                                $commentChecker++;
                                                                                $replyBoolean = 1;
                                                                                    if($replyBoolean == 1){
                                                                                        $replyCounter = $commentChecker + $reply->replies;
                                                                                        $counterChecker = 1; 
                                                                                }
                                                                            }
                                                                    }
                                                                       else {
                                                                            $yes = 0;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                            }
                                            if($counterChecker == 0){
                                                echo $commentCounter;
                                            }
                                            else{
                                                echo $replyCounter;
                                            }
                                    ?>
                                </span>
                                
                            </div>
                            
                        </a>
                    </li> 
                    <?php endforeach;?>     
                </ul>
                <div class="pagination">
                    <span class="currentRows"><?php echo $data['start'] . '-' . $data['limit'] . ' of ' . $data['total']?></span>
                    <a href="<?php echo URLROOT; ?>/forum/showFiltered/<?php echo $url[2].$data['first'] ?>" class="start">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 3C5.75507 3.00003 5.51866 3.08996 5.33563 3.25272C5.15259 3.41547 5.03566 3.63975 5.007 3.883L5 4V20C5.00028 20.2549 5.09788 20.5 5.27285 20.6854C5.44782 20.8707 5.68695 20.9822 5.94139 20.9972C6.19584 21.0121 6.44638 20.9293 6.64183 20.7657C6.83729 20.6021 6.9629 20.3701 6.993 20.117L7 20V4C7 3.73478 6.89464 3.48043 6.70711 3.29289C6.51957 3.10536 6.26522 3 6 3ZM18.707 3.293C18.5348 3.12082 18.3057 3.01739 18.0627 3.00211C17.8197 2.98683 17.5794 3.06075 17.387 3.21L17.293 3.293L9.293 11.293C9.12082 11.4652 9.01739 11.6943 9.00211 11.9373C8.98683 12.1803 9.06075 12.4206 9.21 12.613L9.293 12.707L17.293 20.707C17.473 20.8863 17.7144 20.9905 17.9684 20.9982C18.2223 21.006 18.4697 20.9168 18.6603 20.7488C18.8508 20.5807 18.9703 20.3464 18.9944 20.0935C19.0185 19.8406 18.9454 19.588 18.79 19.387L18.707 19.293L11.414 12L18.707 4.707C18.8945 4.51947 18.9998 4.26516 18.9998 4C18.9998 3.73484 18.8945 3.48053 18.707 3.293Z" fill="black" fill-opacity="0.87"/>
                        </svg>
                    </a>
                    <a href="<?php echo URLROOT; ?>/forum/showFiltered/<?php echo $url[2].$data['previous'] ?>" class="previous">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.0625 3.00197C16.3056 3.01725 16.5347 3.12068 16.7069 3.29286C16.8943 3.48039 16.9996 3.7347 16.9996 3.99986C16.9996 4.26503 16.8943 4.51933 16.7069 4.70686L9.41386 11.9999L16.7069 19.2929L16.7899 19.3869C16.9453 19.5879 17.0184 19.8405 16.9943 20.0934C16.9702 20.3463 16.8507 20.5806 16.6601 20.7486C16.4696 20.9166 16.2222 21.0058 15.9682 20.9981C15.7143 20.9903 15.4728 20.8862 15.2929 20.7069L7.29286 12.7069L7.20986 12.6129C7.06061 12.4205 6.98669 12.1802 7.00197 11.9372C7.01725 11.6942 7.12068 11.4651 7.29286 11.2929L15.2929 3.29286L15.3869 3.20986C15.5793 3.06061 15.8195 2.98669 16.0625 3.00197Z" fill="black" fill-opacity="0.87"/>
                        </svg> 
                    </a>
                    <a href="<?php echo URLROOT; ?>/forum/showFiltered/<?php echo $url[2].$data['next'] ?>" class="next">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.29279 3.29311C7.46498 3.12093 7.69408 3.0175 7.93711 3.00222C8.18013 2.98694 8.42038 3.06085 8.61279 3.21011L8.70679 3.29311L16.7068 11.2931C16.879 11.4653 16.9824 11.6944 16.9977 11.9374C17.013 12.1805 16.939 12.4207 16.7898 12.6131L16.7068 12.7071L8.70679 20.7071C8.52683 20.8865 8.28535 20.9906 8.0314 20.9983C7.77745 21.0061 7.53007 20.9169 7.33951 20.7489C7.14894 20.5808 7.02948 20.3466 7.00539 20.0936C6.98129 19.8407 7.05437 19.5881 7.20979 19.3871L7.29279 19.2931L14.5858 12.0001L7.29279 4.70711C7.10532 4.51958 7 4.26527 7 4.00011C7 3.73494 7.10532 3.48063 7.29279 3.29311Z" fill="black" fill-opacity="0.87"/>
                        </svg>
                    </a>
                    <a href="<?php echo URLROOT; ?>/forum/showFiltered/<?php echo $url[2].$data['last'] ?>" class="end">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 3C18.245 3.00003 18.4814 3.08996 18.6644 3.25272C18.8474 3.41547 18.9644 3.63975 18.993 3.883L19 4V20C18.9997 20.2549 18.9022 20.5 18.7272 20.6854C18.5522 20.8707 18.3131 20.9822 18.0586 20.9972C17.8042 21.0121 17.5537 20.9293 17.3582 20.7657C17.1627 20.6021 17.0371 20.3701 17.007 20.117L17 20V4C17 3.73478 17.1054 3.48043 17.2929 3.29289C17.4805 3.10536 17.7348 3 18 3ZM5.29303 3.293C5.46522 3.12082 5.69432 3.01739 5.93735 3.00211C6.18038 2.98683 6.42063 3.06075 6.61303 3.21L6.70703 3.293L14.707 11.293C14.8792 11.4652 14.9826 11.6943 14.9979 11.9373C15.0132 12.1803 14.9393 12.4206 14.79 12.613L14.707 12.707L6.70703 20.707C6.52707 20.8863 6.2856 20.9905 6.03165 20.9982C5.7777 21.006 5.53032 20.9168 5.33975 20.7488C5.14919 20.5807 5.02973 20.3464 5.00563 20.0935C4.98154 19.8406 5.05462 19.588 5.21003 19.387L5.29303 19.293L12.586 12L5.29303 4.707C5.10556 4.51947 5.00024 4.26516 5.00024 4C5.00024 3.73484 5.10556 3.48053 5.29303 3.293Z" fill="black" fill-opacity="0.87"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="container newDis">
                <button>Start a New Discussion</button>
            </div>
            <div class="container catCon">
                <div class="conHeader">
                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.5 12.75H12C12.1989 12.75 12.3897 12.671 12.5303 12.5303C12.671 12.3897 12.75 12.1989 12.75 12V7.5C12.75 7.30109 12.671 7.11032 12.5303 6.96967C12.3897 6.82902 12.1989 6.75 12 6.75H7.5C7.30109 6.75 7.11032 6.82902 6.96967 6.96967C6.82902 7.11032 6.75 7.30109 6.75 7.5V12C6.75 12.1989 6.82902 12.3897 6.96967 12.5303C7.11032 12.671 7.30109 12.75 7.5 12.75ZM15 12.75H19.5C19.6989 12.75 19.8897 12.671 20.0303 12.5303C20.171 12.3897 20.25 12.1989 20.25 12V7.5C20.25 7.30109 20.171 7.11032 20.0303 6.96967C19.8897 6.82902 19.6989 6.75 19.5 6.75H15C14.8011 6.75 14.6103 6.82902 14.4697 6.96967C14.329 7.11032 14.25 7.30109 14.25 7.5V12C14.25 12.1989 14.329 12.3897 14.4697 12.5303C14.6103 12.671 14.8011 12.75 15 12.75ZM7.5 20.25H12C12.1989 20.25 12.3897 20.171 12.5303 20.0303C12.671 19.8897 12.75 19.6989 12.75 19.5V15C12.75 14.8011 12.671 14.6103 12.5303 14.4697C12.3897 14.329 12.1989 14.25 12 14.25H7.5C7.30109 14.25 7.11032 14.329 6.96967 14.4697C6.82902 14.6103 6.75 14.8011 6.75 15V19.5C6.75 19.6989 6.82902 19.8897 6.96967 20.0303C7.11032 20.171 7.30109 20.25 7.5 20.25ZM17.25 20.25C18.9045 20.25 20.25 18.9045 20.25 17.25C20.25 15.5955 18.9045 14.25 17.25 14.25C15.5955 14.25 14.25 15.5955 14.25 17.25C14.25 18.9045 15.5955 20.25 17.25 20.25Z" fill="black" fill-opacity="0.87"/>
                    </svg>
                    <h3>Categories</h3>
                </div>
                <ul class="category-list">
               
                    <li class="list-item">
                    <a href="<?php echo URLROOT;?>/pages/forum">      
                            <span class="category">All Discussions</span>
                            <span class="forumCount"><?php echo $data['all'][0]->counter ?></span>
                    </a>
                    </li>
                <?php foreach($data['category'] as $category):?>
                    <li class="list-item">
                    <a href="<?php echo URLROOT; ?>/forum/showFiltered/<?php echo $category->category_id?>">
                            <span class="category"><?php echo $category->category_name?></span>
                            <span class="forumCount"><?php echo $category->counter?></span>
                    </a>

                    </li>
                <?php endforeach;?>
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
                <?php foreach($data['popular'] as $pop):?>
                    <li class="list-item">
                        <a href="<?php echo URLROOT;?>/forum/show/<?php echo $pop->topic_id?>">
                                <h4 class="forum-title"><?php echo $pop->title ?></h4>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="container myDisCon">
                <div class="conHeader">
                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.5 6H7.5C6.67275 6 6 6.67275 6 7.5V21L9 18H19.5C20.3273 18 21 17.3273 21 16.5V7.5C21 6.67275 20.3273 6 19.5 6ZM11.2492 15.7403H9.75V14.241L13.8975 10.0995L15.396 11.5988L11.2492 15.7403ZM16.1032 10.8922L14.604 9.393L15.747 8.25075L17.2463 9.75L16.1032 10.8922Z" fill="black" fill-opacity="0.87"/>
                    </svg>
                    <h3>My Discussions</h3>
                </div>
                <ul class="category-list">
                <?php foreach($data['user_posts'] as $my): ?>
                    <li class="list-item">
                        <a href="<?php echo URLROOT;?>/forum/show/<?php echo $pop->topic_id?>">
                            <span class="forum-title"><?php echo $my->title?></span>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
    </main>
    <footer class="mainFooter">
        <h1>
            Polytechnic University of the Philippines
            <br>
            <span>Institute of Technology</span>
        </h1>
        <hr>
        <p class="tagline">iskolar ng bayan</p>
        <ul class="links">
            <li class="link-item"><a href="<?php echo URLROOT; ?>/pages/home">PUP</a></li>
            <li class="link-item"><a href="<?php echo URLROOT; ?>/pages/news">News</a></li>
            <li class="link-item"><a href="<?php echo URLROOT; ?>/pages/events">Events</a></li>
            <li class="link-item"><a href="<?php echo URLROOT; ?>/pages/job_portals">Jobs</a></li>
            <li class="link-item"><a href="<?php echo URLROOT; ?>/pages/forum">Forum</a></li>
            <li class="link-item"><a href="<?php echo URLROOT;?>/pages/gallery">Gallery</a></li>
        </ul>
        <p>Copyright ©2021. All rights reserved</p>
    </footer>
    <div class="modalConFilterNav">
        <!-- AddNewCourse -->
        <form action="<?php echo URLROOT;?>/forum/add" method="POST" class="modalFilterNav newCourse">
            <h1>New Discussion:</h1>
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.7619 14.9997L22.1369 9.63724C22.3723 9.40186 22.5046 9.08262 22.5046 8.74974C22.5046 8.41687 22.3723 8.09762 22.1369 7.86224C21.9016 7.62686 21.5823 7.49463 21.2494 7.49463C20.9166 7.49463 20.5973 7.62686 20.3619 7.86224L14.9994 13.2372L9.63694 7.86224C9.40156 7.62686 9.08231 7.49463 8.74944 7.49463C8.41656 7.49463 8.09732 7.62686 7.86194 7.86224C7.62656 8.09762 7.49432 8.41687 7.49432 8.74974C7.49432 9.08262 7.62656 9.40186 7.86194 9.63724L13.2369 14.9997L7.86194 20.3622C7.74477 20.4785 7.65178 20.6167 7.58832 20.769C7.52486 20.9214 7.49219 21.0847 7.49219 21.2497C7.49219 21.4148 7.52486 21.5781 7.58832 21.7305C7.65178 21.8828 7.74477 22.021 7.86194 22.1372C7.97814 22.2544 8.11639 22.3474 8.26871 22.4109C8.42104 22.4743 8.58442 22.507 8.74944 22.507C8.91445 22.507 9.07783 22.4743 9.23016 22.4109C9.38248 22.3474 9.52073 22.2544 9.63694 22.1372L14.9994 16.7622L20.3619 22.1372C20.4781 22.2544 20.6164 22.3474 20.7687 22.4109C20.921 22.4743 21.0844 22.507 21.2494 22.507C21.4145 22.507 21.5778 22.4743 21.7302 22.4109C21.8825 22.3474 22.0207 22.2544 22.1369 22.1372C22.2541 22.021 22.3471 21.8828 22.4106 21.7305C22.474 21.5781 22.5067 21.4148 22.5067 21.2497C22.5067 21.0847 22.474 20.9214 22.4106 20.769C22.3471 20.6167 22.2541 20.4785 22.1369 20.3622L16.7619 14.9997Z" fill="black" fill-opacity="0.87"/>
            </svg>
                
            <div>
                <label for="category-id" class="outsideLabel">Category:</label>
                <div class="textFieldContainer">
                    <select name="category" id="category-id" required>
                    <?php foreach($data['category'] as $category):?>
                        <option value="<?php echo $category->category_id?>"><?php echo $category->category_name?></option>
                    <?php endforeach; ?>
                    </select>
                    <span class="error"></span>
                </div>
            </div>
            <div>
                <label for="title-id" class="outsideLabel">Title:</label>
                <div class="textFieldContainer">
                    <input type="text" name="title" id="title-id"required>
                    <span class="error"></span>
                </div>
            </div>
            <div>
                <label for="text-id" class="outsideLabel">Text:</label>
                <div class="textFieldContainer">
                    <textarea name="body" id="text-id"required></textarea>
                    <span class="error"></span>
                </div>
            </div>
            
            <div class="btnContainer">
                <button>Post</button>
            </div>
        </form>
        <!-- <form action="" class="modalFilterNav editForum">
            <h1>Edit Discussion:</h1>
            <div>
                <label for="category-id" class="outsideLabel">Category:</label>
                <div class="textFieldContainer">
                    <select name="departmentId" id="category-id" required>
                        <option value="general">General Discussion</option>
                        <option value="help">Help</option>
                        <option value="blog">Blog</option>
                    </select>
                    <span class="error"></span>
                </div>
            </div>
            <div>
                <label for="title-id" class="outsideLabel">Title:</label>
                <div class="textFieldContainer">
                    <input type="text" name="titleId" id="title-id"required>
                    <span class="error"></span>
                </div>
            </div>
            <div>
                <label for="text-id" class="outsideLabel">Text:</label>
                <div class="textFieldContainer">
                    <textarea name="textId" id="text-id"required></textarea>
                    <span class="error"></span>
                </div>
            </div>
            
            <div class="btnContainer">
                <button>Edit</button>
            </div>
        </form> -->
    </div>

</body>

