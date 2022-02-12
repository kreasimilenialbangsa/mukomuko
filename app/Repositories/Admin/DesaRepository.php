<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Desa;
use App\Repositories\BaseRepository;

/**
 * Class DesaRepository
 * @package App\Repositories\Admin
 * @version February 12, 2022, 9:30 am UTC
*/

class DesaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'parent_id',
        'name',
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
        return Desa::class;
    }
}
