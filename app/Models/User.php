<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $image
 * @property string|null $phone
 * @property string $email
 * @property Carbon|null $phone_verified_at
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $type
 * @property string|null $locale
 * @property string|null $address
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|AccessToken[] $access_tokens
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';

	protected $dates = [
		'phone_verified_at',
		'email_verified_at'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'slug',
		'image',
		'phone',
		'email',
		'phone_verified_at',
		'email_verified_at',
		'password',
		'type',
		'locale',
		'address',
		'status'
	];

	public function access_tokens()
	{
		return $this->hasMany(AccessToken::class);
	}
}
