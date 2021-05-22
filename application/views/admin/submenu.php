<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <a href="<?= base_url('admin/submenu/add'); ?>" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i> Add New Sub Menu</a>
    <div class="row">
        <div class="col-lg">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu ref</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Is active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $rnumber = 1;
                    foreach ($submenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $rnumber++; ?></th>
                            <td><?= $sm['title']; ?></td>
                            <td><?= $sm['menu']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><i class="<?= $sm['icon']; ?>"></i></td>
                            <td><?= $sm['is_active']; ?></td>
                            <td>
                                <a class="badge badge-warning" href="<?= base_url('admin/submenu/edit/' . str_replace(['=', '+', '/'], ['_', '-', '~'], $this->encryption->encrypt($sm['id']))); ?>">Edit</a>
                                <a class="badge badge-danger badge-del" data-title="Sub Menu" data-text="<?= $sm['title']; ?>" href="<?= base_url('admin/submenu/del/' . str_replace(['=', '+', '/'], ['_', '-', '~'], $this->encryption->encrypt($sm['id']))); ?>">Delete</a>
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