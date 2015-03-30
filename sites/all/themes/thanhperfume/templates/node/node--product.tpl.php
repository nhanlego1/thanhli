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
                <div class="info-wrapper-grey">
                    <?php print render($content['body']) ?>
                </div>
                <?php print render($content['field_voting']); ?>
                <?php print  render($content['easy_social_1']); ?>

            </div>
        </div>
<!--        <h2 class="detail-info">Thông tin sản phẩm </h2>-->

        <div class="content-product-bottom grid-8">

            <?php
            // We hide the comments and links now so that we can render them later.
            hide($content['comments']);
            hide($content['links']);
           // print render($content);
            ?>
            <?php if($node->field_other_style): ?>
                <?php
                $items = array();
                foreach($node->field_other_style[LANGUAGE_NONE] as $val){
                    $items[] = $val['value'];
                }
                $collection = entity_load('field_collection_item', array($items));
                $header = array('Sản phẩm','','<span class="sell-price">Giá Thành Perfume</span>', 'Giá thị trường','Đặt mua');
                $row = array();
                foreach($collection as $collect){
                    $col = array();
                    if($collect->field_image_other){
                        $col[] = theme('image_style', array('style_name' => '70x70', 'path' => $collect->field_image_other[LANGUAGE_NONE][0]['uri'], ));
                    }
                    if($collect->field_title_other){
                       if($collect->field_link){
                            $col[] = l($collect->field_title_other[LANGUAGE_NONE][0]['value'],$collect->field_link[LANGUAGE_NONE][0]['value']);
                       }else{
                            $col[] = $collect->field_title_other[LANGUAGE_NONE][0]['value'];
                       }

                    }
                    if($collect->field_sell_other){
                        $col[] = '<span class="sell-price">'.number_format($collect->field_sell_other[LANGUAGE_NONE][0]['value'], 0, ',', ' '). ' VND</span>';
                    }
                    if($collect->field_sell_over){
                        $col[] = number_format($collect->field_sell_over[LANGUAGE_NONE][0]['value'], 0, ',', ' '). ' VND';
                    }
                    $col[] = l('Liên hệ','node/19');
                    $row[] = $col;
                }

                print theme('table', array('header' => $header, 'rows' => $row));
                ?>

            <?php endif; ?>
        </div>

    </div>
    <div class="fb-comments" data-href="<?php print url('node/'.$node->nid,array('absolute'=>true)) ?>" data-numposts="5" data-colorscheme="light"></div>


</article>