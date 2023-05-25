<?php
$fullname = $_POST["fullname"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$file1 = $_FILES["file1"]["name"];
$file2 = $_FILES["file2"]["name"];
$file3 = $_FILES["file3"]["name"];
$card_name = $_POST["card_name"];

$con = new mysqli('localhost','root','','dealership');
if($con->connect_error){
    die('connection failed: '.$con->connect_error);
}else{
    $tempfile1 = $_FILES["file1"]["tmp_name"];
    $tempfile2 = $_FILES["file2"]["tmp_name"];
    $tempfile3 = $_FILES["file3"]["tmp_name"];
    $folder1 = "database/file1/".$file1;
    $folder2 = "database/file2/".$file2;
    $folder3 = "database/file3/".$file3;
    move_uploaded_file($tempfile1, $folder1);
    move_uploaded_file($tempfile2, $folder2);
    move_uploaded_file($tempfile3, $folder3);
    $stmt = $con->prepare("insert into cars(fullname, email, tel, card_name) values(?, ?, ?, ?)");
    $stmt->bind_param("ssis", $fullname, $email, $tel, $card_name);
    $stmt->execute();
    $stmt->close();
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body class="thank">
<secion class="thank_you">
        <div class="thankyou container">
            <div class="row">
                <div class="col-sm-5">
                    <div class="text-section">
                        <form action="">                            
                            <p>Your car is booked. &#128512;</p>
                            <button type="button" class="btn" onclick="location.href='home.html'">Home</button>
                        </form>          
                    </div>
                </div>
            </div>
        </div>
    </secion>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>