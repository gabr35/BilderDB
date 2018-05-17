<div class="row">
<?php
    //session_start();
    //echo "Hallo ".$_SESSION['name'];
    
    if (count($fotos) === 0) {
?>
<div class="alert alert-info mx-auto" role="alert">
  Du Hast noch Keine Foto, lade <a href="<?=$GLOBALS['appurl']?>/gallerie/createGallery">hier</a> hoch
</div>
<?php 
} else {
    foreach ($fotos as $foto) {
?>
    <div class="col-md-3 mb-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <a href="#"><img class="card-img-top" src="<?=$GLOBALS['appurl']?>/images/backlit-dawn-foggy-697243.jpg" alt="Card image cap"></a>
            </div>
        </div>
    </div>
    
<?php
    }
}
?>
</div>