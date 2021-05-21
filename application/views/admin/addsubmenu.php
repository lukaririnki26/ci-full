<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <!-- card -->
            <div class="card" style="width: 25rem;">
                <div class="card-body">
                    <h5 class="card-title mb-4 text-gray-800">Add New Sub Menu</h5>
                    <!-- form -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= set_value('title'); ?>" placeholder="Title">
                            <?= form_error('title', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="menuref" class="form-label">Menu ref Name</label>
                            <select class="form-control" id="menuref" name="menuref" value="<?= set_value('menuref'); ?>">
                                <option value="">Select Menu ref</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="url" class="form-label">Url</label>
                            <input type="text" class="form-control" id="url" name="url" value="<?= set_value('url'); ?>" placeholder="Menu/SubMenu">
                            <?= form_error('url', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="icon" class="form-label">Icon</label>
                            <input type="text" class="form-control" id="icon" name="icon" value="<?= set_value('icon'); ?>" placeholder="fas fa-fw fa-iconname">
                            <?= form_error('icon', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="active" name="active" value="1" checked>
                                <label for="active" class="form-check-label">Active</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-3" name="submit"><i class="fas fa-fw fa-save"></i> Save</button>
                        <a href="<?= base_url('admin/submenu'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->