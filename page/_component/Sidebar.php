 <!--begin::Sidebar-->
 <aside class="app-sidebar bg-primary shadow" data-bs-theme="light">
     <!--begin::Sidebar Brand-->
     <div class="sidebar-brand">
         <!--begin::Brand Link-->
         <a href="#" class="brand-link">
             <!--begin::Brand Image-->
             <img
                 src="<?=APP_LOGO_NAV?>"
                 alt="AdminLTE Logo"
                 class="brand-image" />
             <!--end::Brand Image-->
             <!--begin::Brand Text-->
             <span class="brand-text fw-bold text-white"><?=APP_NAME?></span>
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
                <div class="text-white fs-5 font-bold"><?=AUTH_USER['lastname'].', '.AUTH_USER['firstname']?></div>
                <small class="text-light">ID: <?=AUTH_USER['user_id']?></small>
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
                    switch (AUTH_USER['position']) {
                        case "Admin":
                            include_once("page/_component/Nav_Admin.php");
                            break;
                        case "Cashier":
                            include_once("page/_component/Nav_Cashier.php");
                            break;
                        case "Clerk":
                            include_once("page/_component/Nav_Clerk.php");
                            break;
                        case "Proffessor":
                            include_once("page/_component/Nav_Proffessor.php");
                            break;
                        case "Staff":
                            include_once("page/_component/Nav_Staff.php");
                            break;
                        case "Manager":
                            include_once("page/_component/Nav_Manager.php");
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