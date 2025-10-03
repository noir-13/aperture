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





    <section class="w-100 min-vh-100 py-5 px-2 d-flex justify-content-center align-items-center" id="forgot2">

        <div class="container justify-content-center shadow rounded bg-light p-2 p-md-3 p-lg-5 ">
            <div class="row justify-content-center align-items-center">
                <div class="col d-none d-md-inline">
                    <img src="./assets/undraw_forgot-password_nttj.svg" class="img-fluid" alt="">
                </div>
                <div class="col">
                     <form action="" method="POST" class=" px-1 py-3 justify-content-center">
                        

                        <div class="text-center mb-3">
                            <h1 class=" display-3 m-0 serif">Create a new password</h1>
                            <p>Your new password should be at least 8 characters long.</p>
                        </div>


                        <div class="input-group mb-3">
                            <span class="input-group-text"><img src="./assets/padlock.png" alt=""></span>
                            <div class="form-floating">
                                <input type="password" name="password" id="password" placeholder="Enter your password" class="form-control" value="<?= htmlspecialchars($password ?? '') ?>" aria-describedby="passMess" required>
                                <label for="password" class="form-label">Password</label>
                            </div>
                        </div>
                       


                        <div class="mb-3">

                            <div class="input-group ">
                                <span class="input-group-text"><img src="./assets/padlock.png" alt=""></span>
                                <div class="form-floating">
                                    <input type="password" name="ConfirmPassword" id="ConfirmPassword" placeholder="Confirm your Password" class="form-control  " value="<?= htmlspecialchars($confirmPassword ?? '') ?>" required>
                                    <label for="ConfirmPassword" class="form-label">ConfirmPassword</label>

                                </div>

                            </div>
                            <?php if (isset($errors['ConfirmPassword'])): ?>
                                <small class="d-block text-danger"><?php echo $errors['ConfirmPassword']; ?></small>
                            <?php endif; ?>
                        </div>

                     

                        

                     



                        <input type="submit" value="Reset Password" class="btn bg-dark text-light w-100 py-2 my-1">
                        <a href="login.php" class="btn bg-light text-dark border w-100 my-2 py-2">Back to Login</a>

                        

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