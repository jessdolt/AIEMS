<div class="add-dept">
            <h3>Add Department</h3>
            <form action="<?php echo URLROOT;?>/group/new_dept" method="POST">
                <label for="dept_name">Department Name</label>
                <input type="text" name="dept_name">
                <label for="dept_code">Department Code</label>
                <input type="text" name="dept_code">
                <input type="submit" value='Submit'>
            </form>
        </div>
        <script src="<?php echo URLROOT;?>/js/index.js" defer></script>