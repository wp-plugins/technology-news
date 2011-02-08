<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if ($_POST["feed_hidden"] == "Y") {
    $widget_title = $_POST['widget_title'];
    update_option('widget_title', $widget_title);

    $no_of_headlines = $_POST['no_of_headlines'];
    update_option('no_of_headlines', $no_of_headlines);

    $background_color = $_POST['background_color'];
    update_option('background_color', $background_color);

    $forground_color = $_POST['foreground_color'];
    update_option('foreground_color', $forground_color);

    $api_key = $_POST['api_key'];
    update_option('api_key', $api_key);

    $open_page = $_POST['open_page'];
    update_option('open_page', $open_page);

    $credit_author = $_POST['credit_author'];
    update_option('credit_author', $credit_author);

?>
<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
<?php
} else {
    $widget_title = get_option("widget_title");
    $no_of_headlines = get_option("no_of_headlines");
    $background_color = get_option("background_color");
    $forground_color = get_option("foreground_color");
    $api_key = get_option("api_key");
    $open_page = get_option("open_page");
    $credit_author = get_option("credit_author");
}
?>
<div class="wrap">
<?php echo "<h2>" . __('RSS Feed Display Options', 'oscimp_trdom') . "</h2>"; ?>

    <form name="feed_form" method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="feed_hidden" value="Y">
<?php echo "<h4>" . __('RSS Feed Settings', 'oscimp_trdom') . "</h4>"; ?>
        <p><?php _e("Widget Title:    "); ?><input type="text" name="widget_title" value="<?php echo $widget_title; ?>" size="20"></p>
        <p><?php _e("No of headlines: "); ?><input type="text" name="no_of_headlines" value="<?php echo $no_of_headlines; ?>" size="20"><?php _e(" Default is 5"); ?></p>
        <p><?php _e("Background Color:"); ?><input type="text" name="background_color" value="<?php echo $background_color; ?>" size="20"><?php _e(" ex: #FF0000 or red"); ?></p>
        <p><?php _e("Foreground Color:"); ?><input type="text" name="foreground_color" value="<?php echo $forground_color; ?>" size="20"><?php _e(" ex: #FF0000 or Yellow"); ?></p>
        <p><?php _e("Open Page:       "); ?><input type="text" name="open_page" value="<?php echo $open_page; ?>" size="20"><?php _e(" ex: _self or _blank"); ?></p>
        <p><?php _e("API Key:         "); ?><input type="text" name="api_key" value="<?php echo $api_key; ?>" size="20"><?php _e(" Contact with API Vendor"); ?></p>
        <p><?php _e("Credit Author:"); ?><select name="credit_author"><option value="yes" <?php echo $credit_author=="yes"?"selected='selected'":""?>">Yes</option><option value="no" <?php echo $credit_author=="no"?"selected='selected'":""?>>No</option></select></p>

        <p class="submit">
            <input type="submit" name="Submit" value="<?php _e('Update Options', 'oscimp_trdom') ?>" />
        </p>
    </form>
</div>

