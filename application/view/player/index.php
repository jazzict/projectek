<div class="container">
    <h1>PlayersController/index</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        
            <form method="post" action="<?php echo Config::get('URL');?>player/create">
                <label>New player: </label><input type="text" name="player_name" />
                <label>Team: </label><select> <option value="5"> 5 </option><option value="8"> 8 </option>    </select>

                <input type="submit" player='Create this player' autocomplete="off" />

            </form>
        </p>

        <?php if ($this->players) { ?>
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
                 <?php foreach ($this->players as $player) { ?>
                            <td><?= $player->player_id; ?></td>
                            <td><?= htmlentities($player->player_name); ?></td>
                           
                                
                            <td><a href="<?= Config::get('URL') . 'player/edit/' . $player->player_id; ?>">Edit</a></td>
                            <td><a href="<?= Config::get('URL') . 'player/delete/' . $player->player_id; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { ?>
                <div>No players yet. Create some !</div>
            <?php } ?>
    </div>
</div>
