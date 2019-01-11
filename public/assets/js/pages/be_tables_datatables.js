/*
 *  Document   : be_tables_datatables.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Tables Datatables Page
 */


var BeTableDatatables = function() {
    // Override a few DataTable defaults, for more examples you can check out https://www.datatables.net/
    var exDataTable = function() {
        jQuery.extend( jQuery.fn.dataTable, {
            sWrapper: "dataTables_wrapper dt-bootstrap4"
        });
    };

    // Init full DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableFull = function() {
        jQuery('.js-dataTable-full').dataTable({
            columnDefs: [ { orderable: false, targets: [ 4 ] } ],
            pageLength: 8,
            lengthMenu: [[5, 8, 15, 20], [5, 8, 15, 20]],
            autoWidth: false
        });
    };

    // Init custom DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableCustom = function() {
        jQuery('.js-dataTable-custom').dataTable({
            'responsive'    : true,             //false - desabilita o responsive
			'lengthChange'  : true,             //false - retira o contador
			'searching'     : false,            //false - retira a pesquisa
			'ordering'      : false,            //false - retira a ordenação
			'info'          : true,             //false - retira a informação (Mostrando 0 até 0 de 0 registros)
            'autoWidth'     : false,            //false - desabilita tamanho automático
            'pageLength'    : 10,               // 10 - selecionar o valor padrão do lengthMenu
            'pagingType'    : "full_numbers",   //false - retira o contador
            'lengthMenu'    : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
            // 'dom'       : "<'row'<'col-sm-12'tr>>" +
            //         "<'row'<'col-sm-6'i><'col-sm-6'p>>",
			'language':
				{
					"sEmptyTable"     : "Nenhum registro encontrado",
					"sInfo"           : "Exibindo de _START_ até _END_ de _TOTAL_ registros",
					"sInfoEmpty"      : "Exibindo 0 até 0 de 0 registros",
					"sInfoFiltered"   : "(Filtrados de _MAX_ registros)",
					"sInfoPostFix"    : "",
					"decimal"         : ",",
					"sInfoThousands"  : ".",
					"sLengthMenu"     : "Mostrar _MENU_ resultados por página",
					"sLoadingRecords" : "Carregando...",
					"sProcessing"     : "Processando...",
					"sZeroRecords"    : "Nenhum registro encontrado",
					"sSearch"         : "Pesquisar:",
					"oPaginate": 
						{
							"sNext"           : "Próximo",
							"sPrevious"       : "Anterior",
							"sFirst"          : "Primeiro",
							"sLast"           : "Último"
							},
					"oAria": 
						{
							"sSortAscending"  : ": Ordenar colunas de forma ascendente",
							"sSortDescending" : ": Ordenar colunas de forma descendente"
							}
				}
        });
    };

    // Init full extra DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableFullPagination = function() {
        jQuery('.js-dataTable-full-pagination').dataTable({
            pagingType: "full_numbers",
            columnDefs: [ { orderable: false, targets: [ 4 ] } ],
            pageLength: 8,
            lengthMenu: [[5, 8, 15, 20], [5, 8, 15, 20]],
            autoWidth: false
        });
    };

    // Init simple DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableSimple = function() {
        jQuery('.js-dataTable-simple').dataTable({
            columnDefs: [ { orderable: false, targets: [ 4 ] } ],
            pageLength: 8,
            lengthMenu: [[5, 8, 15, 20], [5, 8, 15, 20]],
            autoWidth: false,
            searching: false,
            oLanguage: {
                sLengthMenu: ""
            },
            dom: "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>"
        });
    };

    return {
        init: function() {
            // Override a few DataTable defaults
            exDataTable();

            // Init Datatables
            initDataTableSimple();
            initDataTableFull();
            initDataTableFullPagination();
            initDataTableCustom();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BeTableDatatables.init(); });