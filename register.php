<?php
include("partials/header.php");
include("partials/navigation.php");

$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirm_password = mysqli_real_escape_string($conn, $_POST["confirm_password"]);

    // Check if the password and confirmation match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match";
    } else {
        // Check if username already exists
        if (user_exists($conn, $username)) {
            $error = "Username already exists, please choose another";
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users(username, password, email) VALUES('$username','$passwordHash','$email')";

            if (mysqli_query($conn, $sql)) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                redirect("admin.php");
                exit;
            } else {
                $error = "Something went wrong: " . mysqli_error($conn);
            }
        }
    }
}
?>

<div class="container">
    <div class="form-container">
        <form action="" method="post">
            <h2>Create your Account</h2>
            
            <?php if ($error): ?>
                <p style="color:red;"><?php echo $error; ?></p>
            <?php endif; ?>

            <label for="username">Username:</label>
            <input 
                type="text" 
                name="username" 
                placeholder="Enter your username" 
                required 
                value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
            >

            <label for="email">Email:</label>
            <input 
                type="email" 
                name="email" 
                placeholder="Enter your email" 
                required 
                value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
            >

            <label for="password">Password:</label>
            <input 
                type="password" 
                name="password" 
                placeholder="Enter your password" 
                required
            >

            <label for="confirm_password">Confirm Password:</label>
            <input 
                type="password" 
                name="confirm_password" 
                placeholder="Confirm password" 
                required
            >

            <input type="submit" value="Register">
        </form>
    </div>
</div>

<?php include("partials/footer.php"); ?>

<?php
mysqli_close($conn);
?>
