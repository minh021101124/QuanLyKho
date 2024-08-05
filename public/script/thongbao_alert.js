
$('button').ready(function() {
    $('.alert').addClass("show");
    $('.alert').removeClass("hide");
    $('.alert').addClass("showAlert");
    setTimeout(function() {
        $('.alert').removeClass("show");
        $('.alert').addClass("hide");
    }, 18000);
});
$('.close-btn').click(function() {
    $('.alert').removeClass("show");
    $('.alert').addClass("hide");
});
