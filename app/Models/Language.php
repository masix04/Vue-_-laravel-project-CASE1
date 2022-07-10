<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Language
 * 
 * @property int $id
 * @property string $name
 * @property string|null $code
 * 
 * @property Collection|Country[] $countries
 * @property Collection|CricCountry[] $cric_countries
 *
 * @package App\Models
 */
class Language extends Model
{
	protected $table = 'languages';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'code'
	];

	public function countries()
	{
		return $this->hasMany(Country::class);
	}

	public function cric_countries()
	{
		return $this->hasMany(CricCountry::class);
	}
}
