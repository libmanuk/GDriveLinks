<?php
/**
 * GDriveLinks
 * 
 * @copyright Copyright 2020 Eric Weig 
 * @license http://opensource.org/licenses/MIT MIT
 */

/**
 * The GDriveLinks plugin.
 * 
 * @package Omeka\Plugins\GDriveLinks
 */
 
     // Define Constants.
    define('DEFAULT_LINK_TARGET_VALUE', '_blank');
    define('DEFAULT_LINK_TEXT_VALUE', 'generic link text');
    define('DEFAULT_EMBED_WIDTH_VALUE', '100%');
    define('DEFAULT_EMBED_HEIGHT_VALUE', '480');
    
class GDriveLinksPlugin extends Omeka_Plugin_AbstractPlugin
{
    // Define Hooks
	    
    protected $_hooks = array(
        'install',
        'uninstall',
	'define_routes',
	'config',
        'config_form',
	);
	
    public function hookInstall()
    {
        set_option('default_link_target_value', DEFAULT_LINK_TARGET_VALUE);
        set_option('default_link_text_value', DEFAULT_LINK_TEXT_VALUE);
        set_option('default_embed_width_value', DEFAULT_EMBED_WIDTH_VALUE);
        set_option('default_embed_height_value', DEFAULT_EMBED_HEIGHT_VALUE);
    }
    
    public function hookUninstall()
    {
        delete_option('default_link_target_value');
        delete_option('default_link_text_value');
        delete_option('default_embed_width_value');
        delete_option('default_embed_height_value');
    }
	
    function hookDefineRoutes($args)
    {
        $router = $args['router'];
    }
    
    public function hookConfigForm() 
    {
        include 'config_form.php';
    }
    
    public function hookConfig($args)
    {
        $post = $args['post'];
        set_option('default_link_target_value',$post['link_target_value']);
        set_option('default_link_text_value',$post['link_text_value']);
        set_option('default_embed_width_value',$post['embed_width_value']);
        set_option('default_embed_height_value',$post['embed_height_value']);
    }
	
    protected $_filters = array(

        'filterlinkLink' => array('Display', 'Item', 'Item Type Metadata', 'URL'),
    );

    public function filterlinkLink($text, $args) {
        return $this->_linkField($text, $args);
    }

    public function _linkField($text, $args) {
        $linktarget = addslashes(get_option('default_link_target_value'));
        $linktext = addslashes(get_option('default_link_text_value')); 
        $embedwidth = addslashes(get_option('default_embed_width_value'));
        $embedheight = addslashes(get_option('default_embed_height_value')); 

        if (strpos($text, '/view') !== false) {
            if (preg_replace('/[<>]/', '_', filter_var($text, FILTER_VALIDATE_URL)) === $text) {
            return "<a href=\"" . $text . "\" target=\"" . $linktarget . "\">$linktext</a>";
        } else {
            return $text;
        }
        } elseif (strpos($text, '/preview') !== false) {
            if (preg_replace('/[<>]/', '_', filter_var($text, FILTER_VALIDATE_URL)) === $text) {
            return "<iframe src=\"" . $text . "\" width=\"" . $embedwidth . "\" height=\"" . $embedheight . "\"></iframe>";
        } else {
           return $text;
        }
    
	}
        
     }
    
}


