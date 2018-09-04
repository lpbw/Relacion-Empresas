//¿Cuenta con planes para expandir su infraestructura?
$("#form7 input[name='resp']:radio").click(function(){
    var respuesta = $('input:radio[name=resp]:checked').val();
    if (respuesta == "Si") {
        $("#expa").show();
    }
    else{
        $("#expa").hide();
        $("#expansion").val("");
    }
    //console.log(respuesta);
});
if( $("#form7 input[name='resp']:radio").is(':checked'))
{  
    var respuesta = $('input:radio[name=resp]:checked').val();

    if (respuesta == "Si") {
        $("#expa").show();
    }
    else{
        $("#expa").hide();
        $("#expansion").val("");
    }
    //console.log(respuesta);
}
// fin ¿Cuenta con planes para expandir su infraestructura?

//¿Cuenta con alguna certificación?
$("#form8 input[name='rescertif']:radio").click(function(){
    var respuesta = $('input:radio[name=rescertif]:checked').val();
    if (respuesta == "Si") {
        $("#cualcerti").show();
    }
    else{
        $("#cualcerti").hide();
        $("#certifica").val("");
    }
    //console.log(respuesta);
});
if( $("#form8 input[name='rescertif']:radio").is(':checked'))
{  
    var respuesta = $('input:radio[name=rescertif]:checked').val();

    if (respuesta == "Si") {
        $("#cualcerti").show();
    }
    else{
        $("#cualcerti").hide();
        $("#certifica").val("");
    }
    //console.log(respuesta);
}
//fin ¿Cuenta con alguna certificación?

//¿Cuenta con algún premio o reconocimiento?
$("#form8 input[name='respremio']:radio").click(function(){
    var respuesta = $('input:radio[name=respremio]:checked').val();
    if (respuesta == "Si") {
        $("#cualpremio").show();
    }
    else{
        $("#cualpremio").hide();
        $("#premio").val("");
    }
    //console.log(respuesta);
});
if( $("#form8 input[name='respremio']:radio").is(':checked'))
{  
    var respuesta = $('input:radio[name=respremio]:checked').val();

    if (respuesta == "Si") {
        $("#cualpremio").show();
    }
    else{
        $("#cualpremio").hide();
        $("#premio").val("");
    }
    //console.log(respuesta);
}
//fin ¿Cuenta con algún premio o reconocimiento?

//¿Cuenta con tecnología limpia en su empresa? (Fotovoltaica, Eólica, etc)
    $("#form9 input[name='teclimpia']:radio").click(function(){
        var respuesta = $('input:radio[name=teclimpia]:checked').val();
        if (respuesta == "Si") {
            $("#cualestec").show();
        }
        else{
            $("#cualestec").hide();
            $("#cualesteclimpia").val("");
        }
    });
    if( $("#form9 input[name='teclimpia']:radio").is(':checked'))
    {  
        var respuesta = $('input:radio[name=teclimpia]:checked').val();

        if (respuesta == "Si") {
            $("#cualestec").show();
        }
        else{
            $("#cualestec").hide();
            $("#cualesteclimpia").val("");
        }
    }
// fin ¿Cuenta con tecnología limpia en su empresa? (Fotovoltaica, Eólica, etc)

//Administración/Finanzas
$("#form9 input[name='resadmsoft']:radio").click(function(){
    var respuesta = $('input:radio[name=resadmsoft]:checked').val();
    if (respuesta == "Si") {
        $("#finanzas").show();
    }
    else{
        $("#finanzas").hide();
        $("#admsoft").val("");
    }
});
if( $("#form9 input[name='resadmsoft']:radio").is(':checked'))
{  
    var respuesta = $('input:radio[name=resadmsoft]:checked').val();

    if (respuesta == "Si") {
        $("#finanzas").show();
    }
    else{
        $("#finanzas").hide();
        $("#admsoft").val("");
    }
}
//fin Administración/Finanzas

//Inventarios
$("#form9 input[name='resinvsoft']:radio").click(function(){
    var respuesta = $('input:radio[name=resinvsoft]:checked').val();
    if (respuesta == "Si") {
        $("#inventario").show();
    }
    else{
        $("#inventario").hide();
        $("#invsoft").val("");
    }
});
if( $("#form9 input[name='resinvsoft']:radio").is(':checked'))
{  
    var respuesta = $('input:radio[name=resinvsoft]:checked').val();

    if (respuesta == "Si") {
        $("#inventario").show();
    }
    else{
        $("#inventario").hide();
        $("#invsoft").val("");
    }
}
//fin Inventarios

//Compras
$("#form9 input[name='rescomprasoft']:radio").click(function(){
    var respuesta = $('input:radio[name=rescomprasoft]:checked').val();
    if (respuesta == "Si") {
        $("#compras").show();
    }
    else{
        $("#compras").hide();
        $("#comprasoft").val("");
    }
});
if( $("#form9 input[name='rescomprasoft']:radio").is(':checked'))
{  
    var respuesta = $('input:radio[name=rescomprasoft]:checked').val();

    if (respuesta == "Si") {
        $("#compras").show();
    }
    else{
        $("#compras").hide();
        $("#comprasoft").val("");
    }
}
//fin Compras

//Ventas
$("#form9 input[name='resventasoft']:radio").click(function(){
    var respuesta = $('input:radio[name=resventasoft]:checked').val();
    if (respuesta == "Si") {
        $("#ventas").show();
    }
    else{
        $("#ventas").hide();
        $("#ventasoft").val("");
    }
});
if( $("#form9 input[name='resventasoft']:radio").is(':checked'))
{  
    var respuesta = $('input:radio[name=resventasoft]:checked').val();

    if (respuesta == "Si") {
        $("#ventas").show();
    }
    else{
        $("#ventas").hide();
        $("#ventasoft").val("");
    }
}
//fin Ventas

//Producción
$("#form9 input[name='resprodsoft']:radio").click(function(){
    var respuesta = $('input:radio[name=resprodsoft]:checked').val();
    if (respuesta == "Si") {
        $("#produccion").show();
    }
    else{
        $("#produccion").hide();
        $("#prodsoft").val("");
    }
});
if( $("#form9 input[name='resprodsoft']:radio").is(':checked'))
{  
    var respuesta = $('input:radio[name=resprodsoft]:checked').val();

    if (respuesta == "Si") {
        $("#produccion").show();
    }
    else{
        $("#produccion").hide();
        $("#prodsoft").val("");
    }
}
//fin Producción

//Calidad
$("#form9 input[name='rescalidadsoft']:radio").click(function(){
    var respuesta = $('input:radio[name=rescalidadsoft]:checked').val();
    if (respuesta == "Si") {
        $("#calidad").show();
    }
    else{
        $("#calidad").hide();
        $("#calidadsoft").val("");
    }
});
if( $("#form9 input[name='rescalidadsoft']:radio").is(':checked'))
{  
    var respuesta = $('input:radio[name=rescalidadsoft]:checked').val();

    if (respuesta == "Si") {
        $("#calidad").show();
    }
    else{
        $("#calidad").hide();
        $("#calidadsoft").val("");
    }
}
//fin Calidad

//Otro
$("#form9 input[name='resotrosoft']:radio").click(function(){
    var respuesta = $('input:radio[name=resotrosoft]:checked').val();
    if (respuesta == "Si") {
        $("#otro").show();
    }
    else{
        $("#otro").hide();
        $("#otrosoft").val("");
    }
});
if( $("#form9 input[name='resotrosoft']:radio").is(':checked'))
{  
    var respuesta = $('input:radio[name=resotrosoft]:checked').val();

    if (respuesta == "Si") {
        $("#otro").show();
    }
    else{
        $("#otro").hide();
        $("#otrosoft").val("");
    }
}
//fin Otro

//¿Cuenta con algún otro tipo de Tecnología de la Información y Comunicación en su empresa?
$("#form9 input[name='resotrastics']:radio").click(function(){
    var respuesta = $('input:radio[name=resotrastics]:checked').val();
    if (respuesta == "Si") {
        $("#otrastic1").show();
    }
    else{
        $("#otrastic1").hide();
        $("#otrastics").val("");
    }
});
if( $("#form9 input[name='resotrastics']:radio").is(':checked'))
{  
    var respuesta = $('input:radio[name=resotrastics]:checked').val();

    if (respuesta == "Si") {
        $("#otrastic1").show();
    }
    else{
        $("#otrastic1").hide();
        $("#otrastics").val("");
    }
}
//fin ¿Cuenta con algún otro tipo de Tecnología de la Información y Comunicación en su empresa?

//¿Cuenta con otro tipo de tecnología su empresa? (Procesos automatizados, etc.)
$("#form9 input[name='resautomata']:radio").click(function(){
    var respuesta = $('input:radio[name=resautomata]:checked').val();
    if (respuesta == "Si") {
        $("#automata1").show();
    }
    else{
        $("#automata1").hide();
        $("#automata").val("");
    }
});
if( $("#form9 input[name='resautomata']:radio").is(':checked'))
{  
    var respuesta = $('input:radio[name=resautomata]:checked').val();

    if (respuesta == "Si") {
        $("#automata1").show();
    }
    else{
        $("#automata1").hide();
        $("#automata").val("");
    }
}
//fin ¿Cuenta con otro tipo de tecnología su empresa? (Procesos automatizados, etc.)