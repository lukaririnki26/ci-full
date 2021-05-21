<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Fahmi Ramadhani 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<!-- sweet alert -->
<script src="<?= base_url('assets/'); ?>js/sweetalert.js"></script>
<script src="<?= base_url('assets/'); ?>js/sweet.logout.js"></script>\
<script>
    // run jquery when doc is ready
    $(function() {
        // set flashsdata from data tag
        const flashdata = $('.flash-data').data('flashdata');
        // set if flashdata has val
        var flash = flashdata;
        var [flashtitle, flashtext] = flash.split('~');

        if (flashdata) {
            // run sweetalert
            Swal.fire({
                icon: 'success',
                title: flashtitle,
                text: 'Succesfully ' + flashtext
            });
        }
        // bind class from doc
        // add event onclick with param
        $('.badge-del').on('click', function(evt) {
            // disable href
            evt.preventDefault();
            // save val attr href from this
            const href = $(this).attr('href');
            const title = $(this).data('title');
            const tex = $(this).data('text');
            // run sweet alert
            Swal.fire({
                icon: 'warning',
                title: title,
                text: 'Are you sure wanna delete ' + tex + ' ?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                // catch btn as result
                // check if result value true 
                if (result.value) {
                    // anchor doc to href
                    document.location.href = href;
                    // end if
                }
                // end then
            });
            // end bind
        });
        // end jquery function doc ready
    });
</script>
</body>

</html>