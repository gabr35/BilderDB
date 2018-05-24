<div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Lade eine Foto hoch</strong></h1>
                            
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
                        			<h3>Lade ein foto hoch</h3>
                            		<p>Gebe die Angaben an</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="<?=$GLOBALS['appurl'].'/gallerie/doCreateFoto?gid='.$gid?>" method="post" enctype="multipart/form-data" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-picture">Bild</label>
			                        	<input type="file" name="picture" placeholder="Bild..." class="form-username form-control" id="form-picture">
			                        </div>
                                    <div class="form-group">
			                    		<label class="sr-only" for="form-name">Bild</label>
			                        	<input type="text" name="name" placeholder="Name..." class="form-username form-control" id="form-name">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-description">Description</label>
			                        	<textarea type="password" name="description" placeholder="Beschreibung..." class="form-password form-control" id="form-description"></textarea>
			                        </div>
			                        <button type="submit" class="btn">Erstellen</button>
			                    </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>   
        </div>


        