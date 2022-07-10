<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pivot
 * 
 * @property int $id
 * @property int $source_id
 * @property string|null $type
 *
 * @package App\Models
 */
class Pivot extends Model
{
	protected $table = 'pivots';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'source_id' => 'int'
	];

	protected $fillable = [
		'type'
	];
}
