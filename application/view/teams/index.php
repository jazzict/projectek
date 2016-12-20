<div class="container">
    <h1>TeamsController/index</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        
            <form method="post" action="<?php echo Config::get('URL');?>teams/create">
                <label>New team: </label><input type="text" name="team_name" />
                <input type="submit" value='Create this team' autocomplete="off" />
            </form>
        </p>

        <?php if ($this->teams) { ?>
            <table class="note-table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>EDIT</td>
                    <td>DELETE</td>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($this->teams as $key => $value) { ?>
                        <tr>
                            <td><?= $value->team_id; ?></td>
                            <td><a href="<?= Config::get('URL') . 'teams/read/' . $value->team_id?> "> <?= htmlentities($value->team_name); ?></a></td>
                            <td><a href="<?= Config::get('URL') . 'teams/edit/' . $value->team_id; ?>">Edit</a></td>
                            <td><a href="<?= Config::get('URL') . 'teams/delete/' . $value->team_id; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { ?>
                <div>No teams yet. Create some !</div>
            <?php } ?>
    </div>
</div>
