<?php 
	$layout = strtolower(block_value( 'layout' ));
?>

<div class="ct-callout ct-callout--<?php echo $layout ?>">
<?php 
while(block_rows( 'call-out' )) {
	block_row( 'call-out' );

	$card_title = block_sub_value( 'title' );
	$card_content = block_sub_value( 'content' );
	$card_icon = block_sub_value( 'icon' );
	$card_show_icon = block_sub_value( 'show-icon' );
	
	$icon = false;
	
	if ($card_icon) {
		$icon = get_post_field('icon_file', $card_icon);
		$icon = get_attached_file($icon);
	}
?>
	<div class="ct-callout-wrap">
		<div class="ct-callout-card">
			<?php if ($card_show_icon) { ?>
				<div class="ct-callout-icon">
					<?php echo file_get_contents($icon) ?>
				</div>
			<?php } ?>
			<div class="ct-callout-content">
				<?php if ($card_title) { ?>
					<div class="ct-callout-title"><?php echo $card_title ?></div>
				<?php } ?>
				<?php if ($card_content) { ?>
					<div class="ct-callout-content"><?php echo $card_content ?></div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php 
}

reset_block_rows( 'call-out' );
?>
</div>