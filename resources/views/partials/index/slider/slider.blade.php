
<?php $slider = new WP_Query(array('post_type'=>'slider', 'posts_per_page'=>-1)); ?>

@if($slider->found_posts)
<div class="header_slider clearfix">
    <div class="container">
        <div class="slider_wrap">
            <div class="slider">
                <div class="slider-carousel owl-carousel owl-theme">
                    <?php

                        while($slider->have_posts()){  $slider->the_post();
                        $link_slide = get_field('link_page');
                    ?>
                    <div class="item">
                        <div class="inner_item">
                            <?php the_post_thumbnail('img-slide'); ?>
                            <div class="description_wrap">
                                <div class="descript_block">
                                    <h2 class="title_line"><?php the_title(); ?></h2>
                                    <div class="descript_text">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <a href="<?php echo $link_slide; ?>" class="button_more btn_default"><span>Read more</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="banner">
                <a href="#">
                    <img src="@dist('img/banner_sdb.png')" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
@endif



<script src="{{ get_template_directory_uri() }}/default/owl.carousel.js"></script>

