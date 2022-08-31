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
        

</body>
</html>