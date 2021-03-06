var httpPetition = {
    ajxSubmit: function (form, url, callback) {
        if ($(form).is('form')) {
            var form = form.serializeObject();
        }
        $.ajax({
            type: "POST",
            url: url,
            data: {
                action: 'Guardar',
                data: form
            },
            beforeSend: function () {
                toastr.info('Procesando');
            },
            success: function (data) {
                console.log(data);
                toastr.clear();
                callback(data.error);
                if (!data.error) {
                    if ($(form).is('form')) {
                        util.resetForm($(form));
                    }
                    toastr.success("Guardado Exitoso!");
                } else {
                    toastr.clear();
                    toastr.error(data.mensaje, data.codigo);
                }
            }
        });
    },
    ajxPost: function (url, data, callback) {
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            beforeSend: function () {
                toastr.info('Procesando');
            },
            error: function (jqXHR, exception) {
                if (jqXHR.status === 0) {
                    alert('Not connect.\n Verify Network.');
                } else if (jqXHR.status == 404) {
                    alert('Requested page not found. [404]');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error [500].');
                } else if (exception === 'parsererror') {
                    alert('Requested JSON parse failed.');
                } else if (exception === 'timeout') {
                    alert('Time out error.');
                } else if (exception === 'abort') {
                    alert('Ajax request aborted.');
                } else {
                    alert('Uncaught Error.\n' + jqXHR.responseText);
                }
            },
            success: function (data) {
                if (data.error) {
                    toastr.clear();
                    toastr.error(data.mensaje, data.codigo);
                } else {
                    toastr.clear();
                    callback(data);
                }
            }
        });
    },
    loadPage: function (url, data, callback) {
        return  $.ajax({
            type: "POST",
            url: url,
            data: data,
            beforeSend: function () {
                NProgress.start();
                NProgress.set(0.3);
            },
            success: function (data) {
                NProgress.set(0.6);
                NProgress.done();
                return callback(data);
            }
        });
    },
    loadSelect2: function (element, url, action, data, minInput, placeholder) {
        $(element).select2({
            allowClear: true,
            width: '100%',
            locale: 'es',
            minimumInputLength: minInput,
            placeholder: placeholder,
            theme: "classic",
            ajax: {
                url: url,
                dataType: 'json',
                delay: 250,
                type: "POST",
                data: function (params) {
                    var sbObj = '{';
                    $.each(data, function (index, value) {
                        sbObj += '"' + value + '": "' + params.term + (index === (data.length - 1) ? '"}' : '",');
                    });
                    return {
                        filter: JSON.parse(sbObj),
                        page: params.page,
                        action: action
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    return {
                        results: $.map(data.data, function (item) {
                            return {
                                text: item.nombre,
                                id: item.id
                            }
                        }),
                        pagination: {
                            more: (params.page * 30) < data.itemsCount
                        }
                    };
                },
                cache: true
            }
        });
    }
};

