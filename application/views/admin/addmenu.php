<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <!-- card -->
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title mb-4 text-gray-800">Add New Menu</h5>
                    <!-- form -->
                    <form action="" method="post">
                        <div class="mb-3 ">
                            <label for="menu" class="form-label">Menu Name</label>
                            <input type="text" class="form-control" id="menu" name="menu">
                            <?= form_error('menu', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary mr-3" name="submit"><i class="fas fa-fw fa-save"></i> Save</button>
                        <a href="<?= base_url('admin/menu'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->