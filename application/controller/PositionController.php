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
        PositionModel::createPosition(Request::post('positions_name'));
        Redirect::to('position');
    }

    public function edit($positions_id)
    {
        $this->View->render('position/edit', array(
            'position' => PositionModel::getPosition($positions_id)
        ));
    }

    public function editSave()
    {
        PositionModel::updatePosition(Request::post('positions_id'), Request::post('positions_name'));
        Redirect::to('position');
    }

      public function delete($positions_id)
    {
        PositionModel::deletePosition($positions_id);
        Redirect::to('position');
    }



}