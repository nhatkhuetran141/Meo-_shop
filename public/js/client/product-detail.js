$(document).ready(function () {
    // danh cho cai anh nho
    $(".thumbnail").click(function () {
        $(".active").removeClass("active");
        $(this).addClass("active");
        const thisImage = $(this).attr("src");
        $(".featured").attr("src", thisImage);
    });

    $("#slideLeft").click(function () {
        const slider = $(".mini-photos__row");
        console.log(slider.scrollLeft(slider.scrollLeft() - 100));
    });

    $("#slideRight").click(function () {
        const slider = $(".mini-photos__row");
        console.log(slider.scrollLeft(slider.scrollLeft() + 100));
    });

    $("#slideTop").click(function () {
        const slider = $(".mini-photos__row");
        console.log(slider.scrollTop(slider.scrollTop() - 100));
    });
    $("#slideBottom").click(function () {
        const slider = $(".mini-photos__row");
        console.log(slider.scrollTop(slider.scrollTop() + 100));
    });
    // ====================================
});
