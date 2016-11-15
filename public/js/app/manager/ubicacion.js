/* global app */
app.factory('ubicacionManager',['httpPeticion', '$q', 'Ubicacion', function (httpPeticion, $q, Ubicacion){
        var ubicacionManager = {
            _pool: {},
            _retrieveInstance: function (ubicacionId, ubicacionData) {
                var instance = this._pool[ubicacionId];

                if (instance) {
                    instance.setData(ubicacionData);
                } else {
                    instance = new Ubicacion(ubicacionData);
                    this._pool[ubicacionId] = instance;
                }

                return instance;
            },
            _search: function (ubicacionId) {
                return this._pool[ubicacionId];
            },
            _load: function (ubicacionId, deferred) {
                var scope = this;
                var data = {
                    action: 'getById',
                    id: ubicacionId
                };
                httpPeticion.post('ubicacion', 'admin', $.param(data)).then(
                        function (data) {
                            var result = scope._retrieveInstance(data.data.id, data.data);
                            deferred.resolve(result);
                        }, function (error) {
                    deferred.reject();

                });
            },
            /* Public Methods */
            /* Use this function in order to get a usuario instance by it's id */
            getUbicacion: function (ubicacionId) {
                var deferred = $q.defer();
                var ubicacion = this._search(ubicacionId);
                if (ubicacion) {
                    deferred.resolve(ubicacion);
                } else {
                    this._load(ubicacionId, deferred);
                }
                return deferred.promise;
            },
            /* Use this function in order to get instances of all the usuarios */
            loadAllubicacions: function (data) {
                var deferred = $q.defer();
                var scope = this;
                httpPeticion.post('ubicacion', 'admin', $.param(data)).then(
                        function (data) {
                            deferred.resolve(data);
                        }, function (error) {
                    console.log(error);
                    deferred.reject();

                });
                return deferred.promise;
            },
            /*  This function is useful when we got somehow the usuario data and we wish to store it or update the pool and get a usuario instance in return */
            setUbicacion: function (ubicacionData) {
                var scope = this;
                var ubicacion = this._search(ubicacionData.id);
                if (ubicacion) {
                    ubicacion.setData(ubicacionData);
                } else {
                    ubicacion = scope._retrieveInstance(ubicacionData);
                }
                return ubicacion;
            },
            saveUbicacion:function (ubicacionData) {
                Ubicacion.prototype.guardar(ubicacionData);
            }
        };
        return ubicacionManager;
    }]);



