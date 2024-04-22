<?php
    include_once 'assets/views/header/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Archivo+Narrow:ital,wght@0,400..700;1,400..700&family=Concert+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway&family=Rubik+Doodle+Shadow&family=Titan+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Archivo+Narrow:ital,wght@0,400..700;1,400..700&family=Concert+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway&family=Rubik+Doodle+Shadow&family=Sedan:ital@0;1&family=Titan+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/styles/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Homepage</title>
</head>
<body>
    <div class="container"> 
        <div class="nav">

            <!-- logo -->
            <div class="nav-item" id="logo">
                <div id="my-logo">
                    <button id="my-logo-btn" class="amatic-sc-bold"><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 72 72">
    <path fill="#5c9e31" d="M38.23 15.46c-.054-.97 3.723-3.997 5.806-.878c.395.36 2.126-1.39 4.198-1.123c1.4.18 1.977 2.648 3.377 3.33a10.94 10.94 0 0 1 3.663 2.283c.363.475.115 1.578.476 3.044c.331 1.349 3.817 1.22 3.044 2.854a103.818 103.818 0 0 1-7.608 13.93a38.606 38.606 0 0 0-5.44 11.07s-12.28-21.09-7.516-34.51z"/>
    <path fill="#b1cc33" d="M13.37 19.06s.576-2.126 4.428-2.923c.882-1.102.798-4.045 2.918-3.453c3.834.254 4.765-1.352 8.137-.709c1.404 1.531 5.977 1.341 6.438 1.327c3.925 5.378 9.018 30.07 7.855 32.25c-1.163 2.18-16.35 6.706-16.35 6.706s-14.88-32.77-13.42-33.2z"/>
    <path fill="#fff" d="m26.91 52.79l16.64-6.381l2.603 6.788a1.424 1.424 0 0 1-.82 1.84l-13.62 5.221a1.816 1.816 0 0 1-2.345-1.045z"/>
    <g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
        <path d="m26.81 52.84l16.4-6.333l2.959 6.744c.319.726-.086 1.57-.825 1.854l-13.7 5.262a1.825 1.825 0 0 1-2.359-1.053zM22.4 26.77c-1.102-3.313-2.039-8.034-4.299-9.815a3.218 3.218 0 0 0-2.756-.64c-4.352 2.25.162 9.156 1.219 12.29c.896 2.66 2.043 6.165 2.896 8.616c1.291 3.71 7.348 15.61 7.348 15.61"/>
        <path d="M18.1 16.96c-.233-4.612 4.101-6.323 6.053-3.535c1.646 2.492 4.171 11 4.171 11M24.34 13.43c.775-.878 1.184-1.734 2.307-2.063c1.876-.492 3.014-.135 4.041 2.829c1.027 2.964 3.123 9.961 3.123 9.961M30.69 14.2s2.407-2.769 4.881-.605c.894 1.681 5.535 19.73 5.535 19.73s2.617 10.46 2.104 13.18M18.79 34.83s2.102 2.661 3.196 2.531c2.798-.334 3.077-3.89 3.15-5.871c.073-1.981.59-4.11 3.189-3.963c2.598.147 3.99.587 3.624 4.183c-.366 3.596-3.003 13.5-3.003 13.5l5.263 4.562M36.99 17.27s2.13-3.556 3.022-3.979c.958-.454 4.163.116 4.112 2.638c-.051 2.522-3.619 8.345-3.619 8.345"/>
        <path d="M44.12 15.93s1.683-2.82 3.258-2.961c2.068-.3 3.843 1.477 3.543 3.549c-.077.429-.194.85-.349 1.256a78.846 78.846 0 0 1-5.034 9.742m5.252-9.896s2.353-1.24 3.71-.118a2.769 2.774 0 0 1 .713 4.046c-.985 1.768-5.122 9.663-5.122 9.663m4.939-9.021c.01-.036 4.244-.86 3.749 2.792c-.266 1.964-13.84 25.29-13.84 25.29"/>
    </g>
</svg>GreenSpace</button>
                </div>
            </div>

            <!-- search div  -->
            <div class="nav-item" id="search-div">
                <div class="search-bar">
                    <img class="search-icon" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDU2Ljk2NiA1Ni45NjYiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDU2Ljk2NiA1Ni45NjY7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMTZweCIgaGVpZ2h0PSIxNnB4Ij4KPHBhdGggZD0iTTU1LjE0Niw1MS44ODdMNDEuNTg4LDM3Ljc4NmMzLjQ4Ni00LjE0NCw1LjM5Ni05LjM1OCw1LjM5Ni0xNC43ODZjMC0xMi42ODItMTAuMzE4LTIzLTIzLTIzcy0yMywxMC4zMTgtMjMsMjMgIHMxMC4zMTgsMjMsMjMsMjNjNC43NjEsMCw5LjI5OC0xLjQzNiwxMy4xNzctNC4xNjJsMTMuNjYxLDE0LjIwOGMwLjU3MSwwLjU5MywxLjMzOSwwLjkyLDIuMTYyLDAuOTIgIGMwLjc3OSwwLDEuNTE4LTAuMjk3LDIuMDc5LTAuODM3QzU2LjI1NSw1NC45ODIsNTYuMjkzLDUzLjA4LDU1LjE0Niw1MS44ODd6IE0yMy45ODQsNmM5LjM3NCwwLDE3LDcuNjI2LDE3LDE3cy03LjYyNiwxNy0xNywxNyAgcy0xNy03LjYyNi0xNy0xN1MxNC42MSw2LDIzLjk4NCw2eiIgZmlsbD0iIzAwMDAwMCIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
                    <input class="search" placeholder="Search" type="text">
                    <img class="clear-icon" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxLjk3NiA1MS45NzYiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxLjk3NiA1MS45NzY7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMTZweCIgaGVpZ2h0PSIxNnB4Ij4KPGc+Cgk8cGF0aCBkPSJNNDQuMzczLDcuNjAzYy0xMC4xMzctMTAuMTM3LTI2LjYzMi0xMC4xMzgtMzYuNzcsMGMtMTAuMTM4LDEwLjEzOC0xMC4xMzcsMjYuNjMyLDAsMzYuNzdzMjYuNjMyLDEwLjEzOCwzNi43NywwICAgQzU0LjUxLDM0LjIzNSw1NC41MSwxNy43NCw0NC4zNzMsNy42MDN6IE0zNi4yNDEsMzYuMjQxYy0wLjc4MSwwLjc4MS0yLjA0NywwLjc4MS0yLjgyOCwwbC03LjQyNS03LjQyNWwtNy43NzgsNy43NzggICBjLTAuNzgxLDAuNzgxLTIuMDQ3LDAuNzgxLTIuODI4LDBjLTAuNzgxLTAuNzgxLTAuNzgxLTIuMDQ3LDAtMi44MjhsNy43NzgtNy43NzhsLTcuNDI1LTcuNDI1Yy0wLjc4MS0wLjc4MS0wLjc4MS0yLjA0OCwwLTIuODI4ICAgYzAuNzgxLTAuNzgxLDIuMDQ3LTAuNzgxLDIuODI4LDBsNy40MjUsNy40MjVsNy4wNzEtNy4wNzFjMC43ODEtMC43ODEsMi4wNDctMC43ODEsMi44MjgsMGMwLjc4MSwwLjc4MSwwLjc4MSwyLjA0NywwLDIuODI4ICAgbC03LjA3MSw3LjA3MWw3LjQyNSw3LjQyNUMzNy4wMjIsMzQuMTk0LDM3LjAyMiwzNS40NiwzNi4yNDEsMzYuMjQxeiIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo="/>
                </div>
            </div>

            <!-- login div  -->
            <div class="nav-item" id="signup-login-div">
                <?php
                    if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
                        echo ('<div class="sign-up-div"><button class="nav-btn" id="my-acc-button">My Account</button></div>');
                        echo ('<div class="sign-up-div"><button class="nav-btn" id="log-out-btn">Log Out</button></div>');
                    } else {
                        echo ('
                        <div class="sign-up-div">
                            <button class="nav-btn" id="signup-button">Sign Up</button>
                        </div>
                        <div class="login-div"> 
                            <button class="nav-btn" id="login-button">Log In</button>
                        </div>    
                        '); 
                    }
                ?> 
            </div>
        </div>

        <div class="break"></div>
<script>
    $(document).ready(function() {
            $("#my-logo-btn").click(function() {
                window.location.href = 'http://localhost:8888/';
            });
        });

     $(document).ready(function() {
            $("#my-acc-button").click(function() {
                window.location.href = 'http://localhost:8888/my-account';
            });
        });

    $(document).ready(function() {
            $("#log-out-btn").click(function() {
                window.location.href = 'http://localhost:8888/logout';
            });
        });
</script>