<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Outcome;
use App\Repositories\BaseRepository;

/**
 * Class OutcomeRepository
 * @package App\Repositories\Admin
 * @version April 14, 2022, 1:09 pm WIB
*/

class OutcomeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'desa_id',
        'category_id',
        'description',
        'nominal'
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
        return Outcome::class;
    }
}
