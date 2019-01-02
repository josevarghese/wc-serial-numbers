<?php if ( ! isset( $_REQUEST['action'] ) && $_REQUEST['action'] != 'edit' ) {

	include WPWSN_INCLUDES . '/admin/class-serial-list-table.php';

	$serial_list = new Pluginever\WCSerialNumbers\Admin\Serial_List_Table();

	$serial_list->prepare_items();

	?>

	<div class="wrap wsn-container">
		<h1 class="wp-heading-inline"><?php _e( 'Serial Numbers', 'wc-serial-numbers' ) ?></h1>
		<a href="<?php echo admin_url( 'admin.php?page=add-serial-number' ) ?>"
			class="page-title-action"><?php _e( 'Add new serial number', 'wc-serial-numbers' ) ?></a>
		<div class="wsn-body">
			<?php
			$serial_list->search_box( 'Search', 'search_id' );

			echo '<form id="wsn-serial-numbers-table" action="' . admin_url( 'admin-post.php' ) . '" method="post">
			  <input type="hidden" name="wsn-serial-numbers-table-action">'
			     . wp_nonce_field( 'wsn-serial-numbers-table', 'wsn-serial-numbers-table-nonce' );

			$serial_list->display();

			echo '</form>';

			?>
		</div>
	</div>

<?php } elseif ( $_REQUEST['action'] == 'edit' ) {

	include WPWSN_TEMPLATES_DIR . '/add-serial-number.php';

} elseif ( $_REQUEST['action'] == 'delete' ) {

	wp_delete_post( $_REQUEST['serial_number'] );

	wp_redirect( admin_url( 'admin.php?page=serial-numbers' ) );

} ?>
