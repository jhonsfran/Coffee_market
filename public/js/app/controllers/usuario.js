
/* global app */

app.controller('usuario', function ($scope, httpPeticion, modal, formlyVersion, getOIMConfig, uiGridConstants, customUIGrid, usuarioManager) {

    $scope.fields = function () {
        httpPeticion.post('usuario', 'formly', {}).then(function (data) {
            $scope.fields = getOIMConfig(data.data);
            $scope.fields.push({"className": "row", "fieldGroup": [{
                        "className": "col-xs-12",
                        "key": "roles",
                        "type": "multiselect",
                        "templateOptions": {
                            "label": "Roles",
                            "required": true,
                            "options": data.options
                        }}]
            });
        });
    };
    $scope.fields();
    $scope.model = {};
    /*** Tabla de datos **/
    $scope.sorting;
    $scope.filter;
    var paginationOptions = {
        pageNumber: 1,
        pageSize: 25,
        sort: null
    };
    //Carga los datos en la tabla 
    $scope.getList = function () {
        usuarioManager.loadAllusuarios({
            action: 'getList',
            filter: {
                identificacion: ''
            }
        }).then(function (data) {
            $scope.gridUsuario.totalItems = data.itemsCount;
            var firstRow = (paginationOptions.pageNumber - 1) * paginationOptions.pageSize;
            $scope.gridUsuario.data = data.data.slice(firstRow, firstRow + paginationOptions.pageSize);
        });
    };
    $scope.getList();
    $scope.actualizar = true;
    $scope.password = true;
    $scope.estado = true;
    $scope.editRow = function (grid, row) {
        usuarioManager.getUsuario(row.entity.id).then(function (data) {
            data[0].roles = JSON.parse(data[0].roles);
            $scope.modal(data[0], true, 'Actualizar Usuario');
        });
    };
    $scope.fields_password = function () {
        httpPeticion.post('usuario', 'formlypass', {}).then(function (data) {
            $scope.fields_password = getOIMConfig(data.data);
        });
    }
    $scope.fields_password();
    $scope.sesionRow = function (grid, row) {
        var title = 'Actualizar Contraseña';
        var add = true;
        var model = {};
        $scope.fields_password[0].fieldGroup[1].data.modelToMatch = model;
        modal.modal(model, add, title, $scope.fields_password).then(function (form) {
            form.id = row.entity.id;
            var data = {
                action: 'password',
                data: form
            };
            usuarioManager.saveUsuario(data);
        });
    };
    $scope.estadoRow = function (grid, row) {
        var data = {
            action: 'estado',
            data: {'id': row.entity.id, 'estado': row.entity.estado}
        };
        usuarioManager.saveUsuario(data);
    };
    $scope.sortChanged = function (grid, sortColumns) {
        if (sortColumns.length > 0) {
            customUIGrid.sort(sortColumns, uiGridConstants).then(function (sorting) {
                $scope.sorting = sorting;
                usuarioManager.loadAllusuarios({
                    action: 'getList',
                    filter: {
                        sort: sorting,
                        filter: $scope.filter
                    }
                }).then(function (data) {
                    $scope.gridUsuario.data = data.data;
                });
            });
        }
    };
    $scope.filterChange = function () {
        var grid = this.grid;
        customUIGrid.filter(grid).then(function (filter) {
            $scope.filter = filter;
            usuarioManager.loadAllusuarios({
                action: 'getList',
                filter: {
                    filter: filter,
                    sort: $scope.sorting
                }
            }).then(function (data) {
                $scope.gridUsuario.data = data.data;
            });
        });
    };
    $scope.paginartionChange = function (newPage, pageSize) {
        usuarioManager.loadAllusuarios({
            action: 'getList',
            filter: {
                pagination: {
                    maxRegistros: pageSize,
                    pagina: newPage
                }
            }
        }).then(function (data) {
            $scope.gridUsuario.data = data.data;
        });
    };
    $scope.gridUsuario = {
        paginationPageSizes: [10, 25, 50, 100],
        paginationPageSize: 10,
        useExternalPagination: true,
        useExternalFiltering: true,
        enableFiltering: true,
        useExternalSorting: true,
        columnDefs: [
            {field: 'id', enableSorting: false, visible: false},
            {field: 'id_usuario', enableSorting: false, visible: false},
            {field: 'estado', enableSorting: false, visible: false},
            {field: 'identificacion', displayName: 'Cédula'},
            {field: 'nombre', displayName: 'Nombre Completo'},
            {field: 'correo', displayName: 'Correo Universitario'},
            {field: 'contacto', displayName: 'Teléfono'},
            {field: 'roles', displayName: 'Tipo de Usuario'},
            {field: 'edit', displayName: 'Acciones', cellTemplate: '../template/button/buttons.html', width: 90, enabledSorting: false, enableFiltering: false}
        ],
        onRegisterApi: function (gridApi) {
            $scope.gridApi = gridApi;
            $scope.gridApi.core.on.sortChanged($scope, $scope.sortChanged);
            $scope.gridApi.core.on.filterChanged($scope, $scope.filterChange);
            gridApi.pagination.on.paginationChanged($scope, $scope.paginartionChange);
        }
    };
    $scope.modal = function (model, add, title) {
        modal.modal(model, add, title, $scope.fields).then(function (form) {
            var data = {
                action: 'guardar',
                data: form
            };
            usuarioManager.saveUsuario(data);
        });
    };
});



