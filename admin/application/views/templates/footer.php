</div>
<!-- content-wrapper ends -->

<!-- partial:partials/_footer.html -->
<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?= date('Y'); ?> <a href="https://www.az-media.id/" target="_blank">AZ-Media</a>. All rights reserved.</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Made By Suterlan</span>
  </div>
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> -->
  </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<script src="<?= base_url('assets/plugins/') ?>jquery/jquery.min.js"></script>
<!-- plugins:js -->
<script src="<?= base_url('assets/plugins/') ?>js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?= base_url('assets/plugins/') ?>chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/plugins/') ?>datatables.net/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/plugins/') ?>datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="<?= base_url('assets/dist/') ?>js/dataTables.select.min.js"></script>
<!-- sweetalert2 -->
<script src="<?= base_url(''); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url(''); ?>assets/plugins/toastr/toastr.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= base_url('assets/dist/') ?>js/off-canvas.js"></script>
<script src="<?= base_url('assets/dist/') ?>js/hoverable-collapse.js"></script>
<script src="<?= base_url('assets/dist/') ?>js/template.js"></script>
<script src="<?= base_url('assets/dist/') ?>js/settings.js"></script>
<script src="<?= base_url('assets/dist/') ?>js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?= base_url('assets/dist/') ?>js/dashboard.js"></script>
<script src="<?= base_url('assets/dist/') ?>js/Chart.roundedBarCharts.js"></script>

<script src="<?= base_url('assets/plugins/') ?>typeahead.js/typeahead.bundle.min.js"></script>
<script src="<?= base_url('assets/dist/') ?>js/typeahead.js"></script>
<script src="<?= base_url('assets/dist/') ?>js/file-upload.js"></script>
<!-- End custom js for this page-->
<script type="text/javascript">
  let base_url = '<?= base_url() ?>';
</script>
<!-- user manajemen -->
<script src="<?= base_url('assets/table/') ?>user-manajemen.js"></script>
<!-- layanan manajemen -->
<script src="<?= base_url('assets/table/') ?>layanan-manajemen.js"></script>
<!-- Transaksi -->
<script src="<?= base_url('assets/table/') ?>transaksi.js"></script>

<script src="<?= base_url('assets/table/') ?>pengumuman-manajemen.js"></script>


<!-- end js table -->
<script>
  <?=
  $this->session->tempdata('messageAlert');
  ?>
</script>

</body>

</html>