         </section>

    </div> 
    <!-- End: Main --> 

    
    <!--[if lt IE 9]>
    <script src="../js/froala_editor_ie8.min.js"></script>
    <![endif]-->
    <script src="assets/admin-tools/frola/js/plugins/tables.min.js"></script>
    <script src="assets/admin-tools/frola/js/plugins/lists.min.js"></script>
    <script src="assets/admin-tools/frola/js/plugins/colors.min.js"></script>
    <script src="assets/admin-tools/frola/js/plugins/media_manager.min.js"></script>
    <script src="assets/admin-tools/frola/js/plugins/font_family.min.js"></script>
    <script src="assets/admin-tools/frola/js/plugins/font_size.min.js"></script>
    <script src="assets/admin-tools/frola/js/plugins/block_styles.min.js"></script>
    <script src="assets/admin-tools/frola/js/plugins/video.min.js"></script>
    
   <!--  <script type="text/javascript">
      $(function(){
         $('#edit').editable({
            inlineMode: false
        })

      });
    </script> -->
    
    <script>
        $(function() {
            $('#edit').editable({
            // Set the image upload URL.
                inlineMode: false,
                imageUploadParam: 'image_param',
                 height: 200,
                // Additional upload params.
                imageUploadParams: {id: 'my_editor'}
                
            })
        });
    </script>
    <!-- FROLAAAAAAAAAAAA  -->
    <!-- Bootstrap -->
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>

    <script src="assets/js/bootstrap-confirmation.js"></script>
    <script src="assets/js/tooltip.js"></script>
    <script>
        $('[data-toggle="confirmation"]').confirmation()
    </script>

    <!-- jQuery -->
    <script type="text/javascript" src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->

    <!-- Chart Plugins -->
    <script type="text/javascript" src="vendor/plugins/highcharts/highcharts.js"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="vendor/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="vendor/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js">
    </script>
    <!-- Page UPLOAD GAMBAR ....... -->
    <script type="text/javascript" src="vendor/plugins/fileupload/fileupload.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/holder.min.js"></script>

    <script type="text/javascript" src="assets/js/moment.js"></script>
    <!-- Page DATE PICKER -->
    <script type="text/javascript" src="vendor/plugins/datepicker/js/bootstrap-datetimepicker.js"></script>
    <!-- Theme Javascript -->
    <script type="text/javascript" src="assets/js/utility/utility.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/demo.js"></script>

    <!-- Admin Panels  -->
    <script type="text/javascript" src="assets/admin-tools/admin-plugins/admin-panels/adminpanels.js"></script>
    
    <!-- UANG -->
    <script type="text/javascript" src="assets/js/jquery.maskMoney.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#angka1').maskMoney();
            $('#angka2').maskMoney({prefix:'US$'});
            $('#angka3').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
            $('#angka4').maskMoney();
        });
    </script>

    <!-- Page Javascript -->
    <script type="text/javascript" src="assets/js/pages/widgets.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core      
            Core.init({
                sbm: "sb-l-c",
            });

            // Init Demo JS
            Demo.init();
            // Init plugins used on this page
            // HighCharts, JvectorMap, Admin Panels

            // Init Admin Panels on widgets inside the ".admin-panels" container
            $('.admin-panels').adminpanel({
                grid: '.admin-grid',
                draggable: true,
                mobile: true,
                callback: function() {
                    bootbox.confirm('<h3>A Custom Callback!</h3>', function() {});
                },
                onFinish: function() {
                    $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onLoad');

                    demoHighCharts.init();

                    Waypoint.refreshAll();

                },
                onSave: function() {
                    $(window).trigger('resize');
                }
            });
            

            $('#datetimepicker').datetimepicker({
                pickTime: false
            });
            $('#datetimepicker1').datetimepicker({
                pickTime: false
            });
            $("#datetahun").datetimepicker( {
               minViewMode: 'years',
                viewMode: 'years',
                format: "YYYY",
                pickTime: false
                });
               
            //  $('#multiselect').multiselect({
            //     buttonClass: 'multiselect dropdown-toggle btn btn-system btn-system'
            // });
             $('#multiselect').multiselect({
                enableFiltering: true,
                buttonClass: 'multiselect dropdown-toggle btn btn-system btn-system'
            });
             $('#multiselecttwo').multiselect({
                enableFiltering: true,
                buttonClass: 'multiselect dropdown-toggle btn btn-system btn-system'
            });
             $('#multiselectwithlabel').multiselect({
                buttonClass: 'multiselect dropdown-toggle btn btn-default btn-success',
                enableFiltering: true,
            });
            $('#multiselectwithfilter').multiselect({
                buttonClass: 'multiselect dropdown-toggle btn btn-default btn-success',
                enableFiltering: true,
            });
           
            $('#datatable').dataTable({
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [-1]
                }],
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": "",
                        "sNext": ""
                    }
                },
                "iDisplayLength": 5,
                "aLengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
                "oTableTools": {
                    "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
                }
            });

        });
    </script>
</body>

</html>
