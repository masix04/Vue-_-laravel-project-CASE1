<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tournament
 * 
 * @property int $id
 * @property int $sport_id
 * @property int|null $is_published
 * @property string|null $slug
 * @property string $name
 * @property string $name_hindi
 * @property int|null $country
 * @property int|null $gender
 * @property string|null $category
 * @property string|null $season
 * @property string|null $tournament_system
 * @property int|null $football_category_id
 * @property int|null $football_league_id
 * 
 * @property Sport $sport
 * @property FootballCategory|null $football_category
 * @property FootballLeague|null $football_league
 * @property Collection|FootballMatch[] $football_matches
 * @property Collection|FootballTournamentTable[] $football_tournament_tables
 *
 * @package App\Models
 */
class Tournament extends Model
{
	protected $table = 'tournaments';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'sport_id' => 'int',
		'is_published' => 'int',
		'country' => 'int',
		'gender' => 'int',
		'football_category_id' => 'int',
		'football_league_id' => 'int'
	];

	protected $fillable = [
		'is_published',
		'slug',
		'name',
		'name_hindi',
		'country',
		'gender',
		'category',
		'season',
		'tournament_system',
		'football_category_id',
		'football_league_id'
	];

	public function sport()
	{
		return $this->belongsTo(Sport::class);
	}

	public function football_category()
	{
		return $this->belongsTo(FootballCategory::class);
	}

	public function football_league()
	{
		return $this->belongsTo(FootballLeague::class);
	}

	public function football_matches()
	{
		return $this->hasMany(FootballMatch::class);
	}

	public function football_tournament_tables()
	{
		return $this->hasMany(FootballTournamentTable::class);
	}
}
