<?php
error_reporting(0);
session_start();
$username = $_SESSION['username'];

if (!isset($username)) {
?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal("Login Dulu!", "You clicked the button!", "success");
        document.location = 'sign_in.php';
    </script>
<?php
    exit;
}
?>