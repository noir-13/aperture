<?php
require_once './includes/config.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullName = $_POST['fullName'];
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['ConfirmPassword'];
    $role = $_POST['role'] ?? 'User';

    if (empty($fullName)) {
        $errors['fullName'] = "Full Name is required";
    }

    if (empty($email)) {
        $errors['email'] = "Email is required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please input a valid email";
    } else {
        $query = $conn->prepare("SELECT userID from users WHERE email = ?");
        $query->bind_param("s", $email);
        $query->execute();
        $query->store_result();

        if ($query->num_rows !== 0) {
            $errors['email'] = "Email is already registered";
        }

        $query->close();
    }

    if ($password !== $confirmPassword) {
        $errors['ConfirmPassword'] = "Password do not matched";
    }

    if (empty($errors)) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = $conn->prepare("INSERT into users(FullName, Email, Password, Role) values (?,?,?,?)");
        $query->bind_param("ssss", $fullName, $email, $hashedPassword, $role);

        if ($query->execute()) {
            $query->close();
            echo "<script>
                        alert('Account successfully created');
                        window.location = 'logIn.php';
                  </script>";
            exit;
        } else {
            echo "<script>alert('Something went wrong');</script>";
            $query->close();
            exit;
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.8-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Document</title>
</head>

<body>
    <!-- <?php include './includes/header.php'; ?> -->

    <a href="index.php" class="btn back bg-light border-1 border-secondary shadow">
        <img src="./assets/back.png" class="img-fluid" alt="">
        Back to Home
    </a>


    <section class="w-100 min-vh-100 py-5 px-2 d-flex justify-content-center align-items-center" id="reg">

        <div class="container justify-content-center shadow rounded bg-light p-2 p-md-3">
            <div class="row justify-content-center align-items-center">

                <div class="col">
                    <form action="" method="POST" class="px-md-5 px-1 py-2 justify-content-center">
                        <div class="text-center mb-3">
                            <h1 class=" display-3 m-0 serif">Sign up</h1>
                            <p>Join Aperture today and enjoy seamless booking, transparent pricing, and trusted pros at your fingertips.</p>
                        </div>

                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><img src="./assets/email(1).png" alt=""></span>
                                <div class="form-floating">
                                    <input type="text" name="fullName" id="fullName" placeholder="e.g., Prince Andrew Casiano" class="form-control" value="<?= htmlspecialchars($fullName ?? '') ?>" required>
                                    <label for="fullName" class="form-label">Full Name</label>
                                </div>


                            </div>

                            <?php if (isset($errors['fullName'])): ?>
                                <small class="d-block text-danger"><?php echo $errors['fullName']; ?></small>
                            <?php endif; ?>
                        </div>




                        <div class=" mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><img src="./assets/id-card.png" alt=""></span>
                                <div class="form-floating ">
                                    <input type="email" name="email" id="email" placeholder="e.g., aperture.eventbookings@gmail.com" class="form-control" value="<?= htmlspecialchars($email ?? '') ?>" required>
                                    <label for="email" class="form-label">Email</label>
                                </div>



                            </div>
                            <?php if (isset($errors['email'])): ?>
                                <small class="d-block text-danger"><?php echo $errors['email']; ?></small>
                            <?php endif; ?>

                        </div>







                        <div class="input-group mb-1">
                            <span class="input-group-text"><img src="./assets/padlock.png" alt=""></span>
                            <div class="form-floating">
                                <input type="password" name="password" id="password" placeholder="Enter your password" class="form-control" value="<?= htmlspecialchars($password ?? '') ?>" aria-describedby="passMess" required>
                                <label for="password" class="form-label">Password</label>
                            </div>
                        </div>
                        <span class="form-text d-block mb-3" id="passMess">Password must be at least 8 characters long</span>


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



                        <div class="form-check">
                            <input type="checkbox" name="" id="check" class="form-check-input" required>
                            <label for="check" class="form-check-label"><small>By creating an account, you confirm that you have read, understood, and agreed to the <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#dataModal">Terms and Conditions and Privacy Notice.</a></small></label>


                            <div class="modal fade" id="dataModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="dataModalLabel">Terms and Conditions</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="mb-5">
                                                <h1 class="serif">Aperture Terms and Conditions</h1>

                                                <p>By creating an account in Aperture: Event Photography and Videography Appointment System, you agree to the following:</p>

                                                <ol>
                                                    <li>
                                                        <strong>Account Responsibility</strong>
                                                        <ul>
                                                            <li>You must provide accurate and truthful information when creating an account.</li>
                                                            <li>You are responsible for maintaining the confidentiality of your login details.</li>
                                                            <li>Any activity under your account will be considered your responsibility.</li>
                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <strong>Service Usage</strong>
                                                        <ul>
                                                            <li>The system is intended only for booking, scheduling, and managing event photography and videography services.</li>
                                                            <li>Misuse of the system (e.g., fake bookings, spam, or unauthorized access) may result in account suspension or termination.</li>
                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <strong>Appointment Policy</strong>
                                                        <ul>
                                                            <li>Bookings should be made honestly with the correct details of the event.</li>
                                                            <li>Cancellation or rescheduling must be done within the timeframe set by the service provider.</li>
                                                            <li>Failure to comply may lead to restrictions in future bookings.</li>
                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <strong>Content and Ownership</strong>
                                                        <ul>
                                                            <li>All media files (photos, videos) produced belong to the photographer/videographer unless stated otherwise in the service agreement.</li>
                                                            <li>Clients are prohibited from using Aperture to distribute or upload unlawful or offensive materials.</li>
                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <strong>System Rights</strong>
                                                        <ul>
                                                            <li>The developers reserve the right to update, modify, or suspend the system for improvements or maintenance.</li>
                                                            <li>Terms may be updated from time to time, and users will be notified within the system.</li>
                                                        </ul>
                                                    </li>
                                                </ol>

                                            </div>

                                            <div>
                                                <h1 class="serif">Aperture Privacy Notice</h1>

                                                <p>Your privacy is important to us. When you create an account and use Aperture, we collect and process the following information:</p>

                                                <ol>
                                                    <li>
                                                        <strong>Information We Collect</strong>
                                                        <ul>
                                                            <li>Personal details (name, email, contact number).</li>
                                                            <li>Event details (event type, date, location).</li>
                                                            <li>Login information (email, encrypted password).</li>
                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <strong>How We Use Your Information </strong>
                                                        <ul>
                                                            <li>To process and manage your bookings.</li>
                                                            <li>To contact you about appointments, cancellations, or service updates.</li>
                                                            <li>To improve our system and services.</li>
                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <strong>Data Protection</strong>
                                                        <ul>
                                                            <li>All collected information is stored securely and will not be shared with third parties without your consent, unless required by law.</li>
                                                            <li>We use security measures to protect your account and booking details.</li>
                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <strong>User Rights</strong>
                                                        <ul>
                                                            <li>You have the right to access, update, or delete your account information.</li>
                                                            <li>You may contact us if you have concerns about your data privacy.</li>
                                                        </ul>
                                                    </li>


                                                </ol>
                                            </div>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>











                        <input type="submit" value="Register" class="btn bg-dark text-light w-100 my-2">

                        <p>Already have an account? <a href="logIn.php">Sign in</a></p>

                    </form>
                </div>

                <div class="col d-none d-md-inline">
                    <img src="./assets/undraw_access-account_aydp (1).svg" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section>


    <!-- <?php include './includes/footer.php'; ?> -->

    <script src="../bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>