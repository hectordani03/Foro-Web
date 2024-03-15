<?php

use user\models\mainModel;

$data = new mainModel();

$publication = $data->selectData("normal", "posts", "*");
?>
<?php foreach ($publication as $pt) { ?>
	<script src="<?php echo APP_URL; ?>js/ajax.js"></script>

    <div class="col-12 col-md-12 col-lg-4">
        <div class="card-text-light text-center bg-dark pb-2 peliculas-recientes peliculas-recientes-dk">
            <div class="card-body text-white">
                <div class="img-area mb-4">
                    <img src="<?php echo APP_URL; ?>assets/post_img/<?php echo $pt['img']; ?>" class="img-fluid img-recientes" alt="">
                </div>
                <p class="lead">
                    <t><?php echo $pt['content']; ?></t>
                </p>
                <p class="lead">
                    <t><?php echo $pt['category']; ?></t>
                </p>
                <a class="miBoton miBoton-2 btn btn-primary mt-3 transUp" target="_blank">Ver Pelicula</a>

                <a class="miBoton miBoton-2 btn btn-primary mt-3 transUp" target="_blank">Ver Trailer</a>

            </div>
        </div>
    </div>
<?php } ?>



<button class="button" id="openModalBtn">Add POST</button>



<div id="myModal" class="modal">
    <form class="ajaxForm" action="<?php echo APP_URL; ?>user/ajax/postData.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Add Post</h2>
            </div>
            <div class="modal-body">
                <input type="hidden" name="post_module" value="addPost">
                <input type="hidden" name="id_user" value="<?php $_SESSION['id']; ?>">

                <label for="content">Content</label>
                <input class="form-control" type="text" name="content" required>

                <label for="category">Category</label>
                <input class="form-control" type="text" name="category" required>

                <label class="file-label">
                    <input class="file-input form-control" type="file" name="post_img" accept=".jpg, .png, .jpeg" required>
                    <span class="file-cta">
                        <span class="file-label">
                            Select Picture
                        </span>
                    </span>
                    <span class="file-name">JPG, JPEG, PNG. (MAX 5MB)</span>
                </label>

            </div>
            <div class="modal-footer">
                <button type="reset" class="button is-link is-light is-rounded">Cancel</button>
                <button type="submit" class="button is-info is-rounded">Add</button>
            </div>
        </div>
    </form>
</div>