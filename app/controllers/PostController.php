<?php

namespace app\controllers;
use app\core\Controller;
use app\models\Post;
use app\models\User;
use app\models\Campaign;
use app\models\Event;

// Include AWS SDK files 
require '../vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class PostController extends Controller
{
    public function addPostView() {
        include '../public/assets/views/posts/add-post.php';
    }

    public function addPost() {
        $errors = []; 
        $s3FileLink = null;

        $bucketName = BUCKETNAME;
        $accessKey = ACCESSKEY;
        $secretKey = SECRETKEY;
        $region = REGION;

        // Instantiate S3 client
        $s3 = new S3Client([
            'version' => 'latest',
            'region'  => $region,
            'credentials' => [
                'key'    => $accessKey,
                'secret' => $secretKey,
            ],
        ]);

        // File handling
        if (isset($_FILES['userfile'])) {
            $file = $_FILES['userfile'];


            // File details
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];

            // Specify the target location for file 
            $targetPath = 'uploads/' . basename($fileName);

            try {
                // Upload file to S3
                $result = $s3->putObject([
                    'Bucket' => $bucketName,
                    'Key'    => $targetPath,
                    'Body'   => fopen($fileTmpName, 'rb'),
                    'ACL'    => 'public-read', 
                ]);

                // Get the public URL of the uploaded file
                $s3FileLink = $result['ObjectURL'];

            } catch (S3Exception $e) {
                $statusMsg = "Error uploading file: " . $e->getMessage();
                $errors['fileError'] = $statusMsg; 
            }
        }

        // handle remaining post data 
        $title = $_POST['title'];
        $description = $_POST['description'];

        if ($title) {
            $title = htmlspecialchars($title, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($title) < 2) {
                $errors['titleShort'] = 'title is too short';
            }
        } else {
            $errors['requiredTitle'] = 'title is required';
        }

        if(!isset($_POST['borough'])){ 
            $errors['boroughRequired'] = "Borough required"; 
        } 
        else {
            $borough = $_POST['borough'];
        }

        if ($description) {
            $description = htmlspecialchars($description, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($description) < 2) {
                $errors['descriptionShort'] = 'description is too short';
            }
        } else {
            $errors['requiredDescription'] = 'description is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        
        $username = $_SESSION['username']; 

        $user = new User(); 
        $userid = $user->getUserByUsername($username); 
        $userId = $userid[0]; 

        $post= new Post(); 
        $post->savePost(
            [   
                'userId' => $userId,
                'username' => $username,
                'title' => $title,
                'description' => $description,
                'borough' => $borough, 
                'imageLink' => $s3FileLink,
            ]
        );

        http_response_code(200);
        echo json_encode([
            'route' => '/'
        ]);
        exit();
    }

    public function getPosts() {
        $postModel = new Post(); 
        header("Content-Type: application/json");

        $posts = $postModel->getAllPosts(); 
        
        echo json_encode($posts);
        exit();
    }

    public function getCampaigns() {
        $campaignModel = new Campaign(); 
        header("Content-Type: application/json");

        $campaigns = $campaignModel->getAllCampaigns(); 
        
        echo json_encode($campaigns);
        exit();
    }

    public function getEvent() {
        $eventModel = new Event(); 
        header("Content-Type: application/json");

        $events = $eventModel->getAllEvents(); 
        
        echo json_encode($events);
        exit();
    }

    public function startCampaign() {
        include '../public/assets/views/posts/start-campaign.php';
    }

    public function saveCampaign() {
        $errors = []; 
        $s3FileLink = null;

        $bucketName = BUCKETNAME;
        $accessKey = ACCESSKEY;
        $secretKey = SECRETKEY;
        $region = REGION;

        // Instantiate S3 client
        $s3 = new S3Client([
            'version' => 'latest',
            'region'  => $region,
            'credentials' => [
                'key'    => $accessKey,
                'secret' => $secretKey,
            ],
        ]);

        // File handling
        if (isset($_FILES['userfile'])) {
            $file = $_FILES['userfile'];


            // File details
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];

            // Specify the target location for file 
            $targetPath = 'uploads/' . basename($fileName);

            try {
                // Upload file to S3
                $result = $s3->putObject([
                    'Bucket' => $bucketName,
                    'Key'    => $targetPath,
                    'Body'   => fopen($fileTmpName, 'rb'),
                    'ACL'    => 'public-read', 
                ]);

                // Get the public URL of the uploaded file
                $s3FileLink = $result['ObjectURL'];

            } catch (S3Exception $e) {
                $statusMsg = "Error uploading file: " . $e->getMessage();
                $errors['fileError'] = $statusMsg; 
            }
        }

        // handle remaining post data 
        $name = $_POST['campaign-name'];
        $description = $_POST['description'];

        if ($name) {
            $name = htmlspecialchars($name, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($name) < 1) {
                $errors['nameShort'] = 'name is too short';
            }
        } else {
            $errors['requiredName'] = 'name is required';
        }

        if(!isset($_POST['borough'])){ 
            $errors['boroughRequired'] = "borough required"; 
        } 
        else {
            $borough = $_POST['borough'];
        }

        if ($description) {
            $description = htmlspecialchars($description, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($description) < 2) {
                $errors['descriptionShort'] = 'description is too short';
            }
        } else {
            $errors['requiredDescription'] = 'description is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        
        $username = $_SESSION['username']; 

        $user = new User(); 
        $userid = $user->getUserByUsername($username); 
        $userId = $userid[0]; 

        $campaign = new Campaign(); 
        $campaign->saveCampaign(
            [   
                'userId' => $userId,
                'username' => $username,
                'name' => $name,
                'description' => $description,
                'borough' => $borough, 
                'imageLink' => $s3FileLink,
            ]
        );

        http_response_code(200);
        echo json_encode([
            'route' => '/'
        ]);
        exit();
    }

    public function likePost() {
        $errors = []; 
    
        if (!isset($_SESSION['username'])) {
            $errors['invaliduser'] = "User not logged in"; 
        }

        $username = $_SESSION['username']; 
        $user =  new User();
        $userData = $user->getUserByUsername($username); // get userId from username 
        $userId = $userData['usersId'];


    
        if (!isset($_POST["postId"])) {
            $errors['invalidpostId'] = "Invalid post id"; 
        }
        else {
            $post= new Post();
            $postId = $_POST["postId"]; 

            $likeData = [
                'id' => $postId,
                'userId' => $userId,
            ];

            // Check if the user has already liked the post
            $alreadyLiked = $post->checkPostLike($likeData);

            if (!$alreadyLiked) {
                $post->insertPostLike($likeData);
                
                http_response_code(200);
                echo json_encode([
                    'success' => true
                ]);
                exit();
            } else { 
                $errors['alreadyLiked'] = "User already liked post";
            }
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

    }

    public function shareEvent() {
        include '../public/assets/views/posts/share-event.php';
    }

    public function saveEvent() {
        $errors = []; 
        $s3FileLink = null;

        $bucketName = BUCKETNAME;
        $accessKey = ACCESSKEY;
        $secretKey = SECRETKEY;
        $region = REGION;

        // Instantiate S3 client
        $s3 = new S3Client([
            'version' => 'latest',
            'region'  => $region,
            'credentials' => [
                'key'    => $accessKey,
                'secret' => $secretKey,
            ],
        ]);

        // File handling
        if (isset($_FILES['userfile'])) {
            $file = $_FILES['userfile'];


            // File details
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];

            // Specify the target location for file 
            $targetPath = 'uploads/' . basename($fileName);

            try {
                // Upload file to S3
                $result = $s3->putObject([
                    'Bucket' => $bucketName,
                    'Key'    => $targetPath,
                    'Body'   => fopen($fileTmpName, 'rb'),
                    'ACL'    => 'public-read', 
                ]);

                // Get the public URL of the uploaded file
                $s3FileLink = $result['ObjectURL'];

            } catch (S3Exception $e) {
                $statusMsg = "Error uploading file: " . $e->getMessage();
                $errors['fileError'] = $statusMsg; 
            }
        }

        // handle remaining post data 
        $name = $_POST['event-name'];
        $orgName = $_POST['org-name'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $time = $_POST['event-time'];
        $location = $_POST['event-location'];

        if ($name) {
            $name = htmlspecialchars($name, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($name) < 1) {
                $errors['nameShort'] = 'name is too short';
            }
        } else {
            $errors['requiredName'] = 'name is required';
        }

        if ($orgName) {
            $orgName = htmlspecialchars($orgName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($orgName) < 1) {
                $errors['nameShort'] = 'name is too short';
            }
        } else {
            $errors['requiredName'] = 'name is required';
        }

        if(!isset($_POST['borough'])){ 
            $errors['boroughRequired'] = "borough required"; 
        } 
        else {
            $borough = $_POST['borough'];
        }

        if ($description) {
            $description = htmlspecialchars($description, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($description) < 2) {
                $errors['descriptionShort'] = 'description is too short';
            }
        } else {
            $errors['requiredDescription'] = 'description is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        

        $event = new Event(); 
        $event->saveEvent(
            [   
                'name' => $name,
                'orgName' => $orgName,
                'description' => $description,
                'date' => $date,
                'time' => $time, 
                'location' => $location,
                'borough' => $borough,
                'imageLink' => $s3FileLink,
            ]
        );

        http_response_code(200);
        echo json_encode([
            'route' => '/'
        ]);
        exit();
    }
    
}