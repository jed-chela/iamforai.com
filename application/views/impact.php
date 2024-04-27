
<?php $this->load->view("temp_header_links"); ?>
<?php $this->load->view("temp_header"); ?>

<style type="text/css">

</style>

<!--
<div id="page-loader">
  <div class="lds-ripple">
    <div></div>
    <div></div>
  </div>
</div>
-->

<div class="main-content-holder">
  <div class="container container-sm">
    <div class="row">
      <div class="hero-box animate__animated" data-effect="animate__fadeInLeft __delay1">
        <h1>Impact <br class="mobile_only" />Thesis</h1>
      </div>
    </div>

    <div class="row">
      <div class="belief-box impact-box animate__animated" data-effect="animate__fadeInUp __delay7">
        <i class="fa fa-arrow-up-right belief-arrow-right-up"></i>
        <h4>A summary of FbX’s impact thesis and commitment to ESG goals</h4>
        <p>Jamma by FbX is fully committed to UN SDGs 1, 2, 3, 4, 5, 7, 8, 10, 11, 12 & 13.</p>
        <p>Our target entrepreneurs are expected to be committed to UN SDGs in the quest to build viable, market-shaping solutions.</p>
        <p>We expect our Limited Partners (institutional) to be proponents of UN SDGs while our Individual Limited Partners are expected to be UN SDG advocates.</p>
        <p>Our evaluation criteria as part of our early due diligence during selection measures UN SDG contributions.
        High impact growth is incorporated in our vision statement. Acting responsibly via Governance is fully incorporated as part of our core values.</p>
        <p>Our thesis has a fine balance committed to ESG. We aim to achieve this by seeking to fund and fully support founders building in;</p>
        <p>Cleantech <iconify-icon icon="fluent:lightbulb-filament-20-regular"></iconify-icon> (Renewable, green & sustainable energy) (UN SDGs 7, 9, 11, 12 and 13).</p>
        <p>Sustainability <iconify-icon icon="ph:recycle-light"></iconify-icon> (Social enterprise) (UN SDG 7, 11, 13).</p>
        <p>Mobility <img src="<?php echo base_url();?>assets/img/site/location.png" /> (eMobility, Shared mobility) (UN SDGs 8).</p>
        <p>Agribusiness <iconify-icon icon="ph:plant-light"></iconify-icon> (UN SDGs 1, 2, 8).</p>
        <p>Healthcare <iconify-icon icon="iconoir:healthcare"></iconify-icon> (Pharma, health tech) (UN SDG 3, 8).</p>
        <p>Education <iconify-icon icon="fluent-mdl2:education"></iconify-icon> (Edtech) (UN SDG 4).</p>
        <p>We believe strongly that our startups would contribute to scaling job creation, income uplift and energy access over the next decade.</p>
        

      </div>
    </div>

    <div class="row">
      <div class="text-center mt-5 mb-5 animate__animated" data-effect="animate__fadeInUp __delay1">
        <a href="mailto:team@fbx.ventures" class="mb-4 mb-md-0" ><i class="fa fa-envelope"></i> team@fbx.ventures</a>  
        <br class="mobile_only" />
        <br class="mobile_only" />
        <a href="http://calendly.com/fbxvc" class="ms-3" target="_blank"><i class="fa fa-calendar"></i> Schedule a meeting with FbX</a>
      </div>
    </div>

  </div>
  
</div>


<?php // $this->load->view("temp_footer"); ?>
<?php $this->load->view("temp_footer_links"); ?>
<script type="text/javascript">
  function showAnimate(entries, observer)
  {
    entries.forEach(entry => {
      var effect      = entry.target.getAttribute("data-effect");
      var classvalue  = entry.target.getAttribute("class");

      console.log(effect);
      if(effect != ""){
        if(entry.isIntersecting){
          //Remove data-effect
          entry.target.setAttribute("data-effect", "");

          //Use Effect
          entry.target.setAttribute("class", classvalue+" "+effect);
        }
      }
      console.log(effect);
    });
  }

  let options = {
    root: null,
    rootMargin: '0px',
    threshold: 0.3
  };

  let observer = new IntersectionObserver(showAnimate, options);

  const animate__animated = document.querySelectorAll('.animate__animated');
  animate__animated.forEach(animatee => {
    observer.observe(animatee);
  });

</script>
<script type="text/javascript">
<?php 
  echo "let base_url = '".base_url()."';" ;
?>
  $(function(){
    const myModalEl = $('#dataModal');
    myModalEl.get(0).addEventListener('show.bs.modal', function(){
      
    });
  });


</script>
<script type="text/javascript">

  $(window).on("load", function() {
    $('#page-loader').fadeOut(800);
  });

</script>