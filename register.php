<!-- <?php
include('connect.php');

if(isset($_POST['register'])){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $telp = $_POST["telp"];
    $password = $_POST["password"];
    $query = "INSERT INTO user (email, username, telp, password)
              VALUES ('$email', '$username', '$telp', '$password')";

    if (mysqli_query($connect, $query)) {
       header("Location: login.html");
    } else {
        echo "Gagal Mendaftar : " . mysqli_error($connect);
    }
}
?> -->