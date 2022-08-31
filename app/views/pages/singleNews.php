<?php require APPROOT . '/views/inc/header.php'; ?>
<main class="alumni alumniNews">
        <section class="mainContent newsView">
            <div class="container newsCon">
                <article class="card news">
                    <div class="card-body">
                        <h3><?php echo $data['post']->title ?></h3>
                        <div class="caption">
                            <span class="author"><?php echo $data['post']->author ?></span>
                            <span class="date-posted">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.75 14.3572V3.85718C15.75 3.02993 15.0773 2.35718 14.25 2.35718H12.75V0.857178H11.25V2.35718H6.75V0.857178H5.25V2.35718H3.75C2.92275 2.35718 2.25 3.02993 2.25 3.85718V14.3572C2.25 15.1844 2.92275 15.8572 3.75 15.8572H14.25C15.0773 15.8572 15.75 15.1844 15.75 14.3572ZM6.75 12.8572H5.25V11.3572H6.75V12.8572ZM6.75 9.85718H5.25V8.35718H6.75V9.85718ZM9.75 12.8572H8.25V11.3572H9.75V12.8572ZM9.75 9.85718H8.25V8.35718H9.75V9.85718ZM12.75 12.8572H11.25V11.3572H12.75V12.8572ZM12.75 9.85718H11.25V8.35718H12.75V9.85718ZM14.25 6.10718H3.75V4.60718H14.25V6.10718Z" fill="black" fill-opacity="0.6"/>
                                </svg>
                                <span>Posted <?php echo date('h:m A F j' .','. ' Y ', strtotime($data['post']->created_at))?></span>
                                <span class="date-updated">
                                    <?php if($data['post']->lastDateEdited != "0000-00-00 00:00:00"): ?>
                                        Last Updated:<?php echo date('h:m A F j' .','. ' Y ', strtotime($data['post']->lastDateEdited)) ?>
                                    <?php endif; ?>
                                </span>
                            </span>
                        </div>
                        <p class="description">
                        <?php echo $data['post']->description ?>
                        </p>
                    </div>
                    <img class="card-img" src="<?php echo URLROOT;?>/uploads/<?php echo $data['post']->image ?>" alt="">
                </article>
                
            </div>
        </section>
        <section class="moreContent">
            <div class="container additional">
                <a href="<?php echo URLROOT; ?>/pages/news">View more news and articles...</a>
                <h3>Other News and Articles</h3>
                <ul>
                    <?php if(!empty($data['other'])) :?>
                    <?php foreach($data['other'] as $otherNews) : ?>
                    <li>
                        <a href="<?php echo URLROOT ?>/posts/single/<?php echo $otherNews->id ?>"><?php echo $otherNews->title ?></a>
                    </li>
                    <?php endforeach; ?>
                    <?php 
                        else:
                        endif; 
                    ?>
                </ul>
            </div>
        </section>
    </main>
<?php require APPROOT . '/views/inc/footer_u.php'; ?>