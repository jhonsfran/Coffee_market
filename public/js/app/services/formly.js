
app.factory('getOIMConfig', function getOIMConfigDefinition(deepMerge, httpPeticion) {
    return function getOIMConfig(model, options) {
        options = options || {};
        var fields = [];
        var row = 0;
        var opts = {className: "row", fieldGroup: []};
        angular.forEach(model, function (value, key) {
            opts.fieldGroup.push(getOptionsFromValue(value, key, {}));
        });
        fields.push(opts);
        return fields;
    };

    function getOptionsFromValue(value, key, propMetaData) {

        var commonOptions = {
            className: 'col-sm-' + value.weight + ' col-xs-12',
            key: key,
            templateOptions: {
            }
        };

        angular.forEach(value.templateOptions, function (value, key) {
            commonOptions.templateOptions[key] = value;
        });

        var typeOptions = {};
        switch (value.type) {
            case 'select':
            {
                typeOptions = {
                    type: 'select',
                    templateOptions: {
                        options: []
                    },
                    controller: function ($scope) {
                        $scope.to.loading = httpPeticion.post(value.http.ctrl, 'admin', $.param({action: value.http.action})).then(function (data) {
                            $scope.to.options = data.data.map(function (k) {
                                return {name: k.value, value: k.id};
                            });

                        });
                    }
                };
                break;
            }
            case 'select-search':
            {

                typeOptions = {
                    type: 'select-search',
                    templateOptions: {
                        optionsAttr: 'bs-options',
                        ngOptions: 'option[to.valueProp] as option in to.options | filter: $select.search',
                        valueProp: 'value',
                        labelProp: 'label',
                        options: [],
                        refresh: value.search,
                        refreshDelay: 0
                    }
                };
                break;
            }
            case 'confirmPassword':
            {
                typeOptions = {
                    type: 'input',
                    "optionsTypes": ["matchField"],
                    model: {},
                    data: {"fieldToMatch": "contrasena", "modelToMatch": ""}
                };
                break
            }
            case 'boolean':
            {
                typeOptions = {
                    type: 'checkbox'
                };
                break;
            }
            case 'number':
            {
                typeOptions = {
                    type: 'input',
                    templateOptions: {type: 'number'}
                };
                break;
            }
            case 'datepicker':
                typeOptions = {
                    type: 'datepicker',
                    templateOptions: {type: 'text'}
                };
                break;
            default:
                var type = (value && value.length) > 80 ? 'textarea' : 'input';
                typeOptions = {type: type};
        }
        return deepMerge(commonOptions, typeOptions, propMetaData.formlyOptions);
    }

    function capitalize(word) {
        return word.charAt(0).toUpperCase() + word.substring(1);
    }
});

app.constant('deepMerge', (function () {
    var objectPrototype = Object.getPrototypeOf({});
    var arrayPrototype = Object.getPrototypeOf([]);

    return deepMerge;

    function deepMerge() {
        var res = arguments[0];
        angular.forEach(arguments, function (src, index) {
            if (src && (index > 0 || false)) {
                angular.forEach(src, function (val, prop) {
                    if (typeof val === "object" && val !== null && isObjectOrArrayLike(val)) {
                        var deepRes = res[prop];
                        if (!deepRes && Array.isArray(val)) {
                            deepRes = [];
                        } else if (!deepRes) {
                            deepRes = {};
                        }
                        res[prop] = deepMerge(deepRes, val);
                    } else {
                        res[prop] = val;
                    }
                });
            }
        });
        return res;
    }

    function isObjectOrArrayLike(val) {
        var proto = Object.getPrototypeOf(val);
        return proto === objectPrototype || proto === arrayPrototype;
    }
})());


app.run(['i18nService', function (i18nService) {
        i18nService.setCurrentLang('es');
    }]);

app.run(function (formlyConfig) {
    var attributes = [
        'date-disabled',
        'custom-class',
        'show-weeks',
        'starting-day',
        'init-date',
        'min-mode',
        'max-mode',
        'format-day',
        'format-month',
        'format-year',
        'format-day-header',
        'format-day-title',
        'format-month-title',
        'year-range',
        'shortcut-propagation',
        'datepicker-popup',
        'show-button-bar',
        'current-text',
        'clear-text',
        'close-text',
        'close-on-date-selection',
        'datepicker-append-to-body'
    ];

    var bindings = [
        'datepicker-mode',
        'min-date',
        'max-date'
    ];

    var ngModelAttrs = {};

    angular.forEach(attributes, function (attr) {
        ngModelAttrs[camelize(attr)] = {attribute: attr};
    });

    angular.forEach(bindings, function (binding) {
        ngModelAttrs[camelize(binding)] = {bound: binding};
    });

    console.log(ngModelAttrs);

    formlyConfig.setType({
        name: 'datepicker',
        templateUrl: '../template/form/datepicker.html',
        wrapper: ['bootstrapLabel', 'bootstrapHasError'],
        defaultOptions: {
            ngModelAttrs: ngModelAttrs,
            templateOptions: {
                datepickerOptions: {
                    format: 'dd-MM-yyyy',
                    initDate: new Date()
                }
            }
        },
        controller: ['$scope', function ($scope) {
                $scope.datepicker = {};

                $scope.datepicker.opened = false;

                $scope.datepicker.open = function ($event) {
                    $scope.datepicker.opened = !$scope.datepicker.opened;
                };
            }]
    });

    function camelize(string) {
        string = string.replace(/[\-_\s]+(.)?/g, function (match, chr) {
            return chr ? chr.toUpperCase() : '';
        });
        // Ensure 1st char is always lowercase
        return string.replace(/^([A-Z])/, function (match, chr) {
            return chr ? chr.toLowerCase() : '';
        });
    }
});
app.run(function (formlyConfig) {
    formlyConfig.setWrapper({
        name: 'loading',
        templateUrl: '../template/form/loading.html'
    });
});
app.run(function (formlyConfig) {
    // NOTE: This next line is highly recommended. Otherwise Chrome's autocomplete will appear over your options!
    formlyConfig.extras.removeChromeAutoComplete = true;

    // Configure custom types
//    formlyConfig.setType({
//      name: 'ui-select-single',
//      extends: 'select',
//      templateUrl: 'ui-select-single.html'
//    });
    formlyConfig.setType({
        name: 'select-search',
        extends: 'select',
        templateUrl: '../template/form/select-search.html'
    });
//    formlyConfig.setType({
//      name: 'ui-select-multiple',
//      extends: 'select',
//      templateUrl: 'ui-select-multiple.html'
//    });
});

app.constant('ApiCheck', apiCheck());
app.config(function config(formlyConfigProvider, ApiCheck) {
    // set templates here
    formlyConfigProvider.setType({
        name: 'matchField',
        apiCheck: function () {
            return {
                data: {
                    fieldToMatch: formlyExampleApiCheck.string
                }
            }
        },
        apiCheckOptions: {
            prefix: 'matchField type'
        },
        defaultOptions: function matchFieldDefaultOptions(options) {
            return {
                extras: {
                    validateOnModelChange: true
                },
                expressionProperties: {
                    'templateOptions.disabled': function (viewValue, modelValue, scope) {
                        var matchField = find(scope.fields, 'key', options.data.fieldToMatch);
                        if (!matchField) {
                            throw new Error('Could not find a field for the key ' + options.data.fieldToMatch);
                        }
                        var model = options.data.modelToMatch || scope.model;
                        var originalValue = model[options.data.fieldToMatch];
                        var invalidOriginal = matchField.formControl && matchField.formControl.$invalid;
                        return !originalValue || invalidOriginal;
                    }
                },
                validators: {
                    fieldMatch: {
                        expression: function (viewValue, modelValue, fieldScope) {
                            var value = modelValue || viewValue;
                            var model = options.data.modelToMatch || fieldScope.model;
                            return value === model[options.data.fieldToMatch];
                        },
                        message: options.data.matchFieldMessage || '"Campo no coincide"'
                    }
                }
            };

            function find(array, prop, value) {
                var foundItem;
                array.some(function (item) {
                    if (item[prop] === value) {
                        foundItem = item;
                    }
                    return !!foundItem;
                });
                return foundItem;
            }
        }
    });
});
