<?php

namespace App\Models\Zarpes;

use App\Models\Publico\Capitania;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class PermisoEstadia
 * @package App\Models
 * @version March 10, 2022, 10:25 pm UTC
 *
 * @property string $nro_solicitud
 * @property unsignedBigInteger $user_id
 * @property string $nombre_buque
 * @property string $nro_registro
 * @property string $tipo_buque
 * @property string $nacionalidad_buque
 * @property string $arqueo_bruto
 * @property string $nombre_propietario
 * @property string $nombre_capitan
 * @property string $pasaporte_capitan
 * @property integer $cant_tripulantes
 * @property string $actividades
 * @property string $puerto_origen
 * @property unsignedBigInteger $capitania_id
 * @property unsignedBigInteger $establecimiento_nautico_destino
 * @property string $tiempo_estadia
 * @property string $vigencia
 * @property unsignedBigInteger $status_id
 */
class PermisoEstadia extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $connection = 'pgsql_zarpes_schema';
    public $table = 'permiso_estadias';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nro_solicitud',
        'user_id',
        'nombre_buque',
        'nro_registro',
        'tipo_buque',
        'nacionalidad_buque',
        'arqueo_bruto',
        'nombre_propietario',
        'nombre_capitan',
        'pasaporte_capitan',
        'cant_tripulantes',
        'actividades',
        'puerto_origen',
        'capitania_id',
        'establecimiento_nautico_destino',
        'tiempo_estadia',
        'vigencia',
        'status_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nro_solicitud' => 'string',
        'user_id' => 'integer',
        'nombre_buque' => 'string',
        'nro_registro' => 'string',
        'tipo_buque' => 'string',
        'nacionalidad_buque' => 'string',
        'arqueo_bruto' => 'string',
        'nombre_propietario' => 'string',
        'nombre_capitan' => 'string',
        'pasaporte_capitan' => 'string',
        'cant_tripulantes' => 'integer',
        'actividades' => 'string',
        'puerto_origen' => 'string',
        'establecimiento_nautico_destino' => 'integer',
        'capitania_id' => 'integer',
        'tiempo_estadia' => 'string',
        'vigencia' => 'string',
        'status_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre_buque' => 'required',
        'nro_registro' => 'required',
        'tipo_buque' => 'required',
        'nacionalidad_buque' => 'required',
        'arqueo_bruto' => 'required',
        'nombre_propietario' => 'required',
        'nombre_capitan' => 'required',
        'pasaporte_capitan' => 'required',
        'cant_tripulantes' => 'required',
        'actividades' => 'required',
        'puerto_origen' => 'required',
        'capitania_id' => 'required',
        'tiempo_estadia' => 'required',
    ];


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function establecimiento_nautico()
    {
        return $this->belongsTo(EstablecimientoNautico::class,'establecimiento_nautico_destino','id');
    }
    public function capitania():\Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Capitania::class,'capitania_id','id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
