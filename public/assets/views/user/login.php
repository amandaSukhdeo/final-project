<?php
    include_once 'assets/views/header/header.php';
?>
        <div class="login-main">
            <div class="login-container"> 
                <div class="login-message">
                    <h1>Log In</h1>
                    <h3>Get updated on the latest happening in your community</h3>
                </div>
                
                <div class="login-form-div"> 
                    <form id="login-form" action="" method="POST">
                        <label for="Username">Username:</label>
                        <input type="text" id="username-input" name="username" placeholder="Username...">
                        <br>
                        <label for="password">Password:</label>
                        <input type="password" id="password-input" name="password" placeholder="Enter 6 characters or more">
                        <br>
                        <div id="login-btn-submit">
                            <button type="submit" id="loginbtn" name="login">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
    </script>
    
    <script>
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

        if (window.location.href.indexOf("login") > -1) {
            document.getElementById("login-button").style.backgroundColor = "blue";
        }

        $(document).ready(function () {
            $('#login-form').on('submit', function (e) {
                e.preventDefault();
                var username = $('#username-input').val();
                var password = $('#password-input').val();

                const data = {
                    username,
                    password
                }

                $.ajax({
                    url: 'http://localhost:8888/login',
                    type: "POST",
                    data: data,
                    dataType: "json",
                    success: function (data) {
                        window.location.replace(data.route);
                    },
                    error: function (data){
                        console.log(data)
                    }
                });
            });
        })
    </script> 
</body>

</html>