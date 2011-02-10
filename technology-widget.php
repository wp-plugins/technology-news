<?php
/**
    Plugin Name: Technology News
    Plugin URI: http://www.technewscast.com/downloads/wpplugin
    Description: Get the Technology News as it happens. Latest Tech updates, Technology Articles and Press release. After Plugin activation please go to widget area under Appearance tag to set options.
    Author: Technewscast
    Version: 1.0
    Author URI: http://www.technewscast.com/
 */

function parse_feed($options) {

    $feedURL = "http://technewscast.com/feed/";
    $widget_title = $options["widget_title"];
    $no_of_headlines = $options["no_of_headlines"];
    $background_color = $options["background_color"];
    $foreground_color = $options["foreground_color"];
    $api_key = $options["api_key"];

	if(empty($no_of_headlines))
	{
		$no_of_headlines = 5;
	}
	if(empty($widget_title))
	{
		$widget_title = "Technology News";
	}

    $truncatetitlechar = 0;
    $truncatedescchar = 200;
    $truncatedescstring = "";
    $rel = $options["open_page"];
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

        //$title = technews_all_convert($title);
        //$creator = technews_all_convert($creator);
        //$desc = technews_all_convert($desc);

        //$title = wp_html_excerpt($title, $truncatetitlechar);
        $atitle = $title;

        $echo .= "<li>";
        $echo .= '<a' . $target . $rel . ' href="' . $href . '" title="'. $atitle . '" style="background:'.$background_color.';color:'.$foreground_color.'">' . $title . '</a>';
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

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'technews_load_widgets' );

/**
 * Register our widget.
 * 'Technology_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function technews_load_widgets() {
	register_widget( 'Technology_Widget' );
}

/**
 * Technology News  class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Technology_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Technology_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'technews', 'description' => __('A widget to display updates technology news.', 'technews') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'technews-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'technews-widget', __('Technology News ', 'technews'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title',$instance["widget_title"]);
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

                  echo "<ul>";
                    echo parse_feed($instance);
                  echo "</ul>";
                  if($instance["credit_author"] == "yes")
                  {
                    echo "<a href='http://technewscast.com/'>Powered by Technology News</a>";
                  }

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['widget_title'] = strip_tags( $new_instance['widget_title'] );
                $instance['no_of_headlines'] = strip_tags( $new_instance['no_of_headlines'] );
                $instance['background_color'] = strip_tags( $new_instance['background_color'] );
                $instance['foreground_color'] = strip_tags( $new_instance['foreground_color'] );
                $instance['open_page'] = strip_tags( $new_instance['open_page'] );
                $instance['api_key'] = strip_tags( $new_instance['api_key'] );
                $instance['credit_author'] = strip_tags( $new_instance['credit_author'] );


		/* No need to strip tags for sex and show_sex. */
		$instance['widget_title'] = $new_instance['widget_title'];
                $instance['no_of_headlines'] = $new_instance['no_of_headlines'];
                $instance['background_color'] = $new_instance['background_color'];
                $instance['foreground_color'] = $new_instance['foreground_color'];
                $instance['open_page'] = $new_instance['open_page'];
                $instance['api_key'] = $new_instance['api_key'];
                $instance['credit_author'] = $new_instance['credit_author'];

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'widget_title' => __('Technology News', 'technews'), 'no_of_headlines' => __('5', 'technews'),'background_color'=>'','foreground_color'=>'','open_page'=>'_blank', 'credit_author' => 'yes');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

                <p>
                    <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e('Title:', 'technews'); ?></label>
                     <input id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" value="<?php echo $instance['widget_title']; ?>" style="width:100%;" />
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'no_of_headlines' ); ?>"><?php _e('No of headlines:', 'technews'); ?></label>
                     <input id="<?php echo $this->get_field_id( 'no_of_headlines' ); ?>" name="<?php echo $this->get_field_name( 'no_of_headlines' ); ?>" value="<?php echo $instance['no_of_headlines']; ?>" style="width:100%;" />
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php _e('Background Color:', 'technews'); ?></label>
                     <input id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" value="<?php echo $instance['background_color']; ?>" style="width:100%;" />
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'foreground_color' ); ?>"><?php _e('Foreground Color:', 'technews'); ?></label>
                     <input id="<?php echo $this->get_field_id( 'foreground_color' ); ?>" name="<?php echo $this->get_field_name( 'foreground_color' ); ?>" value="<?php echo $instance['foreground_color']; ?>" style="width:100%;" />
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'open_page' ); ?>"><?php _e('Open Page:', 'technews'); ?></label>
                     <input id="<?php echo $this->get_field_id( 'open_page' ); ?>" name="<?php echo $this->get_field_name( 'open_page' ); ?>" value="<?php echo $instance['open_page']; ?>" style="width:100%;" />
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'api_key' ); ?>"><?php _e('API Key:', 'technews'); ?></label>
                     <input id="<?php echo $this->get_field_id( 'api_key' ); ?>" name="<?php echo $this->get_field_name( 'api_key' ); ?>" value="<?php echo $instance['api_key']; ?>" style="width:100%;" />
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'credit_author' ); ?>"><?php _e('Credit Author:', 'technews'); ?></label>
                    <select id="<?php echo $this->get_field_id( 'credit_author' ); ?>" name="<?php echo $this->get_field_name( 'credit_author' ); ?>"><option value="yes" <?php echo $instance['credit_author']=="yes"?"selected='selected'":""?>>Yes</option><option value="no" <?php echo $instance['credit_author']=="no"?"selected='selected'":""?>>No</option></select>
-                </p>

	<?php
	}
}

?>