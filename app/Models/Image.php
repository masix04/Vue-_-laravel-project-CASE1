<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * 
 * @property int $id
 * @property string $title
 * @property string|null $blurb
 * @property string $file_name
 * @property string|null $caption
 * @property string|null $caption_hindi
 * @property bool $status
 * @property bool|null $is_feed
 * @property string|null $feed_image_id
 * @property string|null $feed_watermarked_url
 * @property int|null $uploader_id
 * @property string|null $keywords
 * @property string|null $keywords_hindi
 * @property string|null $credit
 * @property string|null $credit_hindi
 * @property string|null $crop_area
 * @property string|null $raw_crop_area
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Admin|null $admin
 * @property Collection|Admin[] $admins
 * @property Collection|ArticleReorder[] $article_reorders
 * @property Collection|Article[] $articles
 * @property Collection|Gallery[] $galleries
 * @property Collection|GalleryItem[] $gallery_items
 * @property Collection|Poll[] $polls
 * @property Collection|Profile[] $profiles
 * @property Collection|Survey[] $surveys
 * @property Collection|Video[] $videos
 *
 * @package App\Models
 */
class Image extends Model
{
	protected $table = 'images';

	protected $casts = [
		'status' => 'bool',
		'is_feed' => 'bool',
		'uploader_id' => 'int'
	];

	protected $fillable = [
		'title',
		'blurb',
		'file_name',
		'caption',
		'caption_hindi',
		'status',
		'is_feed',
		'feed_image_id',
		'feed_watermarked_url',
		'uploader_id',
		'keywords',
		'keywords_hindi',
		'credit',
		'credit_hindi',
		'crop_area',
		'raw_crop_area'
	];

	public function admin()
	{
		return $this->belongsTo(Admin::class, 'uploader_id');
	}

	public function admins()
	{
		return $this->hasMany(Admin::class);
	}

	public function article_reorders()
	{
		return $this->hasMany(ArticleReorder::class);
	}

	public function articles()
	{
		return $this->hasMany(Article::class);
	}

	public function galleries()
	{
		return $this->hasMany(Gallery::class, 'cover_image_id');
	}

	public function gallery_items()
	{
		return $this->hasMany(GalleryItem::class);
	}

	public function polls()
	{
		return $this->hasMany(Poll::class);
	}

	public function profiles()
	{
		return $this->hasMany(Profile::class);
	}

	public function surveys()
	{
		return $this->hasMany(Survey::class);
	}

	public function videos()
	{
		return $this->hasMany(Video::class, 'related_image_id');
	}
}
