$(document).ready(function () {
    $("#btnRegAsProCustomer").on("click", (e) => {
        e.preventDefault();
        $("#formRegAsProCustomer").submit();
    });

    $("#btnOtpVerify").on("click", (e) => {
        e.preventDefault();
        let otpCode =
            $("#txtOtp1").val() +
            $("#txtOtp2").val() +
            $("#txtOtp3").val() +
            $("#txtOtp4").val();
        $("#formOtpVerify input[name='otp_code']").val(otpCode);
        $.ajax({
            method: "POST",
            url: $("#formOtpVerify").attr("action"),
            data: $("#formOtpVerify").serialize(),
            success: function (response) {
                console.log("OTP is correnct");
                location.href = base_url + "/pro-partner-registration";
            },
            error: function (response) {
                console.log(response);
                alert("OTP code is incorrect");
            },
        });
    });
});
