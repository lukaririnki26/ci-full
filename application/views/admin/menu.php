<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <a href="<?= base_url('admin/menu/add'); ?>" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i> Add New Menu</a>
    <div class="row">
        <div class="col-lg-5">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $rnumber = 1;
                    foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $rnumber++; ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <a class="badge badge-warning" href="<?= base_url('admin/menu/edit/' . str_replace(['=', '+', '/'], ['_', '-', '~'], $this->encryption->encrypt($m['id']))); ?>">Edit</a>
                                <a class="badge badge-danger badge-del" data-title="Menu" data-text="<?= $m['menu']; ?>" href="<?= base_url('admin/menu/del/' . str_replace(['=', '+', '/'], ['_', '-', '~'], $this->encryption->encrypt($m['id']))); ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->