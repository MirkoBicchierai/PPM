<?php include('views/inc/head.php') ?>

<div class="position-absolute top-0 end-0">
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
    <div class="row">
      <div class="col-md-4" style="display: table; overflow: hidden;">
        <div style="display: table-cell; vertical-align: middle;">
          <div class="box">
            <div style="padding:20px;">
              <img src="/assets/img/<?=$user["Gender"]?>.svg" style="border-radius:25px; padding: 0 20%;">
              <div style="margin-top:15px;">
                <p class="list-wrap">Gender : <?=$user["Gender"]?></p>
                <p class="list-wrap">Age : <?=$user["Age"]?></p>
                <p class="list-wrap">Style : <?=$user["Style"]?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="box">
          <div style="padding:20px;">

            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
              <div class="carousel-inner">
              <?php $count = 0; $c = 1; $k = 0; foreach ($list as $key => $value) { $count++;?>
                  
                <?php if($c==1){ ?>
                  <div class="carousel-item <?php if($k==0) echo "active"; ?>" data-bs-interval="5000">
                    <div class="row">
                <?php } ?>
                      <div class="col-md-4">
                        <div class="box goto goto-mod" link="/Select/<?=$parameters["id"]?>/<?=$value["idP"]?>">
                          <div style="padding:20px;">
                            <div style="height:90px;">
                              <p class="title-cloth"><?=$value["Name"]?></p>
                            </div>
                            <img src="<?=$value["Image_Path"]?>" style="width: 100%;border-radius:25px;">
                            <div class="row justify-content-md-center" style="margin-top:20px; margin-bottom: 20px;">
                              <div style="width:202px;">
                                <?php for ($i=0; $i <$value["Score"] ; $i++) { ?>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" style="color: #ffdb4d;" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                  </svg>
                                <?php } ?>
                                <?php for ($i=$value["Score"]; $i <5; $i++) { ?>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                  </svg>
                                <?php } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                <?php if($c==3 || $count == count($list)){ $c=0; ?>
                    </div>
                  </div>
                <?php } ?>
              <?php $c++; $k++; }?>

              </div>
              <button class="carousel-control-prev" style="top:45%!important; height:45px;" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" style="top:45%!important; height:45px;" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>

          </div>
        </div>
      </div>
    </div>
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