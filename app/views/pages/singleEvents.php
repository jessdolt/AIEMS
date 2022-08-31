<?php require APPROOT . '/views/inc/header.php'; ?>
<main class="alumni alumniNews">
        <section class="mainContent newsView">
            <div class="container newsCon">
                <article class="card news">
                    <div class="card-body">
                        <h3><?php echo $data['events']->title ?></h3>
                        <div class="caption">
                            <span class="date-posted">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.75 14.3572V3.85718C15.75 3.02993 15.0773 2.35718 14.25 2.35718H12.75V0.857178H11.25V2.35718H6.75V0.857178H5.25V2.35718H3.75C2.92275 2.35718 2.25 3.02993 2.25 3.85718V14.3572C2.25 15.1844 2.92275 15.8572 3.75 15.8572H14.25C15.0773 15.8572 15.75 15.1844 15.75 14.3572ZM6.75 12.8572H5.25V11.3572H6.75V12.8572ZM6.75 9.85718H5.25V8.35718H6.75V9.85718ZM9.75 12.8572H8.25V11.3572H9.75V12.8572ZM9.75 9.85718H8.25V8.35718H9.75V9.85718ZM12.75 12.8572H11.25V11.3572H12.75V12.8572ZM12.75 9.85718H11.25V8.35718H12.75V9.85718ZM14.25 6.10718H3.75V4.60718H14.25V6.10718Z" fill="black" fill-opacity="0.6"/>
                                </svg>
                                <span>Posted <?php echo date('h:m A F j' .','. ' Y ', strtotime($data['events']->created_at))?></span>
                            </span>
                        </div>
                        <p class="description">
                        <?php echo $data['events']->description ?>
                        </p>
                    </div>
                    <img class="card-img" src="<?php echo URLROOT;?>/uploads/<?php echo $data['events']->image ?>" alt="">
                </article>
                
            </div>
        </section>
        <section class="moreContent">
            <div class="container additional">
                <a href="<?php echo URLROOT; ?>/pages/events">View more events...</a>
                <h3>Other Events</h3>
                <ul>
                <?php if(!empty($data['other'])) :?>
                <?php foreach($data['other'] as $otherEvents) : ?>
                    <li>
                        <a href="<?php echo URLROOT ?>/events/single/<?php echo $otherEvents->id?>"><?php echo $otherEvents->title ?></a>
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