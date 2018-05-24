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
    <div class="col-md-3 mb-5">
        <div class="card" style="width: 25rem;">
            <a href="<?=$GLOBALS['appurl']?>/gallerie/fotos?gid=<?= $gallerie->id?>"><img class="card-img-top" src="<?=$GLOBALS['appurl']?>/images/pexels-photo-699782.jpeg" alt="Card image cap"></a>
            <div class="card-body">
                <h3 class="card-title"><?=$gallerie->name?></h3>
                <p class="card-text"><?=$gallerie->description?></p>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-2 text-right" >
                        <img data-toggle="modal" data-target="#delete-modal-<?=$gallerie->id?>" class="pull-right" style="width:100%;cursor:pointer" alt="icon" src="<?=$GLOBALS['appurl']?>/svg/trashcan.svg">
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="<?=$GLOBALS['appurl']?>/gallerie/edit?id=<?=$gallerie->id?>"><img class="pull-right" style="width:100%;" src="<?=$GLOBALS['appurl']?>/svg/pencil.svg" alt="icon"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="delete-modal-<?=$gallerie->id?>" tabindex="-1" role="dialog" aria-labelledby="aria-modal-<?=$gallerie->id?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Wollen Sie die Gallerie <i><?=$gallerie->name?></i> Löschen?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
            <a href="<?=$GLOBALS['appurl']?>/gallerie/delete?id=<?=$gallerie->id?>">Löschen</a> 
        </div>
        </div>
    </div>
    </div>
<?php
    }
}
?>
</div>