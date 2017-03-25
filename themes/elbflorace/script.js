$('.post-button').click(function() {
    $(this).siblings(".truncate").each(function() {
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