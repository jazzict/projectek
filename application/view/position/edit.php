<div class="container">
    <h1>PositionController/edit/:positions_id</h1>

    <div class="box">
        <h2>Edit a position</h2>

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <?php if ($this->position) { ?>
            <form method="post" action="<?php echo Config::get('URL'); ?>position/editSave">
                <label>Change text of position: </label>
                <!-- we use htmlentities() here to prevent user input with " etc. break the HTML -->
                <input type="hidden" name="positions_id" value="<?php echo htmlentities($this->position->positions_id); ?>" />
                <input type="text" name="positions_name" value="<?php echo htmlentities($this->position->positions_name); ?>" />
                <input type="submit" value='Change' />
            </form>
        <?php } else { ?>
            <p>This position does not exist.</p>
        <?php } ?>
    </div>
</div>
