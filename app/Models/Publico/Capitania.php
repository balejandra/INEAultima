<?php

namespace App\Models\Publico;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Capitania
 * @package App\Models
 * @version January 19, 2022, 11:00 pm UTC
 *
 * @property string $nombre
 * @property string $sigla
 */
class Capitania extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'capitanias';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'sigla'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'sigla' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'sigla' => 'required'
    ];

    public function coordenas_capitania()
    {
        return $this->hasMany(Coordenas_capitania::class);
    }
}