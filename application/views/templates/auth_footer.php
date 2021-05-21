<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Sweet alert -->
<script src="<?= base_url('assets/'); ?>js/sweetalert.js"></script>

<!-- add alert from flashdata(session) if exists-->
<?= $this->session->flashdata('alert'); ?>
<?= $this->session->flashdata('not-activated'); ?>
<?= $this->session->flashdata('not-login'); ?>
<?= $this->session->flashdata('alert-logout-true'); ?>

</body>

</html>