<?php

namespace App\Repositories\Admin;

use App\Models\Admin\SupportServiceCategory;
use App\Repositories\BaseRepository;

/**
 * Class SupportServiceCategoryRepository
 * @package App\Repositories\Admin
 * @version April 12, 2022, 12:23 pm WIB
*/

class SupportServiceCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'name',
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
        return SupportServiceCategory::class;
    }
}
