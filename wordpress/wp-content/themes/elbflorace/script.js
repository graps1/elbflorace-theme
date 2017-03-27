var postBtn;

//collapse all when loading page
$(".post-button").each(function() {
    postBtn = $(this);
    $(this).siblings(".truncate").each(function() {
        $(this).removeClass("truncate-inactive");
        $(this).css("max-height", postBtn.attr("collapsed-height"));
    });
});

$(".load-more-btn").click(function() {
    console.log("laden");

    $.ajax({
        type: "POST",
        url: "wp-content/themes/elbflorace/load-more.php",
        data: { "action" : "load_more" },
        success: function(data) {
            $("#posts").append(data);
        }
    });
});

$('.post-button').click(function() {
    postBtn = $(this)
    $(this).siblings(".truncate").each(function() {
        if ($(this).hasClass("truncate-inactive")) {
            $(this).css("max-height", postBtn.attr("collapsed-height"));   
        } else {
            $(this).css("max-height", postBtn.attr("full-height"));
        }
        $(this).toggleClass("truncate-inactive");
    });
    $(this).toggleClass("glyphicon-chevron-up");
    $(this).toggleClass("glyphicon-chevron-down");
});


$(".sponsor").click(function() {
    $(this).toggleClass("active");
    var id_name = $(this).attr("id");
    var id = id_name.substring(id_name.lastIndexOf("-")+1);
    console.log(id);
    var carousel = $("#carousel-sponsors");
    carousel.carousel(Number(id));
    carousel.carousel("pause");
});