<!DOCTYPE html>
<html lang="en">

  <head>
    @include('includes.head')
    @stack('css')
  </head>

  <body id="page-top">

    @include('includes.header')

    <div id="wrapper">

      <!-- Sidebar -->
      @include('includes.sidebar')

      <div id="content-wrapper">

        <div class="container-fluid">

          @yield('content')

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        @include('includes.footer')

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?= base_url('login/logout')?>">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url('assets/')?>vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url('assets/')?>vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/')?>js/sb-admin.min.js"></script>

    {{-- Input Mask --}}
    <script src="<?php echo base_url('assets/vendor/')?>input-mask/jquery.mask.min.js"></script>
    
    <!-- SweetAlert 2 -->
    <script src="<?php echo base_url('assets/')?>js/sweetalert2.all.min.js"></script>

    <!-- Loading Overlay -->
    <script src="<?php echo base_url('assets/')?>js/loadingoverlay.min.js"></script>
    
    @stack('javascript')

  </body>

</html>
