<?php $this->load->view("temp_header_links"); ?>
<?php $this->load->view("temp_header"); ?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/story.css">


    </header>
    <faqhead>
      <row>
        <div class="container-fluid">
          <div class="col-md-12">
            <h1>Common <br/> Questions <br/> Asked?</h1>
            
            <div class="question-green">
              <img src="<?php echo base_url(); ?>assets/img/question-green.png">
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
                  <div id="faqs" class="col-md-12">
                    <div class="accordion">
                      <div class="accordion-item" holder-expanded="true">
                        <button id="accordion-button-1" aria-expanded="true">
                          <span class="accordion-title">What is Fraud/Scam?</span>
                          <span class="icon fa fa-chevron-down" aria-hidden="true"></span>
                          <span class="yicon fa fa-chevron-up" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                          <p>
                            It’s a criminal act whereby someone uses dishonest methods (like fake calls or text messages) to take or steal something valuable (like money) from another person. A person who commits fraud is also called a fraud, or fraudster, or scammer.
                          </p>
                        </div>
                      </div>
                      <div class="accordion-item" holder-expanded="false">
                        <button id="accordion-button-2" aria-expanded="false">
                          <span class="accordion-title">How often do fraudsters/scammers call?</span>
                          <span class="icon fa fa-chevron-down" aria-hidden="true"></span>
                          <span class="yicon fa fa-chevron-up" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                          <p>
                            It’s hard to predict when fraudsters/scammers will call, but you must always be on guard, as they can call you anytime, anywhere.
                          </p>
                        </div>
                      </div>
                      <div class="accordion-item" holder-expanded="false">
                        <button id="accordion-button-2" aria-expanded="false">
                          <span class="accordion-title">Where do I report to in case of issues?</span>
                          <span class="icon fa fa-chevron-down" aria-hidden="true"></span>
                          <span class="yicon fa fa-chevron-up" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                          <p>
                            Report immediately to your bank.
                          </p>
                        </div>
                      </div>
                      <div class="accordion-item" holder-expanded="false">
                        <button id="accordion-button-2" aria-expanded="false">
                          <span class="accordion-title">Can I report scams directly to my bank?</span>
                          <span class="icon fa fa-chevron-down" aria-hidden="true"></span>
                          <span class="yicon fa fa-chevron-up" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                          <p>
                            Yes, you can. Dial your bank’s service line to confirm suspicious dealings or report fraud incidents that concern you and your money.
                          </p>
                        </div>
                      </div>
                      <div class="accordion-item" holder-expanded="false">
                        <button id="accordion-button-2" aria-expanded="false">
                          <span class="accordion-title">What do I do when a random number calls?</span>
                          <span class="icon fa fa-chevron-down" aria-hidden="true"></span>
                          <span class="yicon fa fa-chevron-up" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                          <p>
                            Answer the call, but do not ever talk about your private or sensitive details, e.g. BVN, ATM PIN, etc.
                          </p>
                        </div>
                      </div>
                      <div class="accordion-item" holder-expanded="false">
                        <button id="accordion-button-2" aria-expanded="false">
                          <span class="accordion-title">How can I get back my stolen money?</span>
                          <span class="icon fa fa-chevron-down" aria-hidden="true"></span>
                          <span class="yicon fa fa-chevron-up" aria-hidden="true"></span>
                        </button>
                        <div class="accordion-content">
                          <p>
                            Reach out to your bank and have a chat with the Customer Service Unit.
                          </p>
                        </div>
                      </div>

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
                <h1>Still need help?</h1>
                <h1><a href="<?php echo base_url(); ?>contact">Contact us now.</a></h1>
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