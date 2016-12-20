<?php

class TeamsModel
{
    public static function getAllTeams()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM teams ";
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public static function getTeam($team_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT team_id, team_name FROM teams WHERE team_id=$team_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':team_id' => $team_id));

        return $query->fetch();
    }

    public static function createTeam($team_name)
    {
        if (!$team_name || strlen($team_name) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_TEAM_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO teams (team_name) VALUES (:team_name)";
        $query = $database->prepare($sql);
        $query->execute(array(':team_name' => $team_name));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_TEAM_CREATION_FAILED'));
        return false;
    }

    public static function updateTeam($team_id, $team_name)
    {
        if (!$team_id || !$team_name) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE teams SET team_name = :team_name WHERE team_id = :team_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':team_id' => $team_id, ':team_name' => $team_name));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_TEAM_EDITING_FAILED'));
        return false;
    }

    public static function deleteTeam($team_id)
    {
        if (!$team_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM teams WHERE team_id = :team_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':team_id' => $team_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_TEAM_DELETION_FAILED'));
        return false;
    }


    public static function getAllPlayersFromTeam($team_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM players WHERE team_id=$team_id ";
        $query = $database->prepare($sql);
        $query->execute(array(':team_id' => $team_id));

        return $query->fetchAll();
    }
 


}
