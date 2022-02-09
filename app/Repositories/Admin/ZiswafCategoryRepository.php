<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ZiswafCategory;
use App\Repositories\BaseRepository;

/**
 * Class ZiswafCategoryRepository
 * @package App\Repositories\Admin
 * @version February 9, 2022, 5:37 pm UTC
*/

class ZiswafCategoryRepository extends BaseRepository
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
        return ZiswafCategory::class;
    }
}
