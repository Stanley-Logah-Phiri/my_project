<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Registration</h2>
            <ol>
                <li><a href="index.php">Home</a></li>
                <li>Registration</li>
            </ol>
            </div>

        </div>
        </section><!-- End Breadcrumbs -->
        
        <section id="contact" class="contact">
            <div class="container">

                <div class="row mt-1 justify-content-center" data-aos="fade-up">
                    <?php
                        if(isset($_SESSION['errorRegister'])){
                        echo "
                            <div class='alert callout alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-warning'></i> Error!</h4>
                            ".$_SESSION['errorRegister']."
                            </div>
                        ";
                        unset($_SESSION['errorRegister']);
                        }
                        if(isset($_SESSION['successRegister'])){
                        echo "
                            <div class='alert alert-success alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check'></i> Success!</h4>
                            ".$_SESSION['successRegister']."
                            </div>
                        ";
                        unset($_SESSION['successRegister']);
                        }
                    ?>
                    <div class="col-lg-4">
                        <form action="inc/register_inc.php" method="post" role="form" class="form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group">
                                    <label for="Email" class="text-control">Full Name</label>
                                    <input type="text" class="form-control mt-2 mb-2" name="full_name" id="email" placeholder="Enter Your Full Name" required>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="Email" class="text-control">Email</label>
                                    <input type="email" class="form-control mt-2 mb-2" name="email" id="email" placeholder="Enter Your Email" required>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control mt-2 mb-2" name="password" id="email" placeholder="Enter Your Password" required>
                            </div>
                            <div class="form-group">
                                <label for="Password">Confirm Password</label>
                                <input type="password" class="form-control mt-2 mb-2" name="password_confirm" id="email" placeholder="Confirm Your Password" required>
                            </div>
                            <div class="form-group">
                                <label for="profilepic">Profile picture(optional)</label>
                                <input type="file" class="form-control mt-2 mb-2" name="profilepic" id="profilepic" accept = ".jpg, .png, .jpeg" optional>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 form-group mt-2 mt-md-0">
                                    <button style="width: 100%;" class="btn btn-success btn-flat" name="register_btn" type="submit"><span><b>Register</b></span></button>
                                </div>
                                <p class="medium mb-0 text-center">Already Have Account? <a href="login.php">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
<?php include('inc/footer.php'); ?>
<?php include('inc/scripts.php'); ?>
