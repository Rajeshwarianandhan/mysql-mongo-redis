// show password
const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");
togglePassword.addEventListener("click", function (e) {
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    this.classList.toggle("fa-eye-slash");
});
$(document).ready(function () {
    $(function () {
        $("#email_error_message").hide();
        $("#password_error_message").hide();
        var error_email = false;
        var error_password = false;
        $("#email").focusout(function () {
            check_email();
        });
        $("#password").focusout(function () {
            check_password();
        });
        function check_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            const email = $("#email").val();
            if (email === '') {
                $("#email_error_message").html("Email is must!");
                $("#email_error_message").show();
                error_email = true;
            }
            else if (pattern.test(email)) {
                $("#email_error_message").hide();
            }
            else {
                $("#email_error_message").html("Please Enter Valid Email");
                $("#email_error_message").show();
                error_email = true;
            }
        }
        function check_password() {
            const password = $("#password").val();
            if (password === '') {
                $("#password_error_message").html("Password is must!");
                $("#password_error_message").show();
                error_password = true;
            }
            else if (password.length < 8) {
                $("#password_error_message").html("Minimum Length is 8");
                $("#password_error_message").show();
                error_password = true;
            }
            else {
                $("#password_error_message").hide();
            }
        }
        // Ajax start
        $("#login").click(function () {
            error_email = false;
            error_password = false;
            check_email();
            check_password();
            const email = $("#email").val();
            const password = $("#password").val();
            if (error_email === false && error_password === false) {
                $.ajax({
                    url: "./php/login.php",
                    type: "POST",
                    data: { "email": email, "password": password },
                    dataType: "JSON",
                    success: function (d) {
                        if (d.status === 'success') {
                            window.location = "home.html";
                            // alert("login success");
                        } else {
                            alert("Please enter correct login details!");
                        }
                    }
                })
            } else {
                alert("Please fill all the fields!");
                return false;
            }
        })
    })
})
