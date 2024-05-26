<?php

include_once LAYOUTS . 'main_head.php';

setHeader($d);
    
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="mt-5"><?=$d->code?></h1>
            <h2>Página no encontrada</h2>
            <p>Lo sentimos, la página que busca no existe o ha sido movida</p>
            <a href="/" class="btn btn-secondary">Volver al inicio</a>
        </div>
    </div>
</div>

<?php

include_once LAYOUTS . 'main_foot.php';