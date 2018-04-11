<?php
// File: imports.php

function bestbooks_importer_init() {
    /**
     * WordPress Importer object for registering the import callback
     * @global WP_Import $wp_import
     */
    //$GLOBALS['wp_barnimport'] = new WP_BarnImport();
	register_importer( 'bestbooksimport', 'BestBooks Import', __('Import into BestBooks'), 'bestbooks_import_dispatch' );

}
add_action( 'admin_init', 'bestbooks_importer_init' );

function bestbooks_import_dispatch() {
    global $wpdb;
    
    $step = empty( $_GET['step'] ) ? 0 : (int) $_GET['step'];
    switch ( $step ) {
        case 0:
            {
            ?>
<script type="text/javascript">
    jQuery(document).ready(function($){
        var action = $('#import-upload-form').attr('action');
        $('#bbimportfile').change(function(){
            var selected = $(this).val();
            if (selected != "") {
               var new_action = action + '&type=' + selected;
               $('#import-upload-form').attr('action',new_action);
            } else {
               $('#import-upload-form').attr('action',action); 
            }
        });
    });
</script>
            <?php
		echo '<div class="narrow">';
		echo '<h2>'.__( 'Import into BestBooks' ).'</h2>';
		echo '<label for="bbimportfile">File Type</label>';
		echo '<select name="bbimportfile" id="bbimportfile">';
		echo '<option value="">Select</option>';
		echo '<option value="transactions">Stripe Transactions</option>';
		echo '</select><br/>';

		wp_import_upload_form( 'admin.php?import=bestbooksimport&amp;step=1' );
		echo '</div>';
            }
            break;
        case 1:
            {
        		check_admin_referer( 'import-upload' );
				$file = wp_import_handle_upload();
		                
				if ( isset( $file['error'] ) ) {
					echo '<p><strong>' . __( 'Sorry, there has been an error.') . '</strong><br />';
					echo esc_html( $file['error'] ) . '</p>';
					return false;
				} else if ( ! file_exists( $file['file'] ) ) {
					echo '<p><strong>' . __( 'Sorry, there has been an error.') . '</strong><br />';
					printf( __( 'The export file could not be found at <code>%s</code>. It is likely that this was caused by a permissions problem.', 'wordpress-importer' ), esc_html( $file['file'] ) );
					echo '</p>';
					return false;
				}

                $fp = fopen($file['file'],'r');
                ini_set('auto_detect_line_endings',TRUE);
                
                while (($import_data = fgetcsv( $fp )) !== FALSE) {
                	if (isset($_GET['type'])) {
                		$filetype = $_GET['type'];
                		switch ($filetype) {
                			case 'transactions':
                				{
				                	$date = $import_data[8];
				                	$description = $import_data[10];
				                	$type = $import_data[1];
				                	$amount = $import_data[3];
				                	$fee = $import_data[4];
				                	try {
					                	if ($type === 'charge') {
					                		if (abs($fee) > 0) {
					                			do_action('bestbooks_bankfee', $date, "Fee", abs($fee));     		
					                		}
					                		if (abs($amount) > 0) {
					                			do_action('bestbooks_sales_card', $date, $description, abs($amount));
					                		}
					                	} elseif ($type === 'payout') {
					                		if (abs($amount) > 0) {
					                			do_action('bestbooks_accountreceivable_payment', $date, $description, abs($amount) );
					                		}
					                	}
				                	} catch (Exception $ex) {
				                		echo $ex->getMessage().'<br/>';
				                	}
				                	echo $date.','.$description.','.$type.','.$amount.','.$fee.'<br/>';
                				}
                		}
                	}
                }
                ini_set('auto_detect_line_endings',FALSE);
                
                fclose($fp);
                @unlink($file['file']);
            }
            break;
        case 2:
            {
            }
            break;
    }
    
    echo '<div></div>';

}


?>