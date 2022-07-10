<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TeamSubject
 * 
 * @property int $id
 * @property int $sport_id
 * @property int $team_id
 * @property int $subject_id
 *
 * @package App\Models
 */
class TeamSubject extends Model
{
	protected $table = 'team_subjects';
	public $timestamps = false;

	protected $casts = [
		'sport_id' => 'int',
		'team_id' => 'int',
		'subject_id' => 'int'
	];

	protected $fillable = [
		'sport_id',
		'team_id',
		'subject_id'
	];
}
