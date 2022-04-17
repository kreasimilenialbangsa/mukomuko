<?php

namespace App\Repositories\Admin;

use App\Models\Admin\OutcomeCategory;
use App\Repositories\BaseRepository;

/**
 * Class OutcomeCategoryRepository
 * @package App\Repositories\Admin
 * @version April 14, 2022, 1:13 pm WIB
*/

class OutcomeCategoryRepository extends BaseRepository
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
        return OutcomeCategory::class;
    }
}
