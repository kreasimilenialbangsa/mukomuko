<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Income;
use App\Repositories\BaseRepository;

/**
 * Class IncomeRepository
 * @package App\Repositories\Admin
 * @version February 24, 2022, 11:36 am WIB
*/

class IncomeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'name',
        'precent'
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
        return Income::class;
    }
}
