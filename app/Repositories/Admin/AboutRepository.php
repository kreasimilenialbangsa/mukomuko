<?php

namespace App\Repositories\Admin;

use App\Models\Admin\About;
use App\Repositories\BaseRepository;

/**
 * Class AboutRepository
 * @package App\Repositories\Admin
 * @version February 9, 2022, 7:23 am UTC
*/

class AboutRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'title',
        'description',
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
        return About::class;
    }
}
