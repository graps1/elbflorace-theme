$('.post-button').click(function() {
    $(this).siblings(".truncate").each(function() {
        $(this).toggleClass("truncate-inactive");
    });
    $(this).toggleClass("glyphicon-chevron-up");
    $(this).toggleClass("glyphicon-chevron-down");
});


$(".sponsor").click(function() {
    $(this).toggleClass("active");

    $("body").append("<img/>", {
        "id" : "sponsor-popup",
        "src" : $(this).attr("src")
    });
});