<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
// use App\Http\helpers;

/**
 * Class Player
 *
 * @property int $id
 * @property int $sport_id
 * @property int|null $is_published
 * @property string|null $slug
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $name
 * @property string $name_hindi
 * @property string $short_name
 * @property string $short_name_hindi
 * @property int $image_id
 * @property int|null $country_id
 * @property string|null $gender
 * @property int|null $active
 * @property Carbon|null $dob
 * @property Carbon|null $dod
 * @property float|null $weight
 * @property float|null $height
 * @property string|null $batting_style
 * @property string|null $bowling_style
 * @property string|null $nick
 * @property string|null $birth_place
 * @property string $birth_place_hindi
 * @property string|null $education
 * @property string|null $role
 * @property string $twitter
 * @property string $snapchat
 * @property string $insta
 * @property string $fb
 * @property string $website
 * @property string $description
 * @property string $description_hindi
 * @property string $meta_description
 * @property string $meta_description_hindi
 * @property string $stand_first
 * @property string $stand_first_hindi
 *
 * @property Sport $sport
 * @property Collection|FootballLineup[] $football_lineups
 *
 * @package App\Models
 */
class Player extends Model
{
	protected $table = 'players';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'sport_id' => 'int',
		'is_published' => 'int',
		'image_id' => 'int',
		'country_id' => 'int',
		'active' => 'int',
		'weight' => 'float',
		'height' => 'float'
	];

	protected $dates = [
		'dob',
		'dod'
	];

	protected $fillable = [
		'is_published',
		'slug',
		'firstname',
		'lastname',
		'name',
		'name_hindi',
		'short_name',
		'short_name_hindi',
		'image_id',
		'country_id',
		'gender',
		'active',
		'dob',
		'dod',
		'weight',
		'height',
		'batting_style',
		'bowling_style',
		'nick',
		'birth_place',
		'birth_place_hindi',
		'education',
		'role',
		'twitter',
		'snapchat',
		'insta',
		'fb',
		'website',
		'description',
		'description_hindi',
		'meta_description',
		'meta_description_hindi',
		'stand_first',
		'stand_first_hindi'
	];
	protected $appends = ['short_name','avatar'];

	public function getShortNameAttribute()
	{
		// return getShortName($this->name ?? '');
		return ;
	}

	public function getAvatarAttribute()
	{
		return "https://img.sixlogics.com/avatars/cricket/players/300x300/{$this->id}.png";
	}

	public function sport()
	{
		return $this->belongsTo(Sport::class);
	}

	public function football_lineups()
	{
		return $this->hasMany(FootballLineup::class);
	}
}
