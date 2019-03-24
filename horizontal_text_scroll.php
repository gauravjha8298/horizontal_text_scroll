<?php
/*
Plugin Name: Horizontall Text Scroll
Plugin URI: http://jhagaurav.000webhostapp.com/horizontal-text-scroll.html
Description: The horizontal text scroll is the best and lightest wordpress plug-in which let's you scroll the content from one end to another end like reel using shortcodes. This Plug-in is best to use for creating announcements on any page or post.   
Version: 1.0
Author: Gaurav Kumar Jha
Author URI: http://jhagaurav.000webhostapp.com/
Text Domain: horizontal-text-scroll
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

function pluginShortcode( $atts) 
{
	// [horizontal-text-scroll ]
	// [horizontal-text-scroll text="example text" scrollamount="1" scrolldelay="1" direction="left"]
	$text = "No text specified. Please add Text in shortcode!";
	$scrollamount = "8";
	$txtcolor = "black";
	$direction = "left";
	$color = "white";

	if ( is_array( $atts ) )
	{
		foreach(array_keys($atts) as $key)
		{
			if($key == "text")
			{
				$text = stripcslashes($atts["text"]);
			}
			elseif($key == "scrollamount")
			{
				$scrollamount = stripcslashes($atts["speed"]);
			}
			elseif($key == "txtcolor")
			{
				$txtcolor = stripcslashes($atts["txtcolor"]);
			}
			elseif($key == "direction")
			{
				$direction = stripcslashes($atts["direction"]);
			}
			elseif($key == "bgcolor")
			{
				$color = stripcslashes($atts["bgcolor"]);
			}
		}
	}

	$marqueeDiv = "";
	$marqueeDiv = $marqueeDiv . "<div style='position:fixed;top:30px;left:0px;width:100%'>";
	$marqueeDiv = $marqueeDiv . "<marquee bgcolor='$color' style='color:$txtcolor;' scrollamount='$scrollamount' scrolldelay='$scrolldelay' direction='$direction' onmouseover='this.stop()' onmouseout='this.start()'>";
	$marqueeDiv = $marqueeDiv . stripcslashes($text);
	$marqueeDiv = $marqueeDiv . "</marquee>";
	$marqueeDiv = $marqueeDiv . "</div>";

	return $marqueeDiv;
}

function PluginActivation() 
{
	add_shortcode( 'horizontal-text-scroll', pluginShortcode($atts));
}

function PluginDeactivation() 
{
	
}

add_shortcode( 'horizontal-text-scroll', function($atts){
	echo  pluginShortcode($atts);
});

register_activation_hook(__FILE__, 'PluginActivation');
register_deactivation_hook(__FILE__, 'PluginDeactivate' );
?>
