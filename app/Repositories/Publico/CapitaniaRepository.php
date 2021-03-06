<?php

namespace App\Repositories\Publico;


use App\Models\Publico\Capitania;
use App\Repositories\BaseRepository;

/**
 * Class CapitaniaRepository
 * @package App\Repositories
 * @version January 19, 2022, 11:00 pm UTC
*/

class CapitaniaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'sigla'
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
        return Capitania::class;
    }
}
