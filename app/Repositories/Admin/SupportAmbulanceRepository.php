<?php

namespace App\Repositories\Admin;

use App\Models\Admin\SupportAmbulance;
use App\Repositories\BaseRepository;

/**
 * Class SupportAmbulanceRepository
 * @package App\Repositories\Admin
 * @version April 12, 2022, 12:21 pm WIB
*/

class SupportAmbulanceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'is_confirm'
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
        return SupportAmbulance::class;
    }
}
