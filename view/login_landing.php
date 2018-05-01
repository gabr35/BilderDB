<div class="row">
<?php
    //session_start();
    //echo "Hallo ".$_SESSION['name'];
    
    if (count($galleries) === 0) {
?>
<div class="alert alert-info mx-auto" role="alert">
  Du Hast noch Keine Gallerie erstelle <a href="<?=$GLOBALS['appurl']?>/gallerie/createGallery">hier</a> eine
</div>
<?php 
} else {
    foreach ($galleries as $gallerie) {
?>
    <div class="col-md-3 mr-bottom-3">
        <div class="card" style="width: 25rem;">
            <img class="card-img-top" src="<?=$GLOBALS['appurl']?>/images/backlit-dawn-foggy-697243.jpg" alt="Card image cap">
            <div class="card-body">
                <h3 class="card-title"><?=$gallerie->name?></h3>
                <p class="card-text"><?=$gallerie->description?></p>
            </div>
        </div>
    </div>
<?php
    }
}
?>
</div>