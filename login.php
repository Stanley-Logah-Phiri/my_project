<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                <h2>Login</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Login</li>
                </ol>
                </div>

            </div>
       
        </section><!-- End Breadcrumbs -->
        
        <section id="contact" class="contact">
            <div class="container">

                <div class="row mt-5 justify-content-center" >
                    <div class="col-lg-4">
                        <?php
                            if(isset($_SESSION['errorLogin'])){
                            echo "
                                <div class='alert callout alert-danger alert-dismissible'>
                                    <button type='reset' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                    <h4><i class='icon fa fa-warning'></i>Error!</h4>
                                    ".$_SESSION['errorLogin']."
                                </div>
                            ";
                            unset($_SESSION['errorLogin']);
                            }
                        ?>
                        <form action="inc/login_inc.php" method="post" role="form" >
                            <div class="row">
                                <div class="form-group">
                                    <label for="Email" class="text-control">Email</label>
                                    <input type="email" class="form-control mt-3 mb-2" name="email" id="email" placeholder="Enter Your Email" required>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control mt-3 mb-2" name="password" id="email" placeholder="Enter Your Password" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 form-group mt-3 mt-md-0">
                                    <button style="width: 100%;" class="btn btn-success btn-flat" name="login_btn" type="submit"><span><b>Login</b></span></button>
                                </div>
                                <p class="medium mb-0 text-center">Don't have account? <a href="register.php">Create Account</a></p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
<?php include('inc/footer.php'); ?>
<?php include('inc/scripts.php'); ?>
