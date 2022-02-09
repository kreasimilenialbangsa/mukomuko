<?php

namespace App\Repositories\Admin;

use App\Models\Admin\ProgramCategory;
use App\Repositories\BaseRepository;

/**
 * Class ProgramCategoryRepository
 * @package App\Repositories\Admin
 * @version February 9, 2022, 5:36 pm UTC
*/

class ProgramCategoryRepository extends BaseRepository
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
        return ProgramCategory::class;
    }
}
