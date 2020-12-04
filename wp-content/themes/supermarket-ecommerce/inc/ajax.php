<?php
add_action( 'wp_ajax_tk_load_data_product_popup', 'tk_load_data_product_popup' );
add_action( 'wp_ajax_nopriv_tk_load_data_product_popup', 'tk_load_data_product_popup' );
function tk_load_data_product_popup() {
    
    $data = ['error_code'=>1,'msg'=>'Not Found'];
    $productID = ($_REQUEST['productID']) ? trim($_REQUEST['productID']): '';
   if($productID){
       $product = wc_get_product($productID);

       
   }

    print_r($productID);

    wp_send_json( $data );

   die();
}

 ?>