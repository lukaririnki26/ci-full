<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <a href="<?= base_url('admin/role/add'); ?>" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i> Add New Role</a>
    <table class="table col-lg-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $rnumber = 1;
            foreach ($role as $r) :
                // forbidden admin
                if ($r['id'] != 1) : ?>
                    <tr>
                        <th scope="row"><?= $rnumber++; ?></th>
                        <td><?= $r['role']; ?></td>
                        <td>
                            <a class="badge badge-primary" href="<?= base_url('admin/role/access/' . $r['id']); ?>">Access</a>
                            <a class="badge badge-warning" href="<?= base_url('admin/role/edit/' . str_replace(['=', '+', '/'], ['_', '-', '~'], $this->encryption->encrypt($r['id']))); ?>">Edit</a>
                            <a class="badge badge-danger badge-del" data-title="Role" data-text="<?= $r['role']; ?>" href="<?= base_url('admin/role/del/' . str_replace(['=', '+', '/'], ['_', '-', '~'], $this->encryption->encrypt($r['id']))); ?>">Delete</a>
                        </td>
                    </tr>
            <?php
                endif;
            endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->