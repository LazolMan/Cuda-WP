<?php

/** 
 * Template name: Home Template
 */

get_header();
?>

<?php
while (have_posts()) :
    the_post();
?>

    <section class="work">
        <div class="wrapper">
            <div class="bottom_line">
                <p>
                    <?php the_content(); ?>
                </p>
                <a href="http://google.com" class="button"><?php echo rwmb_meta('cuda-work_button'); ?></a>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="wrapper">
            <h2><?php echo rwmb_meta('cuda-services_title'); ?></h2>
            <p class="description">
                <?php echo rwmb_meta('cuda-services_desc'); ?>
            </p>

            <div class="services_list">
                <?php
                $item_images = rwmb_meta('cuda-items_image');
                $item_title = rwmb_meta('cuda-items_title');
                $item_desc = rwmb_meta('cuda-items_desc');

                $image_id = array_key_first($item_images);

                for ($i = 0; $i < count($item_images); $i++) {
                    if (isset($item_images[$image_id + $i]) && isset($item_title[$i]) && isset($item_desc[$i])) {
                ?>
                        <div class="service_item">
                            <div class="img">
                                <img src="<?php echo $item_images[$image_id + $i]['url']; ?>" alt="icon" />
                            </div>
                            <h3 class="item_title"> <?php echo $item_title[$i]; ?> </h3>
                            <p class="item_description"> <?php echo $item_desc[$i]; ?> </p>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </section>

    <section class="contact">
        <div class="wrapper">
            <h2><?php echo rwmb_meta('cuda-contact_title'); ?></h2>
            <p class="description"> <?php echo rwmb_meta('cuda-contact_desc'); ?> </p>

            
            <?php 
            $shortcode = rwmb_meta('cuda-contact_form');
            echo do_shortcode($shortcode); 
            ?>


            <!-- <div class="contact_form">
                <form>
                    <input type="text" placeholder="Your Name" required />
                    <input type="email" placeholder="Your Email" required />
                    <textarea placeholder="Your Message"></textarea>
                    <div class="submit">
                        <input type="submit" value="SEND MESSAGE" />
                    </div>
                </form>
            </div> -->

        </div>
    </section>
<?php
endwhile;
?>

<?php get_footer() ?>