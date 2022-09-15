<?php include('views/inc/head.php') ?>

<div class="position-absolute top-0 end-0">
  <button class="btn btn-wrap goto" link="/RecommendedCloth/<?=$parameters["id"]?>">
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

<div class="row" style="margin-top:20px; margin-bottom:20px;">
  <div class="col-md-10 offset-md-1">
    <div class="row" style="height:700px;" >

      <div class="col-md-3" style="height:100%;">
        <div class="box" style="height:100%;">
          <div style="padding:20px;">
            <div class="box">
              <div class="position-relative" id="container-top" style="padding:10px;">
                <span id="counterTop" class="position-absolute bottom-0 start-0 badge bg-primary rounded-pill" style="background-color: #808080!important; left: 10px!important; bottom: 10px!important;"><?php if($pr["Type"] == 1) echo "1"; else echo "0";?></span>

                <div class="position-relative pr-top" idP="-1" id="pr-top--1">
                  <div style="height:50px; display: table; overflow: hidden; width: 100%;">
                    <div style="display: table-cell; vertical-align: middle; text-align: center;">
                      <p class="title-cloth" style="font-size:14px!important;">Select an item</p>
                    </div>
                  </div>
                  <div class="img-container">
                    <img class="img-left" src="/assets/img/top.svg" style="border-radius:25px;">
                  </div>
                </div>

                <?php if($pr["Type"] == 1) { $top = 1; ?>
                  <div class="position-relative pr-top" idP="<?=$pr["IDP"]?>" id="pr-top-<?=$pr["IDP"]?>">
                    <span class="position-absolute bottom-0 end-0" style="right: 0px!important; bottom: 0px!important;">
                      <i class="bi bi-trash move-right" name="<?=$pr["Name"]?>" image="<?=$pr["Image_Path"]?>" idP="<?=$pr["IDP"]?>" type="<?=$pr["Type"]?>" style="font-size: 24px;"></i>
                    </span>
                    <div style="height:50px; display: table; overflow: hidden; width: 100%;">
                      <div style="display: table-cell; vertical-align: middle; text-align: center;">
                        <p class="title-cloth" style="font-size:14px!important;"><?=$pr["Name"]?></p>
                      </div>
                    </div>
                    <div class="img-container">
                      <img class="img-left" src="<?=$pr["Image_Path"]?>" style="border-radius:25px;">
                    </div>
                  </div>
                <?php } else $top = 0;?>

              </div>
            </div>

            <div class="box" style="margin-top: 20px;">
              <div class="position-relative" id="container-bot" style="padding:10px;">
                <span id="counterBottom" class="position-absolute bottom-0 start-0 badge bg-primary rounded-pill" style="background-color: #808080!important; left: 10px!important; bottom: 10px!important;"><?php if($pr["Type"] == 2) echo "1"; else echo "0";?></span>

                  <div class="position-relative pr-bot" idP="-1" id="pr-bot--1">
                    <div style="height:50px; display: table; overflow: hidden; width: 100%;">
                      <div style="display: table-cell; vertical-align: middle; text-align: center;">
                        <p class="title-cloth" style="font-size:14px!important;">Select an item</p>
                      </div>
                    </div>
                    <div class="img-container">
                      <img class="img-left" src="/assets/img/bot.svg" style="border-radius:25px;">
                    </div>
                  </div>

                  <?php if($pr["Type"] == 2) { $bot = 1; ?>
                    <div class="position-relative pr-bot" idP="<?=$pr["IDP"]?>" id="pr-bot-<?=$pr["IDP"]?>">
                      <span id="" class="position-absolute bottom-0 end-0" style="right: 0px!important; bottom: 0px!important;">
                        <i class="bi bi-trash move-right" type="<?=$pr["Type"]?>" name="<?=$pr["Name"]?>" image="<?=$pr["Image_Path"]?>" idP="<?=$pr["IDP"]?>" style="font-size: 24px;"></i>
                      </span>
                      <div style="height:50px; display: table; overflow: hidden; width: 100%;">
                        <div style="display: table-cell; vertical-align: middle; text-align: center;">
                          <p class="title-cloth" style="font-size:14px!important;"><?=$pr["Name"]?></p>
                        </div>
                      </div>
                      <div class="img-container">
                        <img class="img-left" src="<?=$pr["Image_Path"]?>" style="border-radius:25px;">
                      </div>
                    </div>
                  <?php } else $bot = 0; ?>

              </div>
            </div>

            <button class="btn btn-wrap link" style="width:100%; margin-top: 20px;">That's my choice <br> GO!</button>

          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div style="display: table; overflow: hidden; width: 100%; height: 100%;">
          <div style="display: table-cell; vertical-align: middle; text-align: center;">
            <div class="box position-relative" id="container-product" style="height:460px;">
              <span id="counter" class="position-absolute top-0 start-0 badge bg-primary rounded-pill" style="left:10px!important; top:10px!important; background-color: #808080!important;"><?=count($list)?></span>

              <div class="product" id="box-product--1" idP="-1">
                <div style="padding:20px;">
                  <p class="title-cloth">Select an item of clothing from the right</p>
                  <img src="/assets/img/click.svg" style="height: 300px; border-radius: 25px;">
                </div>
              </div>

              <?php foreach ($list as $key => $value) { ?>
                <div class="product" id="box-product-<?=$value["IDP"]?>" idP="<?=$value["IDP"]?>">
                  <div style="padding:20px;">
                    <p class="title-cloth"><?=$value["Name"]?></p>
                    <img class="zoom" src="<?=$value["Image_Path"]?>" style="height: 300px; border-radius: 25px;">
                    <div style="margin-top:20px;">
                      <button class="btn btn-wrap btn-ok" style="background: #F7F9FA!important;" idP="<?=$value["IDP"]?>" image="<?=$value["Image_Path"]?>" name="<?=$value["Name"]?>" type="<?=$value["Type"]?>">
                        <i class="bi bi-check-circle-fill" style="font-size:32px;"></i>
                      </button>
                      <button class="btn btn-wrap btn-delete" style="background: #F7F9FA!important;" idP="<?=$value["IDP"]?>" image="<?=$value["Image_Path"]?>" name="<?=$value["Name"]?>" type="<?=$value["Type"]?>">
                        <i class="bi bi-x-circle-fill" style="font-size: 32px;"></i>
                      </button>
                    </div>
                  </div>
                </div>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="height:100%;">
        <div class="box overflow-auto" style="height:100%;">
          <div style="padding:20px;" id="div-post-add">
            <p class="title-cloth">Last liked recommended <br> cloth <?php if($pr["Type"] == 1) echo "bottoms"; else echo "top"; ?> </p>
            <?php foreach ($listRec as $key => $value) { ?>
              <div class="box take-box" id="take-box-<?=$value["IDP"]?>" style="margin-bottom:10px;" idP="<?=$value["IDP"]?>" type="<?=$value["Type"]?>" image="<?=$value["Image_Path"]?>" name="<?=$value["Name"]?>">
                <div style="padding:20px;">
                  <p class="title-cloth" style="font-size: 14px!important;"><?=$value["Name"]?></p>
                  <img src="<?=$value["Image_Path"]?>" style="width: 100%; border-radius: 25px;">
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="/assets/img/shop.svg" class="rounded me-2" style="width: 20px;">
      <strong class="me-auto"></strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Select at least one item of clothing!
    </div>
  </div>
</div>

<?php include('views/inc/footer.php') ?>

<script type="text/javascript">

  var counter = <?=count($list)?>;
  var counterTop = <?=$top?>;
  var counterBottom = <?=$bot?>;
  var prodArray = [];

  var elementPrTop = [];
  var elementPrBot = [];

  var elementCenter = [];

  elementPrTop.push($("#pr-"+"top"+"-"+"-1"));
  elementPrBot.push($("#pr-"+"bot"+"-"+"-1"));

  if(counterTop==1){
    elementPrTop.push($("#pr-"+"top"+"-"+<?=$pr["IDP"]?>));
  }
  else{
    elementPrBot.push($("#pr-"+"bot"+"-"+<?=$pr["IDP"]?>));
  }

  for (var i = 0; i < document.getElementsByClassName("product").length; i++) {
    elementCenter.push($("#box-product-"+(document.getElementsByClassName("product")[i]).getAttribute("idP")));
  }

  $(".product").hide();
  elementCenter[elementCenter.length - 1].show();

  $(".pr-bot").hide();
  elementPrBot[elementPrBot.length-1].show();

  $(".pr-top").hide();
  elementPrTop[elementPrTop.length-1].show();

  $(".link").click(function(e) {
    for (var i = document.getElementsByClassName("pr-top").length - 1; i >= 0; i--) {
      if (document.getElementsByClassName("pr-top")[i].getAttribute("idP") != "-1")
        prodArray.push(document.getElementsByClassName("pr-top")[i].getAttribute("idP"));
    }

    for (var i = document.getElementsByClassName("pr-bot").length - 1; i >= 0; i--) {
      if (document.getElementsByClassName("pr-bot")[i].getAttribute("idP") != "-1")
        prodArray.push(document.getElementsByClassName("pr-bot")[i].getAttribute("idP"));
    }
    if(prodArray.length > 0)
      window.location.href = "/Show/<?=$parameters["id"]?>/" + (prodArray.toString()).replaceAll(",", "&&");
    else{
      var toastLiveExample = document.getElementById('liveToast');
      var toast = new bootstrap.Toast(toastLiveExample)
      toast.show()
    }
  });

  $(document).on ("click", ".btn-ok", function () {
    counter = counter - 1;
    document.getElementById("counter").innerHTML = counter;
    var name = this.getAttribute("name");
    var image = this.getAttribute("image");
    var idP = this.getAttribute("idP");
    var type = this.getAttribute("type");

    var classAdd = "";
    var ty = "";
    if(type==2){
      classAdd = "container-bot";
      ty = "bot";
      counterBottom++;
      document.getElementById("counterBottom").innerHTML = counterBottom;
    }else{
      ty = "top";
      classAdd = "container-top";
      counterTop++;
      document.getElementById("counterTop").innerHTML = counterTop;
    }

    var html = "<div class='position-relative pr-"+ty+"' idP='"+idP+"' id='pr-"+ty+"-"+idP+"'>"+
                  "<span class='position-absolute bottom-0 end-0' style='right: 0px!important; bottom: 0px!important;'>"+
                    "<i class='bi bi-trash move-right' type='"+type+"' idP='"+idP+"' name='"+name+"' image='"+image+"' style='font-size: 24px;'></i>"+
                  "</span>"+
                  "<div style='height:50px; display: table; overflow: hidden; width: 100%;'>"+
                    "<div style='display: table-cell; vertical-align: middle; text-align: center;'>"+
                      "<p class='title-cloth' style='font-size:14px!important;'>"+name+"</p>"+
                    "</div>"+
                  "</div>"+
                  "<div class='img-container'>"+
                    "<img class='img-left' src='"+image+"' style='border-radius:25px;'>"+
                  "</div>"+
                "</div>";

    $("#"+classAdd).append(html);
    $(".pr-"+ty).hide();
    $("#pr-"+ty+"-"+idP).show();
    if(type==2){
      elementPrBot.push($("#pr-"+ty+"-"+idP));
    }else{
      elementPrTop.push($("#pr-"+ty+"-"+idP));
    }

    var popped = elementCenter.pop();
    popped.remove();
    elementCenter[elementCenter.length - 1].show();

  });

  $(document).on ("click", ".move-right", function () {
    var idP = this.getAttribute("idP");
    var type = this.getAttribute("type");
    var name = this.getAttribute("name");
    var image = this.getAttribute("image");

    var ty = "";
    if(type==2){
      ty = "bot";
      counterBottom--;
      document.getElementById("counterBottom").innerHTML = counterBottom;
    }else{
      ty = "top";
      counterTop--;
      document.getElementById("counterTop").innerHTML = counterTop;
    }

    if(type==2){
      var popped = elementPrBot.pop();
      popped.remove();
      elementPrBot[elementPrBot.length - 1].show();
    }else{
      var popped = elementPrTop.pop();
      popped.remove();
      elementPrTop[elementPrTop.length - 1].show();
    }

    var html = "<div class='box take-box' id='take-box-"+idP+"' style='margin-bottom:10px;' idP='"+idP+"' type='"+type+"' image='"+image+"' name='"+name+"'>"+
                "<div style='padding:20px;'>"+
                  "<p class='title-cloth' style='font-size: 14px!important;'>"+name+"</p>"+
                  "<img src='"+image+"' style='width: 100%; border-radius: 25px;'>"+
                "</div>"+
              "</div>";

    $("#div-post-add").append(html);

  });

  $(document).on ("click", ".take-box", function () {
    var name = this.getAttribute("name");
    var image = this.getAttribute("image");
    var idP = this.getAttribute("idP");
    var c = parseInt(this.getAttribute("c"));
    var type = this.getAttribute("type");

    $("#take-box-"+idP).hide();

    var html = "<div class='product' id='box-product-"+idP+"' idP='"+idP+"'>"+
                  "<div style='padding:20px;'>"+
                    "<p class='title-cloth'>"+name+"</p>"+
                    "<img src='"+image+"' style='height: 300px; border-radius: 25px;'>"+
                    "<div style='margin-top:20px;'>"+
                      "<button class='btn btn-wrap btn-ok' style='background: #F7F9FA!important;' idP='"+idP+"' image='"+image+"' name='"+name+"' type='"+type+"'>"+
                        "<i class='bi bi-check-circle-fill' style='font-size:32px;'></i>"+
                      "</button>"+
                      "<button class='btn btn-wrap btn-delete' style='background: #F7F9FA!important;' idP='"+idP+"' image='"+image+"' name='"+name+"' type='"+type+"'>"+
                        "<i class='bi bi-x-circle-fill' style='font-size: 32px;'></i>"+
                      "</button>"+
                    "</div>"+
                "</div>"+
              "</div>";

    $("#container-product").append(html);

    $(".product").hide();
    elementCenter.push($("#box-product-"+idP));
    elementCenter[elementCenter.length - 1].show();  

    counter = counter + 1;
    document.getElementById("counter").innerHTML = counter;

  });

  $(document).on ("click", ".btn-delete", function () {
    counter = counter - 1;
    document.getElementById("counter").innerHTML = counter;
    var idP = this.getAttribute("idP");

    var popped = elementCenter.pop();
    popped.remove();
    elementCenter[elementCenter.length - 1].show();
    
  });

  $(".goto").click(function(e) {
    window.location.href = this.getAttribute("link");
  });

/*
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
*/
</script>