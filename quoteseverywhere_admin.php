<?php 
	if($_POST['quotinhead_hidden'] == 'Y') {
		//Form data sent
		$quotinhead_quotes = $_POST['quotinhead_quotes'];
		update_option('quotinhead_quotes', $quotinhead_quotes);
		$quotes_with_slashes = $_POST['quotinhead_quotes'];
		$quotes_without_slashes = str_replace( "\\", "", $quotes_with_slashes);

		$quotinhead_quote_style = $_POST["quotinhead_quote_style"];
		update_option('quotinhead_quote_style', $quotinhead_quote_style);
		$quote_style_with_slashes = $_POST['quotinhead_quote_style'];
		$quote_style_without_slashes = str_replace( "\\", "", $quote_style_with_slashes);

		$quotinhead_quote_tags = $_POST["quotinhead_quote_tags"];
		update_option('quotinhead_quote_tags', $quotinhead_quote_tags);
		$quote_tags_with_slashes = $_POST['quotinhead_quote_tags'];
		$quote_tags_without_slashes = str_replace( "\\", "", $quote_tags_with_slashes);
		?>
		
		<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
		<?php
	
	} else {
		//Normal page display
		$quotinhead_quotes = get_option('quotinhead_quotes');
		$quotes_with_slashes = get_option('quotinhead_quotes');
		$quotes_without_slashes = str_replace( "\\", "", $quotes_with_slashes);

		$quotinhead_quote_style = get_option('quotinhead_quote_style');
		$quote_style_with_slashes = get_option('quotinhead_quote_style');
		$quote_style_without_slashes = str_replace( "\\", "", $quote_style_with_slashes);

		$quotinhead_quote_tags = get_option('quotinhead_quote_tags');
		$quote_tags_with_slashes = get_option('quotinhead_quote_tags');
		$quote_tags_without_slashes = str_replace( "\\", "", $quote_tags_with_slashes);
		}
	
	$styleashtml1 = "<style type='text/css'>";
	$styleashtml2 = "#quote {";
	$styleashtml3 = "}"; 
	$styleashtml4 = "</style>";
	$styleashtml5 = "// This makes sure that the positioning is also good for right-to-left languages:";
	$styleashtml6 = "x = is_rtl() ? 'right' : 'left';";
	
?>

<div class="wrap">
<?php    echo "<h2>" . __( 'Quotes Everywhere!', 'quoteseverywhere_trdom' ) . "</h2>"; ?>

<form name="quotinhead_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="quotinhead_hidden" value="Y">
	<?php    echo "<h3>" . __( 'Settings', 'quoteseverywhere_trdom' ) . "</h3>"; ?><h4 style="float: right"><a href="http://wordpress.org/plugins/quotes-everywhere/">Plugin page</a></h4>
	
	<?php _e("Every Wordpress user knows the 'Hello Dolly' plugin. Ever wondered how you got your own favorite song lyrics, or inspirational quotes anywhere on your site?
Great! Welcome to 'Quotes Everywhere!', it's like 'Hello Dolly', but with your own quotes, everywhere where you want, and way more customisable!
<br>This plugin could not have been created without 'Hello Dolly' plugin." ); ?>
<br><a href="http://sam-simons.nl/">Created by Sam Simons.</a><p>
	<p><strong><?php _e("Please note: before you're able to use this plugin, you'll need to put the following little bit of php on the spot where you want the quotes to appear!"); ?></strong>
	<br><input type="text" name="bitofcode" value="do_action('quotehere');" disabled="disabled">
	
	<p><h4><?php _e("Quotes (every line another quote, don't leave empty lines): " ); ?></h4>
	<br><textarea style="margin: 1px; width: 599px; height: 250px;" name="quotinhead_quotes"><?php echo $quotinhead_quotes; ?></textarea></p>
	
	<p><br><h4><?php _e("HTML tags:"); ?></h4>'&#36;chosen' equals the chosen quote, make sure it's in the tag. Also make sure the id of the quote is 'quote', otherwise the style customisations you'll make below won't work out. There is an example on the right.<br><p><textarea style="margin: 1px; width: 599px; height: 100px;" name="quotinhead_quote_tags"><?php echo stripslashes($quotinhead_quote_tags); ?></textarea> <textarea disabled style="margin: 1px; width: 400px; height: 100px;" name="quotinhead_quote_tags_default"><p id='quote'>$chosen</p></textarea>
	
	<p><br><h4><?php _e("Style (CSS):"); ?></h4>Optional, when you don't set a CSS code over here, it'll just act as other text elements on the spot you put the quote. Example on the right.<br><p><?php echo htmlentities($styleashtml5); ?><br>&#36;<?php echo htmlentities($styleashtml6); ?><br><br><?php echo htmlentities($styleashtml1); ?><br><?php echo htmlentities($styleashtml2); ?>
	<br><textarea style="margin: 1px; width: 599px; height: 250px;" name="quotinhead_quote_style"><?php echo $quotinhead_quote_style; ?></textarea> <textarea disabled style="margin: 1px; width: 400px; height: 100px;" name="quotinhead_quote_style_default">margin: 0; font-size: 11px; color: black; text-decoration: none;
padding-$x: 0px; padding-top: 0px;</textarea>
	<br><?php echo htmlentities($styleashtml3); ?><br><?php echo htmlentities($styleashtml4); ?>
	

<hr />
	
	<p class="submit">
	<input type="submit" name="Submit" value="<?php _e('Update Options', 'quoteseverywhere_trdom' ) ?>" />
	</p>
</form>
</div>