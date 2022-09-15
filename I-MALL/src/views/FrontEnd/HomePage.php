<?php include('views/inc/head.php') ?>

<div class="position-absolute top-0 end-0">
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

<div class="row">
  <div class="col-md-8 offset-md-2" style="padding: 0px!important;">
    <div class="position-relative">
      <video id="video" playsinline class="video" width="100%" style="border-radius: 100px;"></video>
      <div class="row justify-content-md-center" style="font-family: 'Catamaran'; font-style: normal; font-weight: 700; font-size: 24px; line-height: 79px;" id="log-end">
        Position yourself in the center of the webcam
      </div>
      <div class="position-absolute top-50 start-50 translate-middle" style="top:45%!important;">
        <div class="spinner-border text-primary" style="color:rgba(77, 148, 255, 0.75)!important; width: 6rem; height: 6rem; border-width: 16px; animation: 1.5s linear infinite spinner-border" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
     </div>
    </div>
  </div>	
</div>

<?php include('views/inc/footer.php') ?>


<script type="module">

const labeledDescriptors = [];
var bestMatch = "";

$.ajax({
  type: "POST",
  url: "/get-face",
  data: {take:true},
  dataType:'JSON', 
  success: function(response){
    for (var i = response.length - 1; i >= 0; i--) {
      var x = (response[i].Avg_AI.replace(/(\r\n|\n|\r)/gm,"")).replace(/\s+/g, '').split(",");
      labeledDescriptors.push(new faceapi.LabeledFaceDescriptors(response[i].Name,[new Float32Array(x)]));
    } 
  },
  error : function(response) {
    console.log(response);
  }
});

setInterval(function(){ 
 
  if(bestMatch!= "" && bestMatch._label != "unknown"){
    $.ajax({
      type: "POST",
      url: "/login",
      data: {id:bestMatch._label},
      dataType:'JSON', 
      success: function(response){
        if(response == "ok")
          window.location.href = "/RecommendedCloth/"+bestMatch._label;        
      },
      error : function(response) {
        console.log(response);
      }
    });
  }else{
    console.log("Not recognized");
  } 

}, 2500);

/*
setInterval(function(){ 
 
  if(bestMatch!= ""){
    bestMatch._label = "f5eff978-09a0-11ed-861d-0242ac120002";
    window.location.href = "/RecommendedCloth/"+bestMatch._label;
  }else{
    console.log("Not recognized");
  } 
}, 2500);
*/

const modelPath = 'https://vladmandic.github.io/face-api/model/';
const minScore = 0.2;
const maxResults = 5;
let optionsSSDMobileNet;

function str(json) {
  let text = '<font color="lightblue">';
  text += json ? JSON.stringify(json).replace(/{|}|"|\[|\]/g, '').replace(/,/g, ', ') : '';
  text += '</font>';
  return text;
}

function log(...txt) {
  console.log(...txt);
}

async function detectVideo(video) {
  if (!video || video.paused) return false;
  const t0 = performance.now();
  faceapi
    .detectAllFaces(video, optionsSSDMobileNet)
    .withFaceLandmarks()
    .withFaceExpressions()
    .withFaceDescriptors()
    .withAgeAndGender()
    .then((result) => {
      const faceMatcher = new faceapi.FaceMatcher(labeledDescriptors)
      console.log(result);
      if(result.length == 0)
        document.getElementById("log-end").innerHTML = "Position yourself in the center of the webcam";
      if (typeof result[0] !== 'undefined' && result[0] && result.length != 0) {
        bestMatch = faceMatcher.findBestMatch(result[0].descriptor)
        console.log(bestMatch.toString());
        if(bestMatch._label=="unknown")
          document.getElementById("log-end").innerHTML = "Face not recognized, try to move your face";
      }else 
        bestMatch = "";
      if(bestMatch!="" && bestMatch._label!="unknown")
        document.getElementById("log-end").innerHTML = "User profiling and re-identification in progress";

      requestAnimationFrame(() => detectVideo(video));
      return true;
    })
    .catch((err) => {
      console.log(err);
      return false;
    });
  return false;
}

async function setupCamera() {
  const video = document.getElementById('video');
  if (!video) return null;
  let msg = '';
  log('Setting up camera');
  if (!navigator.mediaDevices) {
    log('Camera Error: access not supported');
    return null;
  }
  let stream;
  const constraints = {
    audio: false,
    video: { facingMode: 'user', resizeMode: 'crop-and-scale' },
  };
  if (window.innerWidth > window.innerHeight) constraints.video.width = { ideal: window.innerWidth };
  else constraints.video.height = { ideal: window.innerHeight };
  try {
    stream = await navigator.mediaDevices.getUserMedia(constraints);
  } catch (err) {
    if (err.name === 'PermissionDeniedError' || err.name === 'NotAllowedError') msg = 'camera permission denied';
    else if (err.name === 'SourceUnavailableError') msg = 'camera not available';
    log(`Camera Error: ${msg}: ${err.message || err}`);
    return null;
  }
  if (stream) video.srcObject = stream;
  else {
    log('Camera Error: stream empty');
    return null;
  }
  const track = stream.getVideoTracks()[0];
  const settings = track.getSettings();
  if (settings.deviceId) delete settings.deviceId;
  if (settings.groupId) delete settings.groupId;
  if (settings.aspectRatio) settings.aspectRatio = Math.trunc(100 * settings.aspectRatio) / 100;
  log(`Camera active: ${track.label}`);
  log(`Camera settings: ${str(settings)}`);
  return new Promise((resolve) => {
    video.onloadeddata = async () => {
      video.play();
      detectVideo(video);
      resolve(true);
    };
  });
}

async function setupFaceAPI() {
  await faceapi.nets.ssdMobilenetv1.load(modelPath);
  await faceapi.nets.ageGenderNet.load(modelPath);
  await faceapi.nets.faceLandmark68Net.load(modelPath);
  await faceapi.nets.faceRecognitionNet.load(modelPath);
  await faceapi.nets.faceExpressionNet.load(modelPath);
  optionsSSDMobileNet = new faceapi.SsdMobilenetv1Options({ minConfidence: minScore, maxResults });
  log(`Models loaded: ${str(faceapi.tf.engine().state.numTensors)} tensors`);
}

async function main() {
  log('FaceAPI WebCam Test');
  await faceapi.tf.setBackend('webgl');
  await faceapi.tf.enableProdMode();
  await faceapi.tf.ENV.set('DEBUG', false);
  await faceapi.tf.ready();
  log(`Version: FaceAPI ${str(faceapi?.version || '(not loaded)')} TensorFlow/JS ${str(faceapi?.tf?.version_core || '(not loaded)')} Backend: ${str(faceapi?.tf?.getBackend() || '(not loaded)')}`);
  await setupFaceAPI();
  await setupCamera();
}

window.onload = main;

</script>
