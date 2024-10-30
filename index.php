<?php

/*

Plugin name: Concrete Calculator
Author: Md. Sarwar-A-Kawsar
Description: This plugin is for concrete calculator which has shortcode and widget feature visualize this calculator anywhere
Version: 1.0

*/

defined('ABSPATH') or die('You can\'t access in this page');

class C_Calculator{

	function __construct(){
		add_shortcode('concrete-calculator', array($this,'concrete_calculator_shortcode_func'));
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
		add_action('admin_menu',array($this,'cc_admin_menu'));
	}

	function enqueue_scripts() {
		wp_enqueue_style( 'min', plugin_dir_url(__FILE__ ).'asset/css/min.css');
		wp_enqueue_style( 'c_calculator-style', plugin_dir_url(__FILE__ ).'asset/css/style.css');
		wp_enqueue_style( 'c_calculator-style-bootstrap', plugin_dir_url(__FILE__ ).'asset/css/bootstrap.min.css');
		wp_enqueue_script( 'calculator-script', plugin_dir_url(__FILE__ ).'asset/js/calc.js', array(), $ver = false, true );
	}

	function active(){
		flush_rewrite_rules();
	}

	function deactive(){
		flush_rewrite_rules();
	}

	function concrete_calculator_shortcode_func(){
		$cur_unit = get_option('cc_unit_type');
		if($cur_unit && $cur_unit == 'english'):
			$output = file_get_contents(plugin_dir_path( __FILE__ ).'shortcode_function.php');
		else:
			$output = file_get_contents(plugin_dir_path( __FILE__ ).'shortcode_function_metric.php');
		endif;
		// $output .= ' <a id="qoute" class="btn btn-orange get_a_qoute" href="'.home_url().'/contact">Get a quote</a>';
		$output .= '</p></div></form></div></div>';
		return $output;
	}

	function cc_admin_menu(){
		add_options_page( 'Concrete Calculator', 'Concrete Calculator', 'manage_options', 'sak_cc', array($this,'cc_option_page_callback' ));
	}
	function cc_option_page_callback(){
		if(isset($_POST['update_unit'])):
			$unit_type = $_POST['unit_type'];
			update_option('cc_unit_type',$unit_type);
				echo '<div class="notice notice-success is-dismissible">
	             <p>Unit has been updated!</p>
	         </div>';
		endif;
		$cur_unit = get_option('cc_unit_type');
		?>
		<h2>Concrete calculator settings</h2>
		<table class="form-table"><form method="post">
	        <tr>
	            <th>
	                <label for="">Unit type</label>
	            </th>
	            <td>
	            	<input type="radio" name="unit_type" <?php echo $cur_unit == 'metric' ? 'checked' : ($cur_unit == false ? 'checked' : ''); ?>  value="metric" /> Metric
	            	<input type="radio" name="unit_type" <?php echo $cur_unit == 'english' ? 'checked' : ''; ?> value="english" /> English
	            </td>
	        </tr>
	        <tr>
	            <th>
	                <input type="submit" name="update_unit" class="button button-primary" value="Update"/>
	            </th>
	        </tr></form>
	    </table>
		<?php
		// echo ob_get_clean();
	}
}

if( class_exists('C_Calculator')){
	$C_Calculator = new C_Calculator();
}

register_activation_hook(__FILE__,array($C_Calculator,'active'));
register_deactivation_hook(__FILE__,array($C_Calculator,'deactive'));