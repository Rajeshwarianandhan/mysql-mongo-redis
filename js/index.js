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
        $("#fname_error_message").hide();
        $("#lname_error_message").hide();
        $("#email_error_message").hide();
        $("#password_error_message").hide();
        $("#mobile_error_message").hide();
        $("#dob_error_message").hide();
        var error_fname = false;
        var error_lname = false;
        var error_email = false;
        var error_password = false;
        var error_mobile = false;
        var error_dob = false
        $("#fname").focusout(function () {
            check_fname();
        });
        $("#lname").focusout(function () {
            check_lname();
        });
        $("#email").focusout(function () {
            check_email();
        });
        $("#password").focusout(function () {
            check_password();
        });
        $("#mobile").focusout(function () {
            check_mobile();
        });
        $("#dob").focusout(function () {
            check_dob();
        });
        function check_fname() {
            var pattern = /^[a-zA-Z]*$/;
            const fname = $("#fname").val();
            if(fname === ''){
                $("#fname_error_message").html("First Name is must!");
                $("#fname_error_message").show();
                error_fname = true;
            }
            else if (fname.length < 3 || fname.length > 25) {
                $("#fname_error_message").html("Minimum 3 characters required!");
                $("#fname_error_message").show();
                error_fname = true;
            }
            else if (pattern.test(fname)) {
                $("#fname_error_message").hide();
            }
            else {
                $("#fname_error_message").html("Allowed only Characters!");
                $("#fname_error_message").show();
                error_fname = true;
            }
        }
        function check_lname() {
            var pattern = /^[a-zA-Z]*$/;
            const lname = $("#lname").val();
            if(lname === ''){
                $("#lname_error_message").html("Last Name is must!");
                $("#lname_error_message").show();
                error_lname = true;
            }
            else if (lname.length < 1 || lname.length > 25) {
                $("#lname_error_message").html("Minimum 1 characters required!");
                $("#lname_error_message").show();
                error_lname = true;
            }
            else if (pattern.test(lname)) {
                $("#lname_error_message").hide();
            }
            else {
                $("#lname_error_message").html("Allowed only Characters!");
                $("#lname_error_message").show();
                error_lname = true;
            }
        }
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
        function check_mobile() {
            var pattern = /^[a-zA-Z]*$/;
            const mobile = $("#mobile").val();
            if (mobile === '') {
                $("#mobile_error_message").html("Mobile number is must!");
                $("#mobile_error_message").show();
                error_mobile = true;
            }
            else if (mobile.length !== 10) {
                $("#mobile_error_message").html("Minimum and Maximum lenght is 10");
                $("#mobile_error_message").show();
                error_mobile = true;
            }
            else if (pattern.test(mobile)) {
                $("#mobile_error_message").html("Allowed only Numbers!");
                $("#mobile_error_message").show();
                error_mobile = true;
            }
            else {
                $("#mobile_error_message").hide();
            }
        }
        function check_dob() {
            const dob = $("#dob").val();
            if (dob === '') {
                $("#dob_error_message").html("DOB is must!");
                $("#dob_error_message").show();
                error_dob = true;
            } else {
                $("#dob_error_message").hide();
            }
        }
        // ajax start
        $("#register").click(function () {
            error_fname = false;
            error_lname = false;
            error_email = false;
            error_password = false;
            error_mobile = false;
            error_dob = false;
            check_fname();
            check_lname();
            check_email();
            check_password();
            check_mobile();
            check_dob();
            const fname = $("#fname").val();
            const lname = $("#lname").val();
            const email = $("#email").val();
            const password = $("#password").val();
            const mobile = $("#mobile").val();
            const dob = $("#dob").val();
            if (error_fname === false && error_lname === false && error_email === false && error_password === false && error_mobile === false && error_dob === false) {
                $.ajax({
                    url: "./php/index.php",
                    type: "POST",
                    data: { "fname": fname, "lname": lname, "email": email, "password": password, "mobile": mobile, "dob": dob },
                    dataType: "JSON",
                    success: function (d) {
                        if (d.status === 'success') {
                            window.location = "login.html";
                            // alert("data inserted successfully");
                        } else if (d.status === 'error') {
                            alert("Something wrong!");
                        }
                    }
                })
            } else {
                alert("Please Fill All The Fields Correctly!");
                return false;
            }
        })
    })
})

