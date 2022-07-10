<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\PlayerTeam;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getDuplicatePlayers() {

        $data['title'] = 'duplicate_players';
        $data['code'] = 200;
        $data['message'] = 'success';
        
        $data['data']['duplicate_players']['count'] = PlayerTeam::selectRaw('count(player_id) as players_count')->groupBy('player_id')->having('players_count','>',2)->get();
        $data['data']['duplicate_players']['player_ids'] = PlayerTeam::select('player_id')->groupBy('player_id')->havingRaw('count(player_id) > 2')->get();
        $data['data']['duplicate_players']['players'] = PlayerTeam::with(['players'=> function($q) {
                                        $q->select('id','slug','name');
                                    }])
                                    ->whereIn('player_id',$data['data']['duplicate_players']['player_ids'])->select('id as player_team_id','player_id','team_id')->orderBy('player_id')->limit(100)->get();

        return response()->json($data);
    }
    public function deleteDuplicatePlayers(Request $request) {

        $data['title'] = 'Delete Duplicate PLAYER';
        $data['code'] = 200;
        $data['message'] = 'success';

        // $DeleteCheck = PlayerTeam::where('id',$request->player_team_id)->delete();
        $data['deleted'] = DB::delete("DELETE from `player_team` where `id` = '".$request->player_team_id."'");
        $data['save'] = PlayerTeam::create(['id' => 199997, 'player_id' => 468, 'team_id' => 48])->save();

        $data['save'] = (($data['save'] == 1)? TRUE : FALSE);
        $data['deleted'] = (($data['deleted'] == 1)? TRUE : FALSE);

        // PlayerTeam::where('player_id',$request->player_id)->where('team_id',$request->team_id)->delete();

        return response()->json($data);

        // return returnResponse(200, $data, 'Delete Duplicate Player');
    }

    public function editDuplicatePlayers(Request $request) {

        $data['title'] = 'Updated Duplicate PLAYER';
        $data['code'] = 200;
        $data['message'] = 'success';

        $data['updated'] = PlayerTeam::where('id',200000)->update(['player_id' => 469, 'team_id' => 50])->save();

        return response()->json($data);

        // return returnResponse(200, $data, 'Updated Duplicate PLAYER');
    }
}
