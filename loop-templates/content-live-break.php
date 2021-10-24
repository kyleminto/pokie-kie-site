<a class="item" href="<?= get_the_permalink() ?>" target="_blank">
    <img src="https://via.placeholder.com/350x600" alt="<?= get_the_title() ?> Packet" />

    <div class="overlay">
        <h5><?= get_the_title() ?></h5>
        <p>£<?= floatval(get_field('price')) ?></p>
    </div>
</a>