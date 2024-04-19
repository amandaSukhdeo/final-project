<?php

namespace app\controllers;
use app\core\Controller;
use app\models\Post;
use app\models\User;

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

    public function startCampaign() {
        include '../public/assets/views/posts/start-campaign.php';
    }

}