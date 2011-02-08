<?php
    /*
    Plugin Name: Technology News
    Plugin URI: http://www.technewscast.com/downloads/wpplugin
    Description: Plugin for displaying updates feeds from Tech News Cast
    Author: Technewscast
    Version: 1.0
    Author URI: http://www.technewscast.com/
    */
function rss_admin()
{
    include_once 'technews-admin.php';
}

function technews_all_convert($s_String) {

	// Array for entities
	$umlaute  = array('„','“','–',' \&#34;','&#8211;','&#8212;','&#8216;','&#8217;','&#8220;','&#8221;','&#8222;','&#8226;','&#8230;' ,'�'     ,'�'      ,'�'     ,'�'      ,'�'       ,'�'       ,'�'       ,'�'     ,'�'       ,'�'       ,'�'       ,'�'      ,'�'       ,'�'      ,'�'      ,'�'      ,'�'      ,'�'     ,'�'      ,'�'      ,'�'      ,'�'      ,'�'       ,'�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�',utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),utf8_encode('�'),chr(128),chr(129),chr(130),chr(131),chr(132),chr(133),chr(134),chr(135),chr(136),chr(137),chr(138),chr(139),chr(140),chr(141),chr(142),chr(143),chr(144),chr(145),chr(146),chr(147),chr(148),chr(149),chr(150),chr(151),chr(152),chr(153),chr(154),chr(155),chr(156),chr(157),chr(158),chr(159),chr(160),chr(161),chr(162),chr(163),chr(164),chr(165),chr(166),chr(167),chr(168),chr(169),chr(170),chr(171),chr(172),chr(173),chr(174),chr(175),chr(176),chr(177),chr(178),chr(179),chr(180),chr(181),chr(182),chr(183),chr(184),chr(185),chr(186),chr(187),chr(188),chr(189),chr(190),chr(191),chr(192),chr(193),chr(194),chr(195),chr(196),chr(197),chr(198),chr(199),chr(200),chr(201),chr(202),chr(203),chr(204),chr(205),chr(206),chr(207),chr(208),chr(209),chr(210),chr(211),chr(212),chr(213),chr(214),chr(215),chr(216),chr(217),chr(218),chr(219),chr(220),chr(221),chr(222),chr(223),chr(224),chr(225),chr(226),chr(227),chr(228),chr(229),chr(230),chr(231),chr(232),chr(233),chr(234),chr(235),chr(236),chr(237),chr(238),chr(239),chr(240),chr(241),chr(242),chr(243),chr(244),chr(245),chr(246),chr(247),chr(248),chr(249),chr(250),chr(251),chr(252),chr(253),chr(254),chr(255),chr(256));
	$htmlcode = array('&bdquo;','&ldquo;','&ndash;',' &#34;','&ndash;','&mdash;','&lsquo;','&rsquo;','&ldquo;','&rdquo;','&bdquo;','&bull;' ,'&hellip;','&euro;','&sbquo;','&fnof;','&bdquo;','&hellip;','&dagger;','&Dagger;','&circ;','&permil;','&Scaron;','&lsaquo;','&OElig;','&#x017D;','&lsquo;','&rsquo;','&ldquo;','&rdquo;','&bull;','&ndash;','&mdash;','&tilde;','&trade;','&scaron;','&rsaquo;','&oelig;','&#x017E;','&Yuml;','&iexcl;','&cent;','&pound;','&curren;','&yen;','&brvbar;','&sect;','&uml;','&copy;','&ordf;','&laquo;','&not;','&reg;','&macr;','&deg;','&plusmn;','&sup2;','&sup3;','&acute;','&micro;','&para;','&middot;','&cedil;','&supl;','&ordm;','&raquo;','&frac14;','&frac12;','&frac34;','&iquest;','&Agrave;','&Aacute;','&Acirc;','&Atilde;','&Auml;','&Aring;','&AElig;','&Ccedil;','&Egrave;','&Eacute;','&Ecirc;','&Euml;','&Igrave;','&Iacute;','&Icirc;','&Iuml;','&ETH;','&Ntilde;','&Ograve;','&Oacute;','&Ocirc;','&Otilde;','&Ouml;','&times;','&Oslash;','&Ugrave;','&Uacute;','&Ucirc;','&Uuml;','&Yacute;','&THORN;','&szlig;','&agrave;','&aacute;','&acirc;','&atilde;','&auml;','&aring;','&aelig;','&ccedil;','&egrave;','&eacute;','&ecirc;','&euml;','&igrave;','&iacute;','&icirc;','&iuml;','&eth;','&ntilde;','&ograve;','&oacute;','&ocirc;','&otilde;','&ouml;','&divide;','&oslash;','&ugrave;','&uacute;','&ucirc;','&uuml;','&yacute;','&thorn;','&yuml;','&euro;','&sbquo;','&fnof;','&bdquo;','&hellip;','&dagger;','&Dagger;','&circ;','&permil;','&Scaron;','&lsaquo;','&OElig;','&#x017D;','&lsquo;','&rsquo;','&ldquo;','&rdquo;','&bull;','&ndash;','&mdash;','&tilde;','&trade;','&scaron;','&rsaquo;','&oelig;','&#x017E;','&Yuml;','&iexcl;','&cent;','&pound;','&curren;','&yen;','&brvbar;','&sect;','&uml;','&copy;','&ordf;','&laquo;','&not;','&reg;','&macr;','&deg;','&plusmn;','&sup2;','&sup3;','&acute;','&micro;','&para;','&middot;','&cedil;','&supl;','&ordm;','&raquo;','&frac14;','&frac12;','&frac34;','&iquest;','&Agrave;','&Aacute;','&Acirc;','&Atilde;','&Auml;','&Aring;','&AElig;','&Ccedil;','&Egrave;','&Eacute;','&Ecirc;','&Euml;','&Igrave;','&Iacute;','&Icirc;','&Iuml;','&ETH;','&Ntilde;','&Ograve;','&Oacute;','&Ocirc;','&Otilde;','&Ouml;','&times;','&Oslash;','&Ugrave;','&Uacute;','&Ucirc;','&Uuml;','&Yacute;','&THORN;','&szlig;','&agrave;','&aacute;','&acirc;','&atilde;','&auml;','&aring;','&aelig;','&ccedil;','&egrave;','&eacute;','&ecirc;','&euml;','&igrave;','&iacute;','&icirc;','&iuml;','&eth;','&ntilde;','&ograve;','&oacute;','&ocirc;','&otilde;','&ouml;','&divide;','&oslash;','&ugrave;','&uacute;','&ucirc;','&uuml;','&yacute;','&thorn;','&yuml;','&euro;','','&sbquo;','&fnof;','&bdquo;','&hellip;','&dagger;','&Dagger;','&circ;','&permil;','&Scaron;','&lsaquo;','&OElig;','','&#x017D;','','','&lsquo;','&rsquo;','&ldquo;','&rdquo;','&bull;','&ndash;','&mdash;','&tilde;','&trade;','&scaron;','&rsaquo;','&oelig;','','&#x017E;','&Yuml;','&nbsp;','&iexcl;','&iexcl;','&iexcl;','&iexcl;','&yen;','&brvbar;','&sect;','&uml;','&copy;','&ordf;','&laquo;','&not;','�&shy;','&reg;','&macr;','&deg;','&plusmn;','&sup2;','&sup3;','&acute;','&micro;','&para;','&middot;','&cedil;','&supl;','&ordm;','&raquo;','&frac14;','&frac12;','&frac34;','&iquest;','&Agrave;','&Aacute;','&Acirc;','&Atilde;','&Auml;','&Aring;','&AElig;','&Ccedil;','&Egrave;','&Eacute;','&Ecirc;','&Euml;','&Igrave;','&Iacute;','&Icirc;','&Iuml;','&ETH;','&Ntilde;','&Ograve;','&Oacute;','&Ocirc;','&Otilde;','&Ouml;','&times;','&Oslash;','&Ugrave;','&Uacute;','&Ucirc;','&Uuml;','&Yacute;','&THORN;','&szlig;','&agrave;','&aacute;','&acirc;','&atilde;','&auml;','&aring;','&aelig;','&ccedil;','&egrave;','&eacute;','&ecirc;','&euml;','&igrave;','&iacute;','&icirc;','&iuml;','&eth;','&ntilde;','&ograve;','&oacute;','&ocirc;','&otilde;','&ouml;','&divide;','&oslash;','&ugrave;','&uacute;','&ucirc;','&uuml;','&yacute;','&thorn;','&yuml;');
	//$s_String = str_replace($umlaute, $htmlcode, $s_String);
	if ( version_compare(phpversion(), '5.0.0', '>=') )
		$s_String = utf8_encode( html_entity_decode( str_replace($umlaute, $htmlcode, $s_String) ) );
	else
		$s_String = utf8_encode( RSSImport_html_entity_decode_php4( str_replace($umlaute, $htmlcode, $s_String) ) );

	// &hellip; , &#8230;
	$s_String = preg_replace('~\xC3\xA2\xE2\x82\xAC\xC2\xA6~', '&hellip;', $s_String);
	$s_String = preg_replace('~\xC3\x83\xC2\xA2\xC3\xA2\xE2\x80\x9A\xC2\xAC\xC3\x82\xC2\xA6~', '&hellip;', $s_String);
	$s_String = preg_replace('~\xD0\xB2\xD0\x82\xC2\xA6~', '&hellip;', $s_String);

	// &mdash; , &#8212;
	$s_String = preg_replace('~\xC3\xA2\xE2\x82\xAC\xE2\x80\x9D~', '&mdash;', $s_String);
	$s_String = preg_replace('~\xC3\x83\xC2\xA2\xC3\xA2\xE2\x80\x9A\xC2\xAC\xC3\xA2\xE2\x82\xAC\xC2\x9D~', '&mdash;', $s_String);
	$s_String = preg_replace('~\xD0\xB2\xD0\x82\xE2\x80\x9D~', '&mdash;', $s_String);

	// &ndash; , &#8211;
	$s_String = preg_replace('~\xC3\xA2\xE2\x82\xAC\xE2\x80\x9C~', '&ndash;', $s_String);
	$s_String = preg_replace('~\xC3\x83\xC2\xA2\xC3\xA2\xE2\x80\x9A\xC2\xAC\xC3\xA2\xE2\x82\xAC\xC5\x93~', '&ndash;', $s_String);
	$s_String = preg_replace('~\xD0\xB2\xD0\x82\xE2\x80\x9C~', '&ndash;', $s_String);

	// &rsquo; , &#8217;
	$s_String = preg_replace('~\xC3\xA2\xE2\x82\xAC\xE2\x84\xA2~', '&rsquo;', $s_String);
	$s_String = preg_replace('~\xC3\x83\xC2\xA2\xC3\xA2\xE2\x80\x9A\xC2\xAC\xC3\xA2\xE2\x80\x9E\xC2\xA2~', '&rsquo;', $s_String);
	$s_String = preg_replace('~\xD0\xB2\xD0\x82\xE2\x84\xA2~', '&rsquo;', $s_String);
	$s_String = preg_replace('~\xD0\xBF\xD1\x97\xD0\x85~', '&rsquo;', $s_String);

	// &lsquo; , &#8216;
	$s_String = preg_replace('~\xC3\xA2\xE2\x82\xAC\xCB\x9C~', '&lsquo;', $s_String);
	$s_String = preg_replace('~\xC3\x83\xC2\xA2\xC3\xA2\xE2\x80\x9A\xC2\xAC\xC3\x8B\xC5\x93~', '&lsquo;', $s_String);

	// &rdquo; , &#8221;
	$s_String = preg_replace('~\xC3\xA2\xE2\x82\xAC\xC2\x9D~', '&rdquo;', $s_String);
	$s_String = preg_replace('~\xC3\x83\xC2\xA2\xC3\xA2\xE2\x80\x9A\xC2\xAC\xC3\x82\xC2\x9D~', '&rdquo;', $s_String);
	$s_String = preg_replace('~\xD0\xB2\xD0\x82\xD1\x9C~', '&rdquo;', $s_String);

	// &ldquo; , &#8220;
	$s_String = preg_replace('~\xC3\xA2\xE2\x82\xAC\xC5\x93~', '&ldquo;', $s_String);
	$s_String = preg_replace('~\xC3\x83\xC2\xA2\xC3\xA2\xE2\x80\x9A\xC2\xAC\xC3\x85\xE2\x80\x9C~', '&ldquo;', $s_String);
	$s_String = preg_replace('~\xD0\xB2\xD0\x82\xD1\x9A~', '&ldquo;', $s_String);

	// &trade; , &#8482;
	$s_String = preg_replace('~\xC3\xA2\xE2\x80\x9E\xC2\xA2~', '&trade;', $s_String);
	$s_String = preg_replace('~\xC3\x83\xC2\xA2\xC3\xA2\xE2\x82\xAC\xC5\xBE\xC3\x82\xC2\xA2~', '&trade;', $s_String);

	// th
	$s_String = preg_replace('~t\xC3\x82\xC2\xADh~', 'th', $s_String);

	// .
	$s_String = preg_replace('~.\xD0\x92+~', '.', $s_String);
	$s_String = preg_replace('~.\xD0\x92~', '.', $s_String);

	// ,
	$s_String = preg_replace('~\x2C\xD0\x92~', ',', $s_String);

	return $s_String;
}

function parse_feed() {

    $feedURL = "http://technewscast.com/feed/";
    $widget_title = get_option("widget_title");
    $no_of_headlines = get_option("no_of_headlines");
    $background_color = get_option("background_color");
    $forground_color = get_option("foreground_color");
    $api_key = get_option("api_key");
	$rel = get_option("open_page");
	
	if(empty($no_of_headlines))
	{
		$no_of_headlines = 5;
	}
	if(empty($widget_title))
	{
		$widget_title = "Technology News";
	}
	if(empty($rel))
	{
		$rel = "_self";
	}

    $truncatetitlechar = 0;
    $truncatedescchar = 200;
    $truncatedescstring = "";
    
    $displaydescriptions = false;
    $target = " target= ";

    //require_once (ABSPATH . WPINC . '/rss.php');
    //require_once (ABSPATH . WPINC . '/rss-functions.php');

    // For function fetch_rss from wp-core
    if ( file_exists(ABSPATH . WPINC . '/rss.php') ) {
            require_once (ABSPATH . WPINC . '/rss.php');
            // It's Wordpress 2.x. since it has been loaded successfully
    } elseif (file_exists(ABSPATH . WPINC . '/rss-functions.php')) {
            require_once (ABSPATH . WPINC . '/rss-functions.php');
            // In Wordpress < 2.1
    } else {
            die (__('Error in file: ' . __FILE__ . ' on line: ' . __LINE__ . '.<br />The Wordpress file "rss-functions.php" or "rss.php" could not be included.'));
    }
    $rss = fetch_rss($feedURL);
    $items = $rss->items;
    $echo = "";
    $count = 1;
    foreach($items as $item)
    {
        $title = esc_attr( strip_tags( $item['title'] ) );
        $href  = wp_filter_kses( $item['link'] );
        $pubDate = date_i18n( $date_format, strtotime( $item['pubdate'] ) );
        $creator = wp_specialchars( $item['creator'] );
        $desc = $item['description'];

        $title = technews_all_convert($title);
        $creator = technews_all_convert($creator);
        $desc = technews_all_convert($desc);
        
        //$title = wp_html_excerpt($title, $truncatetitlechar);
        $atitle = $title;

        $echo .= "<li>";
        $echo .= '<a' . $target . $rel . ' href="' . $href . '" title="'. $atitle . '" style="background:'.$background_color.';color:'.$forground_color.'">' . $title . '</a>';
        $echo .= "</li>";
        if ( isset($pubDate) && $date && $pubDate != '' )
                $echo .= $pubDate;
        if ( isset($creator) && $creator && $creator != '' )
                $echo .= $creator;
        if ( isset($desc) && $displaydescriptions && $desc != '' ) {
                $echo .= $desc;
        }
        if($count >= $no_of_headlines)
        {
            break;
        }
        $count++;
    }
    echo $echo;
}
function rss_admin_acions()
{
    add_options_page("RSS Feed Settings Dispaly","RSS Feed Setting", 1,"rss_setting_display" ,"rss_admin");
}
add_action('admin_menu','rss_admin_acions');


/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'technews_load_widgets' );

/**
 * Register our widget.
 * 'Technews_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function technews_load_widgets() {
	register_widget( 'Technews_Widget' );
}

/**
 * Technews Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Technews_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Technews_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'technews', 'description' => __('Technews RSS Feed Widget', 'technews') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'technews-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'technews-widget', __('Technews Widget', 'technews'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title',get_option("widget_title") );
		$name = $instance['name'];
		$sex = $instance['sex'];
		$show_sex = isset( $instance['show_sex'] ) ? $instance['show_sex'] : false;

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

                  echo "<ul>";
                    echo parse_feed();
                  echo "</ul>";
                  if(get_option("credit_author") == "yes")
                  {
                    echo "<a href='http://technewscast.com/'>Powered by Technology News</a>";
                  }

		/* After widget (defined by themes). */
		echo $after_widget;
	}
}

?>