<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sport
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $feed_url
 * @property string|null $team_image_url
 * @property string|null $player_image_url
 * @property string|null $competitions_url
 * 
 * @property Collection|Player[] $players
 * @property Collection|Team[] $teams
 * @property Collection|Tournament[] $tournaments
 *
 * @package App\Models
 */
class Sport extends Model
{
	protected $table = 'sports';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'name',
		'slug',
		'feed_url',
		'team_image_url',
		'player_image_url',
		'competitions_url'
	];

	public function players()
	{
		return $this->hasMany(Player::class);
	}

	public function teams()
	{
		return $this->hasMany(Team::class);
	}

	public function tournaments()
	{
		return $this->hasMany(Tournament::class);
	}
}
