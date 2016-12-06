/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//var MODAL = $("#modalProducto");
var URL = Define.URL_BASE;
var SOLICITUSEMEOLVIDO=false;
var registro_usuario_new={};
var registro_cuenta_new={};
var suscripcion='';
var tipo_pago='';
var preferencias='';
var foto=false;
var tipo_cuenta_user = '';


$(document).ready(function() {

    var url_ajax = URL + Define.URL_REGISTER;

    //$("#preferencias").html("<option value='AL'>Alabama</option>");

    var data_ajax = {
        action: 'find_prefer'
    }
    
    httpPetition.ajxPost(url_ajax, data_ajax, function (data) {

        var options = "<option value=''>Ninguna Preferencia seleccionada...</option>";



        $(data.data).each(function (index, element) {

            // console.log(element.data[index].id);

            //options += "<option value="+ element.data[index].id +">"+ element.data[index].descripcion +"</option>";
            //options += "<option value=" + element.preferenciaIdPreferencia + ">" + element.descripcion + " - " + element.estado + "</option>";


            options += '<option value='+ '"' + element.preferenciaIdPreferencia + '"' + ' name=' + '"' + element.preferenciaNombre + '"' + ' >' + element.preferenciaNombre + '</option>';


        });


        $("#preferencias").html(options);
    });


  $(".js-example-responsive").select2({
    tags: true,
    tokenSeparators: [','],
    placeholder: 'Click para seleccionar tus preferencia, puedes crear tus propias preferencias',
    allowClear: true,
    data: [
        {
          id: 'value',
          text: 'Text to display'
        },
          ],

    createTag: function (params) {
        var term = $.trim(params.term);

        if (term === '') {
          return null;
        }

        return {
          id: term,
          text: term,
          newTag: true // add additional parameters
        }
      }
      });
});


$('select').on('select2:select', function (evt) {

  preferencias = $('#preferencias').val();
  tipo_cuenta_user = $('#tipo_cuenta_user').val();

  //alert(preferencias+'hhhh'+tipo_cuenta_user);

});



function redireccionar(url_direccionar){
    setTimeout(function(){ location.href=url_direccionar; }, 4000); //tiempo expresado en milisegundos
} 

$("#olvide").delegate('#semeolvido', 'click', function () {//buscar pedido en bd

    var usuario_a_buscar = $("#username").val();

    var url_ajax = URL + Define.URL_OLVIDE; //le decimos a qué url tiene que mandar la información

    var data = {
        action: 'semeolvido',
        username: usuario_a_buscar
    };

    if(!SOLICITUSEMEOLVIDO){

        httpPetition.ajxPost(url_ajax, data, function (data) {

            if(data.itemsCount != 0){
                SOLICITUSEMEOLVIDO = true;
                url_direccionar = Define.URL_BASE + "cuenta/login"

                toastr.warning("Hola " + data.data[0].usuarioNombres + ", se te enviará la nueva contraseña al correo: " + data.data[0].usuarioEmail);

                redireccionar(url_direccionar);

            }else{
                toastr.error("No existe una cuenta asociada a ese nombre de usuario.");
            }

        });
    
    }else{

        toastr.error("La solicitud ya fue enviada, revisa tu correo.");
    };

});


$("#register").delegate('#continuar1', 'click', function () {//buscar pedido en bd

    var tipodocumento="";

    if($('#cedula').is(':checked')){
        tipodocumento = "C.C.";
    }else if($('#tarjeta').is(':checked')){
        tipodocumento = "T.I.";
    }else if($('#otro').is(':checked')){
        tipodocumento = "OTRO";
    }


    var nombres = $("#nombres").val();
    var password = $("#password").val();
    var nickname = $("#nickname").val();
    var apellidos = $("#apellidos").val();
    var documento = $("#documento").val();
    var tipo_documento = $("#tipo_documento").val();
    var email = $("#email").val();
    var telefono = $("#telefono").val();
    var celular = $("#celular").val();
    var direccion = $("#direccion").val();

    var url_ajax = URL + Define.URL_REGISTER; //le decimos a qué url tiene que mandar la información

    registro_usuario_new = {
        username: nickname,
        password: password,
        nombres:nombres,
        apellidos:apellidos,
        documento:documento,
        tipo_documento:tipodocumento,
        email:email,
        telefono:telefono,
        celular:celular,
        direccion:direccion,
        suscripcion:suscripcion
    };

    var valida_usernickname = {
        action: 'validar_nickname',
        username: nickname
    };

    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;


    if(nombres == '' || password == '' || apellidos == '' || documento == '' || email == '' || telefono == '' || celular == '' || direccion == ''){

        toastr.error("Debe digitar todos los campos para continuar");

    }else if(isNaN(celular) || isNaN(documento) || isNaN(telefono)){

        toastr.error("El número de celular, el teléfono y el número de documento deben ser un número");

    }else if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1){

        toastr.error("El Email es inválido");

    }else if(suscripcion == ''){

        toastr.error("Debe escoger una suscripcion para poder continuar");

    }else{

        httpPetition.ajxPost(url_ajax, valida_usernickname, function (data) {

            if(!data.existe){

                    
                    $('.nav-tabs a[href="#profile"]').tab('show');
                    toastr.success("Todo en orden, vamos al siguiente paso...");


            }else{

                toastr.error("El nombre de usuario ya existe, por favor modifiquelo");

            }

        });
    }


});



$("#register").delegate('#continuar2', 'click', function () {//buscar pedido en bd


    var num_cuenta = $("#num_cuenta").val();
    var banco = $("#banco").val();
    var codigo_postal = $("#codigo_postal").val();
    var pais_cuenta = $("#pais_cuenta").val();
    var dir_envio_1 = $("#dir_envio_1").val();
    var dir_envio_2 = $("#dir_envio_2").val();
    var dir_envio_3 = $("#dir_envio_3").val();

    var url_ajax = URL + Define.URL_REGISTER; //le decimos a qué url tiene que mandar la información

    registro_cuenta_new = {
        num_cuenta: num_cuenta,
        tipo_pago:tipo_pago,
        banco:banco,
        pais:pais_cuenta,
        codigo_postal:codigo_postal,
        dir_envio_1:dir_envio_1,
        dir_envio_2:dir_envio_2,
        dir_envio_3:dir_envio_3
    };

    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;


    if(num_cuenta == '' || codigo_postal == '' || banco == ''){

        toastr.error("Debe digitar todos los campos para continuar");

    }else if(isNaN(num_cuenta) || isNaN(codigo_postal)){

        toastr.error("El número de cuenta y el código postal debe ser un número");

    }else if(dir_envio_1 == '' && dir_envio_2 == '' && dir_envio_3 == ''){

        toastr.error("Debe digitar al menos una Dirección de envío");

    }else if(tipo_pago == ''){

        toastr.error("Debe escoger una forma de pago");

    }else{


        $('.nav-tabs a[href="#messages"]').tab('show');
        toastr.success("Todo en orden, queda un último paso...");
    }


});

$("#register").delegate('#continuar3', 'click', function () {//buscar pedido en bd

    var url_ajax = URL + Define.URL_REGISTER; //le decimos a qué url tiene que mandar la información

    var data = {
        action: 'guardar',
        registro_usuario_new: registro_usuario_new,
        registro_cuenta_new: registro_cuenta_new,
        suscripcion: suscripcion,
        tipo_pago: tipo_pago,
        preferencias: preferencias,
        tipo_cuenta_user: tipo_cuenta_user
    };


    if(foto == false || preferencias == ''){

        toastr.error("Debe subir la foto de perfil y digitar las preferencias para continuar");

    }else{

        bootbox.confirm({
            message: "Estas seguro que deseas Ingresar a nuestro selecto grupo?",
            buttons: {
                confirm: {
                    label: 'Si, quiero unirme',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-defautl'
                }
            },
            callback: function (result) {
                console.log('This was logged in the callback: ' + result);

                if(!result){

                    toastr.error("Has cancelado en registro");

                }else{

                    toastr.success("Que buena desición has tomado");

                    httpPetition.ajxPost(url_ajax, data, function (data) {

                        if(data.error == false){

                            toastr.success("Bienvenido amante del cafe, esto es Coffee Market House");
                            //redireccionar(Define.URL_BASE + "socialcoffee/index/index");

                        }else{

                            //alert(data.mensaje);
                            toastr.error(data.mensaje);
                        }

                    });

                }
                
            }
        });
    }


});


$("#login").delegate('#ingresoLogin', 'click', function () {//validar usuario



    var url_ajax = URL + Define.URL_LOGIN; //le decimos a qué url tiene que mandar la información

    var usuario_a_buscar = $("#name").val();
    var passwd_user = $("#pswd").val();
    var recordame_ve = false;

    if($('#recuerdame').is(':checked')){
        recordame_ve = true;
    }

    //alert(recordame_ve);

    registro_usuario_new = {
        action: 'ingresar',
        username: usuario_a_buscar,
        password_user: passwd_user,
        recuerdame: recordame_ve
    };

    if(usuario_a_buscar == '' || passwd_user == ''){

        toastr.error("Username y/o contraseña vacíos, por favor digite un valor");
    
    }else{

        httpPetition.ajxPost(url_ajax, registro_usuario_new, function (data) {

            if(data.mensaje == "Ok"){

                toastr.success("Bienvenido amante del cafe, esto es Coffee Market House");
                redireccionar(Define.URL_BASE + "socialcoffee/index/index");

            }else{

                toastr.error(data.mensaje);
            }

        });
    };

});

$("#register").delegate('#suscripcion1', 'click', function () {//validar usuario

    var tipo_suscripcion = $("#suscripcion1").val();

    $("#modal_probadita").css('opacity',0);
    $("#modal_casero").css('opacity',0);
    $("#modal_empresarial").css('opacity',0);
    $("#modal_especial").css('opacity',0);

    $("#modal_probadita").find('i').removeClass();
    $("#modal_casero").find('i').removeClass();
    $("#modal_empresarial").find('i').removeClass();
    $("#modal_especial").find('i').removeClass();

    $("#modal_probadita").find('i').addClass("fa fa-search-plus fa-3x");
    $("#modal_casero").find('i').addClass("fa fa-search-plus fa-3x");
    $("#modal_empresarial").find('i').addClass("fa fa-search-plus fa-3x");
    $("#modal_especial").find('i').addClass("fa fa-search-plus fa-3x");


        $("#modal_probadita").find('i').removeClass("fa fa-search-plus fa-3x");
        $("#modal_probadita").find('i').addClass("fa fa-check fa-3x");
        $("#modal_probadita").css('opacity',0.8);

        suscripcion = tipo_suscripcion;



});


$("#register").delegate('#visa', 'click', function () {//validar usuario

    $("#visa").find('img').css('width','56px');
    $("#visa").find('img').css('height','35px');

    $("#mastercard").find('img').css('width','35px');
    $("#mastercard").find('img').css('height','18px');

    $("#american").find('img').css('width','35px');
    $("#american").find('img').css('height','18px');

    $("#paypal").find('img').css('width','35px');
    $("#paypal").find('img').css('height','18px');

        tipo_pago = 'visa';

});

$("#register").delegate('#mastercard', 'click', function () {//validar usuario


    $("#mastercard").find('img').css('width','56px');
    $("#mastercard").find('img').css('height','35px');

    $("#visa").find('img').css('width','35px');
    $("#visa").find('img').css('height','18px');

    $("#american").find('img').css('width','35px');
    $("#american").find('img').css('height','18px');

    $("#paypal").find('img').css('width','35px');
    $("#paypal").find('img').css('height','18px');

        tipo_pago = 'mastercard';

});

$("#register").delegate('#american', 'click', function () {//validar usuario


    $("#american").find('img').css('width','56px');
    $("#american").find('img').css('height','35px');

    $("#mastercard").find('img').css('width','35px');
    $("#mastercard").find('img').css('height','18px');

    $("#visa").find('img').css('width','35px');
    $("#visa").find('img').css('height','18px');

    $("#paypal").find('img').css('width','35px');
    $("#paypal").find('img').css('height','18px');

        tipo_pago = 'american';

});

$("#register").delegate('#paypal', 'click', function () {//validar usuario

    $("#paypal").find('img').css('width','56px');
    $("#paypal").find('img').css('height','35px');

    $("#mastercard").find('img').css('width','35px');
    $("#mastercard").find('img').css('height','18px');

    $("#american").find('img').css('width','35px');
    $("#american").find('img').css('height','18px');

    $("#visa").find('img').css('width','35px');
    $("#visa").find('img').css('height','18px');

        tipo_pago = 'paypal';

});

$("#register").delegate('#suscripcion2', 'click', function () {//validar usuario

    var tipo_suscripcion = $("#suscripcion2").val();

    $("#modal_probadita").css('opacity',0);
    $("#modal_casero").css('opacity',0);
    $("#modal_empresarial").css('opacity',0);
    $("#modal_especial").css('opacity',0);

    $("#modal_probadita").find('i').removeClass();
    $("#modal_casero").find('i').removeClass();
    $("#modal_empresarial").find('i').removeClass();
    $("#modal_especial").find('i').removeClass();

    $("#modal_probadita").find('i').addClass("fa fa-search-plus fa-3x");
    $("#modal_casero").find('i').addClass("fa fa-search-plus fa-3x");
    $("#modal_empresarial").find('i').addClass("fa fa-search-plus fa-3x");
    $("#modal_especial").find('i').addClass("fa fa-search-plus fa-3x");


        $("#modal_casero").find('i').removeClass("fa fa-search-plus fa-3x");
        $("#modal_casero").find('i').addClass("fa fa-check fa-3x");
        $("#modal_casero").css('opacity',0.8);

        suscripcion = tipo_suscripcion;

});

$("#register").delegate('#suscripcion3', 'click', function () {//validar usuario

    var tipo_suscripcion = $("#suscripcion3").val();

    $("#modal_probadita").css('opacity',0);
    $("#modal_casero").css('opacity',0);
    $("#modal_empresarial").css('opacity',0);
    $("#modal_especial").css('opacity',0);

    $("#modal_probadita").find('i').removeClass();
    $("#modal_casero").find('i').removeClass();
    $("#modal_empresarial").find('i').removeClass();
    $("#modal_especial").find('i').removeClass();

    $("#modal_probadita").find('i').addClass("fa fa-search-plus fa-3x");
    $("#modal_casero").find('i').addClass("fa fa-search-plus fa-3x");
    $("#modal_empresarial").find('i').addClass("fa fa-search-plus fa-3x");
    $("#modal_especial").find('i').addClass("fa fa-search-plus fa-3x");


        $("#modal_empresarial").find('i').removeClass("fa fa-search-plus fa-3x");
        $("#modal_empresarial").find('i').addClass("fa fa-check fa-3x");
        $("#modal_empresarial").css('opacity',0.8);

        suscripcion = tipo_suscripcion;


});

$("#register").delegate('#suscripcion4', 'click', function () {//validar usuario

    var tipo_suscripcion = $("#suscripcion4").val();

    $("#modal_probadita").css('opacity',0);
    $("#modal_casero").css('opacity',0);
    $("#modal_empresarial").css('opacity',0);
    $("#modal_especial").css('opacity',0);

    $("#modal_probadita").find('i').removeClass();
    $("#modal_casero").find('i').removeClass();
    $("#modal_empresarial").find('i').removeClass();
    $("#modal_especial").find('i').removeClass();

    $("#modal_probadita").find('i').addClass("fa fa-search-plus fa-3x");
    $("#modal_casero").find('i').addClass("fa fa-search-plus fa-3x");
    $("#modal_empresarial").find('i').addClass("fa fa-search-plus fa-3x");
    $("#modal_especial").find('i').addClass("fa fa-search-plus fa-3x");

        $("#modal_especial").find('i').removeClass("fa fa-search-plus fa-3x");
        $("#modal_especial").find('i').addClass("fa fa-check fa-3x");
        $("#modal_especial").css('opacity',0.8);

        suscripcion = tipo_suscripcion;


});


