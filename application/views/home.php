
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
        <h1>Venture <br class="mobile_only" />Capital</h1>
      </div>
      <div class="hero-subtitle text-center animate__animated" data-effect="animate__fadeInLeft __delay3">
        <h3>as-is is broken</h3>
      </div>
    </div>

    <div class="row">
      <div class="belief-box animate__animated" data-effect="animate__fadeInUp __delay7">
        <i class="fa fa-arrow-up-right belief-arrow-right-up"></i>
        <h4>Our Belief</h4>
        <p>Founding teams suffer from the blindsides of the worm’s eye view. VCs suffer from the blindsides of the bird’s eye view.</p>
        <p>Both sides of the divide have been caught up in a rut. We are inspired to do VC differently.</p>
        <p>Building a startup is already hard, we understand this and would not give any founder false hope.</p>
        <p>Our thesis has been carefully designed to ensure we can build for the resurgent economy.</p>
        <p>We believe the African digital ecosystem deserves more exits to enable re-investments and re-injection of capital. From our lenses, we believe it would be better to achieve a 5x in 6-8 years, than to wait till eternity for a  >15x that will/may never show up.</p>
        <p>If like us, you are tired of VC-as-we-know-it and bullish on Africa. If you are open to the possibilities of an early, yet rewarding exit by building new ventures that would be cash-rich & era-resistant, you are welcome to join us on this journey.</p>

      </div>
    </div>

    <div class="row">
      <div class="text-center mt-5 animate__animated" data-effect="animate__fadeInUp __delay1">
        <a href="<?php echo base_url();?>uploads/FbX_Investor_Deck.pdf" download><button class="btn btn-default">Download Our Investor's Deck</button></a>
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