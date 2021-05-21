<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <!-- user role check -->
    <!-- if role admin -->
    <?php if ($user['role_id'] == 1) : ?>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
            <!-- if role user -->
        <?php elseif ($user['role_id'] == 2) : ?>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user'); ?>">
            <?php endif; ?>
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-code"></i>
            </div>
            <div class="sidebar-brand-text mx-3">My App</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- get menu from db -->
            <?php
            $role_id = $user['role_id'];
            $sql_menu = "
    select app_menu.id,app_menu.menu 
    from app_menu join app_access_menu 
    on app_menu.id = app_access_menu.menu_id 
    where app_access_menu.role_id = $role_id 
    order by app_access_menu.menu_id asc";
            $menu = $this->db->query($sql_menu)->result_array();
            foreach ($menu as $m) :
            ?>
                <!-- Heading -->
                <div class="sidebar-heading">
                    <?= $m['menu']; ?>
                </div>
                <?php
                $menu_id = $m['id'];
                $sql_sub_menu = "
        select * from app_sub_menu
        where menu_id = $menu_id and is_active =1
        ";
                $sub_menu = $this->db->query($sql_sub_menu)->result_array();
                foreach ($sub_menu as $sm) :
                    if ($sm['title'] == $title) :
                ?>
                        <!-- Nav Item - Dashboard -->
                        <!-- check active -->
                        <li class="nav-item active">
                        <?php elseif ($sm['title'] != $title) : ?>
                        <li class="nav-item">
                        <?php endif; ?>

                        <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <span><?= $sm['title']; ?></span></a>
                        </li>
                    <?php endforeach; ?>
                    <!-- Divider -->
                    <hr class="sidebar-divider mt-3">
                <?php endforeach; ?>
                <!-- Nav Item - My profile -->
                <li class="nav-item">
                    <a class="nav-link signout pt-0" href="<?= base_url('auth/logout'); ?>">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

</ul>
<!-- End of Sidebar -->