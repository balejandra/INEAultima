function getmatricula(data1) {
    $.ajax({
        url: route('validationStepTwo'),
        data: {matricula: data1}

    })// This will be called on success
        .done(function (response) {
            let divError = document.getElementById("errorMat");
               let table = document.getElementById("table-buque");
              //  alert(response);
//console.log(response);
            if(response=='permisoPorCerrar'){
               // alert('permiso por cerrar');
                divError.innerHTML='<div class="alert alert-danger">La embarcación de matrícula <b>'+data1+'</b> posee un permiso de zarpe que no ha sido cerrado, debe cerrar cualquier permiso de zarpe solicitado previamente para poder realizar uno nuevo.</div>';
                table.style.display='none';

            }else if(response=='sinCoincidencias'){
                divError.innerHTML='<div class="alert alert-danger">Su usuario no puede realizar solicitudes a nombre del Buque Matricula <b>'+data1+' </b> </div>';
                table.style.display='none';

            }else if(response=='noEncontradoSgm'){
                 divError.innerHTML='<div class="alert alert-danger">Matrícula no encontrada en BD seguridad marítima </div>';
                table.style.display='none';
            }else{
                

                let resp= JSON.parse(response);
                let valiacionSgm=resp.validacionSgm;
                console.log(valiacionSgm);
                let licencia=false;
                let certificado=false;


               if(valiacionSgm[0]==true && valiacionSgm[1]==true && valiacionSgm[2]==true){
                    divError.innerHTML='';
                    table.style.display='block';
                    respuesta=resp.data;
                    matricula=(respuesta[0].matricula_actual);
                    $("#matricula").val(matricula);
                    nombrebuque=(respuesta[0].nombrebuque_actual);
                    $("#nombre").val(nombrebuque);
                    destinacion=(respuesta[0].destinacion);
                    $("#destinacion").val(destinacion);
                    UAB=(respuesta[0].UAB);
                    $("#UAB").val(UAB);
                    ESLORA=(respuesta[0].eslora);
                    $("#eslora").val(ESLORA);
                    nombre_propietario=(respuesta[0].nombre_propietario);
                    $("#nombre_propietario").val(nombre_propietario);
                    numero_identificacion=(respuesta[0].numero_identificacion);
                    $("#numero_identificacion").val(numero_identificacion);
                    manga=(respuesta[0].manga);
                    $("#manga").val(manga);
               }else{
                    if(valiacionSgm[0]!=true){
                        divError.innerHTML='<div class="alert alert-danger"> '+valiacionSgm[0]+' </div>';
                        table.style.display='none';
                    }

                    if(valiacionSgm[1]!=true){
                        divError.innerHTML='<div class="alert alert-danger"> '+valiacionSgm[1]+' </div>';
                        table.style.display='none';
                    }

                    if(valiacionSgm[2]!=true){
                        divError.innerHTML='<div class="alert alert-danger"> '+valiacionSgm[2]+' </div>';
                        table.style.display='none';
                    }
                    

                }
            }
        })

        // This will be called on error
        .fail(function (response) {
            console.log(response);
             divError.innerHTML='<div class="alert alert-danger"> Error en la Matricula</div>';
            table.style.display='none';
            alert('Error en la Matricula');
            table = document.getElementById("table-buque");
            table.style.display='none';
            document.getElementById("matricula").value = "";
            document.getElementById("nombre").value = "";
            document.getElementById("destinacion").value = "";
            document.getElementById("UAB").value = "";
        });

}


function getPermisoEstadia(data) {
    divError = document.getElementById("errorPermiso");
    tableEstadiaVAl = document.getElementById("tableEstadiaVAl");


    $.ajax({
        url: route('validationStepTwoE'),
        data: {permiso: data}

    })// This will be called on success
    .done(function (response) {
        let resp=JSON.parse(response);
          
            if(resp=="sinCoincidencias"){
                divError.innerHTML='<div class="alert alert-danger"> Número de permiso de estadía no encontrado. </div>';
                    tableEstadiaVAl.style.display='none';
                
            }else if(resp=='permisoPorCerrar'){
                divError.innerHTML='<div class="alert alert-danger">La embarcación con el número de registro <b>'+resp[0].nro_registro+'</b> posee una solicitud de permiso de zarpe que no ha sido cerrada, debe cerrar cualquier permiso de zarpe solicitado previamente para poder realizar uno nuevo.</div>';

                    tableEstadiaVAl.style.display='none';
            }else{


                document.getElementById("solicitud").innerHTML=resp[0].nro_solicitud;
                document.getElementById("nombre").innerHTML=resp[0].nombre_buque;
                document.getElementById("nacionalidad").innerHTML=resp[0].nacionalidad_buque;
                document.getElementById("tipo").innerHTML=resp[0].tipo_buque;
                document.getElementById("nro_registro").innerHTML=resp[0].nro_registro;

                document.getElementById("permiso_de_estadia").value=resp[0].id;
                document.getElementById("numero_registro").value=resp[0].nro_registro;
                 

                    tableEstadiaVAl.style.display='';

            }

            console.log(resp);
    })

        // This will be called on error
    .fail(function (response) {
            console.log(response);
             divError.innerHTML='<div class="alert alert-danger"> Ha ocurrido un error durante la búsqueda de la información de la embarcación.</div>';
            table.style.display='none';
    });

}
 

 