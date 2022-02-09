<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Program;
use App\Repositories\BaseRepository;

/**
 * Class ProgramRepository
 * @package App\Repositories\Admin
 * @version February 9, 2022, 5:23 pm UTC
*/

class ProgramRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'title',
        'location',
        'target_dana',
        'end_date',
        'category_id',
        'description',
        'image',
        'is_active'
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
        return Program::class;
    }
}
