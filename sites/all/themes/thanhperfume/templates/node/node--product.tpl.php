<article<?php print $attributes; ?>>
    <?php print $user_picture; ?>
    <?php print render($title_prefix); ?>
    <?php if (!$page && $title): ?>
        <header>
            <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>"
                                                    title="<?php print $title ?>"><?php print $title ?></a></h2>
        </header>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <div<?php print $content_attributes; ?>>
        <div class="content-product-top grid-9">
            <div class="image-cloud grid-4">
                <?php print render($content['field_product_image']); ?>
            </div>
            <div class="small-info grid-4">
                <header>
                    <h2<?php print $title_attributes; ?>><?php print $node->title ?></h2>
                </header>
                <?php if ($content['field_prices']): ?>
                    <?php print render($content['field_prices']); ?> VND
                <?php endif; ?>
                <?php print  render($content['easy_social_1']); ?>

            </div>
        </div>
        <h2 class="detail-info">Thông tin sản phẩm </h2>

        <div class="content-product-bottom grid-8">

            <?php
            // We hide the comments and links now so that we can render them later.
            hide($content['comments']);
            hide($content['links']);
            print render($content);
            ?>
        </div>

    </div>


</article>