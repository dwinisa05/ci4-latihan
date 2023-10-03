<!-- call a layouts -->
<?= $this->extend('layouts/mainLayouts') ?>
<?= $this->section('content') ?>
<!-- form search -->
<div class="col pt-2">
    <form action="/home" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search Movie" name="search">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
    </form>
</div>
<div class="row">
    <?php foreach ($data as $val) : ?>
        <div class="col-md-3 col-sm-6 pt-4">
            <div class="card" style="width: 18rem;">
                <img src="<?= $base_url . $val["poster_path"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $val['title'] ?></h5>
                    <p class="card-text">
                        <?= $val['release_date'] ?>
                    </p>
                    <p class="card-text">
                        <!-- limit caracter -->
                        <?= substr($val['overview'], 0, 100) ?>...
                    </p>
                    <a href="#" class="btn btn-primary" onclick="addFav(<?= $val['id'] ?>)">Add Favorite</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- script javascript -->
<script>
    // create a function
    function addFav(id) {
        // create a variable
        let url = "<?= env("MOVIE_BASE_URL") ?>/account/19102617/favorite";
        // create a ajax
        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer <?= env("MOVIE_TOKEN") ?>`
            },
            data: JSON.stringify({
                media_type: "movie",
                media_id: id,
                favorite: true
            }),
            success: function(res) {
                // create a condition
                if (res.success == true) {
                    // create a alert suuccess
                    alert("Success Add Favorite");
                } else {
                    // create a alert error
                    alert("Failed Add Favorite");
                }
            }
        });
    }
</script>
<?= $this->endSection() ?>