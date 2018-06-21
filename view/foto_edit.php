<div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Bearbeite dein Foto</strong></h1>
                            
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
                        			<h3>Berbeite dein Foto</h3>
                            		<p>Gebe die Angaben an</p>
                        		</div>
                        		<div class="form-top-right">
                        			
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="<?=$GLOBALS['appurl'].'/gallerie/doEditFoto?id='.$foto->id.'&gid='.$foto->gid?>" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-name">Name</label>
			                        	<input type="text" name="name" placeholder="Name..." class="form-username form-control" id="form-name" value="<?=$foto->name?>">
                                        
                                        
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-description">Description</label>
			                        	<textarea type="password" name="description" placeholder="Beschreibung..." class="form-password form-control" id="form-description"><?=$foto->description?></textarea>
			                        </div>
			                        <button type="submit" class="btn">Speichern</button>
                                    <a class="btn btn-danger" href="<?=$GLOBALS['appurl'].'/gallerie/deleteFoto?id='.$foto->id.'&gid='.$foto->gid.'&path='.$foto->path.'&path_small='.$foto->thumpnail?>" role="button">Löschen</a>
			                    </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>   
        </div>


        