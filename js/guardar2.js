//INFORMACION FINANCIERA.
function guardacont6(id) {
    var val =false;

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
    
    // if ($('#superficie').val() == "") {
    //     alert("Porfavor llene el campo Superficie Terreno");
    //     $('#superficie').focus();
    //     return false;
    // }
    
    // if ($('#construccion').val() == "") {
    //     alert("Porfavor llene el campo Metros cuadrados de construcción");
    //     $('#construccion').focus();
    //     return false;
    // }

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

    if (respuesta=="Si")
    {
        if ($('#cexpansion').val() == "") {
            alert("Porfavor llene el campo Capacidad de expandir");
            $('#expansion').focus();
            return false;
        }
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
    
    if (respuesta == "Si")
    {
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
    //otras tics
    if( $("#form9 input[name='resotrastics']:radio").is(':checked'))
    {  
        var restics = $('input:radio[name=resotrastics]:checked').val();
        
    }
    else
    {
            //alert('Porfavor selecciona una respuesta para ¿Cuenta con tecnología limpia en su empresa?');
           //$('#teclimpia').focus();
            return false;
    }
        
    if (restics == "Si") {
        if ($('#otrastics').val() == "") {
            alert("Porfavor responda la pregunta: ¿Cuenta con algún otro tipo de Tecnología de la Información y Comunicación en su empresa?");
            $('#otrastics').focus();
            return false;
        }
    }

    //automata
    if( $("#form9 input[name='resautomata']:radio").is(':checked'))
    {  
        var resauto = $('input:radio[name=resautomata]:checked').val();
        
    }
    else
    {
            //alert('Porfavor selecciona una respuesta para ¿Cuenta con tecnología limpia en su empresa?');
           //$('#teclimpia').focus();
            return false;
    }
        
    if (resauto == "Si") {
        if ($('#automata').val() == "") {
            alert("Porfavor responda la pregunta: ¿Cuenta con otro tipo de tecnología su empresa?");
            $('#automata').focus();
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
            fd.append('restics',restics);
            fd.append('resauto',resauto);

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
                    console.log(response);
                    
                    alert('¡Felicidades has terminado tu registro!');
                    location.href='http://www.bluewolf.com.mx/Internacionalizacion/';
                }
            });
        
        return val;
 
}