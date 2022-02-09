<?php

namespace App\Repositories\Admin;

use App\Models\Admin\NewsCategory;
use App\Repositories\BaseRepository;

/**
 * Class NewsCategoryRepository
 * @package App\Repositories\Admin
 * @version February 9, 2022, 5:35 pm UTC
*/

class NewsCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'title',
        'slug'
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
        return NewsCategory::class;
    }
}
