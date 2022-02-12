<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Kecamatan;
use App\Repositories\BaseRepository;

/**
 * Class KecamatanRepository
 * @package App\Repositories\Admin
 * @version February 12, 2022, 9:30 am UTC
*/

class KecamatanRepository extends BaseRepository
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
        return Kecamatan::class;
    }
}
