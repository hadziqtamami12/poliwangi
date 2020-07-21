 <!-- Sidenav -->
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-primary" id="sidenav-main">
    <div class="scrollbar-inner">
           
     <!-- Brand -->
     <div class="sidenav-header  align-items-center" >
        <a class="navbar-brand" href="<?= base_url('user'); ?>">
          <img src="<?= base_url('assets/dashboard/'); ?>img/a.png"  class="navbar-brand-img" alt="...">
        </a>
      </div>
        
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">

        <!-- Admin -->
        <!-- Divider -->
        <hr class="my-2 bg-white">

        <!-- Nav items -->
          <ul class="navbar-nav">

        <!-- QUERY MENU -->

        <?php 
        $role_id = $this->session->userdata('role_id_dosen');
        $queryMenu = "SELECT `user_menu`.`id`, `menu`
                        FROM `user_menu` JOIN `user_access_menu`
                        ON `user_menu`.`id` = `user_access_menu`.`menu_id` 
                        WHERE `user_access_menu`.`role_id` = $role_id 
                        ORDER BY `user_access_menu`.`menu_id` ASC"; 

        $menu = $this->db->query($queryMenu)->result_array();
        ?>

        <!-- LOOPING MENU -->

        <?php foreach ($menu as $m ) : ?>
        
        <li class="nav-item" style="padding-left: 10%;">
        <h2><small class="text-muted text-light"><?=  $m['menu']; ?></small></h2>
        </li>
        

        <!-- SUBMENU SESUAI MENU -->

        <?php 
        $menuId = $m['id'];
        $querySubMenu ="SELECT * FROM `user_sub_menu` JOIN `user_menu` 
        ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
        WHERE `user_sub_menu`.`menu_id` = $menuId
        AND `user_sub_menu`.`is_active` = 1
        ";

        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $m) : ?>
        
        <?php if ($title == $m['title']) : ?>
          <li class="nav-item active">
        <?php else : ?>
          <li class="nav-item">
        <?php endif; ?>

            
                <a class="nav-link" href="<?= base_url($m['url']); ?>">
                  <i class="<?= $m['icon']; ?>"></i>
                  <span class="nav-link-text text-white"><?= $m['title']; ?></span>
                </a>
              </li>
            

        <?php endforeach; ?>

        <hr class="my-0">

        <?php endforeach; ?>
              
          </ul>
          
          <!-- Navigation -->
          <ul class="navbar-nav ">
          <li class="nav-item mb-4">
              <a class="nav-link active bg-white" href="<?= base_url('auth/logout'); ?>">
              <i class="fas fa-fw fa-sign-out-alt text-primary"></i>
                <span class="nav-link-text text-primary font-weight-bold">Log Out</span>
              </a>
            </li>
          </ul>
            
        </div>
      </div>
    </div>
  </nav>