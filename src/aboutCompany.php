<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$error = '';
$success = '';


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $fullName = $_POST['fullName'];
    $email = trim($_POST['email']);
    $message = $_POST['mess'];

    $mail = new PHPMailer(true);

    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'aperture.eventbookings@gmail.com';
        $mail->Password = 'pulj cvvo hepm zeob';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, $fullName);
        $mail->addAddress('aperture.eventbookings@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'New Contact form submission';
        $mail->Body = "
        
        <strong>Name: </strong> $fullName <br>
        <strong>Email: </strong> $email <br>
        <strong>Message: </strong><br>$message
        ";

        $mail->send();

        $success = 'Message sent';

    }catch(Exception $e){
        echo '<script>console.log("$e.error()")</script>';
        $error = 'Something went wrong';
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
    <link rel="icon" href="./assets/camera.png" type="image/x-icon">
    <title>Aperture</title>
</head>

<body>
    <?php include './includes/header.php'; ?>

    <section class="w-100 min-vh-100 p-5 d-flex justify-content-center align-content-center position-relative" id="aboutCompanyHero">
        <div class="overlay"></div>

        <div class="container position-absolute">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-3 fw-bold text-light m-0">APERTURE</h1>
                    <p class="text-light fs-5 fw-light">We make finding the perfect photographer or videographer effortless, so you can focus on creating memories.</p>
                    <div class="d-flex flex-column flex-md-row gap-3">
                        <a href="#" class="btn border-light px-4 text-light rounded">Book Now</a>
                        <a href="#" class="btn bg-light text-dark px-4 rounded">Sign Up</a>
                    </div>
                </div>
                <div class="col">

                </div>
            </div>
        </div>

        
            <a href="#company"><img  class="downArrow" src="./assets/down-chevron.png" alt=""></a>
      

    </section>

    <section class="w-100 min-vh-100 px-2 py-5 d-flex justify-content-center align-items-center" id="company">

        <div class="container">
            <div class="row justify-content-center align-items-start my-5 gap-2">

                <div class="col justify-content-center align-items-center d-flex">
                    <img src="./assets/pexels-cottonbro-5077049.jpg" class="img-fluid rounded-4" alt="">
                </div>
                <div class="col-md-6">
                    <div class="mission">
                        <h1 class="fw-bold serif">Our Mission & Values</h1>
                        <p>We believe every event deserves professional capture—without the stress of traditional booking hurdles.</p>
                        <h4 class="serif">Mission</h4>
                        <p>To empower clients and creatives by providing an intuitive platform for real-time bookings, clear pricing, and guaranteed quality. We solve the chaos of searching for photographers and videographers, making it easy to book for weddings, corporate events, or creative shoots with confidence.</p>
                        <h4 class="serif">Core Values</h4>
                        <ul>
                            <li><strong>Transparency: </strong>Upfront pricing with no hidden fees, see everything before you book.</li>
                            <li><strong>Reliability: </strong>Real-time availability and on-time delivery, backed by trusted professionals.</li>
                            <li><strong>Quality: </strong>High-resolution editing and comprehensive coverage for all your moments.</li>
                            <li><strong>Simplicity: </strong>Follow our 4-step process: Submit, Confirm, Book, Enjoy—no more endless searches.</li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="row justify-content-center align-items-start mb-5 gap-2">
                <div class="col order-md-1 order-2">
                    <div class="">
                        <h1 class="fw-bold serif">Our Story: Born from Booking Frustrations</h1>
                        <p>Finding the perfect photographer shouldn't be this hard—that's the insight that sparked Aperture. We started as a response to the endless challenges clients face: sifting through portfolios without clear availability, worrying about hidden fees, and struggling to compare styles for events like weddings or corporate gatherings. As a team passionate about photography and videography, we built Aperture to change that.</p>

                        <p>From our first prototype, we've focused on creating a platform where trusted professionals meet eager clients seamlessly. Today, Aperture connects you with experienced creatives for everything from engagements and birthdays to creative shoots and behind-the-lens sessions, ensuring quality work and on-time delivery every time.
                        </p>

                        <p>
                            Our journey began with identifying pain points in the creative industry: No real-time booking tools, uncertainty in pricing, and stress over timelines. We addressed these head-on by integrating features like instant availability checks, transparent hourly rates (starting at $80 for Basic packages), and custom editing options. As we grew, so did our commitment to excellence—guaranteeing high-resolution deliverables and pre-event consultations to match your vision perfectly.
                        </p>

                        <p>
                            What sets us apart? We're not just a booking site; we're a partner in your story. With a focus on user-friendly design, we've helped hundreds capture moments without the hassle, from intimate celebrations to large-scale events.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 order-md-2 order-1 justify-content-center align-items-center d-flex">
                    <img src="./assets/pexels-cottonbro-5077049.jpg" class="img-fluid rounded-4" alt="">
                </div>


            </div>
        </div>

    </section>

   

    <!------------------------------------- ABOUT US SECTION-------------------------------------------->


  <section id="aboutUs" class="w-100 min-vh-100 bg-white  d-flex flex-column justify-content-center align-items-center position-relative py-5 px-3 text-light gap-5">
    <div class="container-fluid">
      <div class="row justify-content-center mb-5">
        <div class="col-md-10 text-center">
          <h1 class="display-4 serif">Meet the team behind the lens</h1>
        </div>
      </div>

      <div class="members row">

        <div class="card profileCard text-danger position-relative justify-content-center align-items-center px-2 py-5 shadow">
          <div class="cardColor"></div>
          <img src="./assets/pic.png" alt="" class="shadow-sm pfp">
          <div class=" textContent mb-3 text-center">
            <h1 class="fw-bold serif">Prince Andrew Casiano</h1>
            <p class="text-dark fw-normal">Frontend Developer</p>
          </div>
          <div class="socmed justify-content-center align-items-center d-flex flex-row gap-3">
            <a href="https://www.facebook.com/prince.andrew.casiano.2024" target="_blank"><img src="./assets/facebook-app-symbol.png" alt="Facebook" ></a>
            <a href="https://github.com/noir-13" target="_blank"><img src="./assets/github.png" alt="GitHub"></a>
            <a href="https://www.instagram.com/kry_1101/" target="_blank"><img src="./assets/instagram.png" alt="Instagram"></a>
            <a href="https://x.com/KazuCos13" target="_blank"><img src="./assets/twitter.png" alt="Twitter"></a>
          </div>
          <a href="aboutUs.php?member=casiano" class="btn border-dark text-dark learnMore">Learn more</a>
        </div>

        <div class="card profileCard text-danger position-relative justify-content-center align-items-center px-2 py-5 shadow">
          <div class="cardColor"></div>
          <img src="./assets/buban.png" alt="" class="shadow-sm pfp">
          <div class=" textContent mb-3 text-center">
            <h1 class="fw-bold serif">Aljhon Buban </h1>
            <p class="text-dark fw-normal">Frontend Developer</p>
          </div>
          <div class="socmed justify-content-center align-items-center d-flex flex-row gap-3">
            <a href="#" target="_blank"><img src="./assets/facebook-app-symbol.png" alt="Facebook"></a>
            <a href="#" target="_blank"><img src="./assets/github.png" alt="GitHub"></a>
            <a href="#" target="_blank"><img src="./assets/instagram.png" alt="Instagram"></a>
            <a href="#" target="_blank"><img src="./assets/twitter.png" alt="Twitter"></a>
          </div>
          <a href="aboutUs.php?member=buban" class="btn border-dark text-dark learnMore">Learn more</a>
        </div>


        <div class="card profileCard text-danger position-relative justify-content-center align-items-center px-2 py-5 shadow">
          <div class="cardColor"></div>
          <img src="./assets/centino.png" alt="" class="shadow-sm pfp">
          <div class=" textContent mb-3 text-center">
            <h1 class="fw-bold serif">Mark Anthony Centino</h1>
            <p class="text-dark fw-normal">Frontend Developer</p>
          </div>
          <div class="socmed justify-content-center align-items-center d-flex flex-row gap-3">
            <a href="#" target="_blank"><img src="./assets/facebook-app-symbol.png" alt="Facebook"></a>
            <a href="#" target="_blank"><img src="./assets/github.png" alt="GitHub"></a>
            <a href="#" target="_blank"><img src="./assets/instagram.png" alt="Instagram"></a>
            <a href="#" target="_blank"><img src="./assets/twitter.png" alt="Twitter"></a>
          </div>
          <a href="aboutUs.php?member=centino" class="btn border-dark text-dark learnMore">Learn more</a>
        </div>

        <div class="card profileCard text-danger position-relative justify-content-center align-items-center px-2 py-5 shadow">
          <div class="cardColor"></div>
          <img src="./assets/cereno.png" alt="" class="shadow-sm pfp">
          <div class=" textContent mb-3 text-center">
            <h1 class="fw-bold serif">Marianne Joi Cereno</h1>
            <p class="text-dark fw-normal">Frontend Developer</p>
          </div>
          <div class="socmed justify-content-center align-items-center d-flex flex-row gap-3">
            <a href="https://www.facebook.com/mariannejoi.cereno" target="_blank"><img src="./assets/facebook-app-symbol.png" alt="Facebook"></a>
            <a href="https://github.com/Android18-cyber" target="_blank"><img src="./assets/github.png" alt="GitHub"></a>
            <a href="https://www.instagram.com/marian.joixzs?igsh=MXQzZ3dydjY0eGxiMQ==" target="_blank"><img src="./assets/instagram.png" alt="Instagram"></a>
            <a href="https://x.com/mariannemalakas" target="_blank"><img src="./assets/twitter.png" alt="Twitter"></a>
          </div>
          <a href="aboutUs.php?member=cereno" class="btn border-dark text-dark learnMore">Learn more</a>
        </div>

        <div class="card profileCard text-danger position-relative justify-content-center align-items-center px-2 py-5 shadow">
          <div class="cardColor"></div>
          <img src="./assets/conosido.png" alt="" class="shadow-sm pfp">
          <div class=" textContent mb-3 text-center">
            <h1 class="fw-bold serif">Dionilo Conosido</h1>
            <p class="text-dark fw-normal">Frontend Developer</p>
          </div>
          <div class="socmed justify-content-center align-items-center d-flex flex-row gap-3">
            <a href="#" target="_blank"><img src="./assets/facebook-app-symbol.png" alt="Facebook"></a>
            <a href="#" target="_blank"><img src="./assets/github.png" alt="GitHub"></a>
            <a href="#" target="_blank"><img src="./assets/instagram.png" alt="Instagram"></a>
            <a href="#" target="_blank"><img src="./assets/twitter.png" alt="Twitter"></a>
          </div>
          <a href="aboutUs.php?member=conosido" class="btn border-dark text-dark learnMore">Learn more</a>
        </div>


      </div>
    </div>
  </section>

  <!------------------------------------- ABOUT US SECTION-------------------------------------------->

     <section class="w-100 min-vh-100  py-5 px-1 d-flex justify-content-center align-content-center position-relative" id="contact">

     <div class="container d-flex justify-content-center align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-lg-8 border border-black rounded-5 p-md-5 px-3 py-5">

                <form method="POST" class="text-light justify-content-center d-flex flex-column align-items-center"
                id="contactForm">

                    <h1 class="fw-bold display-3 serif">Contact us</h1>

                    <div class="w-100 mb-3">
                        <label for="#fullName" class="form-label ">Full Name</label>
                    <input type="text" name="fullName" id="fullName" class="form-control " required>
                    </div>

                    <div class="w-100 mb-3">
                        <label for="#email" class="form-label ">Email</label>
                    <input type="email" name="email" id="email" class="form-control " required>
                    </div>

                    <div class="w-100 mb-3 d-flex flex-column">
                        <label for="#mess" class="form-label ">Message</label>
                        <textarea name="mess" id="mess" class="form-control bg-light" rows="5" required></textarea>
                    </div>
                    
                    <input type="submit" class="btn text-light w-100" value="Send Message">

                   

                </form>

                <?php if(isset($success)): ?>
                <h4 class="text-success"><?php echo "$success" ?></h4>
                <?php endif?>

            </div>
        </div>
     </div>

     </section>



    <?php include './includes/footer.php'; ?>
    <script src="../bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/script.js"></script>
</body>

</html>