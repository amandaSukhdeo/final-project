<?php
    include_once 'assets/views/header/header.php';   
?>

        <div class="main"> 
            <div class="left-column-container"> 

            <div class="left-item" >
                    <div class="item-title">
                        <h4 class="nearby-communities" id="title">Nearby Communities</h4>
                    </div> 
                    
                    <div class="nearby-communities">
                        <button class="nearby-comm-btn">The Bronx</button>
                        <button class="nearby-comm-btn">Manhattan</button>
                    </div>
                    <div class="nearby-communities">
                        <button class="nearby-comm-btn">Brooklyn</button>
                        <button class="nearby-comm-btn">Queens</button>
                    </div>
                    <div class="nearby-communities">
                        <button class="nearby-comm-btn">Staten Island</button>
                    </div>
                    
                </div>

                <div class="left-item">
                    <div class="item-title">
                        <h4>Upcoming Events</h4>
                    </div>    
                    <div class="left-item" id="events-div">

                    </div>
                </div>
            </div>
    
            <div class="center-column" id="posts-container"></div>
    
            <div class="right-column-container">
                <?php   
                    if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
                        echo('
                        <div class="right-item" id="userAdd">
                            <div class="item-title">
                                <h4>Share With Your Community</h4>
                            </div>
                            <div class="userfunc">
                                <div class="create-post">
                                    <button id="create-post-btn">Create a Post</button>
                                </div>
                                <div class="start-camp">
                                    <button id="start-camp-btn">Start a Campaign</button>
                                </div>
                                <div class="share-event">
                                    <button id="share-event-btn">Share an Event</button>
                                </div>
                            </div>
                        </div>
                        ');
                    }
                ?>
                <div class="right-item" id="campaigns-container">
                    <div id="campaign-title" class="item-title">
                        <h4>Organizations & Campaigns</h4>
                    </div>
                    <div id='campaigns'></div>
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

        $(document).ready(function () {
                $.ajax({
                    url: `http://localhost:8888/posts`,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#posts-container').html('')
                        $.each(data, function (key, value) {
                            $('#posts-container').append(`
                            <div class="post" id="${value['postId']}">
                                    <div id="post-header">
                                        <span id="post-header-Uid">/${value['usersUid']}</span>
                                        <span id="post-borough"><button id="borough-button">${value['borough']}</button></span>
                                    </div>
                                    <div id="post-title">
                                        <span><h5>${value['title']}</h5></span>
                                    </div>
                                    <div id="post-main-content"> 
                                        <span class="post-img-span"><img id="post-image" src="${value['image']}"></span> 
                                        <span id="post-descr-span"><p>${value['descr']}</p>
                                    </div>
                                    <div class="post-user-controls"> 
                                        <span><button class="post-control-btn" id="post-like-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill="#ffffff" fill-rule="evenodd" d="M13.5 8a5.5 5.5 0 1 1-11 0a5.5 5.5 0 0 1 11 0M15 8A7 7 0 1 1 1 8a7 7 0 0 1 14 0m-7.75 3a.75.75 0 0 0 1.5 0V6.81l.72.72a.75.75 0 1 0 1.06-1.06l-2-2a.75.75 0 0 0-1.06 0l-2 2a.75.75 0 1 0 1.06 1.06l.72-.72z" clip-rule="evenodd"/></svg><span id="post-likes">${value['num_likes']}</span></button></span>
                                        <span><button class="post-control-btn">Comment</button></span> 
                                        <span><button class="post-control-btn">Share</button></span> 
                                    </div>
                            </div>`)
                        });
                    }
                });
            })

            $(document).ready(function () {
                $.ajax({
                    url: `http://localhost:8888/campaigns`,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#campaigns').html('')
                        $.each(data, function (key, value) {
                            $('#campaigns').append(`
                            <div class="campaign">
                                    <div id="campaign-header">
                                        <span id="post-header-Uid">/${value['usersUid']}</span>
                                        <span id="post-borough"><button id="borough-button">${value['borough']}</button></span>
                                    </div>

                                    <div id="camp-title">
                                        <span><h5>${value['name']}</h5></span>
                                    </div>

                                    <div class="camp-img-span"> 
                                        <img id="campaign-image" src="${value['image']}">
                                        <span id="campaign-descr"><p>${value['descr']}</p></span>
                                    </div>

                                    <div class="campaign-btns"> 
                                        <button class="camp-control-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <path fill="currentColor" d="M14.75 1A5.24 5.24 0 0 0 10 4A5.24 5.24 0 0 0 0 6.25C0 11.75 10 19 10 19s10-7.25 10-12.75A5.25 5.25 0 0 0 14.75 1z"/></svg></svg></button>
                                        <button class="camp-control-btn">join</button>
                                    </div>
                            </div>`)
                        });
                    }
                });
            })

            $(document).ready(function () {
                $('#posts-container').on('click', '.post-control-btn', function () {
                    var postId = $(this).closest('.post').attr('id');
                    const data = {
                        postId
                    }
            
                $.ajax({
                        url: `http://localhost:8888/posts`, // Assuming this endpoint increments likes for the post
                        type: 'POST',
                        data: data,
                        dataType: 'json',
                        success: function (data) {
                            window.location.reload();
                        },
                        error: function (data){
                            console.log(data)
                        }
                    });
                });
            });


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

        $(document).ready(function() {
            $("#create-post-btn").click(function() {
                window.location.href = 'http://localhost:8888/add-post';
            });
        });

        $(document).ready(function() {
            $("#start-camp-btn").click(function() {
                window.location.href = 'http://localhost:8888/start-campaign';
            });
        });
    </script>
</body>
</html>

