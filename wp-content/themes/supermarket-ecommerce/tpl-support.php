<?php $contact_float_color = get_field('contact_float_color', 'option'); ?>

<div id="contact-floated" style="background-color: <?php if (!empty($contact_float_color)) echo $contact_float_color ?>">
    <a href="javascript:void" class="toggleSupport"><i class="fa fa-phone-square" aria-hidden="true"></i></a>
    <?php if( have_rows('form_ho_tro', 'option') ): ?>
      <div class="contact-info">
      <?php while( have_rows('form_ho_tro', 'option') ): the_row();
          $support_name = get_sub_field('support_name');
          $support_phone = get_sub_field('support_phone');
          ?>
          <div class="name">
            <a href="tel:<?php echo str_replace(".", "", $support_phone); ?>"><?php echo $support_name; ?></a>
          </div>
          <div class="phone">
            <i class="fa fa-phone"></i>
            <span class="phone-number">
              <a href="tel:<?php echo str_replace(".", "", $support_phone); ?>"><?php echo $support_phone; ?></a>
            </span>
          </div>

      <?php endwhile; ?>
    </div>
  <?php endif; ?>
  </div>
</div>

<ul class="giuseart-pc-contact-bar">
  <li class="facebook"> <a href="https://m.me/<?php echo get_field('facebook_chat', 'option'); ?>" target="_blank" rel="nofollow"></a></li>
  <li class="zalo"> <a href="https://zalo.me/<?php echo get_field('zalo_chat', 'option'); ?>" target="_blank" rel="nofollow"></a></li>
</ul>
