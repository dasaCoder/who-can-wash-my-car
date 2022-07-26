
//Toggle Password
$(".toggle-password").click(function() {
    $(".toggle-password").toggleClass("fa-eye-slash");
    input = $(".login-password-input");
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

