/* global app */
app.factory('Proveedor',  function(httpPeticion) {  
    function Proveedor(proveedor) {
        if (proveedor) {
            this.setData(proveedor);
        }
        // Some other initializations related to book
    };
    Proveedor.prototype = {
        setData: function(proveedor) {
            angular.extend(this, proveedor);
        },
        guardar: function(data) {
            httpPeticion.post('proveedor', 'admin', $.param(data));
        }
    };
    return Proveedor;
});


