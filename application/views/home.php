
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
  <div class="container container-sm hero-container">
    <div class="row">
      <div class="hero-box animate__animated" data-effect="animate__fadeInLeft __delay1">
        <div>
          <img src="<?php echo base_url(); ?>assets/img/iamforai-logo.png" class="">
        </div>
        <div>
          <button class="btn btn-default mt-5">Volunteer</button>
        </div>
      </div>
      <div class="hero-subtitle text-center animate__animated" data-effect="animate__fadeInLeft __delay3">

      </div>
    </div>

    <div class="row">
      <div class="belief-box section-h100 animate__animated mx-3 mb-5" data-effect="animate__fadeInUp __delay7">
        <p class="mt-5">&nbsp;</p>
        <p class="mt-3">Sons and daughters of Edo! <br/>
        Wake up, the sun is up <br/>
        a new day is here <br/>
        Asue Ighodalo has stepped forward <br/>
        We are moving with him.</p>

        <p>Hand in hand, we march ahead, <br/>
        With Asue's leadership, we are sure <br/>
        Our future is assured. </p>
         
        <p>Together we stan <br/>
        for prosperity we strive, <br/>
        Join the movement, <br/>
        let your voice resound, </p>

        <p>Edo is about to make history <br/>
        Let’s give Asue the Victory.</p>

      </div>
    </div>

    <div class="row">
      <div class="move-box section-h100 animate__animated mb-5" data-effect="animate__fadeInUp __delay7">
        <div class="move-box-inner">
          <h1>MOVE WITH THE MOVEMENT</h1>
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
      </div>
    </div>

  </div>
  
</div>


<?php $this->load->view("temp_footer"); ?>
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