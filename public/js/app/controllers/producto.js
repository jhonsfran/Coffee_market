/* global app */
app.controller('producto', function ($scope, $timeout, httpPeticion, modal, formlyVersion, getOIMConfig, uiGridConstants, customUIGrid, productoManager) {

    $(document).delegate('a[data-toggle="tab"]', 'click', function (e) {
        window.setTimeout(function () {
            $(window).resize();
            $(window).resize();
        }, 1000);
    });

    /* Formulario */
    $scope.model = {};
    $scope.fields = function () {
        httpPeticion.post('producto', 'formly', {}).then(function (data) {
            $scope.fields = getOIMConfig(data.data);
        });
    };
    $scope.fields();
    $scope.modal = function (model, add, title) {
        modal.modal(model, add, title, $scope.fields).then(function (form) {
            var data = {
                action: 'guardar',
                data: form
            };
            productoManager.saveProducto(data);

        });
    };
    $scope.editRow = function (grid, row) {
        productoManager.getProducto(row.entity.id).then(function (data) {
            $scope.modal(data[0], true, 'Actualizar Producto');
        });
    };
    /* Formulario */

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
        productoManager.loadAllproductos({
            action: 'getList',
            filter: {
                id: ''
            }
        }).then(function (data) {
            $timeout(function () {
                $scope.gridProducto.totalItems = data.itemsCount;
                var firstRow = (paginationOptions.pageNumber - 1) * paginationOptions.pageSize;
                $scope.gridProducto.data = data.data.slice(firstRow, firstRow + paginationOptions.pageSize);
            }, 0);
        });
    };
    $scope.getList();
    $scope.actualizar = true;

    $scope.sortChanged = function (grid, sortColumns) {
        if (sortColumns.length > 0) {
            customUIGrid.sort(sortColumns, uiGridConstants).then(function (sorting) {
                $scope.sorting = sorting;
                productoManager.loadAllproductos({
                    action: 'getList',
                    filter: {
                        sort: sorting,
                        filter: $scope.filter
                    }
                }).then(function (data) {
                    $scope.gridProducto.data = data.data;
                });
            });
        }
    };
    $scope.filterChange = function () {
        var grid = this.grid;
        customUIGrid.filter(grid).then(function (filter) {
            $scope.filter = filter;
            productoManager.loadAllproductos({
                action: 'getList',
                filter: {
                    filter: filter,
                    sort: $scope.sorting
                }
            }).then(function (data) {
                $scope.gridProducto.data = data.data;
            });
        });
    };
    $scope.paginartionChange = function (newPage, pageSize) {
        productoManager.loadAllproductos({
            action: 'getList',
            filter: {
                pagination: {
                    maxRegistros: pageSize,
                    pagina: newPage
                }
            }
        }).then(function (data) {
            $scope.gridProducto.data = data.data;
        });
    };
    $scope.gridProducto = {
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



