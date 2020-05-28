$(document).ready(function() {
    $(".sidelink").on("click", function() {
        var data = $(this).attr("data-value");
        window.location = data;
    });
});
