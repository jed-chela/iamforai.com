
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
        <h1>Our Story</h1>
      </div>
    </div>

    <div class="row">
      <div class="belief-box impact-box animate__animated" data-effect="animate__fadeInUp __delay7">
        <i class="fa fa-arrow-up-right belief-arrow-right-up"></i>
        <h4>Our Story</h4>
        <p>We are self-taught VCs who believe magic can be found at the other side of questioning convention.</p>
<p>We are bold enough to reimagine Venture Capital as an industry.</p>
<p>We refuse to be boxed by the written & unwritten rulebook. We are not caged to do Venture Capital by-the-book, alone.</p>
<p>We are driven by our deep passion for new ventures and our exposure to the world of digital startups.</p>
<p>Ambition-wise, we believe FbX can become a poster profile for successful self-taught VCs probing the thesis that the VC industry needs ‘Community not Cult’. We are on a journey to:</p>
<ul class='list-style-disc' >
  <li>Validate the FbX investment thesis by successfully executing a fine balance between building for sustainable Impact and building for profitability. </li>
  <li>Validate our thesis that founders and LPs deserve early exits. Early exits on a continent like Africa would accelerate re-injection and re-investment of capital with positive impact, ecosystem-wide.</li>
  <li>Build a credible portfolio of 10 carefully selected startups with potential to sell at a rewarding premium by Series A.</li>
  <li>Successfully execute Tunnel Buying &trade; making it an industry reference for enabling early exits for VC LPs.</li>
</ul>
<p>Reminder: We are self-taught VCs, this is our reality & we are super-proud of it.</p>


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