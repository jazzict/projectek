<div class="container">
    <h1><?php echo $this->team->team_name; ?></h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <?php if ($this->players) { ?>
            <table class="note-table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>NAME</td>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($this->players as $key => $value) { ?>
                        <tr>
                            <td><?= $value->player_id; ?></td>
                            <td><?= $value->player_name; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No players in this team yet, add some!</p>
        <?php } ?>
            <form>
            Add player:<br>
            <input type="text" name="player">
            <input type="submit">
            </form>             
            
    </div>
</div>