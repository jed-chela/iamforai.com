
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
        <h1>Our <br class="mobile_only" />Philosophy</h1>
      </div>
    </div>

    <div class="row">
      <div class="belief-box impact-box animate__animated" data-effect="animate__fadeInUp __delay7">
        <i class="fa fa-arrow-up-right belief-arrow-right-up"></i>
        <h4>The FbX Philosophy</h4>
        <p>We are self-taught VCs, this is our reality and we are super-proud of it. We are not caged to do Venture Capital by-the-book, alone.</p>
        <p>- Fundraising successfully does not always guarantee you will be a good VC, same way raising successfully does not guarantee or make you a good or great founder.</p>
        <p>- Avoid becoming a slave to VC convention. If you find yourself caught up in convention, you think convention.</p>
        <p>- We are ready to make our own luck; we will discover our own PortCos.</p>
        <p>- We don’t depend on deal flow...that is the industry convention-we don’t rely on that with our model.</p>
        <p>- High commitment to the vision board takes us all to the promise land.</p>
        <p>- Community over Cult.</p>
        <p>- You cannot drool over nonsense.</p>
        <p>- Turn on your BS, hype and vibes filter. We have LP funds to protect!</p>
        <p>A high % of VCs get excited way too easily. This is one of the reasons why most founders don’t rate them at all & also, why they are susceptible to writing checks for silly things and don’t find the time to understand potential game changers.</p>
        <p>They drool over nonsense and then dawdle over the real deals- something to do with not having enough operator-led depth.</p>
                
  <?php /*      <div class="mobile-only mt-5">
          <a href="<?php echo base_url(); ?>" class="mt-5 navi-icon-box">
            <iconify-icon icon="eva:arrow-ios-back-fill" class="navi-icon"></iconify-icon><span class="navi-icon-text"> Back</span></a>
        </div>  */ ?>


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