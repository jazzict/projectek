<?php

class PositionModel
{
    public static function getAllPositions()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM positions ";
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public static function getPosition($positions_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT positions_id, positions_name FROM positions WHERE positions_id=$positions_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':positions_id' => $positions_id));

        return $query->fetch();
    }

    public static function createPosition($positions_name)
    {
        if (!$positions_name || strlen($positions_name) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_POSITION_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();
        $positions_name = strip_tags($positions_name);
            //$_POST["team_id"]);
        $sql = "INSERT INTO positions (positions_name) VALUES (:positions_name )";
        $query = $database->prepare($sql);
        $query->execute(array(':positions_name' => $positions_name));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_POSITION_CREATION_FAILED'));
        return false;
    }

    public static function updatePosition($positions_id, $positions_name)
    {
        if (!$positions_id || !$positions_name) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE positions SET positions_name = :positions_name WHERE positions_id = :positions_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':positions_id' => $positions_id, ':positions_name' => $positions_name));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_POSITION_EDITING_FAILED'));
        return false;
    }

        public static function deletePosition($positions_id)
    {
        if (!$positions_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM positions WHERE positions_id = :positions_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':positions_id' => $positions_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_POSITION_DELETION_FAILED'));
        return false;
    }
}


/*class PositionModel
{
    public static function getAllPositions()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM positions ";
        $query = $database->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public static function getPosition($position_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT position_id, position_name FROM positions WHERE position_id=$position_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':position_id' => $position_id));

        return $query->fetch();
    }

    public static function createPosition($position_name)
    {
        if (!$position_name || strlen($position_name) == 0) {
            Session::add('feedback_negative', Text::get('FEEDBACK_POSITION_CREATION_FAILED'));
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();
        $position_name = strip_tags($position_name);
            //$_POST["team_id"]);
        $sql = "INSERT INTO positions (position_name, team_id) VALUES (:position_name, 5)";
        $query = $database->prepare($sql);
        $query->execute(array(':position_name' => $position_name));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_POSITION_CREATION_FAILED'));
        return false;
    }

    public static function updatePosition($position_id, $position_name)
    {
        if (!$position_id || !$position_name) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE positions SET position_name = :position_name WHERE position_id = :position_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':position_id' => $position_id, ':position_name' => $position_name));

        if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_POSITION_EDITING_FAILED'));
        return false;
    }

        public static function deletePosition($position_id)
    {
        if (!$position_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM positions WHERE position_id = :position_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':position_id' => $position_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_POSITION_DELETION_FAILED'));
        return false;
    }
}
*/