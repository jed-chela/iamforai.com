<?php
   $active_home     = "";
   $active_impact    = "";
   $active_fractional = "";
   $active_philosophy = "";
   $active_story      = "";
   $active_contact  = "";

   if(isset($active_menu)){
     switch ($active_menu) {
       case 'impact':
         $active_impact        = "active";
         break;
       case 'fractional':
         $active_fractional    = "active";
         break;
       case 'philosophy':
         $active_philosophy    = "active";
         break;
       case 'story':
         $active_story    = "active";
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
          <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/iamforai-logo.png?1" class="header__logo"></a>
          <!-- Hamburger Toggle Button -->
          <div class="header__menu menu">
            <div class="menu__icon">
              <span></span>
            </div>
            <!-- Replace Your Site Links -->
            <nav data-sub_menu_auto_close="true" class="menu__body">
              <ul class="menu__list">
                <li>
                  <a data-goto=".page__section_1" href="<?= base_url() ?>" class="menu__link <?= $active_home; ?>" >
                    <i class=""></i><span> Home</span></a>
                </li>
                <li>
                  <a data-goto=".page__section_2" href="<?= base_url() ?>story" class="menu__link <?= $active_story; ?>" >
                    <i class=""></i><span> Our Story</span></a>
                </li>
                <li>
                  <a data-goto=".page__section_2" href="<?= base_url() ?>philosophy" class="menu__link <?= $active_philosophy; ?>" >
                    <i class=""></i><span> Our Philosophy</span></a>
                </li>
                <li>
                  <a data-goto=".page__section_2" href="<?= base_url() ?>impact_thesis" class="menu__link <?= $active_impact; ?>" >
                    <i class=""></i><span> Impact Thesis</span></a>
                </li>
                <li>
                  <a data-goto=".page__section_2" href="<?= base_url() ?>fractional_support" class="menu__link <?= $active_fractional; ?>" >
                    <i class=""></i><span> Fractional Support</span></a>
                </li>
                            
              </ul>
            </nav>

          </div>
        </div>
        
      </header>
      <main class="page"></main>

















