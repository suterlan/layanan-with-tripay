  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2021 AZ-Media. All Rights Reserved.

        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="<?= base_url(''); ?>assets/plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url(''); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(''); ?>assets/dist/js/owl-carousel.js"></script>
  <script src="<?= base_url(''); ?>assets/dist/js/animation.js"></script>
  <script src="<?= base_url(''); ?>assets/dist/js/imagesloaded.js"></script>
  <script src="<?= base_url(''); ?>assets/dist/js/custom.js"></script>

  <script src="<?= base_url(''); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="<?= base_url(''); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script>
    <?= $this->session->tempdata('messageAlert');
    ?>
  </script>
  <script type="text/javascript">
  
//   notif salesproof Tripay
(function(d, id) {
	let js, fjs = d.getElementsByTagName('script')[0];
	if (d.getElementById(id)) return;
	js = d.createElement('script'); js.id = id; js.type = 'module';
	js.src = "https://tripay.co.id/salesproof/sdk?merchant_code=T8277";
	fjs.parentNode.insertBefore(js, fjs);
})(document, 'tripay-websocket');
</script>

  </body>
  </html>