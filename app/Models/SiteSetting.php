<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SiteSetting
 * 
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property string|null $value_hindi
 * @property string $type
 * @property string $lable
 * @property string|null $placeholder
 * @property string|null $group
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class SiteSetting extends Model
{
	protected $table = 'site_settings';

	protected $fillable = [
		'key',
		'value',
		'value_hindi',
		'type',
		'lable',
		'placeholder',
		'group'
	];
}
