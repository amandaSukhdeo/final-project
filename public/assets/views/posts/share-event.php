<?php
    include_once 'assets/views/header/header.php';
?>

<div class="event-main">
            <div class="event-container"> 
                <div class="campaign-message">
                    <h1>Share an Event Happening in Your Community</h1>
                    <h3>Events are a great way to bring your community together for a cause.</h3>
                </div>
                
                <div class="campaign-form-div"> 
                    <form id="event-form" method="POST">
                        <label for="camp-name">Event Name:</label>
                        <input type="text" id="campname-input" name="event-name" placeholder="Event Name...">
                        <br>
                        <label for="org-name">Organization Name:</label>
                        <input type="text" id="orgname-input" name="org-name" placeholder="Organization Name...">
                        <br>
                        <label for="description">Description:</label>
                        <br>
                        <textarea id="campdesc-input" name="description" placeholder="Share a something about your organization or campaign..." rows="5" cols="78" ></textarea>
                        <br>
                        <label name="borough" for="Borough">Borough:</label>
                        <div class="borough-choice">
                            <input type="radio" id="bronx" name="borough" value="Bronx">
                            <label name="boroughlabel" for="bronx">Bronx</label><br>

                            <input type="radio" id="manhattan" name="borough" value="Manhattan">
                            <label name="boroughlabel" for="manhattan">Manhattan</label><br>

                            <input type="radio" id="brooklyn" name="borough" value="Brooklyn">
                            <label name="boroughlabel" for="brooklyn">Brooklyn</label>

                            <input type="radio" id="queens" name="borough" value="Queens">
                            <label name="boroughlabel" for="queens">Queens</label>

                            <input type="radio" id="staten-island" name="borough" value="Staten Island">
                            <label name="boroughlabel" for="staten-island">Staten Island</label>

                            <input type="radio" id="NYC" name="borough" value="NYC">
                            <label name="boroughlabel" for="NYC">NYC</label>
                        </div>
                        <label for="date">Event date:</label>
                        <input type="date" id="event-date" name="date" required>

                        <label for="event-time">Time of Event:</label>
                        <input type="time" id="event-time" name="event-time" required>

                        <label for="event-location">Event location:</label>
                        <input type="text" id="location-input" name="event-location" placeholder="Location of event..." required>
                            
                        <div class="file-input">
                            <label name="filelabel" for="formFile" class="form-label">Upload an Image:</label>
                            <input type="file" id="userfile" name="userfile" required>
                        </div>

                        <div id="camp-btn-submit">
                            <button type="submit" id="eventbtn" name="submit-event">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
        $(document).ready(function () {
                $('#event-form').on('submit', function (e) {
                    e.preventDefault();

                    var formData = new FormData(this);

                    $.ajax({
                        url: `http://localhost:8888/share-event`,
                        type: "POST",
                        data: formData,
                        processData: false, 
                        contentType: false, 
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