/* global app */
app.factory('Ubicacion',  function(httpPeticion) {  
    function Ubicacion(ubicacion) {
        if (ubicacion) {
            this.setData(ubicacion);
        }
        // Some other initializations related to book
    };
    Ubicacion.prototype = {
        setData: function(ubicacion) {
            angular.extend(this, ubicacion);
        },
        guardar: function(data) {
            httpPeticion.post('ubicacion', 'admin', $.param(data));
        }
    };
    return Ubicacion;
});


