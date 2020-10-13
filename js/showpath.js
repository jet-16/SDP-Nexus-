$(document).ready(function() {
    $("#logo").change(function(e) {
        var logo = e.target.files[0].name;
        $(".logo").text(logo);
    });
});

$(document).ready(function() {
    $("#bg-img").change(function(e) {
        var bg = e.target.files[0].name;
        $(".bg-img").text(bg);
    });
});

$(document).ready(function() {
    $("#main").change(function(e) {
        var main = e.target.files[0].name;
        $(".main").text(main);
    });
});

$(document).ready(function() {
    $("#video").change(function(e) {
        var video = e.target.files[0].name;
        $(".video").text(video);
    });
});

$(document).ready(function() {
    $("#uploadgame").change(function(e) {
        var upload = e.target.files[0].name;
        $(".uploadgame").text(upload);
    });
});

$(document).ready(function() {
    $("#profilepic").change(function(e) {
        var upload = e.target.files[0].name;
        $(".profilepich5").text(upload);
    });
});
