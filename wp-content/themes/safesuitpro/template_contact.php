<?php
/*
  Template Name: Contact Page
 */
get_header();
$nameError = '';
$emailError = '';
$commentError = '';
$captchaError = null;
$headers = '';

$captcha_option = wp_kses_post(butterbelly_get_option('inkthemes_recaptcha_option')); // captcha on or off
$captcha_option_on = "on";
if ($captcha_option === $captcha_option_on) {
    $secret = wp_kses_post(butterbelly_get_option('recaptcha_private'));

    if (isset($_POST['submit']) && !empty($_POST['submit'])):
        if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
            //your site secret key
            $secret = wp_kses_post(butterbelly_get_option('recaptcha_private'));

            //get verify response data
            $verifyResponse = @file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse, true);
            if ($responseData['success']) {

            } else {
                $captchaError = __('Robot verification failed, please try again.', 'butterbelly');
            }
        else:
            $captchaError = __('Please click on the reCAPTCHA box.', 'butterbelly');
            $hasError = true;
        endif;
    else:
        $captchaError = "";
    endif;
} else {

} //captcha on-off and end captcha

if (isset($_POST['submitted'])) {
    if (trim($_POST['contactName']) === '') {
        $nameError = __('Please enter your name.', 'butterbelly');
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }
    if (trim($_POST['email']) === '') {
        $emailError = __('Please enter your email address.', 'butterbelly');
        $hasError = true;
    } else if (!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$/i", trim($_POST['email']))) {
        $emailError = __('You entered an invalid email address.', 'butterbelly');
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }
    if (trim($_POST['comments']) === '') {
        $commentError = __('Please enter a message.', 'butterbelly');
        $hasError = true;
    } else {
        if (function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }

    //If there is no error, send the email
    if (!isset($hasError)) {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '')) {
            $emailTo = get_option('admin_email');
        }
        $subject = '[Wordpress] From ' . $name;
        $body = __('Name:', 'butterbelly') . $name . "<br/>" . __('Email:', 'butterbelly') . $email . "<br/>" . __('Comments:', 'butterbelly') . $comments;
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= __('From:', 'butterbelly') . $name . ' <' . $emailTo . '>' . "\r\n" . __('Reply-To:', 'butterbelly') . $email;
        wp_mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
        $_POST['submit'] = "";
    }
}
?>
<div class="page_heading_container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page_heading_content">
                    <?php butterbelly_breadcrumbs(); ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="page-container">
    <div class="container">
        <div class="row">
            <div class="page-content">
                <div class="col-md-8">
                    <div class="contact-page">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                        <?php if (have_posts()) while (have_posts()) : the_post(); ?>
                                <?php
                                the_content();
                                if (isset($emailSent) && $emailSent == true) {
                                    ?>
                                    <div class="thanks">
                                        <p><?php _e('Thanks, your email was sent successfully.', 'butterbelly'); ?></p>
                                    </div>
                                    <?php
                                } else {
                                    if (isset($hasError)) {
                                        ?>
                                        <p class="error"><?php _e('Sorry, an error occured.', 'butterbelly'); ?> </p>
                                    <?php } ?>
                                    <form class="contactform" id="contactForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                        <div class="form-group">
                                            <label><?php _e('Name', 'butterbelly'); ?> <span class="required"></span></label>
                                            <input type="text" name="contactName" id="contactName" value="<?php
                                            if (isset($_POST['contactName']))
                                                echo $_POST['contactName'];
                                            ?>" class="text required requiredField" />
                                        </div>

                                        <?php if ($nameError != '') { ?>
                                            <div class="form-group">
                                                <span class="error"> <?php echo $nameError; ?> </span>
                                            </div>
                                        <?php } ?>

                                        <div class="form-group">
                                            <label><?php _e('Email', 'butterbelly'); ?> <span class="required"></span></label>
                                            <input type="text" name="email" id="email" value="<?php
                                            if (isset($_POST['email']))
                                                echo $_POST['email'];
                                            ?>" class="text required requiredField email" />
                                        </div>

                                        <?php if ($emailError != '') { ?>
                                            <div class="form-group">
                                                <span class="error"> <?php echo $emailError; ?> </span>
                                            </div>
                                        <?php } ?>

                                        <div class="form-group">
                                            <label class="last-label"><?php _e('Your Message', 'butterbelly'); ?><span class="required"></span></label>
                                            <textarea name="comments" id="commentsText" rows="10" cols="10" class="required requiredField message"><?php
                                                if (isset($_POST['comments'])) {
                                                    if (function_exists('stripslashes')) {
                                                        echo stripslashes($_POST['comments']);
                                                    } else {
                                                        echo $_POST['comments'];
                                                    }
                                                }
                                                ?></textarea>
                                        </div>

                                        <?php if ($commentError != '') { ?>
                                            <div class="form-group">
                                                <span class="error"> <?php echo $commentError; ?> </span>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        $captcha_option = wp_kses_post(butterbelly_get_option('inkthemes_recaptcha_option')); // captcha on or off
                                        $captcha_option_on = "on";
                                        $publickey = wp_kses_post(butterbelly_get_option('recaptcha_public'));
                                        if ($captcha_option === $captcha_option_on) {
                                            ?>
                                            <div class="form-group">
                                                <div class="recaptcha-wrap">
                                                    <div class = "g-recaptcha" data-sitekey = "<?php echo $publickey; ?>"></div>
                                                </div>
                                            </div>
                                            <?php if ($captchaError != '') { ?>
                                                <div class="form-group">
                                                    <span class="error"> <?php echo $captchaError; ?> </span>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <div class="form-group">
                                            <input  class="btnSubmit" type="submit" name="submit" value="<?php _e('Submit', 'butterbelly'); ?>"/>
                                            <input type="hidden" name="submitted" id="submitted" value="true" />
                                        </div>
                                    </form>
                                <?php } endwhile; ?>
                        <div class="clear"></div>
                        <h2><?php _e('Location Map', 'butterbelly'); ?></h2>
                        <?php if (butterbelly_get_option('inkthemes_contact_map') != '') { ?>
                            <div class="contact-map"><?php echo esc_sanitize_iframe(butterbelly_get_option('inkthemes_contact_map')); ?></div>
                        <?php } else { ?>
                            <div style="width: 100%; overflow:hidden;" class="contact-map"><iframe width="100%" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Chuna+Bhatti,+Bhopal,+Madhya+Pradesh,+India&amp;aq=0&amp;oq=bh&amp;sll=37.0625,-95.677068&amp;sspn=56.506174,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=Chuna+Bhatti,+Bhopal,+Madhya+Pradesh,+India&amp;t=m&amp;ll=23.202617,77.413874&amp;spn=0.037866,0.054932&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--Start Sidebar-->
                    <?php get_sidebar(); ?>
                    <!--End Sidebar-->
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>
</div>
<?php get_footer(); ?>
