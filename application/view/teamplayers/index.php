<div class="container">
    <h1>TeamPlayersController/index</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        
        <?php if ($this->teams) { ?>
            <table class="note-table">
                <thead>
                <tr>
                    <td>Team</td>
                    <td>Players</td>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($this->teams as $key => $value) { ?>
                        <tr>
                            <td><?= $value->team_id; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
          