<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Team
 *
 * @property int $id
 * @property int $sport_id
 * @property int|null $is_published
 * @property string|null $slug
 * @property string $name
 * @property string $name_hindi
 * @property string $short_name
 * @property string $short_name_hindi
 * @property int $image_id
 * @property string|null $country
 * @property string|null $code
 * @property int|null $coach_id
 * @property string|null $logo
 * @property string|null $stadium
 * @property string|null $stadium_hindi
 * @property string $major_honour
 * @property string $major_honour_hindi
 * @property Carbon|null $year_founded
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
 * @property FootballOfficial|null $football_official
 * @property Sport $sport
 * @property Collection|CricInning[] $cric_innings
 * @property Collection|FootballGoal[] $football_goals
 * @property Collection|FootballLineup[] $football_lineups
 * @property FootballMatchCompetitor $football_match_competitor
 * @property Collection|FootballTournamentTable[] $football_tournament_tables
 *
 * @package App\Models
 */
class Team extends Model
{
	protected $table = 'teams';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'sport_id' => 'int',
		'is_published' => 'int',
		'image_id' => 'int',
		'coach_id' => 'int'
	];

	protected $dates = [
		'year_founded'
	];

	protected $fillable = [
		'is_published',
		'slug',
		'name',
		'name_hindi',
		'short_name',
		'short_name_hindi',
		'image_id',
		'country',
		'code',
		'coach_id',
		'logo',
		'stadium',
		'stadium_hindi',
		'major_honour',
		'major_honour_hindi',
		'year_founded',
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

    protected $appends = ['flag'];

    public function getFlagAttribute() {
        return "https://cric.livescoring.cc/teamflags/{$this->id}.png";
        // return asset("/storage/country_flags/{$this->id}.png");
    }

	public function football_official()
	{
		return $this->belongsTo(FootballOfficial::class, 'coach_id');
	}

	public function sport()
	{
		return $this->belongsTo(Sport::class);
	}

	public function cric_innings()
	{
		return $this->hasMany(CricInning::class);
	}

	public function football_goals()
	{
		return $this->hasMany(FootballGoal::class);
	}

	public function football_lineups()
	{
		return $this->hasMany(FootballLineup::class);
	}

	public function football_match_competitor()
	{
		return $this->hasOne(FootballMatchCompetitor::class);
	}

	public function football_tournament_tables()
	{
		return $this->hasMany(FootballTournamentTable::class);
	}
}
