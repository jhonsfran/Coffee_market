/* global app */
app.factory('Compra',  function(httpPeticion) {  
    function Compra(compra) {
        if (compra) {
            this.setData(compra);
        }
        // Some other initializations related to book
    };
    Compra.prototype = {
        setData: function(compra) {
            angular.extend(this, compra);
        },
        guardar: function(data) {
            httpPeticion.post('compra', 'admin', $.param(data));
        }
    };
    return Compra;
});


