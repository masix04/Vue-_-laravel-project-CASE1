<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TournamentTeam
 * 
 * @property int $id
 * @property int $tournament_id
 * @property int $team_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TournamentTeam extends Model
{
	protected $table = 'tournament_team';

	protected $casts = [
		'tournament_id' => 'int',
		'team_id' => 'int'
	];

	protected $fillable = [
		'tournament_id',
		'team_id'
	];
}
