<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App\Models\Admin
 * @version February 9, 2022, 7:04 am UTC
 *
 * @property string $file
 * @property integer $news_id
 */
class NewsImage extends Model
{
    use HasFactory;

    public $table = 'news_images';

    public $fillable = [
        'file',
        'news_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'file' => 'string',
        'news_id' => 'integer',
    ];
}
