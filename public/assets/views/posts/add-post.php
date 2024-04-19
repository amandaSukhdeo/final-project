<?php
    include_once 'assets/views/header/header.php';
?>

<div class="add-post-main">
    <div class="add-post-container"> 
        <div class="add-post-message">
            <h1>Make a Post</h1>
            <h3>Share a local environmental justice issue happening in your community</h3>
        </div>
                
        <div class="add-post-form-div"> 
            <form id="add-post-form"  method="POST" enctype="multipart/form-data">
                <label name="titlelabel" for="title">Post Title:</label>
                <input type="text" id="post-title" name="title">
                <label name= "desclabel" for="postdesc">Description:</label>
                <br>
                <textarea id="postdesc-input" name="description" rows="5" cols="78"></textarea>
                <br>
                <label name="boroughImapacted" for="Borough">Borough Impacted:</label>
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
                </div>
                    
                <div class="file-input">
                    <label name="filelabel" for="formFile" class="form-label">Upload an Image:</label>
                    <input type="file" id="userfile" name="userfile" required>
                </div>

                <div id="post-btn-submit">
                    <button type="submit" id="addpostbtn" name="addpost">Submit Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function () {
                $('#add-post-form').on('submit', function (e) {
                    e.preventDefault();

                    var formData = new FormData(this);

                    $.ajax({
                        url: `http://localhost:8888/add-post`,
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