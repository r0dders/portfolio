<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>

        <?php
        //Start session
		session_start();
        
        // function to split up the file
        function test_input($data) {
            //  $data = trim($data);
            //  $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        //Put in the header menu
        include 'header.php';
        
        //Get $con from the secure location
        include '../connect.php';
        
        //Empty the contents of the variables
        $content = "";
        $title = "";
        $error = "";
        $sucess = "";
        
        //list errors
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        
        //Take out any nasties from the submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = test_input($_POST["title"]);
            $content = test_input($_POST["content"]);
            $user_file = $_FILES['userfile']['name'];
        }
			// debug stuff
			echo $user_file . " :user file <br/>";
			echo "files: " . $_FILES['userfile']['name'] . "<br/>";
			
	if (isset($_FILES['userfile'])){
			
			// some debug stuff
			echo "isset true <br/>";
			
            // extract the file extension
            $ext = end(explode(".", $user_file));
            
            // get uploaded file size and call it tmp_name because your going to rename it
            
			 
			/**
            $size = filesize($user_file);
            
            // get php ini settings for max uploaded file size
            $max_upload = ini_get( 'upload_max_filesize' );
            
            // check if we're able to upload less than the max size
            if( $size > $max_upload ){
            $error = 'You have exceeded the upload file size.';
			}
			/**/
			
            // rename our upload file name, this to avoid conflict in previous uploads
            $rnd_name = uniqid(mt_rand(10, 15)).'_'.time().'.'.$ext;
            
			// debug stuff
			echo $rnd_name . " :random name<br/>";
			
            // set the upload directory
            $uploaddir = '/var/www/media/uploads/';
		
            // upload the file using the random name generated
            $uploadfile = $uploaddir . $rnd_name;
            
			// debug stuff
			echo $uploadfile . " :upload file<br/>";
			
            echo '<pre>';
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                echo "File is valid, and was successfully uploaded.\n";
            } else {
                echo "Possible file upload attack!\n";
            }

            echo 'Here is some more debugging info:';
            print_r($_FILES);

            print "</pre>";
            
        } else {
        	
			$rnd_name = "";
			
        }
			
            //Create query from the contents of content.php ready to be posted into DB
            $sql = "INSERT INTO content_tbl(content_title, content_text, date_created, file)
                    VALUES('$title','$content','now()','$rnd_name')";
            
            // run the query
            // mysqli_query($con, $sql);
                    
            // run query and any other errors spit them out
            if (!mysqli_query($con, $sql)) {
                die('Error: ' . mysqli_error($con));
            } else {
            // tell me if it went ok
            echo "1 record added";
            }
            
        
        
        // close the connection
        mysqli_close($con);
        include 'footer.php';
    ?>
	</body>
</html>