<?php
	$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
	if (file_exists($root.'/wp-load.php')) {
		require_once($root.'/wp-load.php');
	}
	add_action('wp_head', wp_enqueue_script('jquery'));
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php _e('Zazzle Products', 'zazzle'); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo ZAZZLE_URLPATH ?>/tinymce/tinymce.js"></script>
	<?php wp_head(); ?>

	<base target="_self" />
</head>
<body id="link" onload="tinyMCEPopup.executeOnLoad('init();'); document.body.style.display='';" style="display: none">
	<form name="zazzle" action="#">
		<div class="tabs">
			<ul>
				<li id="tab_general" class="current"><span><a href="javascript:mcTabs.displayTab('tab_general','panel_basic');" onmousedown="return false;"><?php _e('General', 'zazzle'); ?></a></span></li>
			</ul>
		</div>
		
		<div class="panel_wrapper">
			<div id="panel_basic">
				<fieldset>
					<legend><?php _e('Product Gallery Size', 'zazzle'); ?></legend>

					<table border="0" cellpadding="4" cellspacing="0">
						<tr>
							<td><label for="cols"><?php _e('Columns', 'zazzle'); ?></label></td>
							<td><input id="cols" name="cols" type="text" size="2" maxlength="3" value="" /></td>
						</tr>
						<tr>
							<td><label for="rows"><?php _e('Rows', 'zazzle'); ?></label></td>
							<td><input id="rows" name="rows" type="text" size="2" maxlength="3" value="" /></td>
						</tr>
					</table>
				</fieldset>
			</div>
		</div>

		<div class="mceActionPanel">
			<div style="float: left">
				<input type="button" id="cancel" name="cancel" value="<?php _e('Cancel'); ?>" onclick="tinyMCEPopup.close();" />
			</div>

			<div style="float: right">
				<input type="submit" id="insert" name="insert" value="<?php _e('Insert'); ?>" onclick="insertZazzleShortcode();" />
			</div>
		</div>
	</form>
</body>
</html>
