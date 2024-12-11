<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("config.php");
    if(isset($_POST['btn_upload'])){ 
        $maxsize = 5242880; // 5MB
        $name = $_FILES['file']['name'];
        $target_dir = "videos/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type 
        $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions 
        $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg","jpg","png","jpeg","svg");

        // Check extension 
        if (in_array($videoFileType, $extensions_arr)) {

            // Check file size 
            if (($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                echo "File too large. File must be less than 5MB.";
            } else {
                // Upload 
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                    // Insert record 
                    $query = "INSERT INTO videos(name,location) VALUES('" . $name . "','" . $target_file . "')";

                    mysqli_query($con, $query);
                    echo "Upload successfully.";
                }
            }
        } else {
            echo "Invalid file extension.";
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="submit" name="btn_upload">
    </form>
</body>

</html>