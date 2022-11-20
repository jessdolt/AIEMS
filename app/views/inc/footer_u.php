<footer class="mainFooter">
        <h1>
            <?= empty($_SESSION['schoolname']) ? "AIEMS" : $_SESSION['schoolname'];?>
            <br>
            <span>Alumni Information and Event Management System</span>
        </h1>
        <hr>
        <ul class="links">
            <li class="link-item"><a href="<?php echo URLROOT; ?>/pages/home">Home</a></li>
            <li class="link-item"><a href="<?php echo URLROOT; ?>/pages/news">News</a></li>
            <li class="link-item"><a href="<?php echo URLROOT; ?>/pages/events">Events</a></li>
            <li class="link-item"><a href="<?php echo URLROOT; ?>/pages/job_portals">Jobs</a></li>
            <li class="link-item"><a href="<?php echo URLROOT; ?>/pages/forum">Forum</a></li>
            <li class="link-item"><a href="<?php echo URLROOT;?>/pages/gallery">Gallery</a></li>
        </ul>
        <p>Copyright ©2021. All rights reserved</p>
    </footer>
</body>
</html>