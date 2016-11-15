/* global app */
app.factory('Producto',  function(httpPeticion) {  
    function Producto(producto) {
        if (producto) {
            this.setData(producto);
        }
        // Some other initializations related to book
    };
    Producto.prototype = {
        setData: function(producto) {
            angular.extend(this, producto);
        },
        guardar: function(data) {
            httpPeticion.post('producto', 'admin', $.param(data));
        }
    };
    return Producto;
});


