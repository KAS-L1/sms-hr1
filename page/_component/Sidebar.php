 <!--begin::Sidebar-->
 <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
     <!--begin::Sidebar Brand-->
     <div class="sidebar-brand">
         <!--begin::Brand Link-->
         <a href="#" class="brand-link">
             <!--begin::Brand Image-->
             <img
                 src="<?=APP_LOGO_NAV?>"
                 alt="AdminLTE Logo"
                 class="brand-image opacity-75 shadow" />
             <!--end::Brand Image-->
             <!--begin::Brand Text-->
             <span class="brand-text fw-light"><?=APP_NAME?></span>
             <!--end::Brand Text-->
         </a>
     </div>
     <!--end::Sidebar Brand-->
     <!--begin::Sidebar Wrapper-->
     <div class="sidebar-wrapper">
        <div class="user-header text-center py-2">
            <img
                src="<?=USER_IMAGE?>" width="100"
                class="rounded-circle img-thumbnail"
                alt="User Image" />
            <div>
                <div class="text-white"><?=AUTH_USER['firstname'].' '.AUTH_USER['lastname']?></div>
                <small class="text-muted"><?=AUTH_USER['user_id']?></small>
            </div>
            
        </div>
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="menu"
                data-accordion="false">
                
                <?php
                switch (AUTH_USER['role']) {
                    case "Admin":
                        include_once("page/_component/Nav_Admin.php");
                        break;
                    case "Teacher":
                        include_once("page/_component/Nav_Teacher.php");
                        break;
                    case "Student":
                        include_once("page/_component/Nav_Student.php");
                        break;
                }
                ?>

            </ul>
            <!--end::Sidebar Menu-->
         </nav>
     </div>
     <!--end::Sidebar Wrapper-->
 </aside>
 <!--end::Sidebar-->