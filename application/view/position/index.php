<div class="container">
    <h1>PositionController/index</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        
            <form method="post" action="<?php echo Config::get('URL');?>position/create">
                <label>New position: </label><input type="text" name="position_name" />
                

                <input  value="Voeg toe" type="submit" player='Create this position' autocomplete="off" />

            </form>
        </p>

        <?php if ($this->positions) { ?>
            <table class="note-table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>POSITION</td>
                    <td>EDIT</td>
                    <td>DELETE</td>
                </tr>
                </thead>
                <tbody>
                 <?php foreach ($this->positions as $position) { ?>
                            <td><?= $position->positions_id; ?></td>
                            <td><?= htmlentities($position->positions_name); ?></td>
                           
                                
                            <td><a href="<?= Config::get('URL') . 'position/edit/' . $position->positions_id; ?>">Edit</a></td>
                            <td><a href="<?= Config::get('URL') . 'position/delete/' . $position->positions_id; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { ?>
                <div>No positions yet. Create some !</div>
            <?php } ?>
    </div>
</div>
