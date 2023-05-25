<?php
$fullname = $_POST["fullname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$feedback = $_POST["feedback"];

$con = new mysqli('localhost','root','','dealership');
if($con->connect_error){
    die('connection failed: '.$con->connect_error);
}else{
    $stmt = $con->prepare("insert into feedback(fullname, email, phone, feedback) values(?, ?, ?, ?)");
    $stmt->bind_param("ssis", $fullname, $email, $phone, $feedback);
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
                            <p>Thanks for your feedback &#128512;</p>
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