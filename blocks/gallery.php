<div class="container gallery">
    <?php
        $images = get_sub_field('images');
    
        if(!empty($images)) { ?>
            <div data-interval="false" id="carouselGallery" class="carousel slide" data-ride="carousel">
                <ul class="slides carousel-inner">
                    <?php
                        $count = 0;

                        foreach($images as $image) { ?>
                            <li class="carousel-item <?= $count == 0 ? 'active' : '' ?>">
                                <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" />
                                <p><?= esc_html($image['caption']); ?></p>
                            </li>
                        <?php

                        $count++;
                    } ?>
                </ul>

                <div class="thumbnails">
                    <?php if(get_sub_field('thumbnails') == 'visible') { ?>
                        <ul class="carousel-indicators list-inline">
                            <?php
                                $count = 0;

                                foreach($images as $image): ?>
                                    <li class="<?= $count == 0 ? 'active' : '' ?>">
                                        <a data-target="#carouselGallery" class="selected" data-slide-to="<?= $count ?>">
                                            <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" />
                                        </a>
                                    </li>
                                <?php

                                $count++;
                            endforeach; ?>
                        </ul>
                    <?php } ?>

                    <div class="arrows">
                        <a class="carousel-control-prev" href="#carouselGallery" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselGallery" role="button" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
</div>