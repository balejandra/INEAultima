<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        .display-5 {
            font-family: 'Jost', sans-serif;
            font-size: 12px;
            line-height: 1.5;
        }

        .display-7 {
            font-family: 'Jost', sans-serif;
            font-size: 10px;
            line-height: 1.5;
        }

        .cid-sYSK2SiKvy {
            padding-top: 4rem;
            padding-bottom: 3rem;
            background-color: #ffffff;
        }

        .cid-sYSK2SiKvy .image-wrap img {
            width: 100%;
        }

        .cid-sYSK2SiKvy .mbr-text {
            color: #050505;
            text-align: center;
        }

        a {
            font-style: normal;
            font-weight: 400;
            cursor: pointer;
        }

        .mbr-section-subtitle {
            line-height: 1.3;
        }

        .mbr-text {
            font-style: normal;
            line-height: 1.7;
            text-align: justify;
            text-justify: inter-word;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .display-5,
        .display-7,
        span,
        p,
        a {
            line-height: 1.3;
            word-break: break-word;
            word-wrap: break-word;
            font-weight: 400;
        }

        b,
        strong {
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        img,
        iframe {
            display: block;
            width: 100%;
        }

        html,
        body {
            height: auto;
            min-height: 100vh;
        }

        blockquote {
            font-style: italic;
            padding: 3rem;
            font-size: 1.09rem;
            position: relative;
            border-left: 3px solid;
        }

        .mb-4 {
            margin-bottom: 2rem !important;
        }

        .cid-sYSK2SiKvy .image-wrap img {
            display: block;
            margin: auto;
        }

        @page {
            margin-top: 140px;
        }

        header {
            top: -200px;
            position: fixed;
        }

        .content-paragraph {
            text-align: justify;
            text-justify: inter-word;
            padding-left: 20px;
            padding-right: 20px;
        }

        span.content {
            text-align: justify;
            text-justify: inter-word;
            color: blue;
        }

        .content-paragraph-rigth {
            text-align: right;
            padding-left: 20px;
            padding-right: 20px;
        }

        th, td {
            font-family: 'Montserrat-Medium', sans-serif;
            font-size: 8px;
        }

        table {
            width: 100%;
            max-width: 100%;
            padding: 20px;
            margin-bottom: 0px;
            border-spacing: 0;
            border-collapse: collapse;
            background-color: transparent;
        }

        thead {
            text-align: left;
            display: table-header-group;
            vertical-align: middle;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 6px;
        }
    </style>


</head>
<body>

<header class="cid-sYSK2SiKvy">

    <div style="padding-top: 40pt; padding-left: 20px; position:absolute;  width:80pt;">
        <img class="img-rounded" height="100px" src="{{ public_path('images/inea.png') }}">
    </div>

    <div style="position:fixed;padding-top: 40pt; left: 420pt;">
        @php
            $QR =
                "Nro Solicitud: ".$estadia->nro_registro."\n".
                "Nombre Embarcacion: ".$estadia->nombre_buque."\n".
                "Numero de Registro: ".$estadia->nro_registro."\n".
                "Destino: " .$estadia->capitania->nombre."\n".
                "Fecha Emision: " .$estadia->updated_at."\n".
                "Fecha Vencimiento: " .$estadia->vencimiento."\n"
        @endphp

        <img src="data:image/png;base64, {!! base64_encode(QrCode::size(100)->generate($QR)) !!} ">
    </div>
    <div style="padding-top:50pt; padding-left:130pt;">
        <p class=" text-center mbr-text display-7">
            REPÚBLICA BOLIVARIANA DE VENEZUELA<br>
            MINISTERIO DEL PODER POPULAR PARA EL TRANSPORTE<br>
            INSTITUTO NACIONAL DE LOS ESPACIOS ACUATICOS<br>
            CAPITANÍA DE PUERTO DE <u>{{$estadia->capitania->nombre}}</u>  <br>
            <br>
            <span style="font-size: 20px; font-weight: bold">PERMISO DE ESTADÍA</span><br>
            <span class="display-7">TEMPORAL PERMANENCY AUTHORIZATION</span><br>
            <span style="font-size: 16px">EMBARCACIÓN DEPORTIVA EXTRANJERA</span><br>
            <span class="display-7">FOREIGN SPORT VESSEL</span>
        </p>
    </div>

</header>

<main>
    <div style="clear:both; position:relative; padding-top: 180px;" class="content-paragraph">

        <h4 class="mbr-section-subtitle mbr-fonts-style mb-4 display-5 content-paragraph">N° de Permiso: {{$estadia->nro_solicitud}}</h4>
        <p class="mbr-text mbr-fonts-style display-7 content-paragraph">
            Vista la solicitud correspondiente y previa consignación en este despacho de la documentación pertinente, el
            Capitán de Puerto de
            <u>{{$estadia->capitania->nombre}}</u> concede autorización a la embarcación abajo identificadapara permanecer en
            aguas venezolanas durante el lapso de dieciocho (18) meses. Finalizado
            este lapso el buque deberá salir de aguas venezolanas durante cuarenta y cinco (45) días continuos antes de
            poder ingresar nuevamente, so pena de
            que el mismo sea sometido a la legislación en materia de contrabando, y por ende, ser puestoa la orden de la
            Autoridad Aduanera a fin de que tome
            las acciones legales que correspondan. Todo lo anterior de acuerdo a lo establecido en el Artículo 28 del
            Reglamento de la Marina Deportiva Nacional
            publicada en Decreto 1.748 de fecha 05 de Marzo de 1997, publicada en Gaceta Oficial N° 36.169 de fecha 19
            de Marzo de 1997. Este permiso debe ser
            mostrado a la Autoridad Acuática antes de zarpar. El Capitán del Buque, está en la obligación de comunicar
            alCapitán de Puerto la falta de algún miembro
            de la tripulación al momento de zarpe, sin perjuicio de notificarlo también a la demás autoridades a quienes
            compete.
            <br>
            According to the corresponding request and previous fulfilment of the necessary documentation,
            the <u>{{$estadia->capitania->nombre}}</u> Harbour Master admits the ship described
            below to remain in Venezuelan waters of the lapse of eighteen (18) months. Once this lapse has expired, the
            ship must leave Venezuelan waters for at least forty five
            (45) days before entering again, under penalty of being submitted to Custom’s law regulations about
            smuggling activities. All of the above is established
            in the 28th article of the National Regulations for the Sports Marina issued on March 05, 1997 by 1748
            Decree and published later on March 19, 1997 in
            the Official Gazette N° 36169. This permission must be showed to the Aquqtic Authority prior to sailing out,
            in order to obtain port clearance./The
            Master of the Vessel, is obliged to inform the Harbour Master the lack of any crew member at the time of
            Port Clearence, without prejudice to also
            notify it to all Authorities to who it may concern.
        <table>
            <thead>
            <tr>
                <th>NOMBRE DEL BUQUE <br>Vessel'sname</th>
                <th>NÚMERO DE REGISTRO <br>Number of Register</th>
                <th>TIPO DE BUQUE <br>Type of ship</th>
                <th>NACIONALIDAD DEL BUQUE <br>Ship flag</th>
                <th>PROPIETARIO <br>Ship Owner</th>
                <th>ARQUEO <br>Tonnage</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$estadia->nombre_buque}}</td>
                <td>{{$estadia->nro_registro}}</td>
                <td>{{$estadia->tipo_buque}}</td>
                <td>{{$estadia->nacionalidad_buque}}</td>
                <td>{{$estadia->nombre_propietario}}</td>
                <td>{{$estadia->arqueo_bruto}}</td>
            </tr>
            <tr>
                <th>ESLORA <br>Lenght</th>
                <th>POTENCIA KW <br>KW Power</th>
                <th>CAPITAN <br>Capitain</th>
                <th>Pasaporte <br>Passport Nro</th>
                <th>NUMERO DE TRIPULANTES <br>Number of Crew members</th>
                <th>NUMERO DE PASAJEROS <br>Number of Passengers</th>
            </tr>
            <tr>
                <td>{{$estadia->eslora}}</td>
                <td>{{$estadia->potencia_kw}}</td>
                <td>{{$estadia->nombre_capitan}}</td>
                <td>{{$estadia->pasaporte_capitan}}</td>
                <td>{{$estadia->cant_tripulantes}}</td>
                <td>{{$estadia->cant_pasajeros}}</td>
            </tr>
            <tr>
                <th>ACTIVIDADES A REALIZAR<br>Ship’spurpose</th>
                <th colspan="2">PROCEDENCIA <br>Port of origin</th>
                <th>DESTINO <br>Port of destination</th>
                <th>TIEMPO DE ESTADIA <br>Permanency</th>
                <th>VALIDO HASTA <br>Valid until</th>
            </tr>
            <tr>
                <td>{{$estadia->actividades}}</td>
                <td colspan="2">{{$estadia->puerto_origen}}</td>
                <td>{{$estadia->capitania->nombre}}</td>
                <td>{{$estadia->tiempo_estadia}}</td>
                <td>{{date_format($estadia->vencimiento,'Y-m-d')}}</td>
            </tr>
            </tbody>
        </table>

        <p class="mbr-text mbr-fonts-style display-7 content-paragraph">Lugar y fecha
            <u> {{$estadia->updated_at}} </u><br>
                PLACE AND DATE <u> {{$estadia->updated_at}} </u>
        </p>
        <br>
        <p class="mbr-text text-center mbr-fonts-style display-7">Capitán de Puerto<br>

                HARBOUR MASTER

        </p>

    </div>
</main>
</body>
</html>
