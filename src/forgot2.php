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





    <section class="w-100 min-vh-100  p-0 p-sm-2  d-flex justify-content-center align-items-center" id="forgot1">

        <div class="container justify-content-center px-4 p-md-3">
            <div class="row justify-content-center align-items-center bg-white shadow p-3 rounded-5">
                <div class="col d-none d-md-inline p-4 rounded-4 overflow-hidden bg-secondary">
                    <img src="./assets/undraw_forgot-password_nttj.svg" class="img-fluid" alt="">
                </div>
                <div class="col">
                    <form action="" method="POST" class=" px-1 py-3 justify-content-center">

                        <div class="text-center mb-3">
                            <h1 class=" display-3 m-0 serif">Create new Password</h1>
                            <p>Your new password should be at least 8 characters long.</p>
                        </div>


                         <!-- Password -->

                        <div class="mb-2">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <!-- Confirm Password -->

                        <div class="mb-2">
                            <label class="form-label" for="confirmPassword">Confirm Password</label>
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" required>
                        </div>


                        <!-- <input type="submit" value="Send Verification Code" class="btn bg-dark text-light w-100 my-2 py-2"> -->

                        <div class="my-3">
                            <a href="forgot2.php" class="btn bg-dark text-light w-100 mb-2">Confirm new password</a>
                            <a href="login.php" class="btn bg-light text-dark border w-100 mb-2">Back to Login</a>
                        </div>
                        

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