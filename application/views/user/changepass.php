<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <a href="<?= base_url('user'); ?>" class="btn btn-primary mb-3"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <!-- card -->
            <!-- form -->
            <form action="" method="post">
                <div class="form-group row">
                    <label for="curpass" class="form-label col-sm-5">Current password</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="curpass" name="curpass">
                        <?= form_error('curpass', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password1" class="form-label col-sm-5">New password</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="password1" name="password1">
                        <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password2" class="form-label col-sm-5">Confirm new password</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="password2" name="password2">
                        <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class=" form-group row justify-content-end">
                    <div class="">
                        <button type="submit" class="btn btn-primary mr-3" name="submit"><i class="fas fa-fw fa-save"></i> Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->