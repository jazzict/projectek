<?php 

class TeamsController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->View->render('teams/index', array(
			'teams' => TeamsModel::getAllTeams()
			));
	}
	public function create()
    {
        TeamsModel::createTeam(Request::post('team_name'));
        Redirect::to('teams');
    }

    public function edit($team_id)
    {
        $this->View->render('teams/edit', array(
            'teams' => TeamsModel::getTeam($team_id)
        ));
    }

    public function editSave()
    {
        TeamsModel::updateTeam(Request::post('team_id'), Request::post('team_name'));
        Redirect::to('teams');
    }

      public function delete($team_id)
    {
        TeamsModel::deleteTeam($team_id);
        Redirect::to('teams');
    }

    public function read($team_id)
    {
        $this->View->render('teams/read', array(
            'team' => TeamsModel::getTeam($team_id),
            'players' => TeamsModel::getAllPlayersFromTeam($team_id)
            ));
    }

}