<?php

namespace App\Http\Controllers\Zarpes;

use App\Http\Controllers\Controller;
use App\Models\Gmar\LicenciasTitulosGmar;
use App\Models\Publico\Capitania;
use App\Models\Renave\Renave_data;
use App\Models\Transaccion;
use App\Models\Zarpes\Pasajero;
use App\Models\Zarpes\PermisoEstadia;
use App\Models\Zarpes\PermisoZarpe;
use App\Models\Zarpes\Tripulante;
use App\Models\Zarpes\EstablecimientoNautico;
use App\Models\Zarpes\DescripcionNavegacion;
use App\Models\Publico\Paise;
use App\Models\Zarpes\TripulanteInternacional;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PdfGeneratorController extends Controller
{
    public function imprimir($id){
        $zarpe= PermisoZarpe::find($id);
        if ($zarpe->bandera=='extranjera') {
            $buque=PermisoEstadia::where('id',$zarpe->permiso_estadia_id)->first();
        }else {
            $buque=Renave_data::where('matricula_actual',$zarpe->matricula)->first();
        }
        $trans= PermisoZarpe::all();
        $zarpe= $trans->find($id);
        $capitania= Capitania::where('id',$zarpe->establecimiento_nautico->capitania_id)->first();
        $cantTrip=Tripulante::where('permiso_zarpe_id',$id)->get()->count();
        $cantPas=Pasajero::where('permiso_zarpe_id',$id)->get()->count();
        $tripulantes=Tripulante::select('ctrl_documento_id')->where('permiso_zarpe_id',$id)->where('capitan',true)->get();
        $trip= LicenciasTitulosGmar::whereIn('id',$tripulantes)->first();
        $estnauticoDestino=EstablecimientoNautico::find($zarpe->establecimiento_nautico_destino_id);
        $DescripcionNavegacion=DescripcionNavegacion::find($zarpe->descripcion_navegacion_id);

        $pdf=PDF::loadView('PDF.zarpes.permiso',compact('zarpe','buque','trip','capitania','cantPas','cantTrip','estnauticoDestino','DescripcionNavegacion'));
        return $pdf->stream('zarpes.pdf');
    }
    public function imprimirEstadia($id){
        $estadia=PermisoEstadia::find($id);
        $capitania= Capitania::where('id',$estadia->capitania_id)->first();
        $pdf=PDF::loadView('PDF.estadias.permiso',compact('estadia','capitania'));
        return $pdf->stream('estadia.pdf');
    }

    public function correo($id){
        $zarpe= PermisoZarpe::find($id);
        if ($zarpe->bandera=='extranjera') {
            $buque=PermisoEstadia::where('id',$zarpe->permiso_estadia_id)->first();
        }else {
            $buque=Renave_data::where('matricula_actual',$zarpe->matricula)->first();
        }
        $trans= PermisoZarpe::all();
        $zarpe= $trans->find($id);
        $capitania= Capitania::where('id',$zarpe->establecimiento_nautico->capitania_id)->first();
        $cantTrip=Tripulante::where('permiso_zarpe_id',$id)->get()->count();
        $cantPas=Pasajero::where('permiso_zarpe_id',$id)->get()->count();
        $tripulantes=Tripulante::select('ctrl_documento_id')->where('permiso_zarpe_id',$id)->where('capitan',true)->get();
        $trip= LicenciasTitulosGmar::whereIn('id',$tripulantes)->first();
        $estnauticoDestino=EstablecimientoNautico::find($zarpe->establecimiento_nautico_destino_id);
        $DescripcionNavegacion=DescripcionNavegacion::find($zarpe->descripcion_navegacion_id);
        $pdf=PDF::loadView('PDF.zarpes.permiso', compact('zarpe','buque','trip','capitania','cantPas','cantTrip','estnauticoDestino','DescripcionNavegacion'))->stream();
        return $pdf;

    }

    public function correoEstadia($id){
       $estadia=PermisoEstadia::find($id);
        $capitania= Capitania::where('id',$estadia->capitania_id)->first();
        $pdf=PDF::loadView('PDF.estadias.permiso', compact('estadia','capitania'))->stream();
        return $pdf;

    }

    public function imprimirInternacional($id){
        $zarpe= PermisoZarpe::find($id);
        if ($zarpe->bandera=='extranjera') {
            $buque=PermisoEstadia::where('id',$zarpe->permiso_estadia_id)->first();
        }else {
            $buque=Renave_data::where('matricula_actual',$zarpe->matricula)->first();
        }
        $trans= PermisoZarpe::all();
        $zarpe= $trans->find($id);
        $capitania= Capitania::where('id',$zarpe->establecimiento_nautico->capitania_id)->first();
        $cantTrip=TripulanteInternacional::where('permiso_zarpe_id',$id)->get()->count();
        $cantPas=Pasajero::where('permiso_zarpe_id',$id)->get()->count();
        $tripulantes=TripulanteInternacional::select('*')->where('permiso_zarpe_id',$id)->get();
       // dd($tripulantes);
       // $trip= TripulanteInternacional::whereIn('id',$tripulantes)->first();
       // $estnauticoDestino=EstablecimientoNautico::find($zarpe->establecimiento_nautico_destino_id);
       foreach($tripulantes as $tripulante){
            if($tripulante->funcion=="Capit??n"){
                $trip=$tripulante;
            }
       }

       $DescripcionNavegacion=DescripcionNavegacion::find($zarpe->descripcion_navegacion_id);
        $pais= Paise::find($zarpe->paises_id);

        $pdf=PDF::loadView('PDF.zarpeInternacional.permiso',compact('zarpe','buque','trip','capitania','cantPas','cantTrip','DescripcionNavegacion','pais'));
        return $pdf->stream('zarpes.pdf');
    }

    public function correoZI($id){
        $zarpe= PermisoZarpe::find($id);
        if ($zarpe->bandera=='extranjera') {
            $buque=PermisoEstadia::where('id',$zarpe->permiso_estadia_id)->first();
        }else {
            $buque=Renave_data::where('matricula_actual',$zarpe->matricula)->first();
        }
        $trans= PermisoZarpe::all();
        $zarpe= $trans->find($id);
        $capitania= Capitania::where('id',$zarpe->establecimiento_nautico->capitania_id)->first();
        $cantTrip=TripulanteInternacional::where('permiso_zarpe_id',$id)->get()->count();
        $cantPas=Pasajero::where('permiso_zarpe_id',$id)->get()->count();
        $tripulantes=TripulanteInternacional::select('*')->where('permiso_zarpe_id',$id)->get();
        // dd($tripulantes);
        // $trip= TripulanteInternacional::whereIn('id',$tripulantes)->first();
        // $estnauticoDestino=EstablecimientoNautico::find($zarpe->establecimiento_nautico_destino_id);
        foreach($tripulantes as $tripulante){
            if($tripulante->funcion=="Capit??n"){
                $trip=$tripulante;
            }
        }

        $DescripcionNavegacion=DescripcionNavegacion::find($zarpe->descripcion_navegacion_id);
        $pais= Paise::find($zarpe->paises_id);

        $pdf=PDF::loadView('PDF.zarpeInternacional.permiso',compact('zarpe','buque','trip','capitania','cantPas','cantTrip','DescripcionNavegacion','pais'))->stream();
        return $pdf;

    }
}
