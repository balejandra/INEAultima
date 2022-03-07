<?php

namespace App\Http\Controllers\Zarpes;

use App\Http\Controllers\Controller;
use App\Models\Gmar\LicenciasTitulosGmar;
use App\Models\Publico\Capitania;
use App\Models\Renave\Renave_data;
use App\Models\Transaccion;
use App\Models\Zarpes\Pasajero;
use App\Models\Zarpes\PermisoZarpe;
use App\Models\Zarpes\Tripulante;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PdfGeneratorController extends Controller
{
    public function imprimir($id){
        $trans= PermisoZarpe::all();
        $zarpe= $trans->find($id);
        $buque=Renave_data::where('matricula_actual',$zarpe->matricula)->first();
        $capitania= Capitania::where('id',$zarpe->establecimiento_nautico->capitania_id)->first();
        $cantTrip=Tripulante::where('permiso_zarpe_id',$id)->get()->count();
        $cantPas=Pasajero::where('permiso_zarpe_id',$id)->get()->count();
        $tripulantes=Tripulante::select('ctrl_documento_id')->where('permiso_zarpe_id',$id)->where('capitan',true)->get();
        $trip= LicenciasTitulosGmar::whereIn('id',$tripulantes)->first();
        $pdf=PDF::loadView('PDF.zarpes.permiso',compact('zarpe','buque','trip','capitania','cantPas','cantTrip'));
        return $pdf->stream('zarpes.pdf');
    }
}
