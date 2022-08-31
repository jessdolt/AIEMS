<?php require APPROOT . '/views/inc/header.php'; ?>
   
<main class="alumni jobPost">
    <section class="heroBox">
        <div class="tint">
            <div class="container">
                <h1 class="heroBoxText">Job Portal</h1>
            </div>
        </div>
    </section>
        <section class="mainContent">
            <div class="container jobCon">
                <h3>
                    Active Job Openings
                </h3>
                <?php foreach($data['active'] as $active): ?>
                <a href="<?php echo URLROOT ?>/job_portals/single/<?php echo $active->id ?>" class="card jobs <?php echo ($active->work_status == 'Full-Time') ? 'fullTime' : 'partTime'?>"> 
                    <div class="card-body">
                        <div class="card-title">
                            <img src="<?php echo URLROOT; ?>/company_logo/<?php echo($active->company_logo); ?>" width="60px" height="60px">
                            <span class="workType <?php echo ($active->work_status == 'Full-Time') ? 'fullTime' : 'partTime'?>"><?php echo $active->work_status?></span>
                        </div>
                        <h3>
                            <?php echo $active->job_title ?>
                            <span class="availablePos">[<?php echo $active->avail_pos?>]</span>
                        </h3>
                        <div class="caption">
                            <p class="compayName"><?php echo $active->company_name ?></p>
                        </div>
                        <span class="date-posted">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.75 14.3572V3.85718C15.75 3.02993 15.0773 2.35718 14.25 2.35718H12.75V0.857178H11.25V2.35718H6.75V0.857178H5.25V2.35718H3.75C2.92275 2.35718 2.25 3.02993 2.25 3.85718V14.3572C2.25 15.1844 2.92275 15.8572 3.75 15.8572H14.25C15.0773 15.8572 15.75 15.1844 15.75 14.3572ZM6.75 12.8572H5.25V11.3572H6.75V12.8572ZM6.75 9.85718H5.25V8.35718H6.75V9.85718ZM9.75 12.8572H8.25V11.3572H9.75V12.8572ZM9.75 9.85718H8.25V8.35718H9.75V9.85718ZM12.75 12.8572H11.25V11.3572H12.75V12.8572ZM12.75 9.85718H11.25V8.35718H12.75V9.85718ZM14.25 6.10718H3.75V4.60718H14.25V6.10718Z"/>
                            </svg>
                            Posted <?php echo time_elapsed_string($active->posted_on); ?>
                        </span>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
            <div class="container jobCon archive">
                <h3>
                    Archive (Past Job Openings)
                </h3>
                <?php foreach($data['archive'] as $archive): ?>
                <a href="<?php echo URLROOT ?>/job_portals/single/<?php echo $archive->id ?>" class="card jobs <?php echo ($archive->work_status == 'Full-Time') ? 'fullTime' : 'partTime' ?>">
                    <div class="card-body">
                        <div class="card-title">
                            <img src="<?php echo URLROOT; ?>/company_logo/<?php echo($archive->company_logo); ?>" width="60px" height="60px">
                            <span class="workType <?php echo ($archive->work_status == 'Full-Time') ? 'fullTime' : 'partTime' ?>"><?php echo $archive->work_status ?></span>
                        </div>
                        <h3>
                        <?php echo $archive->job_title ?>
                            <span class="availablePos">[<?php echo $archive->avail_pos?>]</span>
                        </h3>
                        <div class="caption">
                            <p class="compayName"><?php echo $archive->company_name?></p>
                        </div>
                        <span class="date-posted">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.75 14.3572V3.85718C15.75 3.02993 15.0773 2.35718 14.25 2.35718H12.75V0.857178H11.25V2.35718H6.75V0.857178H5.25V2.35718H3.75C2.92275 2.35718 2.25 3.02993 2.25 3.85718V14.3572C2.25 15.1844 2.92275 15.8572 3.75 15.8572H14.25C15.0773 15.8572 15.75 15.1844 15.75 14.3572ZM6.75 12.8572H5.25V11.3572H6.75V12.8572ZM6.75 9.85718H5.25V8.35718H6.75V9.85718ZM9.75 12.8572H8.25V11.3572H9.75V12.8572ZM9.75 9.85718H8.25V8.35718H9.75V9.85718ZM12.75 12.8572H11.25V11.3572H12.75V12.8572ZM12.75 9.85718H11.25V8.35718H12.75V9.85718ZM14.25 6.10718H3.75V4.60718H14.25V6.10718Z"/>
                            </svg>
                            Posted <?php echo time_elapsed_string($archive->posted_on); ?>
                        </span>
                    </div>
                </a>
                <?php endforeach; ?>

                <div class="card-filter">Show Archive</div>
            </div>
        </section>
    </main>
<?php require APPROOT . '/views/inc/footer_u.php'; ?>
   