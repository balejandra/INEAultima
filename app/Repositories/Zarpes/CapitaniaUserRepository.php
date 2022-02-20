<?php

namespace App\Repositories\Zarpes;

use App\Models\Zarpes\CapitaniaUser;
use App\Repositories\BaseRepository;

/**
 * Class CapitaniaUserRepository
 * @package App\Repositories
 * @version February 19, 2022, 9:36 pm UTC
*/

class CapitaniaUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cargo',
        'user_id',
        'capitania_id'
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
        return CapitaniaUser::class;
    }
}
