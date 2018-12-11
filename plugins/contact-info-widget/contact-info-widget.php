<?php
/**
 * Contact Info Widget
 *
 * The Contact Info for edit contact info on custom made theme.
 *
 * Lightly forked from the WordPress Widget Boilerplate by @tommcfarlin.
 *
 * @package   Contact_Info_Widget
 * @author    Agata Swistowska agata@swistowski.org
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2018 Agata Swistowska
 *
 * @wordpress-plugin
 * Plugin Name:       Contact Info Widget
 * Plugin URI:        http://www.redacademy.com/inhabitent
 * Description:       A nifty contact info widget built custom for the Inhabitent site
 * Version:           1.0.0
 * Author:            Agata Swistowska
 * Author URI:        http://redacademy.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

class Contact_Info_Widget extends WP_Widget {

    /**
     * @widget-name Contact_Info_Widget
     *
     * Unique identifier for your widget.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    protected $widget_slug = 'contact-info-widget';

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/

	/**
	 * Specifies the classname and description, and instantiates the widget.
	 */
	public function __construct() {

		// TODO: update description
		parent::__construct(
			$this->get_widget_slug(),
			'Contact Info Widget',
			array(
				'classname'  => $this->get_widget_slug().'-class',
				'description' => "Add the store's contact informations."
			)
		);

	} // end constructor

    /**
     * Return the widget slug.
     *
     * @since    1.0.0
     *
     * @return    Plugin slug variable.
     */
    public function get_widget_slug() {
        return $this->widget_slug;
    }

	/*--------------------------------------------------*/
	/* Widget API Functions
	/*--------------------------------------------------*/

	/**
	 * Outputs the content of the widget.
	 *
	 * @param array $args     The array of form elements
	 * @param array $instance The current instance of the widget
	 */
	public function widget( $args, $instance ) {

		if ( ! isset ( $args['widget_id'] ) ) {
         $args['widget_id'] = $this->id;
      }

		// go on with your widget logic, put everything into a string and …

		extract( $args, EXTR_SKIP );

		$widget_string = $before_widget;

		// Manipulate the widget's values based on their input fields
		
		$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
		$email = empty( $instance['email'] ) ? '' : apply_filters( 'email', $instance['email'] );
		$phone_number = empty( $instance['phone_number'] ) ? '' : apply_filters( 'phone_number', $instance['phone_number'] );
		$address_line_1 = empty( $instance['address_line_1'] ) ? '' : apply_filters( 'address_line_1', $instance['address_line_1'] );
		$address_line_2 = empty( $instance['address_line_2'] ) ? '' : apply_filters( 'address_line_2', $instance['address_line_2'] );
		$address_line_3 = empty( $instance['address_line_3'] ) ? '' : apply_filters( 'address_line_3', $instance['address_line_3'] );
		$postcode = empty( $instance['postcode'] ) ? '' : apply_filters( 'postcode', $instance['postcode'] );

		ob_start();

		if ( $title ){
			$widget_string .= $before_title;
			$widget_string .= $title;
			$widget_string .= $after_title;
		}

		include( plugin_dir_path( __FILE__ ) . 'views/widget.php' );
		$widget_string .= ob_get_clean();
		$widget_string .= $after_widget;

		print $widget_string;

	} // end widget

	/**
	 * Processes the widget's options to be saved.
	 *
	 * @param array $new_instance The new instance of values to be generated via the update.
	 * @param array $old_instance The previous instance of values before the update.
	 * @return.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['phone_number'] = strip_tags( $new_instance['phone_number'] );
		$instance['email'] = strip_tags( $new_instance['email'] );
		$instance['address_line_1'] = strip_tags( $new_instance['address_line_1'] );
		$instance['address_line_2'] = strip_tags( $new_instance['address_line_2'] );
		$instance['address_line_3'] = strip_tags( $new_instance['address_line_3'] );
		$instance['postcode'] = strip_tags( $new_instance['postcode'] );

		return $instance;

	} // end widget

	/**
	 * Generates the administration form for the widget.
	 *
	 * @param array $instance The array of keys and values for the widget.
	 */
	public function form( $instance ) {

		// TODO: Define default values for your variables, create empty value if no default
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => 'Contact Info',
				'phone_number' => '',
				'email' => '',
				'address_line_1' => '',
				'address_line_2' => '',
				'address_line_3' => '',
				'postcode' => '',
			)
		);

		$title = strip_tags( $instance['title'] );
		// TODO: Store the rest of values of the widget in their own variables
		$phone_number = strip_tags( $instance['phone_number'] );
		$email = strip_tags( $instance['email'] );
		$address_line_1 = strip_tags( $instance['address_line_1'] );
		$address_line_2 = strip_tags( $instance['address_line_2'] );
		$address_line_3 = strip_tags( $instance['address_line_3'] );
		$postcode = strip_tags( $instance['postcode'] );

		// Display the admin form
		include( plugin_dir_path( __FILE__ ) . 'views/admin.php' );

	} // end form

} // end class

// TODO: Remember to change 'Widget_Name' to match the class name definition
add_action( 'widgets_init', function(){
     register_widget( 'Contact_Info_Widget' );
});
