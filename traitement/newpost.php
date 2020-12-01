<?php
$image = "";
if(isset($_POST["submit"]) && !empty($_FILES["filepost"]["name"])){
$statusMsg = '';


$targetDir = "image/";
$fileName = basename($_FILES["filepost"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        
        if(move_uploaded_file($_FILES["filepost"]["tmp_name"], $targetFilePath)){
           
            $image=$fileName;
            
            if($image){
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
    ?>
    <script type="text/javascript">
        alert('<?php echo $statusMsg ?>');
    </script>
    <?php
    
}
?>

<?php

$sql ="INSERT INTO ecrit(titre,contenu,dateEcrit,image,idAuteur,idAmi) VALUES( ? ,? , NOW() ,'".$image."',?,?) ";
$query = $pdo->prepare($sql);// Etape 1  : preparation
$query->execute(array($_POST['titre'],$_POST['publication'], $_SESSION['id'], $_GET['id']));


?>


