<?php
    include_once 'assets/views/header/header.php';
?>

        <div class="signup-main">
            <div class="signup-form-container">
                <div class="sign-up">
                    <h1 id="signup-header">Sign Up</h1>
                    <h3 id="signup-header-h3">Sign up to share your local environmental justice concerns</h3>
                </div>
                <div class="sign-up-form">
                    <form id="signup-form" action="" method="POST">
                        <input type="text" id="fullName" name="fullName" placeholder="Full Name">
                        <input type="text" id="username" name="username" placeholder="Username">
                        <input type="text" id="email" name="email" placeholder="Email">
                        <input type="password" id="password" name="password" placeholder="Password">
                        <input type="password" id="password-confirm" name="passwordConfirm" placeholder="Confirm Password">
                        <br>
                        <div class="#error-text"></div>
                        <div id="signup-btn-submit">
                            <button type="submit" id="signup" name="submit">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="break"></div>
    </div>

        <script>
            const clearIcon = document.querySelector(".clear-icon");
            const searchBar = document.querySelector(".search");

            searchBar.addEventListener("keyup", () => {
                if(searchBar.value && clearIcon.style.visibility != "visible"){
                clearIcon.style.visibility = "visible";
                } else if(!searchBar.value) {
                clearIcon.style.visibility = "hidden";
                }
            });

            clearIcon.addEventListener("click", () => {
                searchBar.value = "";
                clearIcon.style.visibility = "hidden";
            })

            $(document).ready(function() {
                $("#signup-button").click(function() {
                    window.location.href = 'http://localhost:8888/signup';
                });
            });

            $(document).ready(function() {
                $("#login-button").click(function() {
                    window.location.href = 'http://localhost:8888/login';
                });
            });

            if (window.location.href.indexOf("signup") > -1) {
                document.getElementById("signup-button").style.backgroundColor = "blue";
            }

            $(document).ready(function () {
                $('#signup-form').on('submit', function (e) {
                    e.preventDefault();
                    const fullName = $('#fullName').val();
                    const username = $('#username').val();
                    const email = $('#email').val(); 
                    const password = $('#password').val(); 
                    const passwordConfirm = $('#password-confirm').val(); 

                    const data = {
                        fullName,
                        username,
                        email, 
                        password, 
                        passwordConfirm,
                    }
                    $.ajax({
                        url: `http://localhost:8888/signup`,
                        type: "POST",
                        data: data,
                        dataType: "json",
                        success: function (data) {
                            console.log(data)
                            window.location.replace(`http://localhost:8888/login`); 
                        },
                        error: function (data){
                            console.log(data.responseJSON)
                            $('#fullName').html('')
                            $('#username').html('')
                            $('#email').html('')
                            $('#password').html('')
                            $('#password-confirm').html('')
                            $('#fullName').removeClass('error-border')
                            $('#username').removeClass('error-border')
                            $('#email').removeClass('error-border')
                            $('#password').removeClass('error-border')
                            $('#password-confirm').removeClass('error-border')

                            if (data.responseJSON?.requiredFullName) {
                                $('#fullName').addClass('error-border')
                                $('#error-text').append(`<span class='error-message'>${data.responseJSON?.requiredFullName}</span>`)
                            }
                            if (data.responseJSON?.fullNameShort) {
                                $('#firstName').addClass('error-border')
                                $('#firstName').append(`<span class='error-text'>${data.responseJSON?.fullNameShort}</span>`)
                            }
                            if (data.responseJSON?.requiredUsername) {
                                $('#username').addClass('error-border')
                                $('#username').append(`<span class='error-text'>${data.responseJSON?.requiredUsername}</span>`)
                            }
                            if (data.responseJSON?.usernameShort) {
                                $('#lastName').addClass('error-border')
                                $('#lastName').append(`<span class='error-text'>${data.responseJSON?.usernameShort}</span>`)
                            }

                            if (data.responseJSON?.requiredEmail) {
                                $('#email').addClass('error-border')
                                $('#email').append(`<div class='error-text'>${data.responseJSON?.requiredEmail}</div>`)
                            }
                            if (data.responseJSON?.invalidEmail) {
                                $('#email').addClass('error-border')
                                $('#email').append(`<span class='error-text'>${data.responseJSON?.invalidEmail}</span>`)
                            }
                            
                            if (data.responseJSON?.requiredEmail) {
                                $('#email').addClass('error-border')
                                $('#email').append(`<div class='error-text'>${data.responseJSON?.requiredEmail}</div>`)
                            }
                            if (data.responseJSON?.passwordMismatch) {
                                $('#password-confirm').addClass('error-border')
                                $('#password-confirm').append(`<span class='error-text'>${data.responseJSON?.passwordMismatch}</span>`)
                            }

                            if (data.responseJSON?.requiredPasswords) {
                                $('#password').addClass('error-border')
                                $('#password-confirm').addClass('error-border')
                                $('#password').append(`<span class='error-text'>${data.responseJSON?.requiredPasswords}</span>`)
                                $('#password-confirm').append(`<span class='error-text'>${data.responseJSON?.requiredPasswords}</span>`)
                            }
                        }
                    });
                })
            })
         </script>
        
    </body>
</html>