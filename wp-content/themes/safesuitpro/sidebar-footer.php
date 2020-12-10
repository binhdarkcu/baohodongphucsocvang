<div class="col-md-3">
    <div class="footer_widget">
        <?php
        if (is_active_sidebar('first-footer-widget-area')) :
            dynamic_sidebar('first-footer-widget-area');
        else :
            ?>
            <div class="widget_area">
                <span class="widget_heading"><?php _e('About Us', 'butterbelly'); ?></span>
                <p><?php _e('We make simple and easy to WordPress themes that will make your website easily. You just need to install it and your website will be ready within a minute.', 'butterbelly'); ?></p>
            </div>
        <?php endif; ?>         
    </div>
</div>
<div class="col-md-3">
    <div class="footer_widget">
        <?php
        if (is_active_sidebar('second-footer-widget-area')) : dynamic_sidebar('second-footer-widget-area');
        else :
            ?> 
            <div class="widget_area">
                <span class="widget_heading"><?php _e('OUR PAGES', 'butterbelly'); ?></span>
                <ul>
                    <li><a href="#"><?php _e('Default template', 'butterbelly'); ?> </a></li>
                    <li><a href="#"><?php _e('Full-width template', 'butterbelly'); ?> </a></li>
                    <li><a href="#"><?php _e('Home template', 'butterbelly'); ?> </a></li>
                </ul>
            </div>
        <?php endif; ?> 
    </div>
</div>
<div class="col-md-3">
    <div class="footer_widget">
        <?php
        if (is_active_sidebar('third-footer-widget-area')) : dynamic_sidebar('third-footer-widget-area');
        else :
            ?>
            <div class="widget_area">
                <span class="widget_heading"><?php _e('Search Anything', 'butterbelly'); ?></span>
                <p><?php _e('Search Anything Which You Desire.', 'butterbelly'); ?></p>
                <form role="search" method="get" class="searchform" action="<?php echo home_url('/'); ?>">
                    <div class="input-group">
                        <input type="text" autocomplete="off" class="form-control" placeholder="Search for..." onfocus="if (this.value == 'Search here') {
                                    this.value = '';
                                }" onblur="if (this.value == '') {
                                            this.value = 'Search here';
                                        }"  value="Search here" name="s" id="s">
                        <span class="input-group-btn">
                            <input id="searchsubmit" class="btn btn-default" type="submit" value="<?php _e('SEARCH', 'butterbelly'); ?>"/>
                        </span>
                    </div>
                </form>
                <div class="clear"></div> 
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="col-md-3">
    <div class="footer_widget">
        <?php
        if (is_active_sidebar('fourth-footer-widget-area')) : dynamic_sidebar('fourth-footer-widget-area');
        else :
            ?>
            <div class="widget_area">
                <span class="widget_heading"><?php _e('Use of Widgets', 'butterbelly'); ?></span>
                <p><?php _e('You can easily drag and drop the widgets here to display under the footer. You just need to go to your dashboard and there you can choose the appearance option and then widgets.', 'butterbelly'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>