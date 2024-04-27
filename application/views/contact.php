<?php $this->load->view("temp_header_links"); ?>
<?php $this->load->view("temp_header"); ?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/story.css">


    </header>
    <faqhead>
      <row>
        <div class="container-fluid">
          <div class="col-md-12">
            <h1>Contact Us</h1>
            
            <div class="question-green">
              <img src="<?php echo base_url(); ?>assets/img/green-email.png">
            </div>
            <span class="bracelet"></span>
          </div>
        </div>
      </row>
    </faqhead>
    <faqcontent>
      <row>
            <div class="container-fluid">
              <div class="col-md-12">
                <row>
                  <div id="contact" class="col-md-12">
                    <h4>Email us at <b>confam@confamam.ng</b></h4>

                     
                    </div>
                  </div>
                </row>
              </div>
            </div>
      </row>
    </faqcontent>
    <bottom id="section04">
        <row>
            <div class="container-fluid">
              <div class="col-md-12">
                <h1></h1>
                <h1></h1>
              </div>
            </div>
        </row>
    </bottom>
<?php $this->load->view("temp_footer"); ?>
<?php $this->load->view("temp_footer_links"); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
window.onload = function() {
    if (window.jQuery) {  
        // jQuery is loaded  
        console.log("jQuery is loaded!");
        $.ajaxSetup({ cache: false });

    } else {
        // jQuery is not loaded
        console.log("jQuery is not loaded");
    }

        const items = document.querySelectorAll('.accordion button');

        function toggleAccordion() {
          const itemToggle = this.getAttribute('aria-expanded');
          const holdersToggle = this.getAttribute('holder-expanded');

          for (i = 0; i < items.length; i++) {
            items[i].setAttribute('aria-expanded', 'false');
            items[i].parentNode.setAttribute('holder-expanded', 'false');
          }

          if (itemToggle == 'false') {
            this.setAttribute('aria-expanded', 'true');
            this.parentNode.setAttribute('holder-expanded', 'true');
          }
        }

        items.forEach((item) => item.addEventListener('click', toggleAccordion));

}

</script>