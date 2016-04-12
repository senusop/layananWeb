<?php
if($this->session->userdata('adminUsername') && $this->session->userdata('adminPassword'))
		{
			redirect('dashboard');
		}
?>
<!DOCTYPE html>
<!--[if IE 9]>        
 <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!-->
 <!--<![endif]-->
 <html class="no-focus">
    <head>
	 <title><?php echo $judul;?></title>
        <?php echo $head;?>
    </head>
 <body>
        <!-- Login Content -->
        <div class="content overflow-hidden">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                    <!-- Login Block -->
                    <div class="block block-themed animated fadeIn">
                        <div class="block-header bg-success">
                            <ul class="block-options">
                                <li>
                                    <a href="base_pages_reminder.html">Forgot Password?</a>
                                </li>
                                <li>
                                    <a href="base_pages_register.html" data-toggle="tooltip" data-placement="left" title="New Account"><i class="si si-plus"></i></a>
                                </li>
                            </ul>
                            <h3 class="block-title">Login</h3>
                        </div>
                        <div class="block-content block-content-full block-content-narrow">
                            <!-- Login Title -->
                            <h1 class="h2 font-w600 push-30-t push-5">OneUI</h1>
                            <p>Welcome, please login.</p>
                            <!-- END Login Title -->

                            <!-- Login Form -->
                            <!-- jQuery Validation (.js-validation-login class is initialized in js/pages/base_pages_login.js) -->
                            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-login form-horizontal push-30-t push-50" action="<?php echo base_url('login/action');?>" method="POST">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-success floating">
                                            <input class="form-control" type="text" id="login-username" name="login-username">
                                            <label for="login-username"><i class="si si-user"></i> Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-success floating">
                                            <input class="form-control" type="password" id="login-password" name="login-password">
                                            <label for="login-password"><i class="si si-key"></i> Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
										
											<div class="col-lg-6">
												<?php echo $captcha;?>
											</div>
											<div class="col-lg-6">
												<div class="form-material form-material-success floating">
													<input type="text" class="form-control" id="login-code" maxlength=5 name="login-code">
													<label for="login-code"><i class="si si-puzzle"></i> Code</label>
												</div>
											</div>
										
                                    </div>
                                </div>
								<div class="form-group">
									<div class="col-xs-12">
										<?php 
											$message = $this->session->flashdata('message');
											if($message)
											{
												echo "<div class=\"alert alert-danger alert-dismissable\">
														<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
														<p><i class=\"fa fa-warning\"></i> $message</p>
													</div>";

											}?>
									</div>
								</div>
								
                                <div class="form-group">
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <button class="btn btn-square btn-block btn-success " type="submit"><i class="fa fa-long-arrow-right pull-right"></i> Log in</button>
                                    </div>
                                </div>
                            </form>
                            <!-- END Login Form -->
                        </div>
                    </div>
                    <!-- END Login Block -->
                </div>
            </div>
        </div>
        <!-- END Login Content -->

        <!-- Login Footer -->
        <div class="push-10-t text-center animated fadeInUp">
            <small class="text-muted font-w600"><span class="js-year-copy"></span> &copy; OneUI 1.0</small>
        </div>
        <!-- END Login Footer -->

    </body>
</html>