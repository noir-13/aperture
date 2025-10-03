<?php
require_once './includes/config.php';
session_start();


$errors = [];

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email)) {
        $errors['logIn'] = "Email is required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['logIn'] = "Please use a valid email";
    }

    if (empty($password)) {
        $errors['logIn'] = "Password is required";
    }

    if (empty($errors)) {
        $query = $conn->prepare("SELECT userID, FullName, Email, Password, Role from users WHERE email = ?");
        $query->bind_param("s", $email);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['Password'])) {

                $_SESSION['userId'] = $user['userID'];
                $_SESSION['fullName'] = $user['FullName'];
                $_SESSION['role'] = $user['Role'];

                if ($user['Role'] === 'Admin') {
                    header("Location: admin.php");
                } else {
                    header("Location:home.php");
                }
            }

            $errors['logIn'] = "Email or Password is incorrect";
        }else{
    $errors['logIn'] = "Email or Password is incorrect";
        }
    }

    $query->close();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.8-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="icon" href="./assets/camera.png" type="image/x-icon">
    <title>Aperture</title>
</head>

<body>
    <!-- <?php include './includes/header.php'; ?> -->

    <a href="index.php" class="btn back bg-light border-1 border-secondary shadow">
        <img src="./assets/back.png" class="img-fluid" alt="">
        Back to Home
    </a>


    <section class="w-100 min-vh-100 py-5 px-2 d-flex justify-content-center align-items-center" id="logSection">

        <div class="container justify-content-center shadow rounded bg-light  p-2 p-md-3 p-lg-5 ">
            <div class="row justify-content-center align-items-center">
                <div class="col d-none d-md-inline p-3">
                    <img src="./assets/undraw_secure-login_m11a (1).svg" class="img-fluid" alt="">
                </div>
                <div class="col">
                    <form action="" method="POST" class=" px-1 py-3 justify-content-center">
                        

                        <div class="text-center mb-3">
                            <h1 class=" display-3 m-0 serif">Login</h1>
                            <p>Please enter your registered email address and password to securely access your Aperture account.</p>
                        </div>


                        <div class="input-group mb-3">
                            <span class="input-group-text"><img src="./assets/email(1).png" alt=""></span>
                            <div class="form-floating">
                            <input type="email" name="email" id="email" placeholder="e.g., Prince Andrew Casiano" class="form-control" required>
                            <label for="email">Email</label>
                        </div>
                        </div>

                        <div class="input-group ">
                            <span class="input-group-text"><img src="./assets/padlock.png" alt=""></span>
                            <div class="form-floating">
                            <input type="password" name="password" id="password" placeholder="Enter your password" class="form-control" required>
                            <label for="password">Password</label>
                        </div>
                        </div>

                        
                        <?php if (isset($errors['logIn'])): ?>
                            <small class="d-block text-danger mb-3"><?php echo $errors['logIn']; ?></small>
                        <?php endif; ?>

                        

                        

                        <div class="d-flex justify-content-between align-items-center py-2">
                            <div class="form-check m-0">
                                <input class="form-check-input" type="checkbox" name="" id="rememberMe">
                                <label for="rememberMe">Remember me</label>
                            </div>
                            <a href="./forgot1.php" class="text align-self-end">Forgot Password?</a>
                        </div>




                        <input type="submit" value="LogIn" class="btn bg-dark text-light w-100 my-2">

                        <p>Don't have an account? <a href="register.php" class="">Register now</a></p>
                        

                    </form>
                </div>
            </div>
        </div>

    </section>

    <!-- <?php include './includes/footer.php'; ?> -->

    <script src="../bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>