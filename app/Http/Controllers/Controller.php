<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Player;
use App\Models\PlayerTeam;
use App\Models\TournamentTeam;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getDuplicatePlayers() {

        $data['title'] = 'duplicate_players';
        $data['code'] = 200;
        $data['message'] = 'success';

        $data['data']['duplicate_players']['count'] = PlayerTeam::selectRaw('count(player_id) as players_count')->groupBy('player_id','team_id')->having('players_count','>',1)->get();
        $data['data']['duplicate_players']['player_ids'] = PlayerTeam::select('team_id','player_id')->groupBy('player_id','team_id')->havingRaw('count(player_id) > 1')->get();
        $data['data']['duplicate_players']['players'] = PlayerTeam::with(['players'=> function($q) {
                                        $q->select('id','slug','name');
                                    }])
                                    ->whereIn('player_id',$data['data']['duplicate_players']['player_ids'])
                                    ->select('id as player_team_id','player_id','team_id')->orderBy('player_id')->orderBy('team_id')->limit(100)->get();

        return response()->json($data);
    }

    public function deleteDuplicatePlayers(Request $request) {

        $data['title'] = 'Delete Duplicate PLAYER';
        $data['code'] = 200;
        $data['message'] = 'success';
        $data['data'] = $request->player_team_id;
        // $DeleteCheck = PlayerTeam::where('id',$request->player_team_id)->delete();
        $data['deleted'] = DB::delete("DELETE from `player_team` where `id` = '".$request->player_team_id."'");
        // $data['save'] = PlayerTeam::create(['id' => 199997, 'player_id' => 468, 'team_id' => 48])->save();

        // $data['save'] = (($data['save'] == 1)? TRUE : FALSE);
        $data['deleted'] = (($data['deleted'] == 1)? TRUE : FALSE);

        // PlayerTeam::where('player_id',$request->player_id)->where('team_id',$request->team_id)->delete();

        return response()->json($data);

        // return returnResponse(200, $data, 'Delete Duplicate Player');
    }

    public function editDuplicatePlayers(Request $request) {

        $data['title'] = 'Updated Duplicate PLAYER';
        $data['code'] = 200;
        $data['message'] = 'success';

        // $data['updated'] = PlayerTeam::where('id',$request->team_id)->update(['name' => $request->name, 'slug' => $request->slug])->save();
        $data['updated'] = Player::where('id',$request->player_id)->update(['name' => $request->name, 'slug' => $request->slug]);

        return response()->json($data);

        // return returnResponse(200, $data, 'Updated Duplicate PLAYER');
    }

/** ------------------------------------------------------------------------   */


    public function getDuplicateTeams() {

        $data['title'] = 'duplicate_teams';
        $data['code'] = 200;
        $data['message'] = 'success';

        $data['data']['duplicate_teams']['count'] = TournamentTeam::selectRaw('count(team_id) as teams_count')->groupBy('team_id','tournament_id')->having('teams_count','>',1)->get();
        $data['data']['duplicate_teams']['team_ids'] = TournamentTeam::select('tournament_id','team_id')->groupBy('team_id','tournament_id')->havingRaw('count(team_id) > 1')->get();
        $data['data']['duplicate_teams']['teams'] = [];

        /** IF there is any Data */
        if( sizeof($data['data']['duplicate_teams']['team_ids']) > 0) {
            $teams = TournamentTeam::query();

            $teams = $teams->with(['teams'=> function($q) {
                                            $q->select('id','slug','name','code');
                                        }]);
                                        /** If there are many teams then use WHEREIN */
                                        if(sizeof($data['data']['duplicate_teams']['team_ids']) > 1) {
                                            $teams->whereIn('team_id', $data['data']['duplicate_teams']['team_ids']);
                                        }
                                        /** ELSE use WHERE */
                                        else {
                                            $teams->where('team_id', $data['data']['duplicate_teams']['team_ids'][0]['team_id']);
                                        }
            $data['data']['duplicate_teams']['teams'] = $teams->select('id as tour_team_id','tournament_id','team_id')
                                                                ->orderBy('team_id')->orderBy('tournament_id')->get();
        }

        return response()->json($data);
    }

    public function deleteDuplicateTeams(Request $request) {

        $data['title'] = 'Delete Duplicate TEAM';
        $data['code'] = 200;
        $data['message'] = 'success';
        $data['data'] = $request->tour_team_id;
        // $DeleteCheck = TournamentTeam::where('id',$request->tour_team_id)->delete();
        $data['deleted'] = DB::delete("DELETE from `tournament_team` where `id` = '".$request->tour_team_id."'");
        // $data['save'] = TournamentTeam::create(['id' => 199997, 'tournament_id' => 468, 'team_id' => 48])->save();

        // $data['save'] = (($data['save'] == 1)? TRUE : FALSE);
        $data['deleted'] = (($data['deleted'] == 1)? TRUE : FALSE);

        // TournamentTeam::where('team_id',$request->team_id)->where('team_id',$request->team_id)->delete();

        return response()->json($data);

        // return returnResponse(200, $data, 'Delete Duplicate Team');
    }

    public function editDuplicateTeams(Request $request) {

        // dd($request->name, $request->slug, $request->team_id, $request->tournament_id);

        $data['title'] = 'Updated Duplicate TEAM';
        $data['code'] = 200;
        $data['message'] = 'success';

        $data['updated'] = Team::where('id',$request->team_id)->update(['name' => $request->name, 'slug' => $request->slug]);

        return response()->json($data);

        // return returnResponse(200, $data, 'Updated Duplicate TEAM');
    }
}
