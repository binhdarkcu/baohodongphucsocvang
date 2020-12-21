<?php
$eto_options = get_option('eto_settings');
$contact_float_color = $eto_options['contact_float_color'];
?>

<div id="contact-floated" style="background-color: <?php if (!empty($contact_float_color)) echo $contact_float_color ?>">
    <a href="javascript:void" class="toggleSupport"><i class="fa fa-phone-square" aria-hidden="true"></i></a>
      <div class="contact-info">
        <?php
        if ( $eto_options['support_name'] ) {
          $eto_col2 = $eto_options['support_phone'];
          foreach($eto_options['support_name'] as $key=>$row) {
        ?>
          <div class="name">
            <a href="tel:<?php echo str_replace(".", "", $eto_col2[$key]); ?>"><?php echo $row; ?></a>
          </div>
          <div class="phone">
            <i class="fa fa-phone"></i>
            <span class="phone-number">
              <a href="tel:<?php echo str_replace(".", "", $eto_col2[$key]); ?>"><?php echo $eto_col2[$key]; ?></a>
            </span>
          </div>
        <?php
          }
        }
        ?>
    </div>
  </div>
</div>

<ul class="giuseart-pc-contact-bar">
  <li class="facebook"> <a href="https://m.me/<?php echo $eto_options['facebook_chat']; ?>" target="_blank" rel="nofollow"></a></li>
  <li class="zalo"> <a href="https://zalo.me/<?php echo $eto_options['zalo_chat']; ?>" target="_blank" rel="nofollow"></a></li>
</ul>
