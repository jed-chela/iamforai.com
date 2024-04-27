<?php
   $active_home     = "";
   $active_about    = "";
   $active_contact  = "";

   if(isset($active_menu)){
     switch ($active_menu) {
       case 'about':
         $active_about        = "active";
         break;


       case 'contact':
         $active_contact  = "active";
         break;
       
       default:
         $active_home     = "active";
         break;
     }
   }
?>

  <body>

    <div class="wrapper">
      <header class="header">
        <div class="header__container">
          <!-- Logo -->
          <a href="<?php echo base_url(); ?>" style="visibility:hidden;"><img src="<?php echo base_url(); ?>assets/img/iamforai-logo.png?1" class="header__logo"></a>
          <!-- Hamburger Toggle Button -->
          <div class="header__menu menu">
            <div class="menu__icon">
              <span></span>
            </div>
            <!-- Replace Your Site Links -->
            <nav data-sub_menu_auto_close="true" class="menu__body">
              <!-- Logo -->
              <a href="<?php echo base_url(); ?>" class="nav__logo">
                <img src="<?php echo base_url(); ?>assets/img/iamforai-logo.png?1">
              </a>

              <ul class="menu__list">
                <li class="me-3">
                  <a data-goto=".page__section_1" href="<?= base_url() ?>" class="menu__link <?= $active_home; ?>" >
                    <i class=""></i><span> Home</span></a>
                </li>
                <li class="me-3">
                  <a data-goto=".page__section_2" href="<?= base_url() ?>about" class="menu__link <?= $active_about; ?>" >
                    <i class=""></i><span> About</span></a>
                </li>
                <li class="me-3">
                  <a data-goto=".page__section_2" href="<?= base_url() ?>contact" class="menu__link <?= $active_contact; ?>" >
                    <i class=""></i><span> Contact Us</span></a>
                </li>
                            
              </ul>
              <div class="follow-header d-md-none d-lg-none">
                <div>FOLLOW ASUE IGHODALO</div>
                <div>
                  <span><a href="#" target="_blank">
                    <i class="fa-brands fa-instagram"></i></a> </span>
                  <span><a href="#" target="_blank">
                    <i class="fa-brands fa-facebook"></i></a> </span>
                  <span><a href="#" target="_blank">
                    <i class="fa-brands fa-x"></i></a> </span>
                  <span><a href="#" target="_blank">
                    <i class="fa-brands fa-tiktok"></i></a> </span>
                </div>
              </div>
            </nav>

          </div>
        </div>
        
      </header>
      <main class="page"></main>

















