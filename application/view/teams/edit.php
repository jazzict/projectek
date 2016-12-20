<div class="container">
    <h1>TeamController/edit/:team_id</h1>

    <div class="box">
        <h2>Edit a team</h2>

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <?php if ($this->team) { ?>
            <form method="post" action="<?php echo Config::get('URL'); ?>team/editSave">
                <label>Change text of team: </label>
                <!-- we use htmlentities() here to prevent user input with " etc. break the HTML -->
                <input type="hidden" name="team_id" value="<?php echo htmlentities($this->team->team_id); ?>" />
                <input type="text" name="team_name" value="<?php echo htmlentities($this->team->team_name); ?>" />
                <input type="submit" value='Change' />
            </form>
        <?php } else { ?>
            <p>This team does not exist.</p>
        <?php } ?>
    </div>
</div>
