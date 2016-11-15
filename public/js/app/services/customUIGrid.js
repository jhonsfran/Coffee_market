app.factory('customUIGrid', function ($q) {
    return{
        sort: function (sortColumns, uiGridConstants) {
            var deferred = $q.defer();
            switch (sortColumns[0].sort.direction) {
                case uiGridConstants.ASC:
                    var sorting = {
                        columName: sortColumns[0].name,
                        direction: 'ASC'
                    };
                    deferred.resolve(sorting);
                    break;
                case uiGridConstants.DESC:
                    var sorting = {
                        columName: sortColumns[0].name,
                        direction: 'DESC'
                    };
                    deferred.resolve(sorting);
                    break;
                case undefined:
                    break;
            }
            return deferred.promise;
        },
        filter: function (grid) {
            var deferred = $q.defer();
            var arrFilter = [];
            angular.forEach(grid.columns, function (value, index) {
                var textValue = value.filters[0].term;
                var filter;
                if (textValue) {
                    filter = {
                        columName: value.name,
                        value: textValue
                    };
                    arrFilter.push(filter);
                }
            });
            deferred.resolve(arrFilter);
            return deferred.promise;
        }
    };
});