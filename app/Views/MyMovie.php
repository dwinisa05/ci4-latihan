<!-- call a layouts -->
<?= $this->extend('layouts/mainLayouts') ?>
<?= $this->section('content') ?>
<h1>My Movie</h1>
<div class="row">
    <?php if ($data == []) : ?>
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="card-body">
                    <h5 class="card-title">No Data</h5>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php foreach ($data as $val) : ?>
        <div class="col-md-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="
                        <?php if ($val['poster_path'] == null) : ?> https://via.placeholder.com/300x450" class="img-fluid rounded-start" alt="..."> <?php else : ?> <?= $base_url . $val['poster_path'] ?>" class="img-fluid rounded-start" alt="..."> <?php endif; ?>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $val['title'] ?>
                            </h5>
                            <p class="card-text">
                                <?= substr($val['overview'], 0, 100) ?>...
                            </p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>