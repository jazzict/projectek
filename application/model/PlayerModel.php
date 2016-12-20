<?php

class PlayerModel
{
    public static function getAllPlayers()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM players ";
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public static function getPlayer($player_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT player_id, player_name FROM players WHERE player_id=$player_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':player_id' => $player_id));

        return $query->fetch();
    }

    public static function createPlayer($player_name)
    {
        if (!$player_name || strlen($player_name) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_PLAYER_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();
        $player_name = strip_tags($player_name);
            //$_POST["team_id"]);
        $sql = "INSERT INTO players (player_name, team_id) VALUES (:player_name, 5)";
        $query = $database->prepare($sql);
        $query->execute(array(':player_name' => $player_name));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_PLAYER_CREATION_FAILED'));
        return false;
    }

    public static function updatePlayer($player_id, $player_name)
    {
        if (!$player_id || !$player_name) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE players SET player_name = :player_name WHERE player_id = :player_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':player_id' => $player_id, ':player_name' => $player_name));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_PLAYER_EDITING_FAILED'));
        return false;
    }

        public static function deletePlayer($player_id)
    {
        if (!$player_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM players WHERE player_id = :player_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':player_id' => $player_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_PLAYER_DELETION_FAILED'));
        return false;
    }
}
