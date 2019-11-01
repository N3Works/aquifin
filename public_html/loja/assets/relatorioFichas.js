//var dataTable = null;
jQuery(document).ready(function () {
    //chama o botão salvar observação
    $('.salvarObservacao').on('click', function() {
        var obsFichaCadastral = $('#observacao_modal').find('#observacao').val();
        var idFicha = $(this).attr('data-rel');        
        if(!obsFichaCadastral){
            alert('O campo Observação é de preenchimento obrigatório.');
            return;
        }
        incluirObservacao(obsFichaCadastral, idFicha) ;
    });

    dataTable = DatatableChildRemoteDataDemo.init();
});


function chamarModal(id){
    $('#observacao_modal').modal('show');
    $('.salvarObservacao').attr('data-rel',id);
}

function imprimirProposta(nomeDoArquivo){
    var url = '../formularios/propostas/' + nomeDoArquivo;
    var win = window.open(url, '_blank');
    win.focus();
}

function ImprimirRelatorio(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    
    
    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body onload="window.print()">');
    mywindow.document.write( "<link rel=\"stylesheet\" href=\"/layout/metronic_v5.0.3/theme/dist/html/default/assets/vendors/base/vendors.bundle.css\" type=\"text/css\" media=\"all\"/>" );
    mywindow.document.write( "<link rel=\"stylesheet\" href=\"/layout/metronic_v5.0.3/theme/dist/html/default/assets/demo/default/base/style.bundle.css\" type=\"text/css\" media=\"all\"/>" );
    mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/
    mywindow.print()
    //setTimeout(function(){mywindow.print();},1000);

    //mywindow.close();

    return true;
}
        
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


function incluirObservacao(observacao, fichaId) {

    if (confirm('Deseja realmente incluir esta Observação? ')) {
        $.ajax({
            url: 'salvarObservacaoAjax.php',
            method: "POST",
            data: { observacaoFichaCadastral: observacao, fichaId: fichaId }
        }).done(function(data) {
            alert(data);
            dataTable.load();
            $('#observacao_modal').modal('hide');
        });
    }
}

//== Class definition
var DatatableChildRemoteDataDemo = function () {
    //== Private functions

    var subTableInit = function (e) {
        $('<div/>').attr('id', 'child_data_ajax_' + e.currentTarget.dataset.value).appendTo(e.detailCell)
            .mDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: 'buscarObservacaoAjax.php?id='+e.currentTarget.dataset.value
                        }
                    },
                    //pageSize: 10,
                    saveState: {
                        cookie: true,
                        webstorage: true
                    },
                    // processing: true,
                    serverPaging: false,
                    serverFiltering: false,
                    serverSorting: false

                },
                pagination:false,
                sortable:false,
                searchDelay:false,
               
                translate: {
                    records: {
                        processing: 'Aguarde...',
                        noRecords: 'Nenhum registro encontrado.'
                    },
                    /* toolbar: {
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
                    } */
                },
                // layout definition
                layout: {
                    theme: 'default',
                    scroll: true,
                    //height: 300,
                    footer: false,

                    // enable/disable datatable spinner.
                    spinner: {
                        type: 1,
                        theme: 'default'
                    }
                },

                // columns definition
                columns: [/* {
                    field: "id",
                    title: "",
                    width: 50,
                    sortable: false,
                    visible: false,
                    hidden: true
                }, */{
                    field: "data_cadastro",
                    title: "Data",
                    width: 200,
                    sortable: false,
                    template: function(row) {
                        var dataQuebrada = row.data_cadastro.split(' ');
                        var dataCadastro = dataQuebrada[0].split('-');
                        return dataCadastro[2] + '/' + dataCadastro[1] + '/' + dataCadastro[0] + ' ' + dataQuebrada[1];
                    }
                }, {
                    field: "observacao",
                    title: "Observação"
                }]
        });


    };

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
                title: 'Observações',
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
                field: "nome_arquivo_proposta",
                title: "nome_arquivo_proposta",
                width: 0,
                height:0,
                responsive: {hidden: 'xl'}
            },
                {
                    field: "situacao",
                    title: 'Situação',
                    template: function (row) {
                        
                        var status = {
                            0: {'title': 'Nova', 'classe': ' m-badge--default'},
                            1: {'title': 'Aprovada', 'classe': 'm-badge--success'},
                            2: {'title': 'Nova', 'classe': ' m-badge--default'},
                            3: {'title': 'Pendências', 'classe': ' m-badge--warning'},
                            4: {'title': 'Reprovada', 'classe': ' m-badge--danger'}
                        };

                         var blink_new ='';
                         // var blink_class= '';
                        if (status[row.situacao]['title'] == 'Nova') {
                            blink_new= 'style="background-color=blue"';
                            // blink_class= 'invalid';
                        }

                        return '<span class="m-badge ' + status[row.situacao].classe + ' m-badge--wide ' + blink_new + '" >' + status[row.situacao].title + '</span>';
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
                                        <i class="la la-list-alt"></i>\
                                    </a>\
                                    <div class="dropdown-menu dropdown-menu-right">\
                                        <a class="dropdown-item" onclick="ajustarSituacao(3, '+row.id+')" href="javascript:void(0)"><i class="la la-info"></i> Pendências</a>\
                                        <a class="dropdown-item" onclick="ajustarSituacao(1, '+row.id+')" href="javascript:void(0)"><i class="la la-check"></i> Aprovada</a>\
                                        <a class="dropdown-item" onclick="ajustarSituacao(4, '+row.id+')" href="javascript:void(0)"><i class="la la-times"></i> Reprovada</a>\
                                    </div>\
                                </div>\
                                <a href="javascript:void(0)" onclick="chamarModal('+row.id+')" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Adicionar observação">\
                                    <i class="la la-comment"></i>\
                                </a>\
                                <a href="javascript:void(0)" onclick="imprimirProposta(\''+row.nome_arquivo_proposta+'\')" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Imprimir proposta">\
                                    <i class="la la-print"></i>\
                                </a>\
                            ';
                    }
                }
            ]
        });

        var query = datatable.getDataSourceQuery();
        if (!query.generalSearch) {query.generalSearch = '';}

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