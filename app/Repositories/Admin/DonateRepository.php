<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Donate;
use App\Repositories\BaseRepository;

/**
 * Class DonateRepository
 * @package App\Repositories\Admin
 * @version February 15, 2022, 2:51 pm UTC
*/

class DonateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'program_id',
        'location_id',
        'name',
        'email',
        'phone',
        'message',
        'total_donate',
        'is_anonim',
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
        return Donate::class;
    }
}
