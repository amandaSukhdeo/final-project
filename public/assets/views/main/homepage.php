<?php
    include_once 'assets/views/header/header.php';   
?>

        <div class="main"> 
            <div class="left-column-container"> 

            <div class="left-item">
                    <div class="item-title">
                        <h4 class="nearby-communities" id="title">Nearby Communities</h4>
                    </div> 
                    
                    <div class="nearby-communities">
                        <button class="nearby-comm-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
    <path fill="currentColor" d="M19 9A7 7 0 1 0 5 9c0 1.387.409 2.677 1.105 3.765h-.008L12 22l5.903-9.235h-.007A6.971 6.971 0 0 0 19 9zm-7 3a3 3 0 1 1 0-6a3 3 0 0 1 0 6z"/>
</svg>The Bronx</button>
                        <button class="nearby-comm-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
    <path fill="currentColor" d="M19 9A7 7 0 1 0 5 9c0 1.387.409 2.677 1.105 3.765h-.008L12 22l5.903-9.235h-.007A6.971 6.971 0 0 0 19 9zm-7 3a3 3 0 1 1 0-6a3 3 0 0 1 0 6z"/>
</svg>Manhattan</button>
                    </div>
                    <div class="nearby-communities">
                        <button class="nearby-comm-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
    <path fill="currentColor" d="M19 9A7 7 0 1 0 5 9c0 1.387.409 2.677 1.105 3.765h-.008L12 22l5.903-9.235h-.007A6.971 6.971 0 0 0 19 9zm-7 3a3 3 0 1 1 0-6a3 3 0 0 1 0 6z"/>
</svg>Brooklyn</button>
                        <button class="nearby-comm-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
    <path fill="currentColor" d="M19 9A7 7 0 1 0 5 9c0 1.387.409 2.677 1.105 3.765h-.008L12 22l5.903-9.235h-.007A6.971 6.971 0 0 0 19 9zm-7 3a3 3 0 1 1 0-6a3 3 0 0 1 0 6z"/>
</svg>Queens</button>
                    </div>
                    <div class="nearby-communities">
                        <button class="nearby-comm-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
    <path fill="currentColor" d="M19 9A7 7 0 1 0 5 9c0 1.387.409 2.677 1.105 3.765h-.008L12 22l5.903-9.235h-.007A6.971 6.971 0 0 0 19 9zm-7 3a3 3 0 1 1 0-6a3 3 0 0 1 0 6z"/>
</svg>Staten Island</button>
                    </div>
                    
                </div>

                <div class="left-item" id="events-div-container">
                    <div class="item-title">
                        <h4>Upcoming Events</h4>
                    </div>    

                    <div class="calendar-body">
                        <div class="calendar" id="calendar-div">
                            <div class="calendar-header">
                                <span class="month-picker" id="month-picker">
                                    February   
                                </span>
                                <div class="year-picker">
                                    <span class="year-change" id="prev-year">
                                    <span id="year">2024</span>
                                </div>
                            </div>

                            <div class="calendar-body">
                                <div class="calendar-week-day">
                                    <div>Sun</div>
                                    <div>Mon</div>
                                    <div>Tue</div>
                                    <div>Wed</div>
                                    <div>Thu</div>
                                    <div>Fri</div>
                                    <div>Sat</div>
                                </div>
                                <div class="calendar-days">
                                    <div>1</div>
                                    <div>2</div>
                                    <div>3</div>
                                    <div>4</div>
                                    <div>5</div>
                                    <div>6</div>
                                    <div>7</div>
                                    <div>1</div>
                                    <div>2</div>
                                    <div>3</div>
                                    <div>4</div>
                                    <div>5</div>
                                    <div>6</div>
                                    <div>7</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="events-holder"></div>
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
                                    <button id="create-post-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zm149.3 277.3c0 11.8-9.5 21.3-21.3 21.3h-85.3V384c0 11.8-9.5 21.3-21.3 21.3h-42.7c-11.8 0-21.3-9.6-21.3-21.3v-85.3H128c-11.8 0-21.3-9.6-21.3-21.3v-42.7c0-11.8 9.5-21.3 21.3-21.3h85.3V128c0-11.8 9.5-21.3 21.3-21.3h42.7c11.8 0 21.3 9.6 21.3 21.3v85.3H384c11.8 0 21.3 9.6 21.3 21.3v42.7z"/>
                                </svg>Create a Post</button>
                                </div>
                                <div class="start-camp">
                                    <button id="start-camp-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="-0.5 -0.5 24 24">
                                    <path fill="currentColor" d="m21.289.98l.59.59c.813.814.69 2.257-.277 3.223L9.435 16.96l-3.942 1.442c-.495.182-.977-.054-1.075-.525a.928.928 0 0 1 .045-.51l1.47-3.976L18.066 1.257c.967-.966 2.41-1.09 3.223-.276zM8.904 2.19a1 1 0 1 1 0 2h-4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-4a1 1 0 0 1 2 0v4a4 4 0 0 1-4 4h-12a4 4 0 0 1-4-4v-12a4 4 0 0 1 4-4h4z"/>
                                </svg>Start a Campaign</button>
                                </div>
                                <div class="share-event">
                                    <button id="share-event-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14">
                                    <path fill="currentColor" fill-rule="evenodd" d="M3.5 0a1 1 0 0 1 1 1v1h5V1a1 1 0 0 1 2 0v1h1A1.5 1.5 0 0 1 14 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h1V1a1 1 0 0 1 1-1m.25 8a.75.75 0 0 1 .75-.75h1.75V5.5a.75.75 0 0 1 1.5 0v1.75H9.5a.75.75 0 0 1 0 1.5H7.75v1.75a.75.75 0 0 1-1.5 0V8.75H4.5A.75.75 0 0 1 3.75 8" clip-rule="evenodd"/>
                                </svg>Share an Event</button>
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
                                        <span><button class="post-control-btn" id="post-like-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
    <path fill="currentColor" fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1m-.75 10.25a.75.75 0 0 0 1.5 0V6.56l1.22 1.22a.75.75 0 1 0 1.06-1.06l-2.5-2.5a.75.75 0 0 0-1.06 0l-2.5 2.5a.75.75 0 0 0 1.06 1.06l1.22-1.22z" clip-rule="evenodd"/>
</svg><span id="post-likes">${value['num_likes']}</span></button></span>
                                        <span><button class="post-control-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 42 42">
    <path fill="currentColor" d="M29.5 30.5h7c2.529 0 3-.529 3-3v-21c0-2.41-.59-3-3-3h-32c-2.47 0-3 .53-3 3v20.971c0 2.469.41 3.029 3 3.029h13s9.562 8.756 10.75 9.812c.422.375 1.281.172 1.25-.812v-9zm-22-9h21v3h-21v-3zm0-6h13v3h-13v-3zm0-6h26v3h-26v-3z"/>
</svg>Comment</button></span> 
                                        <span><button class="post-control-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
    <path fill="currentColor" d="M376 176H272v145a16 16 0 0 1-32 0V176H136a56.06 56.06 0 0 0-56 56v192a56.06 56.06 0 0 0 56 56h240a56.06 56.06 0 0 0 56-56V232a56.06 56.06 0 0 0-56-56ZM272 86.63l52.69 52.68a16 16 0 0 0 22.62-22.62l-80-80a16 16 0 0 0-22.62 0l-80 80a16 16 0 0 0 22.62 22.62L240 86.63V176h32Z"/>
</svg>Share</button></span> 
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
                                        <path fill="currentColor" d="M14.75 1A5.24 5.24 0 0 0 10 4A5.24 5.24 0 0 0 0 6.25C0 11.75 10 19 10 19s10-7.25 10-12.75A5.25 5.25 0 0 0 14.75 1z"/></svg></svg>Favorite</button>
                                        <button class="camp-control-btn"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 14 14">
    <path fill="currentColor" fill-rule="evenodd" d="M8 3a3 3 0 1 1-6 0a3 3 0 0 1 6 0m2.75 4.5a.75.75 0 0 1 .75.75V10h1.75a.75.75 0 0 1 0 1.5H11.5v1.75a.75.75 0 0 1-1.5 0V11.5H8.25a.75.75 0 0 1 0-1.5H10V8.25a.75.75 0 0 1 .75-.75M5 7c1.493 0 2.834.655 3.75 1.693v.057h-.5a2 2 0 0 0-.97 3.75H.5A.5.5 0 0 1 0 12a5 5 0 0 1 5-5" clip-rule="evenodd"/>
</svg>Join</button>
                                    </div>
                            </div>`)
                        });
                    }
                });
            })


            $(document).ready(function () {
                $.ajax({
                    url: `http://localhost:8888/events`,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#events-holder').html('')
                        $.each(data, function (key, value) {
                            $('#events-holder').append(`
                            <div class="campaign">
                                    <div id="event-header">
                                        <span id="post-header-Uid">/${value['orgName']}</span>
                                        <span id="post-borough"><button id="borough-button">${value['borough']}</button></span>
                                    </div>

                                    <div id="camp-title">
                                        <span><h5>${value['title']}</h5></span>
                                    </div>

                                    <div class="event-info"> 
                                        <span class="eventInfo"><b>Date:</b> ${value['eventDate']}</span>
                                        <span class="eventInfo"><b>Time:</b> ${value['eventTime']}</span>
                                        <span class="eventInfo"><b>Location:</b> ${value['eventLocation']}</span>
                                    </div>

                                    <div class="camp-img-span"> 
                                        <img id="campaign-image" src="${value['image']}">
                                        <span id="campaign-descr"><p>${value['descr']}</p></span>
                                    </div>

                                    <div class="campaign-btns"> 
                                        <button class="camp-control-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32"><g fill="currentColor"><path d="M7.3 12.2a.7.7 0 0 1 .7-.7h2.8a.7.7 0 0 1 .7.7v2.6a.7.7 0 0 1-.7.7H8a.7.7 0 0 1-.7-.7v-2.6Zm1 .3v2h2.2v-2H8.3ZM8 17a.7.7 0 0 0-.7.7v2.6a.7.7 0 0 0 .7.7h2.8a.7.7 0 0 0 .7-.7v-2.6a.7.7 0 0 0-.7-.7H8Zm.3 3v-2h2.2v2H8.3Zm-1 3.1a.7.7 0 0 1 .7-.7h2.8a.7.7 0 0 1 .7.7v2.6a.7.7 0 0 1-.7.7H8a.7.7 0 0 1-.7-.7v-2.6Zm1 .3v2h2.2v-2H8.3Zm6.3-11.9a.7.7 0 0 0-.7.7v2.6a.7.7 0 0 0 .7.7h2.8a.7.7 0 0 0 .7-.7v-2.6a.7.7 0 0 0-.7-.7h-2.8Zm.3 3v-2h2.2v2h-2.2Zm-1 3.2a.7.7 0 0 1 .7-.7h2.8a.7.7 0 0 1 .7.7v2.6a.7.7 0 0 1-.7.7h-2.8a.7.7 0 0 1-.7-.7v-2.6Zm1 .3v2h2.2v-2h-2.2Zm-.3 4.4a.7.7 0 0 0-.7.7v2.6a.7.7 0 0 0 .7.7h2.8a.7.7 0 0 0 .7-.7v-2.6a.7.7 0 0 0-.7-.7h-2.8Zm.3 3v-2h2.2v2h-2.2Zm5.6-13.2a.7.7 0 0 1 .7-.7H24a.7.7 0 0 1 .7.7v2.6a.7.7 0 0 1-.7.7h-2.8a.7.7 0 0 1-.7-.7v-2.6Zm1 .3v2h2.2v-2h-2.2Zm-.3 9.9a.7.7 0 0 0-.7.7v2.6a.7.7 0 0 0 .7.7H24a.7.7 0 0 0 .7-.7v-2.6a.7.7 0 0 0-.7-.7h-2.8Zm.3 3v-2h2.2v2h-2.2Zm-.3-8.4a.7.7 0 0 0-.7.7v2.6a.7.7 0 0 0 .7.7H24a.7.7 0 0 0 .7-.7v-2.6a.7.7 0 0 0-.7-.7h-2.8Z"/><path d="M1.003 7A6.2 6.2 0 0 1 7.2 1h17.6a6.2 6.2 0 0 1 6.197 6H31v17.8a6.2 6.2 0 0 1-6.2 6.2H7.2A6.2 6.2 0 0 1 1 24.8V7h.003ZM3 9v15.8A4.2 4.2 0 0 0 7.2 29h17.6a4.2 4.2 0 0 0 4.2-4.2V9H3Z"/></g></svg>Save</button>
                                        <button class="camp-control-btn">Sign up</button>
                                    </div>
                            </div>`)
                        });
                    }
                });
            })

            $(document).ready(function () {
                $.ajax({
                    url: `http://localhost:8888/events`,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#events-div').html('')
                        $.each(data, function (key, value) {
                            $('#events-div').append(`
                            <div class="event">
                                    <div id="event-header">
                                        <span id="post-header-Uid">/${value['orgId']}</span>
                                        <span id="post-borough"><button id="borough-button">${value['borough']}</button></span>
                                    </div>

                                    <div id="camp-title">
                                        <span><h5>${value['title']}</h5></span>
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
                        url: `http://localhost:8888/posts`,
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

        $(document).ready(function() {
            $("#share-event-btn").click(function() {
                window.location.href = 'http://localhost:8888/share-event';
            });
        });



        // check leap year 
        isLeapYear = (year) => {
            return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 === 0)
        }

        getFebDays = (year) => {
            return isLeapYear(year) ? 29 : 28
        }

        let calendar = document.querySelector('.calendar')

        const month_names = ['January', 'February', 'March', 'April', 'May', 'June','July', 'August', 'September', 'October', 'November', 'December']
        let month_picker = document.querySelector('#month-picker')

        // generate calendar
        generateCalendar = (month, year) => {
            let calendar_days = document.querySelector('.calendar-days')
            calendar_days.innerHTML = ''
            let calendar_header_year = document.querySelector('#year')

            let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

            let currDate = new Date()

            month_picker.innerHTML = month_names[month]
            calendar_header_year.innerHTML = year
            let first_day = new Date(month, year,1)

            let dayOfWeek = first_day.getDay();
            if (dayOfWeek !== 1) { // Monday
                let diff = dayOfWeek - 1; 
                if (diff < 0) {
                    diff += 7; 
                }
                first_day.setDate(first_day.getDate() - diff); 
            }

            for(let i = 0; i <= days_of_month[month] + first_day.getDay()-1; i++) {
                let day = document.createElement('div')
                if (i >= first_day.getDay()) {
                    day.classList.add('calendar-day-hover')
                    day.innerHTML = i - first_day.getDay() + 1

                    if(i - first_day.getDay() + 1 === currDate.getDate() && year === currDate.getFullYear() && month === currDate.getMonth()) {
                        day.classList.add('curr-date')
                    }
                }
                calendar_days.appendChild(day)
            }
        }

        let month_list = calendar.querySelector('month-list')

        let currDate = new Date() 
        let curr_month = {value: currDate.getMonth()}
        let curr_year = {value:currDate.getFullYear()}
        generateCalendar(curr_month.value, curr_year.value) 

    </script>
</body>
</html>

