/* global app */
app.controller('compra', function ($q, $scope, $timeout, httpPeticion, modal, formlyVersion, getOIMConfig, uiGridConstants, customUIGrid, compraManager, $http) {

    /* Formulario */
    $scope.model = {};
    $scope.fields = function () {
        httpPeticion.post('compra', 'formly', {}).then(function (data) {
            $scope.fields = getOIMConfig(data.data);
            $scope.fields.push({
                    "className": "col-sm-6 col-xs-12",
                    "key": "asas",
                    "type":"select-search",
                    "templateOptions": {
                    "label": "Proveedor",
                            "placeholder": "Seleccione proveedor",
                            "required": true,
                            "optionsAttr": "bs-options",
                            "ngOptions": "option[to.valueProp] as option in to.options | filter: $select.search",
                            "valueProp": "value",
                            "labelProp": "label",
                            "options": [],
                            "refresh": $scope.proveedorSearch,
                            "refreshDelay": 0
                    }
            }
            );
        });
    };
    $scope.fields();
    $scope.modal = function (model, add, title) {
        modal.modal(model, add, title, $scope.fields).then(function (form) {
            var data = {
                action: 'guardar',
                data: form
            };
            compraManager.saveCompra(data);

        });
    };
    $scope.editRow = function (grid, row) {
        compraManager.getCompra(row.entity.id).then(function (data) {
            $scope.modal(data[0], true, 'Actualizar Compra');
        });
    };
    /* Formulario */
    $scope.proveedorSearch = function (address, field) {
        httpPeticion.post('proveedor', 'admin', $.param(
                {action: 'getSelect',
                    filter: {filter: [{columName: 'nombre', value: address}]}
                })).then(function (data) {
            field.templateOptions.options = data.data.map(function (k) {
                return {label: k.value, value: k.id};
            });
        });
    };


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
        compraManager.loadAllcompras({
            action: 'getList',
            filter: {
                id: ''
            }
        }).then(function (data) {
            $timeout(function () {
                $scope.gridCompra.totalItems = data.itemsCount;
                var firstRow = (paginationOptions.pageNumber - 1) * paginationOptions.pageSize;
                $scope.gridCompra.data = data.data.slice(firstRow, firstRow + paginationOptions.pageSize);
            }, 0);
        });
    };
    $scope.getList();
    $scope.actualizar = true;

    $scope.sortChanged = function (grid, sortColumns) {
        if (sortColumns.length > 0) {
            customUIGrid.sort(sortColumns, uiGridConstants).then(function (sorting) {
                $scope.sorting = sorting;
                compraManager.loadAllcompras({
                    action: 'getList',
                    filter: {
                        sort: sorting,
                        filter: $scope.filter
                    }
                }).then(function (data) {
                    $scope.gridCompra.data = data.data;
                });
            });
        }
    };
    $scope.filterChange = function () {
        var grid = this.grid;
        customUIGrid.filter(grid).then(function (filter) {
            $scope.filter = filter;
            compraManager.loadAllcompras({
                action: 'getList',
                filter: {
                    filter: filter,
                    sort: $scope.sorting
                }
            }).then(function (data) {
                $scope.gridCompra.data = data.data;
            });
        });
    };
    $scope.paginartionChange = function (newPage, pageSize) {
        compraManager.loadAllcompras({
            action: 'getList',
            filter: {
                pagination: {
                    maxRegistros: pageSize,
                    pagina: newPage
                }
            }
        }).then(function (data) {
            $scope.gridCompra.data = data.data;
        });
    };
    $scope.gridCompra = {
        paginationPageSizes: [10, 25, 50, 100],
        paginationPageSize: 10,
        useExternalPagination: true,
        useExternalFiltering: true,
        enableFiltering: true,
        useExternalSorting: true,
        columnDefs: [
            {field: 'id', enableSorting: false, visible: false},
            {field: 'referencia', displayName: 'Referencia'},
            {field: 'descripcion', displayName: 'Descripción'},
            {field: 'observacion', displayName: 'Observación'},
            {field: 'nombre', displayName: 'Ubicación'},
            {field: 'edit', displayName: 'Acciones', cellTemplate: '../template/button/edit.html', enabledSorting: false, enableFiltering: false}
        ],
        onRegisterApi: function (gridApi) {
            $scope.gridApi = gridApi;
            $scope.gridApi.core.on.sortChanged($scope, $scope.sortChanged);
            $scope.gridApi.core.on.filterChanged($scope, $scope.filterChange);
            gridApi.pagination.on.paginationChanged($scope, $scope.paginartionChange);
        }
    };



});



