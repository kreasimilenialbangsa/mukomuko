<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Ziswaf;
use App\Repositories\BaseRepository;

/**
 * Class ZiswafRepository
 * @package App\Repositories\Admin
 * @version February 9, 2022, 5:26 pm UTC
*/

class ZiswafRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'category_id',
        'title',
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
        return Ziswaf::class;
    }
}
