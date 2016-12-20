<?php 

class PositionController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->View->render('position/index', array(
			'players' => PlayerModel::getAllPlayers(),
			'teams' => TeamsModel::getAllTeams(),
			'positions' => PositionModel::getAllPositions()
			));
	}
	public function create()
    {
        PlayerModel::createPosition(Request::post('position_name'));
        Redirect::to('position');
    }

    public function edit($position_id)
    {
        $this->View->render('position/edit', array(
            'position' => PositionModel::getPosition($position_id)
        ));
    }

    public function editSave()
    {
        PositionModel::updatePosition(Request::post('position_id'), Request::post('position_name'));
        Redirect::to('position');
    }

      public function delete($position_id)
    {
        PositionModel::deletePosition($position_id);
        Redirect::to('position');
    }



}