<?php
/**
 * Jamroom 5 ujWysihtml5 module
 *
 * copyright 2013 by Ultrajam - All Rights Reserved
 * http://www.ultrajam.net
 *
 */

// make sure we are not being called directly
defined('APP_DIR') or exit();

/**
 * meta
 */
function ujWysihtml5_meta() {
    $_tmp = array(
        'name'        => 'Wysihtml5 Text Editor',
        'url'         => 'wysihtml5',
        'version'     => '1.0.0',
        'developer'   => 'Ultrajam, &copy;' . strftime('%Y'),
        'description' => 'Allows the use of wysihtml5 in place of (or as well as) the jr5 default TinyMCE textarea editor.',
        'support'     => 'http://www.jamroom.net/phpBB2',
        'category'    => 'plugins'
    );
    return $_tmp;
}

/**
 * init
 */
function ujWysihtml5_init() {
    // register the custom form field
    jrCore_register_module_feature('jrCore','form_field','ujWysihtml5','wysihtml5');
    return TRUE;
}

/**
 * @ignore
 * ujWysihtml5_form_field_wysihtml5_display
 * @param array $_field field array field information for wysihtml5
 * @param array $_att additional HTML attributes
 * @return bool
 */
function ujWysihtml5_form_field_wysihtml5_display($_field,$_att = null)
{
    global $_conf, $_user;
    $tmp = jrCore_get_flag('jrcore_wysihtml5_js_included');
    if (!$tmp) {
    // check the quota setting to see if we are using advanced or simple
        // parser_rules before the main wysihtml5 js
        $_js = array('source' => "{$_conf['jrCore_base_url']}/modules/ujWysihtml5/contrib/wysihtml5/parser_rules/advanced.js");
        jrCore_create_page_element('javascript_href',$_js);
        $_js = array('source' => "{$_conf['jrCore_base_url']}/modules/ujWysihtml5/contrib/wysihtml5/dist/wysihtml5-0.3.0.min.js");
        jrCore_create_page_element('javascript_href',$_js);
        jrCore_set_flag('jrcore_wysihtml5_js_included',1);
        // css for the toolbar must be in the main doc, other css in the html head for the iframe
        $_css = array('source' => "{$_conf['jrCore_base_url']}/modules/ujWysihtml5/contrib/wysihtml5/wysihtml5.css");
        jrCore_create_page_element('css_href',$_css);
    }
    $_rp = array(
        'field_name' => $_field['name']
    );
    // Initialize fields
    $_rp['theme'] = 'simple';
    if (isset($_field['theme']) && $_field['theme'] == 'advanced') {
        $_rp['theme'] = 'advanced';
    }
    $allowed_tags = explode(',',$_user['quota_jrCore_allowed_tags']);
    foreach($allowed_tags as $tag){
        $_rp[$tag] = true;
    }

    //jrembed is active
    $_rp['jrembed'] = jrCore_module_is_active('jrEmbed');

    $ini = @jrCore_parse_template('form_wysihtml5.tpl',$_rp,'ujWysihtml5');
    $_js = array($ini);
    jrCore_create_page_element('javascript_ready_function',$_js);

    $cls = 'form_textarea form_wysihtml5'. jrCore_form_field_get_hilight($_field['name']);
    // Get our tab index
    $idx = jrCore_form_field_get_tab_index($_field);
//    $htm = '<div class="form_wysihtml5_holder"><textarea id="'. $_field['name'] .'" class="'. $cls .'" name="'. $_field['name'] .'" tabindex="'. $idx .'"';
    $htm = '<div>'; // needs to be in a div or the modals appear way up in the tree
    $htm .= jrCore_parse_template('form_wysihtml5_toolbar.tpl',$_rp,'ujWysihtml5');
    $htm .= '<textarea id="wysihtml5-textarea-'. $_field['name'] .'" class="'. $cls .'" name="'. $_field['name'] .'" tabindex="'. $idx .'"';
    // additional attributes could be spellcheck="true" wrap="off" placeholder="Enter your html5 text ..." 
    if (isset($_att) && is_array($_att)) {
        foreach ($_att as $key => $attr) {
            $htm .= ' '. $key .'="'. $attr .'"';
        }
    }
    $val = isset($_field['value']{0}) ? $_field['value'] : '';
    $htm .= '>'. $val .'</textarea></div>';
    $_field['html']     = $htm;
    $_field['type']     = 'wysihtml5';
    $_field['template'] = 'form_field_elements.tpl';
    jrCore_create_page_element('page',$_field);
    return true;
}
/**
 * @ignore
 * ujWysihtml5_form_field_wysihtml5_is_empty
 * Checks to see if we received data on our post in the form validator
 * @param array $_field Array of Field Parameters
 * @param array $_post Posted Data for checking
 * @return bool
 */
function ujWysihtml5_form_field_wysihtml5_is_empty($_field,$_post)
{
    $name = $_field['name'];
    if (empty($_post["{$name}_wysihtml5_contents"])) {
        return true;
    }
    return false;
}

/**
 * Additional form field HTML attributes that can be passed in via the form
 */
function ujWysihtml5_form_field_wysihtml5_attributes()
{
    return array('spellcheck','wrap','placeholder','onfocus','onblur','onkeypress');
}
/**
 * @ignore
 * ujWysihtml5_form_field_wysihtml5_validate
 * @param array $_field Array of form field info
 * @param array $_post Global $_post from jrCore_parse_url()
 * @param string $e_msg Error Message to use in validation checking
 * @return array
 */
function ujWysihtml5_form_field_wysihtml5_validate($_field,$_post,$e_msg)
{
    global $_user;
    $name = $_field['name'];
    if (isset($_post["{$name}_wysihtml5_contents"]) && strlen($_post["{$name}_wysihtml5_contents"]) > 0) {
        $_post[$name] = $_post["{$name}_wysihtml5_contents"];
//        // Our wysihtml5 always includes <p> .. </p> around the content - we strip that off here.
//        if (strpos($_post[$name],'<p>') === 0) {
//            $_post[$name] = substr($_post[$name],3,strlen($_post[$name]) - 7);
//        }
        if (jrCore_checktype($_user['profile_quota_id'],'number_nz')) {
            // If we have an active Quota ID we need to properly strip tags
            if (isset($_user) && isset($_user['quota_jrCore_allowed_tags']) && strlen($_user['quota_jrCore_allowed_tags']) > 0) {
                $_post[$name] = jrCore_strip_html($_post[$name],$_user['quota_jrCore_allowed_tags']);
            }
            else {
                // No tags allowed
                $_post[$name] = strip_tags($_post[$name]);
            }
        }
        else {
            // If we get a Quota ID of 0, we remove all HTML
            $_post[$name] = strip_tags($_post[$name]);
        }
    }
    else {
        // No Content...
        $_post[$name] = '';
    }
    if (!jrCore_checktype($_post[$name],$_field['validate'])) {
        jrCore_set_form_notice('error',$e_msg);
        return false;
    }
    $min = (isset($_field['min'])) ? intval($_field['min']) : false;
    $max = (isset($_field['max'])) ? intval($_field['max']) : false;
    if (!@jrCore_is_valid_min_max_value($_field['validate'],$_post[$name],$min,$max,$e_msg)) {
        // NOTE: jrCore_set_form_notice() called in jrCore_is_valid_min_max_value()
        return false;
    }
    unset($_post["{$name}_wysihtml5_contents"]);
    return $_post;
}