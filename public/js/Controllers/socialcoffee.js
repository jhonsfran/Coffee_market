/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//var MODAL = $("#modalProducto");
var URL = Define.URL_BASE;


window.onload=function(){
    //toastr.error("Ingresaaaaaaaaa");

    var url_ajax = URL + Define.URL_OLVIDE; //le decimos a qué url tiene que mandar la información

    var data = {
        action: 'validar'
    };


    httpPetition.ajxPost(url_ajax, data, function (data) {

        if(data.mensaje == "Ok"){
            toastr.success("Bienvenido amante del cafe, esto es Coffee Market House");
            redireccionar(Define.URL_BASE + "socialcoffee");
        }

    });

};


function redireccionar(url_direccionar){
    setTimeout(function(){ location.href=url_direccionar; }, 5000); //tiempo expresado en milisegundos
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


$("#login").delegate('#ingresoLogin', 'click', function () {//validar usuario



    var url_ajax = URL + Define.URL_LOGIN; //le decimos a qué url tiene que mandar la información

    var usuario_a_buscar = $("#name").val();
    var passwd_user = $("#pswd").val();
    var recordame_ve = false;

    if($('#recuerdame').is(':checked')){
        recordame_ve = true;
    }

    alert(recordame_ve);

    var data = {
        action: 'ingresar',
        username: usuario_a_buscar,
        password_user: passwd_user,
        recuerdame: recordame_ve
    };

    if(usuario_a_buscar == '' || passwd_user == ''){

        toastr.error("Username y/o contraseña vacíos, por favor digite un valor");
    
    }else{

        httpPetition.ajxPost(url_ajax, data, function (data) {

            if(data.mensaje == "Ok"){

                toastr.success("Bienvenido amante del cafe, esto es Coffee Market House");
                redireccionar(Define.URL_BASE + "socialcoffee");
            }

        });
    };

});

