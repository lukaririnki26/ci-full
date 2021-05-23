<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <a href="<?= base_url('user'); ?>" class="btn btn-primary mb-3"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
    <div class="row">
        <div class="col-lg-6">
            <!-- card -->
            <!-- form -->
            <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row">
                <label for="img" class="form-label col-sm-3">Image</label>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" class="img-thumbnail rounded-circle">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="img" name="img">
                                <label class="custom-file-label" for="img">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="form-label col-sm-3">Full name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>

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
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>