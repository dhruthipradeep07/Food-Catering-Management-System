<?php
$n = $_GET["name"];
$g = $_GET["Gender"];
$p = $_GET["phone"];
$e = $_GET["email"];
$a = $_GET["password"];

$name = "localhost";
$uname = "root";
$password = "";
$db = "catering";

$conn = new mysqli($name, $uname, $password, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    $sql = "SELECT email FROM register WHERE email='$e'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "User exists";
    } else {
        $stmt = $conn->prepare("INSERT INTO register (name, gender, phone, email, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $n, $g, $p, $e, $a);
        if ($stmt->execute()) {
            $receiver = $e;
            $subject = "From: $n <$e>";
            $body = "Name: $n\nEmail: $e\n";
            $sender = "From: cateringservice@gmail.com";

            if (mail($receiver, $subject, $body, $sender)) {
                echo "Success";
            } else {
                echo "Email problem!";
            }
            header("Location: login.html");
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
$conn->close();
?>