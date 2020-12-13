<?php
$statusMsg = '';


$targetDir = "avatar/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
   
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
       
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            
            $sql =" UPDATE user SET avatar='".$fileName."' WHERE id=?";
            $q = $pdo->prepare($sql);
             $q->execute(array($_SESSION['id']));

            if($sql){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
?>
<script>
alert('<?php echo $statusMsg ?>')
</script>

<?php
    header("location: index.php?action=accueil&id=".$_SESSION['id']);
?>