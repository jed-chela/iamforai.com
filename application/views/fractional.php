
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
        <h1>Fractional <br class="mobile_only" />Support</h1>
      </div>
    </div>

    <div class="row">
      <div class="belief-box impact-box animate__animated" data-effect="animate__fadeInUp __delay7">
        <i class="fa fa-arrow-up-right belief-arrow-right-up"></i>
        <h4>The FbX Council</h4>
        <p>This council is made up of seasoned professionals who have a fine balance of startup exposure & experience.
        <p>They have been there, done that, with credible achievements to back it all up, either in operator, founder, investor or startup employee capacity.</p>
        <p>The FbX Council has a mandate to deliver tested, trusted, high-quality fractional support to FbX PortCos.</p>
        <p>The FbX Council members are carefully mapped as Advisors to FbX Portfolio Companies making them eligible for Advisor equity.</p>
        <p>To achieve the right incentives and ensure optimal input for our founding teams, the advisor equity is performance and milestone-driven.</p>
        <p>We believe it helps everyone if The FbX Council members see what’s in there for them to stay motivated and committed.</p>
        <p>We recognize that the professionals we have described above often have busy lives.</p>
        <p>To ensure win-win outcomes across board, we prioritize council members who can tick the 3 boxes; availability, passion and commitment.</p>
        <p>Every FbX PortCo would enjoy the joys of building for success working closely with 4 carefully selected Advisors with the most important competencies required per startup.</p>
        <p>Founders deserve to have a life & enjoy wellbeing!</p>
        
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