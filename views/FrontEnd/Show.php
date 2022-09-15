<?php include('views/inc/head.php') ?>

<div class="position-absolute top-0 end-0">
  <button class="btn btn-wrap goto" link="/Select/<?=$parameters["id"]?>/<?=$back?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
      <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
    </svg>Back
  </button>
  <button class="btn btn-wrap goto" link="/">Home</button>
  <svg width="100pt" height="100pt" version="1.1" viewBox="0 0 700 700" xmlns="http://www.w3.org/2000/svg">
     <g>
      <path d="m87.629 285.41 49.801-25.609 34.152 66.418-49.801 25.609z"/>
      <path d="m398.57 318.04-27.16-52.844 132.78-68.32-68.32-132.78-298.78 153.66 68.281 132.81 132.78-68.301 27.199 52.844c4.2578-4.5352 9.1836-8.5859 15.062-11.594 5.8203-3.0039 11.98-4.6641 18.16-5.4844z"/>
      <path d="m555.33 280v74.668h-96.805c4.4062 12.414 4.293 25.516 0.11328 37.332h96.691v74.668h37.332v-186.67z"/>
      <path d="m439.21 356.27c-0.29688-0.57813-0.72656-1.0625-1.0625-1.6055-6.4961-11.219-18.012-17.809-30.258-18.441-6.3477-0.33594-12.879 0.80078-18.965 3.9219-6.0859 3.1172-10.789 7.7852-14.223 13.16-6.9258 10.828-8.1953 24.883-1.9023 37.109 9.4062 18.293 31.938 25.535 50.27 16.109 6.6094-3.3984 11.703-8.5312 15.137-14.523 6.1953-10.625 7.0352-24.027 1.0039-35.73z"/>
     </g>
  </svg>
</div>

<div class="row">
  <div class="col-md-1">
    <img style="width:100%;" src="/assets/img/shop.svg">
  </div>
  <div class="col-md-4" style="display: table; overflow: hidden;">
    <div style="display: table-cell; vertical-align: middle;"><label style="font-family: 'Catamaran'; font-style: normal; font-weight: 700; font-size: 24px; line-height: 79px;">I-MALL Totem Interface</label></div>
  </div>
</div>

<div class="row" style="margin-top:20px;">
  <div class="col-md-10 offset-md-1">
    <?php foreach ($list as $key => $value){ ?>
      <div class="row" style="margin-bottom:25px;">
        <div class="col-md-3">
          <div class="box">
            <div style="padding:20px;">
              <img src="<?=$value["Image_Path"]?>" style="width: 100%;border-radius:25px;">
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div style="padding:20px;">
            <p class="title-cloth" style="text-align: left!important; font-size:32px!important"><?=$value["Name"]?></p>
            <div class="row">
              <div class="col-md-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
              </div>
              <div class="col-md-9" style="text-align:left!important; display: table; overflow: hidden;">
                <div style="display: table-cell; vertical-align: middle;"><label class="title-cloth" style="text-align: left!important; font-size:24px!important;"><?=$value["Location"]?></label></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>


<?php include('views/inc/footer.php') ?>

<script type="text/javascript">

  $(".goto").click(function(e) {
    window.location.href = this.getAttribute("link");
  });

  let inactivityTime = function() {
    let time;
    window.onload = resetTimer;
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;
    function logout() {
       window.location.href = "/";
    }
    function resetTimer() {
      clearTimeout(time);
      time = setTimeout(logout, 30000)
    }
  };

  window.onload = function() {
    inactivityTime();
  }

</script>