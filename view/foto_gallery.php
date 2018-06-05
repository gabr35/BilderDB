<div class="row">
<?php
    //session_start();
    //echo "Hallo ".$_SESSION['name'];
    
    if (count($fotos) === 0) {
?>
<div class="alert alert-info mx-auto" role="alert">
  Du Hast noch Keine Foto, lade <a href="<?=$GLOBALS['appurl']?>/gallerie/createFoto?gid=<?= $gid?>">hier</a> hoch
</div>
<?php 
} else {
?>

<?php
    foreach ($fotos as $foto) {
?>
    <div class="col-md-3 mb-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <img class="card-img-top materialboxed" src="<?= $GLOBALS['appurl']."/".$foto->thumpnail ?>" alt="Card image cap">
            </div>
        </div>
    </div>
    
<?php
    }
?>
<div class="col-md-3 mb-5 order-12">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <a href="<?=$GLOBALS['appurl']?>/gallerie/createFoto?gid=<?= $gid?>"><img class="card-img-top" style="width:50%" src="<?=$GLOBALS['appurl']?>/svg/plus.svg" alt="Card image cap"></a>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
