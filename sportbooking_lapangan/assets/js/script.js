document.addEventListener("DOMContentLoaded", function(){

    console.log("Sport Booking Loaded");

    // =========================
    // SECURITY FUNCTIONS
    // =========================
    function containsScript(input){
        return /<script.*?>.*?<\/script>/gi.test(input);
    }

    function validEmail(email){
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function strongPassword(password){
        return /^(?=.*[A-Za-z])(?=.*\d).{6,}$/.test(password);
    }

    // =========================
    // LOGIN FORM SECURITY
    // =========================
    const loginForm = document.getElementById("loginForm");

    if(loginForm){
        loginForm.addEventListener("submit", function(e){

            const email =
                document.getElementById("loginEmail").value.trim();

            const password =
                document.getElementById("loginPassword").value.trim();

            if(!validEmail(email)){
                alert("Format email tidak valid!");
                e.preventDefault();
                return;
            }

            if(containsScript(email) || containsScript(password)){
                alert("Input berbahaya terdeteksi!");
                e.preventDefault();
                return;
            }

            if(password.length < 6){
                alert("Password minimal 6 karakter!");
                e.preventDefault();
                return;
            }

            alert("Login berhasil!");
        });
    }

    // =========================
    // REGISTER FORM SECURITY
    // =========================
    const registerForm = document.getElementById("registerForm");

    if(registerForm){
        registerForm.addEventListener("submit", function(e){

            const name =
                document.getElementById("registerName").value.trim();

            const email =
                document.getElementById("registerEmail").value.trim();

            const password =
                document.getElementById("registerPassword").value.trim();

            const confirm =
                document.getElementById("confirmPassword").value.trim();

            if(containsScript(name) || containsScript(email)){
                alert("Input berbahaya terdeteksi!");
                e.preventDefault();
                return;
            }

            if(!validEmail(email)){
                alert("Format email tidak valid!");
                e.preventDefault();
                return;
            }

            if(!strongPassword(password)){
                alert("Password minimal 6 karakter dan harus mengandung huruf + angka!");
                e.preventDefault();
                return;
            }

            if(password !== confirm){
                alert("Konfirmasi password tidak cocok!");
                e.preventDefault();
                return;
            }

            alert("Registrasi berhasil!");
        });
    }

    // =========================
    // FORGOT PASSWORD
    // =========================
    const forgotPassword = document.getElementById("forgotPassword");

    if(forgotPassword){
        forgotPassword.addEventListener("click", function(e){
            e.preventDefault();

            let email = prompt("Masukkan email anda:");

            if(!email){
                alert("Email tidak boleh kosong!");
                return;
            }

            if(!validEmail(email)){
                alert("Format email tidak valid!");
                return;
            }

            if(containsScript(email)){
                alert("Input berbahaya terdeteksi!");
                return;
            }

            alert(
                "Link reset password telah dikirim ke: " + email
            );
        });
    }

    // =========================
    // BOOKING FORM
    // =========================
    const bookingForm = document.getElementById("bookingForm");

    if(bookingForm){
        bookingForm.addEventListener("submit", function(e){
            e.preventDefault();
            alert("Booking berhasil!");
        });
    }

    // =========================
    // PAYMENT FORM
    // =========================
    const paymentForm = document.getElementById("paymentForm");

    if(paymentForm){
        paymentForm.addEventListener("submit", function(e){
            e.preventDefault();
            alert("Pembayaran berhasil!");
        });
    }

});