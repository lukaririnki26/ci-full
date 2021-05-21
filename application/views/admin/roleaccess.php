<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> (<?= $role['role']; ?>)</h1>
    <?= $this->session->flashdata('message'); ?>
    <table class="table col-lg-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Menu</th>
                <th scope="col">Access</th>
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
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" <?= access_check($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a class="btn btn-primary" href="<?= base_url('admin/role'); ?>"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->