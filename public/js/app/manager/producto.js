/* global app */
app.factory('productoManager',['httpPeticion', '$q', 'Producto', function (httpPeticion, $q, Producto){
        var productoManager = {
            _pool: {},
            _retrieveInstance: function (productoId, productoData) {
                var instance = this._pool[productoId];

                if (instance) {
                    instance.setData(productoData);
                } else {
                    instance = new Producto(productoData);
                    this._pool[productoId] = instance;
                }

                return instance;
            },
            _search: function (productoId) {
                return this._pool[productoId];
            },
            _load: function (productoId, deferred) {
                var scope = this;
                var data = {
                    action: 'getById',
                    id: productoId
                };
                httpPeticion.post('producto', 'admin', $.param(data)).then(
                        function (data) {
                            var result = scope._retrieveInstance(data.data.id, data.data);
                            deferred.resolve(result);
                        }, function (error) {
                    deferred.reject();

                });
            },
            /* Public Methods */
            /* Use this function in order to get a usuario instance by it's id */
            getProducto: function (productoId) {
                var deferred = $q.defer();
                var producto = this._search(productoId);
                if (producto) {
                    deferred.resolve(producto);
                } else {
                    this._load(productoId, deferred);
                }
                return deferred.promise;
            },
            /* Use this function in order to get instances of all the usuarios */
            loadAllproductos: function (data) {
                var deferred = $q.defer();
                var scope = this;
                httpPeticion.post('producto', 'admin', $.param(data)).then(
                        function (data) {
                            deferred.resolve(data);
                        }, function (error) {
                    console.log(error);
                    deferred.reject();

                });
                return deferred.promise;
            },
            /*  This function is useful when we got somehow the usuario data and we wish to store it or update the pool and get a usuario instance in return */
            setProducto: function (productoData) {
                var scope = this;
                var producto = this._search(productoData.id);
                if (producto) {
                    producto.setData(productoData);
                } else {
                    producto = scope._retrieveInstance(productoData);
                }
                return producto;
            },
            saveProducto:function (productoData) {
                Producto.prototype.guardar(productoData);
            }
        };
        return productoManager;
    }]);



