<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PlayerSubject
 * 
 * @property int $id
 * @property int $sport_id
 * @property int $player_id
 * @property int $subject_id
 *
 * @package App\Models
 */
class PlayerSubject extends Model
{
	protected $table = 'player_subjects';
	public $timestamps = false;

	protected $casts = [
		'sport_id' => 'int',
		'player_id' => 'int',
		'subject_id' => 'int'
	];

	protected $fillable = [
		'sport_id',
		'player_id',
		'subject_id'
	];
}
