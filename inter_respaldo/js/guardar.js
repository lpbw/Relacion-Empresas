function guarda(id) {
    var val =false;
        //1 razonsocial
        if ($('#razonsocial').val() == "") {
            alert("Porfavor llene campo RAZON SOCIAL");
            $('#razonsocial').focus();
            return false;
        }
        //2 nombrecomercial
        if ($('#nombrecomercial').val() == "") {
            alert("Porfavor llene campo NOMBRE COMERCIAL");
            $('#nombrecomercial').focus();
            return false;
        }
        //4-callenumero
        if ($('#callenumero').val() == "") {
            alert("Porfavor llene campo CALLE Y NÚMERO");
            $('#callenumero').focus();
            return false;
        }
        //5-colonia
        if ($('#colonia').val() == "") {
            alert("Porfavor llene campo COLONIA");
            $('#colonia').focus();
            return false;
        }
        //6-cp
        if ($('#codigopostal').val() == "") {
            alert("Porfavor llene campo CODIGO POSTAL");
            $('#codigopostal').focus();
            return false;
        }
        //7-ciudad
        if ($('#ciudad').val() == "") {
            alert("Porfavor llene campo CIUDAD");
            $('#ciudad').focus();
            return false;
        }
        //8-estado
        if ($('#estado').val() == "") {
            alert("Porfavor llene campo ESTADO");
            $('#estado').focus();
            return false;
        }
        //9-rfc
        if ($('#rfc').val() == "") {
            alert("Porfavor llene campo RFC");
            $('#rfc').focus();
            return false;
        }
        var pfisica = $('#fisica').val();
        var pmoral = $('#moral').val();
        
        
            var fd = new FormData(document.getElementById("form2"));
            fd.append('pfisica',pfisica);
            fd.append('pmoral',pmoral);
            fd.append('id',id);
            $.ajax({
                data:  fd,
                url:   'GuardarDatosGenerales.php?var=2',
                type:  'post',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                            
                },
                success:  function (response) {
                    val = response;
                    $('#contenedor2').hide();
                    $('#contenedor3').show();
                }
            });
        
        return val;
 
}

//guardar contacto
function Gcontactos(id) {
    var val =false;
        //1 contacto1
        if ($('#contacto1').val() == "") {
            alert("Porfavor llene campo Nombre");
            $('#contacto1').focus();
            return false;
        }
        //2 tel1
        if ($('#tel1').val() == "") {
            alert("Porfavor llene campo TELEFONO");
            $('#tel1').focus();
            return false;
        }
        //3 correo1
        if ($('#correo1').val() == "") {
            alert("Porfavor llene campo CORREO");
            $('#correo1').focus();
            return false;
        }
        
            var fd = new FormData(document.getElementById("form3"));
            fd.append('id',id);
            $.ajax({
                data:  fd,
                url:   'GuardarDatosGenerales.php?var=3',
                type:  'post',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                            
                },
                success:  function (response) {
                    val = response;
                    $('#contenedor3').hide();
                    $('#contenedor4').show();
                }
            });
        
        return val;
 
}

//guardar respupesta
function Grespuestas(id) {
    var val =false;
    if( $("#form4 input[name='group1']:radio").is(':checked')) {  
        var respuesta = $('input:radio[name=group1]:checked').val();
        }else{
            alert('Porfavor selecciona una respuesta');
            return false;
        }
            var fd = new FormData(document.getElementById("form4"));
            fd.append('id',id);
            fd.append('respuesta',respuesta);
            $.ajax({
                data:  fd,
                url:   'GuardarDatosGenerales.php?var=4',
                type:  'post',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                            
                },
                success:  function (response) {
                    val = response;
                    $('#contenedor4').hide();
                    $('#contenedor5').show();
                }
            });
        
        return val;
 
}


//guardar operacion  contenedor 5
function Goperacion(id) {
    var val =false;
    //1 fecha operacion
    if ($('#operacion').val() == "") {
        alert("Porfavor seleccione una FECHA");
        $('#operacion').focus();
        return false;
    }
    //2 sector
    if ($('#sector').val() == null) {
        alert("Porfavor seleccione un SECTOR");
        $('#sector').focus();
        return false;
    }
     //3 giro
     if ($('#giro').val() == "") {
        alert("Porfavor llena el campo GIRO");
        $('#giros').focus();
        return false;
    }
     //4 desc
     if ($('#desc').val() == "") {
        alert("Porfavor llena el campo descripcion de producto y/o servicios");
        $('#desc').focus();
        return false;
    }
    //5 res
    if( $("#form5 input[name='res']:radio").is(':checked')) {  
        var respuesta = $('input:radio[name=res]:checked').val();
        
        }else{
            alert('Porfavor selecciona una respuesta para ¿Cuenta con sucursales o unidades de negocio?');
            $('#resp').focus();
            return false;
        }

      if (respuesta == "Si") {
          //6 sucursales o unidades
        if ($('#suc').val() == "") {
            alert("Porfavor llena el campo sucursales o unidades");
            $('#suc').focus();
            return false;
        }
      }  
     

            var fd = new FormData(document.getElementById("form5"));
            fd.append('id',id);
            fd.append('respuesta',respuesta);
            $.ajax({
                data:  fd,
                url:   'GuardarDatosGenerales.php?var=5',
                type:  'post',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                            
                },
                success:  function (response) {
                    
                    val = response;
                    $('#contenedor5').hide();
                    $('#contenedor11').show();
                }
            });
        
        return val;
 
}

//guardar utilidad 
function guardacont6(id) {
    var val =false;
    
    if ($('#bruta').val() == "") {
        alert("Porfavor llene el campo UTILIDAD BRUTA");
        $('#bruta').focus();
        return false;
    }
    
    if ($('#uoperacion').val() == "") {
        alert("Porfavor llene el campo UTILIDAD OPERACION");
        $('#uoperacion').focus();
        return false;
    }

    if ($('#neta').val() == "") {
        alert("Porfavor llene el campo UTILIDAD NETA");
        $('#neta').focus();
        return false;
    }

    if ($('#financiero').val() == "") {
        alert("Porfavor llene el campo APALANCAMIENTO FINANCIERO");
        $('#financiero').focus();
        return false;
    }
    
            var fd = new FormData(document.getElementById("form6"));
            fd.append('id',id);
            $.ajax({
                data:  fd,
                url:   'GuardarDatosGenerales.php?var=6',
                type:  'post',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                            
                },
                success:  function (response) {
                    
                    val = response;
                    $('#contenedor6').hide();
                    $('#contenedor7').show();
                }
            });
        
        return val;
 
}

//Infraestructura
function guardacont7(id) {
    var val =false;
    
    if ($('#superficie').val() == "") {
        alert("Porfavor llene el campo Superficie Terreno");
        $('#superficie').focus();
        return false;
    }
    
    if ($('#construccion').val() == "") {
        alert("Porfavor llene el campo Metros cuadrados de construcción");
        $('#construccion').focus();
        return false;
    }

    if ($('#capacidad').val() == "") {
        alert("Porfavor llene el campo Capacidad Disponible");
        $('#capacidad').focus();
        return false;
    }

    if( $("#form7 input[name='resp']:radio").is(':checked'))
    {  
        var respuesta = $('input:radio[name=resp]:checked').val();
        
    }
    else
    {
            alert('Porfavor selecciona una respuesta para ¿Cuenta con capacidad para expandir su infraestructura?');
            $('#resp').focus();
            return false;
    }
    
            var fd = new FormData(document.getElementById("form7"));
            fd.append('id',id);
            fd.append('respuesta',respuesta);
            $.ajax({
                data:  fd,
                url:   'GuardarDatosGenerales.php?var=7',
                type:  'post',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                            
                },
                success:  function (response) {
                    val = response;
                    $('#contenedor7').hide();
                    $('#contenedor8').show();
                }
            });
        
        return val;
 
}

//Certificaciones
function guardacont8(id) {
    var val =false;
    
    if( $("#form8 input[name='rescertif']:radio").is(':checked'))
    {  
        var respuesta = $('input:radio[name=rescertif]:checked').val();
        
    }
    else
    {
            alert('Porfavor selecciona una respuesta para ¿Cuenta con alguna certificación?');
            $('#rescertif').focus();
            return false;
    }
    
    if (respuesta == "Si") {
        if ($('#certifica').val() == "") {
            alert("Porfavor llene el campo ¿Con cuál certificación cuenta?");
            $('#certifica').focus();
            return false;
        }
    }
    

    if( $("#form8 input[name='respremio']:radio").is(':checked'))
    {  
        var respuesta2 = $('input:radio[name=respremio]:checked').val();
        
    }
    else
    {
            alert('Porfavor selecciona una respuesta para ¿Cuenta con alguna certificación?');
            $('#respremio').focus();
            return false;
    }
    
    if (respuesta2 == "Si") {
        if ($('#premio').val() == "") {
            alert("Porfavor llene el campo ¿Con cuál premio o reconocimiento cuenta?");
            $('#premio').focus();
            return false;
        }
    }
    
            var fd = new FormData(document.getElementById("form8"));
            fd.append('id',id);
            fd.append('respuesta',respuesta);
            fd.append('respuesta2',respuesta2);
            $.ajax({
                data:  fd,
                url:   'GuardarDatosGenerales.php?var=8',
                type:  'post',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                            
                },
                success:  function (response) {
                    val = response;
                    $('#contenedor8').hide();
                    $('#contenedor9').show();
                }
            });
        
        return val;
 
}

//contenedor 9
function guardacont9(id) {
    var val =false;
    //tecnologia limpia
    if( $("#form9 input[name='teclimpia']:radio").is(':checked'))
    {  
        var respuesta = $('input:radio[name=teclimpia]:checked').val();
        
    }
    else
    {
            alert('Porfavor selecciona una respuesta para ¿Cuenta con tecnología limpia en su empresa?');
            $('#teclimpia').focus();
            return false;
    }
    
    if (respuesta == "Si") {
        if ($('#cualesteclimpia').val() == "") {
            alert("Porfavor llene el campo cuales");
            $('#cualesteclimpia').focus();
            return false;
        }
    }
    
//admin
    if( $("#form9 input[name='resadmsoft']:radio").is(':checked'))
    {  
        var admin = $('input:radio[name=resadmsoft]:checked').val();
        
    }
    else
    {
            alert('Porfavor selecciona una respuesta para Administración/Finanzas:');
            $('#resadmsoft').focus();
            return false;
    }
    
    if (admin == "Si") {
        if ($('#admsoft').val() == "") {
            alert("Porfavor llene el campo Software Administración/Finanzas");
            $('#admsoft').focus();
            return false;
        }
    }
//inventario
    if( $("#form9 input[name='resinvsoft']:radio").is(':checked'))
    {  
        var inv = $('input:radio[name=resinvsoft]:checked').val();
        
    }
    else
    {
            alert('Porfavor selecciona una respuesta para Inventarios:');
            $('#resinvsoft').focus();
            return false;
    }
    
    if (inv == "Si") {
        if ($('#resinvsoft').val() == "") {
            alert("Porfavor llene el campo Software Inventarios");
            $('#resinvsoft').focus();
            return false;
        }
    }
    //Compras
    if( $("#form9 input[name='rescomprasoft']:radio").is(':checked'))
    {  
        var comp = $('input:radio[name=rescomprasoft]:checked').val();
        
    }
    else
    {
            alert('Porfavor selecciona una respuesta para Compras:');
            $('#rescomprasoft').focus();
            return false;
    }
    
    if (comp == "Si") {
        if ($('#comprasoft').val() == "") {
            alert("Porfavor llene el campo Software Compras");
            $('#comprasoft').focus();
            return false;
        }
    }
    //Ventas
    if( $("#form9 input[name='resventasoft']:radio").is(':checked'))
    {  
        var ventas = $('input:radio[name=resventasoft]:checked').val();
        
    }
    else
    {
            alert('Porfavor selecciona una respuesta para Ventas:');
            $('#resventasoft').focus();
            return false;
    }
    
    if (ventas == "Si") {
        if ($('#ventassoft').val() == "") {
            alert("Porfavor llene el campo Software Ventas");
            $('#ventassoft').focus();
            return false;
        }
    }
    //Producción
    if( $("#form9 input[name='resprodsoft']:radio").is(':checked'))
    {  
        var prod = $('input:radio[name=resprodsoft]:checked').val();
        
    }
    else
    {
            alert('Porfavor selecciona una respuesta para Producción:');
            $('#resprodsoft').focus();
            return false;
    }
    
    if (prod == "Si") {
        if ($('#prodsoft').val() == "") {
            alert("Porfavor llene el campo Software Producción");
            $('#prodsoft').focus();
            return false;
        }
    }
    //Calidad
    if( $("#form9 input[name='rescalidadsoft']:radio").is(':checked'))
    {  
        var calidad = $('input:radio[name=rescalidadsoft]:checked').val();
        
    }
    else
    {
            alert('Porfavor selecciona una respuesta para Inventarios:');
            $('#resinvsoft').focus();
            return false;
    }
    
    if (calidad == "Si") {
        if ($('#calidadsoft').val() == "") {
            alert("Porfavor llene el campo Software Inventarios");
            $('#calidadsoft').focus();
            return false;
        }
    }
    //Otro
    if( $("#form9 input[name='resotrosoft']:radio").is(':checked'))
    {  
        var otro = $('input:radio[name=resotrosoft]:checked').val();
        
    }
    else
    {
            alert('Porfavor selecciona una respuesta para otro software:');
            $('#resotrosoft').focus();
            return false;
    }
    
    if (otro == "Si") {
        if ($('#otrosoft').val() == "") {
            alert("Porfavor llene el campo Software Inventarios");
            $('#otrosoft').focus();
            return false;
        }
    }


            var fd = new FormData(document.getElementById("form9"));
            fd.append('id',id);
            fd.append('teclimpia',respuesta);
            fd.append('admin',admin);
            fd.append('inv',inv);
            fd.append('comp',comp);
            fd.append('ventas',ventas);
            fd.append('prod',prod);
            fd.append('calidad',calidad);
            fd.append('otro',otro);

            $.ajax({
                data:  fd,
                url:   'GuardarDatosGenerales.php?var=9',
                type:  'post',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                            
                },
                success:  function (response) {
                    val = response;
                    $('#contenedor9').hide();
                    $('#contenedor10').show();
                }
            });
        
        return val;
 
}

//Contenedor 10
function guardacont10(id) {
    var val =false;
    
    // n colaboradores
    if ($('#ncolaboradores').val() == "") {
        alert("Porfavor llene el campo Número de Colaboradores");
        $('#ncolaboradores').focus();
        return false;
    }

    //atraer
    if( $("#form10 input[name='atraer']:radio").is(':checked'))
    {  
        var respuesta = $('input:radio[name=atraer]:checked').val();
        
    }
    else
    {
            alert('Porfavor selecciona una respuesta para Atraer colaboradores');
            $('#atraer').focus();
            return false;
    }

    //retener
    if( $("#form10 input[name='retener']:radio").is(':checked'))
    {  
        var respuesta2 = $('input:radio[name=retener]:checked').val();
        
    }
    else
    {
            alert('Porfavor selecciona una respuesta para Retener a los colaboradores');
            $('#retener').focus();
            return false;
    }

    //administrar
    if( $("#form10 input[name='adminc']:radio").is(':checked'))
    {  
        var respuesta3 = $('input:radio[name=adminc]:checked').val();
        
    }
    else
    {
            alert('Porfavor selecciona una respuesta para Administrar colaboradores?');
            $('#adminc').focus();
            return false;
    }
    
    
            var fd = new FormData(document.getElementById("form10"));
            fd.append('id',id);
            fd.append('respuesta',respuesta);
            fd.append('respuesta2',respuesta2);
            fd.append('respuesta3',respuesta3);
            $.ajax({
                data:  fd,
                url:   'GuardarDatosGenerales.php?var=10',
                type:  'post',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                            
                },
                success:  function (response) {
                    val = response;
                    $('#contenedor10').hide();
                    $('#contenedor11').show();
                }
            });
        
        return val;
 
}

//Contenedor 11
function guardacont11(id) {
    var val =false;
    
    //atraer
    if( $("#form11 input[name='resexp']:radio").is(':checked'))
    {  
        var respuesta = $('input:radio[name=resexp]:checked').val();
        
    }
    else
    {
            alert('Porfavor selecciona una respuesta para ¿Ha tenido experiencia exportando?');
            $('#resexp').focus();
            return false;
    }

    if (respuesta == "Si") {
        $('#resnegativo').val("");
        $('#respais').val("");

        if ($('#lugexpo').val() == "") {
            alert("Porfavor responda la pregunta En caso de tener experiencia exportando, ¿A qué lugar ha exportado su producto y/o servicio?");
            $('#lugexpo').focus();
            return false;
        }

        if ($('#sigue').val() == "") {
            alert("Porfavor responda la pregunta ¿Actualmente sigue exportando? en caso de ser negativo ¿Por qué no?");
            $('#sigue').focus();
            return false;
        }

        if ($('#mreto').val() == "") {
            alert("Porfavor responda la pregunta ¿Cuál ha sido su mayor reto al exportar?");
            $('#mreto').focus();
            return false;
        }
    }
    if (respuesta == "No") {
        $('#lugexpo').val("");
        $('#sigue').val("");
        $('#mreto').val("");

        if ($('#resnegativo').val() == "") {
            alert("Porfavor responda la pregunta ¿Por qué razón no lo ha hecho ?");
            $('#resnegativo').focus();
            return false;
        }

        if ($('#respais').val() == "") {
            alert("Porfavor responda la pregunta En caso de que pudiera elegir un país para exportar su producto, ¿Cuál eligiría y por qué?");
            $('#respais').focus();
            return false;
        }
    }
    
            var fd = new FormData(document.getElementById("form11"));
            fd.append('id',id);
            fd.append('respuesta',respuesta);
            $.ajax({
                data:  fd,
                url:   'GuardarDatosGenerales.php?var=11',
                type:  'post',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                            
                },
                success:  function (response) {
                    val = response;
                    $('#contenedor11').hide();
                    $('#contenedor12').show();
                }
            });
        
        return val;
 
}

//Contenedor 12
function guardacont12(id) {
    var val =false;
    
    
            var fd = new FormData(document.getElementById("form12"));
            fd.append('id',id);
            $.ajax({
                data:  fd,
                url:   'GuardarDatosGenerales.php?var=12',
                type:  'post',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                            
                },
                success:  function (response) {
                    //alert(response);
                    val = response;
                    //alert('Encuesta Finalizada');
                   // location.href='http://www.bluewolf.com.mx/Internacionalizacion/';
                   $('#contenedor12').hide();
                    $('#contenedor13').show();
                }
            });
        
        return val;
 
}

//Contenedor 13
function guardacont13(id) {
    var val =false;
    var fd = new FormData(document.getElementById("form13"));
    if( $("#form13 input[name='resinfo']:radio").is(':checked'))
    {  
        var respuesta = $('input:radio[name=resinfo]:checked').val();
        if (respuesta == "Otro") {
            if ($('#otrores').val() != "") {
                fd.append('resinfo2',$('#otrores').val());
            }else{
                alert('Porfavor especifica como te enteraste');
                $('#otrores').focus();
                return false;
            }
            
        }
    }
    else
    {
            alert('Porfavor selecciona una respuesta para ¿Cómo te enteraste del PIEC 2018?');
            $('#resinfo1').focus();
            return false;
    }
    
            
            fd.append('id',id);
            $.ajax({
                data:  fd,
                url:   'GuardarDatosGenerales.php?var=13',
                type:  'post',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                            
                },
                success:  function (response) {
                    //alert(response);
                    val = response;
                    alert('Encuesta Finalizada');
                    location.href='http://www.bluewolf.com.mx/Internacionalizacion/';
                }
            });
        
        return val;
 
}