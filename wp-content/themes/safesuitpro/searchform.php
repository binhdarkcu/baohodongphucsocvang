<form role="search" method="get" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        <input type="text" autocomplete="off" class="form-control" placeholder="<?php _e('Search for...', 'butterbelly'); ?>" onfocus="if (this.value == 'Search here') {
                    this.value = '';
                }" onblur="if (this.value == '') {
                            this.value = 'Search here';
                        }"  value="<?php _e('Search here', 'butterbelly'); ?>" name="s" id="s">
        <span class="input-group-btn">
            <span class="search_btn_tri"></span>  
            <input id="searchsubmit" class="btn btn-default" type="submit" value="<?php _e('SEARCH', 'butterbelly'); ?>"/>
        </span>
    </div>
</form>
<div class="clear"></div>
