<?php
/* Removes Pay now & Recurring payment options from the Course/Group access options
 * Sets default access method to Free
 * Available values for ['options']
 *   - paynow (Buy now option field)
 *   - subscribe (Recurring option field)
 *   - free (Free option field)
 *   - open (Open option field) (courses only)
 *   - closed (Closed option field)
*/
add_filter( 'learndash_settings_fields', function($setting_option_fields, $settings_metabox_key ) {
    unset($setting_option_fields['course_price_type']['options']['paynow']);
    unset($setting_option_fields['course_price_type']['options']['subscribe']);
    unset($setting_option_fields['group_price_type']['options']['paynow']);
    unset($setting_option_fields['group_price_type']['options']['subscribe']);
    
    return $setting_option_fields;
},10,2);
/* Removes Payments page from LD Settings tabs */
add_filter( 'learndash_admin_tab_sets', function($tabsets, $tabskey, $current_page_id) {
    foreach($tabsets as $key => $var) {
        if($var['id'] == 'admin_page_learndash_lms_payments') {
             unset($tabsets[$key]);
        }
    }

    return $tabsets;
},10,3);
define('LEARNDASH_DEFAULT_COURSE_PRICE_TYPE', 'free');
define('LEARNDASH_DEFAULT_GROUP_PRICE_TYPE', 'free');
