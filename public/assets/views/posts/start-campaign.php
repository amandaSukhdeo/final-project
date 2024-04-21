<?php
    include_once 'assets/views/header/header.php'; 
?>
<div class="campaign-main">
            <div class="campaign-container"> 
                <div class="campaign-message">
                    <h1>Create a Campaign & Connect With Others</h1>
                    <h3>Organizations are a great way to garner awareness and support in your community</h3>
                </div>
                
                <div class="campaign-form-div"> 
                    <form id="campaign-form" method="POST">
                        <label for="camp-name">Campaign or Organization Name:</label>
                        <input type="text" id="campname-input" name="campaign-name" placeholder="Name...">
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
                            
                        <div class="file-input">
                            <label name="filelabel" for="formFile" class="form-label">Upload an Image:</label>
                            <input type="file" id="userfile" name="userfile" required>
                        </div>

                        <div id="camp-btn-submit">
                            <button type="submit" id="campaignbtn" name="submit-campaign">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
        $(document).ready(function () {
                $('#campaign-form').on('submit', function (e) {
                    e.preventDefault();

                    var formData = new FormData(this);

                    $.ajax({
                        url: `http://localhost:8888/start-campaign`,
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