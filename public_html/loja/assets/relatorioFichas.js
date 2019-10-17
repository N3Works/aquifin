var dataTable = null;
jQuery(document).ready(function () {
    dataTable = DatatableChildDataLocalDemo.init();
});


function ajustarSituacao(situacao, fichaId) {

    if (confirm('Deseja realmente alterar a situação da ficha? ')) {
        $.ajax({
            url: 'trocaSituacaoAjax.php',
            method: "POST",
            data: { situacao: situacao, fichaId: fichaId }
        }).done(function(data) {
            alert(data);
            dataTable.load();
        });
    }
}

//== Class definition
var DatatableChildDataLocalDemo = function () {
    //== Private functions

    var subTableInit = function (e) {
        $('<div/>').attr('id', 'child_data_local_' + e.data.RecordID).appendTo(e.detailCell)
            .mDatatable({
                data: {
                    type: 'local',
                    source: e.data.Orders,
                    pageSize: 10,
                    saveState: {
                        cookie: true,
                        webstorage: true
                    }
                },

                // layout definition
                layout: {
                    theme: 'default',
                    scroll: true,
                    height: 300,
                    footer: false,

                    // enable/disable datatable spinner.
                    spinner: {
                        type: 1,
                        theme: 'default'
                    }
                },

                sortable: true,

                // columns definition
                columns: [{
                    field: "OrderID",
                    title: "Order ID",
                    sortable: false
                }, {
                    field: "ShipCountry",
                    title: "Country",
                    width: 100
                }, {
                    field: "ShipAddress",
                    title: "Ship Address"
                }, {
                    field: "ShipName",
                    title: "Ship Name"
                }]
            });
    }

    // demo initializer
    var mainTableInit = function () {
        var datatable = $('.m_datatable').mDatatable({

            data: {
                type: 'remote',
                source: {
                    read: {
                        url: 'fichaAjax.php',
                        // params: {
                            // custom headers
                            // headers: { 'x-my-custom-header': $('.filtrarSituacao').val(), 'x-test-header': 'the value'},
                            // custom query params
                            // query: {
                                // perPage: $('.m-datatable__pager-size').val(),
                                //  filtroSituacao: .val(),
                                // someParam: 'someValue',
                                // token: 'token-value'
                            // }
                        // }
                    }
                },
                // pageSize: 10,
                saveState: {
                    cookie: true,
                    webstorage: true
                },

                // processing: true,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true
            },

            translate: {
                records: {
                    processing: 'Aguarde...',
                    noRecords: 'Nenhum registro encontrado.'
                },
                toolbar: {
                    pagination: {
                        items: {
                            default: {
                                first: 'Primeira',
                                prev: 'Anterior',
                                next: 'Próxima',
                                last: 'Última',
                                more: 'Mais páginas',
                                input: 'Número',
                                select: 'Mostrar'
                            },
                            info: 'Mostrando {{start}} - {{end}} de {{total}} registros'
                        }
                    }
                }
            },

            // layout definition
            layout: {
                theme: 'default',
                scroll: false,
                height: null,
                footer: false
            },

            sortable: true,
            filterable: true,
            pagination: true,

            detail: {
                title: 'Load sub table',
                content: subTableInit
            },

            // columns definition
            columns: [{
                field: "id",
                title: "",
                sortable: false,
                width: 20,
                textAlign: 'center' // left|right|center,
            }, {
                field: "dados_pessoais_nome",
                title: "Nome"
            }, {
                field: "data_cadastro",
                title: "Data",
                template: function(row) {
                    var dataCadastro = row.data_cadastro.split('-');
                    return dataCadastro[2] + '/' + dataCadastro[1] + '/' + dataCadastro[0];
                }
            }, {
                field: "info_finais_lojacontato",
                title: "Loja"
            }, {
                field: "info_finais_nomecontato",
                title: "Contato"
            }, {
                field: "dados_pessoais_cidade",
                title: "Cidade"
            }, {
                field: "dados_pessoais_ufend",
                title: "UF"
            }, {
                field: "situacao",
                title: 'Situação',
              template: function (row) {
                    var status = {
                        1: {'title': 'Aprovada', 'classe': 'm-badge--success'},
                        2: {'title': 'Nova', 'classe': ' m-badge--default'},
                        3: {'title': 'Pendências', 'classe': ' m-badge--warning'},
                        4: {'title': 'Reprovada', 'classe': ' m-badge--danger'}
                    };

                    return '<span class="m-badge ' + status[row.situacao].classe + ' m-badge--wide">' + status[row.situacao].title + '</span>';
                }
            }, {
                field: "Actions",
                width: 110,
                title: "Actions",
                sortable: false,
                overflow: 'visible',
                template: function (row) {

                    var dropup = (row.getDatatable().getPageSize() - row.getIndex()) <= 4 ? 'dropup' : '';

                    return '\
						<div class="dropdown '+ dropup +'">\
							<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" title="Trocar situação">\
                                <i class="la la-edit"></i>\
                            </a>\
						  	<div class="dropdown-menu dropdown-menu-right">\
						    	<a class="dropdown-item" onclick="ajustarSituacao(3, '+row.id+')" href="javascript:void(0)"><i class="la la-info"></i> Pendências</a>\
						    	<a class="dropdown-item" onclick="ajustarSituacao(1, '+row.id+')" href="javascript:void(0)"><i class="la la-check"></i> Aprovada</a>\
						    	<a class="dropdown-item" onclick="ajustarSituacao(4, '+row.id+')" href="javascript:void(0)"><i class="la la-times"></i> Reprovada</a>\
						  	</div>\
						</div>\
						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">\
							<i class="la la-comment"></i>\
						</a>\
					';
                }
            }]
        });

        var query = datatable.getDataSourceQuery();

        $('#m_form_search').on('keyup', function (e) {
            datatable.search({ text: $(this).val().toLowerCase() ,filtrarSituacao: $('.filtrarSituacao').val() });
        }).val(query.generalSearch.text);

        $('.filtrarSituacao').on('change', function (e) {
            datatable.search({text: $('#m_form_search').val(),filtrarSituacao: $(this).val() });
        }).val(query.generalSearch.filtrarSituacao);

        $('#m_form_status, #m_form_type').selectpicker();


        return datatable;
    };

    return {
        //== Public functions
        init: function () {
            // init dmeo
            return mainTableInit();
        }
    };
}();