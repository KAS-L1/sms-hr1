<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block font-bold">
                <div class="flex items-center mt-2">
                    <?php
                        BreadCrumb([
                            ['label' => CAMEL(str_replace("-", " ", $PAGE)), "url" => $PAGE],
                            ['label' => CAMEL(str_replace("-", " ", PAGE(2) ?? ''))]
                        ]);
                    ?>
                </div>
            </li>
        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                  <img
                        src="<?=USER_IMAGE?>"
                        class="user-image rounded-circle shadow-sm"
                        alt="User Image" />
                    <span class="d-none d-md-inline">Hi, <?=AUTH_USER['firstname']?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!--begin::User Image-->
                    <li class="user-header text-bg-light">
                        <img
                            src="<?=USER_IMAGE?>"
                            class="rounded-circle"
                            alt="User Image" />
                        <p>
                            <?=AUTH_USER['firstname'].' '.AUTH_USER['lastname']?>
                            <small>Member since <?=DATE_SHORT(AUTH_USER['created_at'])?></small>
                        </p>
                    </li>
                    <!--end::User Image-->

                    <!--begin::Menu Footer-->
                    <li class="user-footer">
                        <a href="<?= Route('user-profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                        <a href="<?=Route("api/auth/logout.php")?>" class="btn btn-danger btn-flat float-end">Sign out</a>
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
<!--end::Header-->