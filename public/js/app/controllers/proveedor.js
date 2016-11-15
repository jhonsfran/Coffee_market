/* global app */
app.controller('proveedor', function ($scope,$timeout,httpPeticion, modal, formlyVersion, getOIMConfig, uiGridConstants, customUIGrid, proveedorManager) {

    /* Formulario */
    $scope.model = {};
    $scope.fields = function () {
        httpPeticion.post('proveedor', 'formly', {}).then(function (data) {
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
            proveedorManager.saveProveedor(data);
            
        });
    };
    $scope.editRow = function (grid, row) {
        proveedorManager.getProveedor(row.entity.id).then(function (data) {
            $scope.modal(data[0], true, 'Actualizar Proveedor');
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
        proveedorManager.loadAllproveedors({
            action: 'getList',
            filter: {
                id: ''
            }
        }).then(function (data) {
            $timeout(function () {
                $scope.gridProveedor.totalItems = data.itemsCount;
                var firstRow = (paginationOptions.pageNumber - 1) * paginationOptions.pageSize;
                $scope.gridProveedor.data = data.data.slice(firstRow, firstRow + paginationOptions.pageSize);
            }, 0);
        });
    };
    $scope.getList();
    $scope.actualizar = true;

    $scope.sortChanged = function (grid, sortColumns) {
        if (sortColumns.length > 0) {
            customUIGrid.sort(sortColumns, uiGridConstants).then(function (sorting) {
                $scope.sorting = sorting;
                proveedorManager.loadAllproveedors({
                    action: 'getList',
                    filter: {
                        sort: sorting,
                        filter: $scope.filter
                    }
                }).then(function (data) {
                    $scope.gridProveedor.data = data.data;
                });
            });
        }
    };
    $scope.filterChange = function () {
        var grid = this.grid;
        customUIGrid.filter(grid).then(function (filter) {
            $scope.filter = filter;
            proveedorManager.loadAllproveedors({
                action: 'getList',
                filter: {
                    filter: filter,
                    sort: $scope.sorting
                }
            }).then(function (data) {
                $scope.gridProveedor.data = data.data;
            });
        });
    };
    $scope.paginartionChange = function (newPage, pageSize) {
        proveedorManager.loadAllproveedors({
            action: 'getList',
            filter: {
                pagination: {
                    maxRegistros: pageSize,
                    pagina: newPage
                }
            }
        }).then(function (data) {
            $scope.gridProveedor.data = data.data;
        });
    };
    $scope.gridProveedor = {
        paginationPageSizes: [10, 25, 50, 100],
        paginationPageSize: 10,
        useExternalPagination: true,
        useExternalFiltering: true,
        enableFiltering: true,
        useExternalSorting: true,
        columnDefs: [
            {field: 'id', enableSorting: false, visible: false},
            {field: 'nit', displayName: 'Nit'},
            {field: 'nombre', displayName: 'Razón Social'},       
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



