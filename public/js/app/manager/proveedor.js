/* global app */
app.factory('proveedorManager',['httpPeticion', '$q', 'Proveedor', function (httpPeticion, $q, Proveedor){
        var proveedorManager = {
            _pool: {},
            _retrieveInstance: function (proveedorId, proveedorData) {
                var instance = this._pool[proveedorId];

                if (instance) {
                    instance.setData(proveedorData);
                } else {
                    instance = new Proveedor(proveedorData);
                    this._pool[proveedorId] = instance;
                }

                return instance;
            },
            _search: function (proveedorId) {
                return this._pool[proveedorId];
            },
            _load: function (proveedorId, deferred) {
                var scope = this;
                var data = {
                    action: 'getById',
                    id: proveedorId
                };
                httpPeticion.post('proveedor', 'admin', $.param(data)).then(
                        function (data) {
                            var result = scope._retrieveInstance(data.data.id, data.data);
                            deferred.resolve(result);
                        }, function (error) {
                    deferred.reject();

                });
            },
            /* Public Methods */
            /* Use this function in order to get a usuario instance by it's id */
            getProveedor: function (proveedorId) {
                var deferred = $q.defer();
                var proveedor = this._search(proveedorId);
                if (proveedor) {
                    deferred.resolve(proveedor);
                } else {
                    this._load(proveedorId, deferred);
                }
                return deferred.promise;
            },
            /* Use this function in order to get instances of all the usuarios */
            loadAllproveedors: function (data) {
                var deferred = $q.defer();
                var scope = this;
                httpPeticion.post('proveedor', 'admin', $.param(data)).then(
                        function (data) {
                            deferred.resolve(data);
                        }, function (error) {
                    console.log(error);
                    deferred.reject();

                });
                return deferred.promise;
            },
            /*  This function is useful when we got somehow the usuario data and we wish to store it or update the pool and get a usuario instance in return */
            setProveedor: function (proveedorData) {
                var scope = this;
                var proveedor = this._search(proveedorData.id);
                if (proveedor) {
                    proveedor.setData(proveedorData);
                } else {
                    proveedor = scope._retrieveInstance(proveedorData);
                }
                return proveedor;
            },
            saveProveedor:function (proveedorData) {
                Proveedor.prototype.guardar(proveedorData);
            }
        };
        return proveedorManager;
    }]);



