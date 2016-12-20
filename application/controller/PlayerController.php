<?php 

class PlayerController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->View->render('player/index', array(
			'players' => PlayerModel::getAllPlayers(),
			'teams' => TeamsModel::getAllTeams(),
			'positions' => PositionModel::getAllPositions()
			));
	}
	public function create()
    {
        PlayerModel::createPlayer(Request::post('player_name'));
        Redirect::to('player');
    }

    public function edit($player_id)
    {
        $this->View->render('player/edit', array(
            'player' => PlayerModel::getPlayer($player_id)
        ));
    }

    public function editSave()
    {
        PlayerModel::updatePlayer(Request::post('player_id'), Request::post('player_name'));
        Redirect::to('player');
    }

      public function delete($player_id)
    {
        PlayerModel::deletePlayer($player_id);
        Redirect::to('player');
    }



}