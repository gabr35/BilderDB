        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Regristration</strong></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        <?php
                            if (isset($_GET['error'])) {
                                $error = $_GET['error'];
                                echo "<div class='alert alert-danger' style='margin-top:20px'>
                                        <strong>$error</strong>
                                    </div>";
                            } 
                        ?>
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Regristriere dich</h3>
                            		<p>Gib deine Personalien an:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="<?=$GLOBALS['appurl'].'/login/doRegistration?update'?>" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="name" value="<?=$user->name?>" placeholder="Username..." class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
			                    		<label class="sr-only" for="form-email">Email</label>
			                        	<input type="text" name="email" value="<?=$user->email ?>" placeholder="Email..." class="form-username form-control" id="form-email">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" value="" placeholder="Password..." class="form-password form-control" id="form-password">
                                    </div>
                                    <div class="form-group">
			                        	<label class="sr-only" for="form-password2">Password Bestätigen</label>
			                        	<input type="password" name="password_bestätigen" value="" placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" class="btn">Speichern</button>
                                    <a class="btn btn-danger" href="<?=$GLOBALS['appurl'].'/login/deleteUser'?>" role="button">Löschen</a>
			                    </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        


        <!-- Javascript -->
        <script src="<?=$GLOBALS['appurl']?>/assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?=$GLOBALS['appurl']?>/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=$GLOBALS['appurl']?>/assets/js/jquery.backstretch.min.js"></script>
        <script src="<?=$GLOBALS['appurl']?>/assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->