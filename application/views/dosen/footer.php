
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-sm-none d-md-block">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url() ?>assets/lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url() ?>assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/lte/dist/js/adminlte.js"></script>
<script src="<?php echo base_url() ?>assets/lte/dist/js/demo.js"></script>
<script src="<?php echo base_url() ?>assets/lte/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url() ?>assets/lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url() ?>assets/lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url() ?>assets/lte/plugins/chartjs-old/Chart.min.js"></script>
<script src="<?php echo base_url() ?>assets/lte/dist/js/pages/dashboard2.js"></script>

<!-- Form PLUGIN -->
<script src="<?php echo base_url() ?>assets/lte/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>assets/lte/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/lte/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/lte/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/lte/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url() ?>assets/lte/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/lte/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/lte/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url() ?>assets/lte/plugins/fastclick/fastclick.js"></script>
<!-- TABLE PLUGIN -->
<script src="<?php echo base_url() ?>assets/lte/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/lte/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url() ?>assets/lte/plugins/fastclick/fastclick.js"></script>

<script src="<?php echo base_url() ?>assets/lte/plugins/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor1'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      })

    // bootstrap WYSIHTML5 - text editor

    $('.textarea').wysihtml5({
      toolbar: { fa: true }
    })
  })
</script>

 <script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.js"></script>
    <script> 
  $(document).ready(function(){
      $("#gantitanggal").click(function(){
          $("#editdeadline").slideDown("slow");
          $("#batalganti").slideDown("slow");
          $("#gantitanggal").slideUp("slow");
      });
  });
  </script>
  <script> 
  $(document).ready(function(){
      $("#batalganti").click(function(){
          $("#editdeadline").slideUp("slow");
          $("#batalganti").slideUp("slow");
          $("#gantitanggal").slideDown("slow");
      });
  });
  </script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<script>
  $(function () {
    $("#example3").DataTable();
    $('#example4').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker         : true,
      timePickerIncrement: 30,
      format             : 'MM/DD/YYYY h:mm A'
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-3283410605515712",
    enable_page_level_ads: true
  });
</script>
</body>
</html>
