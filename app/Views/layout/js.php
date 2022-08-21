<!-- JQUERY -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<!-- PDFMAKE -->
<script src="<?php echo base_url('assets/js/pdfmake.js') ?>"></script>

<!-- SWEETALERT -->
<script src="<?= base_url('sweetalert/sweetalert2.js') ?>"></script>

<!-- DATATABLE -->
<!-- <script src="<?= base_url('temp_admin/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script> -->
<!-- <script src="<?= base_url('temp_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> 

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script type="text/javascript" src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>

<!-- MAGNIFIC POPUP-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>

<!-- TEMP_ADMIN -->
<!-- <script src="<?= base_url('temp_admin/bower_components/jquery/dist/jquery.min.js') ?>"></script> -->
<script src="<?= base_url('temp_admin/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
<script src="<?= base_url('temp_admin/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('temp_admin/bower_components/raphael/raphael.min.js') ?>"></script>
<script src="<?= base_url('temp_admin/bower_components/morris.js/morris.min.js') ?>"></script>
<script src="<?= base_url('temp_admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
<script src="<?= base_url('temp_admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?= base_url('temp_admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
<script src="<?= base_url('temp_admin/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
<script src="<?= base_url('temp_admin/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
<script src="<?= base_url('temp_admin/plugins/input-mask/jquery.inputmask.js') ?>"></script>
<script src="<?= base_url('temp_admin/plugins/input-mask/jquery.inputmask.date.extensions.js') ?>"></script>
<script src="<?= base_url('temp_admin/plugins/input-mask/jquery.inputmask.extensions.js') ?>"></script>
<script src="<?= base_url('temp_admin/bower_components/moment/min/moment.min.js') ?>"></script>
<script src="<?= base_url('temp_admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?= base_url('temp_admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= base_url('temp_admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') ?>"></script>
<script src="<?= base_url('temp_admin/plugins/timepicker/bootstrap-timepicker.min.js') ?>"></script>
<!-- <script src="<?= base_url('temp_admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script> -->
<script src="<?= base_url('temp_admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<script src="<?= base_url('temp_admin/plugins/iCheck/icheck.min.js') ?>"></script>
<script src="<?= base_url('temp_admin/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<script src="<?= base_url('temp_admin/dist/js/adminlte.min.js') ?>"></script>
<script src="<?= base_url('temp_admin/dist/js/pages/dashboard.js') ?>"></script>
<script src="<?= base_url('temp_admin/dist/js/demo.js') ?>"></script>
<!-- <script src="<?= base_url('temp_admin/bower_components/ckeditor/ckeditor.js') ?>"></script> -->
<!-- <script src="<?= base_url('temp_admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script> -->

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){
        $('.image-popup-vertical-fit').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-img-mobile',
            image: {
                verticalFit: true
            }
        });
    })
</script>

<script>
    $(function () {
        var title = $('.title-data').html();

        $('#temp_tabel1').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true, 
            "pageLength"  : 25, 
            // scrollX       : true,
            // scrollY       : 400,
            // scrollCollapse: true,
            // scroller      : true, 
            responsive: true,
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'colvis',
                    text: 'Filter Data',
                    collectionLayout: 'fixed two-column',
                    postfixButtons: [ 'colvisRestore' ]
                },
            ],
        });

        $('#temp_tabel2').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true, 
            "pageLength"  : 25, 
            // scrollX       : true,
            // scrollY       : 400,
            // scrollCollapse: true,
            // scroller      : true, 
            columnDefs: [
                {
                    targets: -1,
                    visible: false
                },
                {
                    targets: -2,
                    visible: false
                }
            ],
            responsive: true,
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'colvis',
                    text: 'Filter Data',
                    collectionLayout: 'fixed two-column',
                    postfixButtons: [ 'colvisRestore' ]
                },
            ],
        });

        $('#temp_tabel3').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true, 
            "pageLength"  : 25, 
            scrollX       : true,
            // scrollY       : 400,
            // scrollCollapse: true,
            // scroller      : true, 
            // responsive: true,
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'colvis',
                    text: 'Filter Data',
                    collectionLayout: 'fixed two-column',
                    postfixButtons: [ 'colvisRestore' ]
                },
            ],
        });

        $('#print_tabel1').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true, 
            "pageLength"  : 25, 
            // scrollX       : true,
            // scrollY       : 400,
            // scrollCollapse: true,
            // scroller      : true, 
            columnDefs: [
                {
                    targets: -1,
                    visible: false
                },
                {
                    targets: -2,
                    visible: false
                }
            ],
            responsive: true,
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'colvis',
                    text: 'Filter Data',
                    collectionLayout: 'fixed two-column',
                    postfixButtons: [ 'colvisRestore' ]
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    title: title,
                    // messageTop: 'Inventaris Balai Besar Pelatihan Pertanian Lembang',
                    download: 'open',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: ':visible'
                    },
                    customize: function(doc){
                        // HEADER
                        var cols = [];
                        cols[0] = {
                            text: 'Inventaris Balai Besar Pelatihan Pertanian Lembang', 
                            alignment: 'left', 
                            margin:[15, 10, 10, 10] 
                        };
                        cols[1] = {
                            text: 'Tanggal Berkas :' + moment().format('DD MMMM YYYY, h:mm:ss'), 
                            alignment: 'right', 
                            margin:[10, 10, 15, 15] 
                        };
                        var objHeader = {};
                        objHeader['columns'] = cols;
                        doc['header'] = objHeader;

                        // BODY
                        var lebar = [];
                        lebar[0] = '5%';
                        doc['content']['1'].table.widths = lebar.concat(Array(doc.content[1].table.body[0].length).join('*').split(''));
                        doc['content']['1'].style = {
                            alignment: 'center',
                        };
 
                        // FOOTER
                        var objFooter = {};
                        objFooter['alignment'] = 'center';
                        doc["footer"] = function(currentPage, pageCount) {
                            var footer = [
                                {
                                    text: 'Inventaris Balai Besar Pelatihan Pertanian Lembang',
                                    alignment: 'left',
                                    color: 'red',
                                    margin:[15, 15, 0, 15]
                                },{
                                    text: 'Page ' + currentPage + ' of ' + pageCount,
                                    alignment: 'right',
                                    color: 'red',
                                    margin:[0, 15, 15, 15]
                                }
                            ];
                            objFooter['columns'] = footer;
                            return objFooter;
                        }
                    },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    title: title,
                    messageTop: 'Inventaris Balai Besar Pelatihan Pertanian Lembang',
                    exportOptions: {
                        columns: ':visible'
                    }
                },    
                // 'csv', 
                'copy', 
            ],
        });

        $('#print_tabel2').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true, 
            "pageLength"  : 25, 
            // scrollX       : true,
            // scrollY       : 400,
            // scrollCollapse: true,
            // scroller      : true, 
            responsive: true,
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'colvis',
                    text: 'Filter Data',
                    collectionLayout: 'fixed two-column',
                    postfixButtons: [ 'colvisRestore' ]
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    title: title,
                    // messageTop: 'Inventaris Balai Besar Pelatihan Pertanian Lembang',
                    download: 'open',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: ':visible'
                    },
                    customize: function(doc){
                        // HEADER
                        var cols = [];
                        cols[0] = {
                            text: 'Inventaris Balai Besar Pelatihan Pertanian Lembang', 
                            alignment: 'left', 
                            margin:[15, 10, 10, 10] 
                        };
                        cols[1] = {
                            text: 'Tanggal Berkas :' + moment().format('DD MMMM YYYY, h:mm:ss'), 
                            alignment: 'right', 
                            margin:[10, 10, 15, 15] 
                        };
                        var objHeader = {};
                        objHeader['columns'] = cols;
                        doc['header'] = objHeader;

                        // BODY
                        var lebar = [];
                        lebar[0] = '5%';
                        doc['content']['1'].table.widths = lebar.concat(Array(doc.content[1].table.body[0].length).join('*').split(''));
                        doc['content']['1'].style = {
                            alignment: 'center',
                        };
 
                        // FOOTER
                        var objFooter = {};
                        objFooter['alignment'] = 'center';
                        doc["footer"] = function(currentPage, pageCount) {
                            var footer = [
                                {
                                    text: 'Inventaris Balai Besar Pelatihan Pertanian Lembang',
                                    alignment: 'left',
                                    color: 'red',
                                    margin:[15, 15, 0, 15]
                                },{
                                    text: 'Page ' + currentPage + ' of ' + pageCount,
                                    alignment: 'right',
                                    color: 'red',
                                    margin:[0, 15, 15, 15]
                                }
                            ];
                            objFooter['columns'] = footer;
                            return objFooter;
                        }
                    },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-file-excel-o"></i>',
                    title: title,
                    messageTop: 'Inventaris Balai Besar Pelatihan Pertanian Lembang',
                    exportOptions: {
                        columns: ':visible'
                    }
                },    
                // 'csv', 
                'copy', 
            ],
        });
    })
</script>