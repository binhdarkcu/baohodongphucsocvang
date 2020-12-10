<?php
if (post_password_required()) {
    ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'butterbelly'); ?></p>
    <?php
    return;
}
?>
<!-- You can start editing here. -->
<div id="commentsbox">
    <?php if (have_comments()) : ?>
        <h2 id="comments">
            <?php
            comments_number(__('No Responses', 'butterbelly'), __('One Response', 'butterbelly'), __('% Responses', 'butterbelly'));
            _e('so far.', 'butterbelly');
            ?></h2>
        <ol class="commentlist">
            <?php wp_list_comments(array('avatar_size' => 70)); ?>
        </ol>
        <div class="comment-nav">
            <div class="alignleft">
                <?php previous_comments_link() ?>
            </div>
            <div class="alignright">
                <?php next_comments_link() ?>
            </div>
        </div>
        <?php
    else : // this is displayed if there are no comments so fa
        if (comments_open()) :
            ?>
            <!-- If comments are open, but there are no comments. -->
        <?php else : // comments are closed     ?>
            <!-- If comments are closed. -->
            <p class="nocomments"><?php _e('Comments are closed.', 'butterbelly'); ?></p>
        <?php
        endif;
    endif;
    if (comments_open()) :
        ?>
        <div class="commentform_wrapper">
            <h2 class="leave_reply"><?php _e('Leave a Comment', 'butterbelly'); ?></h2>
            <div id="comment-form">
                <div id="respond" class="rounded">
                    <div class="cancel-comment-reply"> <small>
                            <?php cancel_comment_reply_link(); ?>
                        </small> </div>
                    <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
                        <p><?php _e('You must be ', 'butterbelly'); ?> <a href="<?php echo wp_login_url(get_permalink()); ?>"><?php _e('logged in', 'butterbelly'); ?></a> <?php _e('to post a comment.', 'butterbelly'); ?></p>
                    <?php else : ?>
                        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

                            <?php if ($user_ID) : ?>
                                <p class="comment_message" style="margin-bottom: 10px;"><?php echo 'Login'; ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'butterbelly'); ?>"><?php _e('Log out &raquo;', 'butterbelly'); ?></a></p>
                                <div class="form-group">
                                    <textarea name="comment" class="form-control" id="comment" cols="50" rows="7" tabindex="1"></textarea>
                                </div>
                            <?php else : ?>
                                <div class="form-group">
                                    <label><?php _e('Your Name', 'butterbelly'); ?></label>
                                    <input type="text" class="form-control" name="author" id="author" tabindex="2" value=""/>
                                </div>
                                <div class="form-group">
                                    <label><?php _e('Your Email', 'butterbelly'); ?></label>
                                    <input type="text" class="form-control" name="email" id="email" tabindex="3" value="" />
                                </div>                           
                                <div class="form-group">
                                    <label><?php _e('Your Website', 'butterbelly'); ?></label>
                                    <input type="text" class="form-control" name="url" id="url" tabindex="4" value=""/>
                                </div>                                   
                                <div class="form-group">
                                    <textarea name="comment" class="form-control"  id="comment" cols="50" tabindex="5" rows="7" ></textarea>
                                </div>
                            <?php endif; ?>
                            <div class="submit">
                                <input name="submit" type="submit" id="submit" tabindex="6" value="<?php _e('Submit Comment', 'butterbelly'); ?>" />
                                <p id="cancel-comment-reply">
                                    <?php cancel_comment_reply_link() ?>
                                </p>
                            </div>
                            <div>
                                <?php comment_id_fields(); ?>
                            </div>
                        </form>
                    <?php endif; // If registration required and not logged in    ?>
                </div>
            </div>
        </div>
    <?php endif; // if you delete this the sky will fall on your head     ?>
</div>
