/* global app */
app.factory('compraManager',['httpPeticion', '$q', 'Compra', function (httpPeticion, $q, Compra){
        var compraManager = {
            _pool: {},
            _retrieveInstance: function (compraId, compraData) {
                var instance = this._pool[compraId];

                if (instance) {
                    instance.setData(compraData);
                } else {
                    instance = new Compra(compraData);
                    this._pool[compraId] = instance;
                }

                return instance;
            },
            _search: function (compraId) {
                return this._pool[compraId];
            },
            _load: function (compraId, deferred) {
                var scope = this;
                var data = {
                    action: 'getById',
                    id: compraId
                };
                httpPeticion.post('compra', 'admin', $.param(data)).then(
                        function (data) {
                            var result = scope._retrieveInstance(data.data.id, data.data);
                            deferred.resolve(result);
                        }, function (error) {
                    deferred.reject();

                });
            },
            /* Public Methods */
            /* Use this function in order to get a usuario instance by it's id */
            getCompra: function (compraId) {
                var deferred = $q.defer();
                var compra = this._search(compraId);
                if (compra) {
                    deferred.resolve(compra);
                } else {
                    this._load(compraId, deferred);
                }
                return deferred.promise;
            },
            /* Use this function in order to get instances of all the usuarios */
            loadAllcompras: function (data) {
                var deferred = $q.defer();
                var scope = this;
                httpPeticion.post('compra', 'admin', $.param(data)).then(
                        function (data) {
                            deferred.resolve(data);
                        }, function (error) {
                    console.log(error);
                    deferred.reject();

                });
                return deferred.promise;
            },
            /*  This function is useful when we got somehow the usuario data and we wish to store it or update the pool and get a usuario instance in return */
            setCompra: function (compraData) {
                var scope = this;
                var compra = this._search(compraData.id);
                if (compra) {
                    compra.setData(compraData);
                } else {
                    compra = scope._retrieveInstance(compraData);
                }
                return compra;
            },
            saveCompra:function (compraData) {
                Compra.prototype.guardar(compraData);
            }
        };
        return compraManager;
    }]);



