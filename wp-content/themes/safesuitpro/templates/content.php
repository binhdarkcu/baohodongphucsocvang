<div class="butterbelly-post">
<div class="post col-md-4 col-sm-6 col-xs-12">
    <?php
    $content = $post->post_content;
    $searchimages = '~<img [^>]* />~';
    /* Run preg_match_all to grab all the images and save the results in $pics */
    preg_match_all($searchimages, $content, $pics);
    // Check to see if we have at least 1 image
    $iNumberOfPics = count($pics[0]);
    if (($iNumberOfPics > 0) || (has_post_thumbnail())) {
        ?>
        <div class="post_image"> 
            <?php
            if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
                butterbelly_get_thumbnail(353, 284);
            } else {
                butterbelly_get_image(353, 284);
            }
            ?>
            <h1 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php
                _e('Permanent Link to', 'butterbelly');
                the_title_attribute();
                ?>"><?php the_title(); ?></a></h1>
            <div class="post_comment"><?php comments_popup_link('0', '1', '%', '', 'off'); ?></div>
        </div>
    <?php } else {
        ?>
        <h1 class="post_title without_image"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php
            _e('Permanent Link to', 'butterbelly');
            the_title_attribute();
            ?>"><?php the_title(); ?></a></h1>
        <?php } ?>
    <div class="post_content">                
        <ul class="post_meta">                 
            <li class="post_date"><span class="glyphicon glyphicon-calendar"></span>&nbsp;<span><?php _e('On', 'butterbelly'); ?></span>&nbsp;<?php echo get_the_time('M, d, Y') ?></li>
            <li class="posted_by"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php the_author_posts_link(); ?></li>
        </ul>
        <?php the_excerpt(); ?>
        <div class="clear"></div>
        <?php if (has_tag()) { ?>
            <div class="tag">
                <?php the_tags(__('Post Tagged with : ', 'butterbelly'), ', ', ''); ?>
            </div>
        <?php } ?>
        <a class="read_more" href="<?php the_permalink() ?>"><?php _e('Continue Reading...', 'butterbelly'); ?></a>
    </div>
</div>
</div>
