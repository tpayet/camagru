(function() {

  var streaming = false,
      video        = document.querySelector('#video'),
      cover        = document.querySelector('#cover'),
      canvas       = document.querySelector('#canvas'),
      photo        = document.querySelector('#photo'),
      startbutton  = document.querySelector('#startbutton'),
      photo_input  = document.querySelector('#photo_input'),
      params       = new FormData();
      width = 320,
      height = 0;

  navigator.getMedia = ( navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia ||
                         navigator.msGetUserMedia);

  navigator.getMedia(
    {
      video: true,
      audio: false
    },
    function(stream) {
      if (navigator.mozGetUserMedia) {
        video.mozSrcObject = stream;
      } else {
        var vendorURL = window.URL || window.webkitURL;
        video.src = vendorURL.createObjectURL(stream);
      }
      video.play();
    },
    function(err) {
      console.log("An error occured! " + err);
    }
  );

  video.addEventListener('canplay', function(ev){
    if (!streaming) {
      height = video.videoHeight / (video.videoWidth/width);
      video.setAttribute('width', width);
      video.setAttribute('height', height);
      canvas.setAttribute('width', width);
      canvas.setAttribute('height', height);
      streaming = true;
    }
  }, false);

  function takepicture() {
    canvas.width = width;
    canvas.height = height;
    canvas.getContext('2d').drawImage(video, 0, 0, width, height);
    var data = canvas.toDataURL('image/png');
    // console.log(data);
    
    // var xhr = new XMLHttpRequest();
    // var url = "/save_webcam";
    
    // xhr.open("POST", url, true);
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // params.append("data", data);

    // // xhr.onreadystatechange = function() {//Call a function when the state changes.
    // //   if(xhr.readyState == 4 && xhr.status == 200) {
    // //     // console.log(data);
    // //     // location.reload();
    // //   }
    // // }
    // // console.log(data);
    // xhr.send(params);
    // location.reload();
    photo.style.display = "visible";
    photo.setAttribute('src', data);
    photo_input.setAttribute('value', data);
  }

  startbutton.addEventListener('click', function(ev){
      takepicture();
    ev.preventDefault();
  }, false);

})();