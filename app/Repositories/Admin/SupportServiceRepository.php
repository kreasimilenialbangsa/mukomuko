<?php

namespace App\Repositories\Admin;

use App\Models\Admin\SupportService;
use App\Repositories\BaseRepository;

/**
 * Class SupportServiceRepository
 * @package App\Repositories\Admin
 * @version April 12, 2022, 12:16 pm WIB
*/

class SupportServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'category_id',
        'reason',
        'nominal',
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
        return SupportService::class;
    }
}
