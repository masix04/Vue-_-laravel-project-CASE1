<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PlayerTeam
 * 
 * @property int $id
 * @property int $player_id
 * @property int $team_id
 *
 * @package App\Models
 */
class PlayerTeam extends Model
{
	protected $table = 'player_team';
	public $timestamps = false;

	protected $casts = [
		'player_id' => 'int',
		'team_id' => 'int'
	];

	protected $fillable = [
		'player_id',
		'team_id'
	];
	public function players() {
		return $this->belongsTo(Player::class, 'player_id','id');
	}
}
