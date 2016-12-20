<div class="container">
    <h1>PlayerController/edit/:player_id</h1>

    <div class="box">
        <h2>Edit a player</h2>

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <?php if ($this->player) { ?>
            <form method="post" action="<?php echo Config::get('URL'); ?>player/editSave">
                <label>Change text of player: </label>
                <!-- we use htmlentities() here to prevent user input with " etc. break the HTML -->
                <input type="hidden" name="player_id" value="<?php echo htmlentities($this->player->player_id); ?>" />
                <input type="text" name="player_name" value="<?php echo htmlentities($this->player->player_name); ?>" />
                <input type="submit" value='Change' />
            </form>
        <?php } else { ?>
            <p>This player does not exist.</p>
        <?php } ?>
    </div>
</div>
