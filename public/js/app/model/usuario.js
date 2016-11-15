/* global app */
app.factory('Usuario',  function(httpPeticion) {  
    function Usuario(usuario) {
        if (usuario) {
            this.setData(usuario);
        }
        // Some other initializations related to book
    };
    Usuario.prototype = {
        setData: function(usuario) {
            angular.extend(this, usuario);
        },
        guardar: function(data) {
            httpPeticion.post('usuario', 'admin', $.param(data));
        }
    };
    return Usuario;
});


