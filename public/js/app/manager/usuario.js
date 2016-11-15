/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* global app */

app.factory('usuarioManager', ['httpPeticion', '$q', 'Usuario', function (httpPeticion, $q, Usuario) {
        var usuarioManager = {
            _pool: {},
            _retrieveInstance: function (usuarioId, usuarioData) {
                var instance = this._pool[usuarioId];

                if (instance) {
                    instance.setData(usuarioData);
                } else {
                    instance = new Usuario(usuarioData);
                    this._pool[usuarioId] = instance;
                }

                return instance;
            },
            _search: function (usuarioId) {
                return this._pool[usuarioId];
            },
            _load: function (usuarioId, deferred) {
                var scope = this;
                var data = {
                    action: 'getById',
                    id: usuarioId
                };
                httpPeticion.post('usuario', 'admin', $.param(data)).then(
                        function (data) {
                            var Asignatura = scope._retrieveInstance(data.data.id, data.data);
                            deferred.resolve(Asignatura);
                        }, function (error) {
                    deferred.reject();

                });
            },
            /* Public Methods */
            /* Use this function in order to get a usuario instance by it's id */
            getUsuario: function (usuarioId) {
                var deferred = $q.defer();
                var usuario = this._search(usuarioId);
                if (usuario) {
                    deferred.resolve(usuario);
                } else {
                    this._load(usuarioId, deferred);
                }
                return deferred.promise;
            },
            /* Use this function in order to get instances of all the usuarios */
            loadAllusuarios: function (data) {
                var deferred = $q.defer();
                var scope = this;
                httpPeticion.post('usuario', 'admin', $.param(data)).then(
                        function (data) {
                            deferred.resolve(data);
                        }, function (error) {
                    console.log(error);
                    deferred.reject();

                });
                return deferred.promise;
            },
            /*  This function is useful when we got somehow the usuario data and we wish to store it or update the pool and get a usuario instance in return */
            setUsuario: function (usuarioData) {
                var scope = this;
                var usuario = this._search(usuarioData.id);
                if (usuario) {
                    usuario.setData(usuarioData);
                } else {
                    usuario = scope._retrieveInstance(usuarioData);
                }
                return usuario;
            },
            saveUsuario:function (usuarioData) {
                Usuario.prototype.guardar(usuarioData);
            }
        };
        return usuarioManager;
    }]);



