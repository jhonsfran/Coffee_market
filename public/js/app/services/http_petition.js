/* global app */
app.factory('httpPeticion', function ($q, $http, toastr) {
    var url = "http://localhost/inventario/public";
    return {
        post: function (controller, action, data) {
            var deferred = $q.defer();
            $http.post(url + "/" + controller + "/" + action, data, {
                headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
            })
                    .success(function (data, status) {
                        if (status == 200 && data.data === 'OK') {
                            toastr.success('Guardado Exitoso!');
                            deferred.resolve(data);
                        } else if (status == 200 && !data.error) {
                            toastr.info('Proceso Exitoso!', {timeOut: 800});
                            deferred.resolve(data);
                        } else if (data.error) {
                            toastr.error(data.mensaje, data.code);
                            deferred.resolve(data);
                        }
                    })
                    .error(function (data, status, headers, config) {
                        console.log(data);
                        console.log(status);
                        console.log(config);
                        if (status == -1) {
                            toastr.error('No se puede conectar con el servidor.', 'Error');
                        } else if (status == 404) {
                            toastr.error('No se encontro la petición', 'Error');
                        }
                        deferred.reject('There was an error creating object');
                        deferred.resolve(data);
                    });
            return deferred.promise;
        }
    };
});
