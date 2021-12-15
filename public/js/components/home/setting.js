// into setting

// ---------------------------------------------------------------------------------------------
$('#rear-view a').click(function(e) { 
    e.stopPropagation();
    if(/public/.test(this.id)) {
        $('#rear-view').addClass('public');
    } else {
        $('#rear-view').removeClass('public');
    }

    var one_line_camera_id3 = document.getElementById("1-line-camera_id3");
    var two_line_camera_id3 = document.getElementById("2-line-camera_id3");

    if(this.getAttribute("data-description") == "Rear-Show"){
        one_line_camera_id3.style.display = "block";
        two_line_camera_id3.style.display = "block";
        document.getElementById('video-rear-icon').src='/public/images/video-camera.png';
    }
    if(this.getAttribute("data-description") == "Rear-Hide"){
        one_line_camera_id3.style.display = "none";
        two_line_camera_id3.style.display = "none";
        document.getElementById('video-rear-icon').src='/public/images/no-video.png';
    }
    // console.log(this.getAttribute("data-description"));

});
// ---------------------------------------------------------------------------------------------
$('#front-view-camera a').click(function(e) { 
    e.stopPropagation();
    if(/public/.test(this.id)) {
        $('#front-view-camera').addClass('public');
    } else {
        $('#front-view-camera').removeClass('public');
    }

    var one_line_camera_id1 = document.getElementById("1-line-camera_id1");
    var two_line_camera_id1 = document.getElementById("2-line-camera_id1");

    if(this.getAttribute("data-description") == "Front-Show"){
        one_line_camera_id1.style.display = "block";
        two_line_camera_id1.style.display = "block";
        document.getElementById('video-front-icon').src='/public/images/video-camera.png';
    }
    if(this.getAttribute("data-description") == "Front-Hide"){
        one_line_camera_id1.style.display = "none";
        two_line_camera_id1.style.display = "none";
        document.getElementById('video-front-icon').src='/public/images/no-video.png';
    }
    // console.log(this.getAttribute("data-description"));

});
// ---------------------------------------------------------------------------------------------
$('#bot-view-camera a').click(function(e) { 
    e.stopPropagation();
    if(/public/.test(this.id)) {
        $('#bot-view-camera').addClass('public');
    } else {
        $('#bot-view-camera').removeClass('public');
    }


    if(this.getAttribute("data-description") == "2-Line"){
        document.getElementById("bot-1-by-1").style.display = "block";
        document.getElementById("bot-1-line-camera1").style.display = "none";
        document.getElementById("bot-1-line-camera3").style.display = "none";
    }
    if(this.getAttribute("data-description") == "1-Line"){
        document.getElementById("bot-1-by-1").style.display = "none";
        document.getElementById("bot-1-line-camera1").style.display = "block";
        document.getElementById("bot-1-line-camera3").style.display = "block";
    }

});