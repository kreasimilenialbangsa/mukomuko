<?php

namespace App\Repositories\Admin;

use App\Models\Admin\News;
use App\Repositories\BaseRepository;

/**
 * Class NewsRepository
 * @package App\Repositories\Admin
 * @version February 9, 2022, 7:04 am UTC
*/

class NewsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'title',
        'content',
        'category_id',
        'is_active',
        'is_highlight'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return News::class;
    }
}
