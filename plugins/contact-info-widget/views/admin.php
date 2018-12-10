<!-- This file is used to markup the administration form of the widget. -->

<div class="widget-content">
    <ul>
   <li><label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
               name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>">
   </li>
   <li><label for="<?php echo $this->get_field_id('email'); ?>">Email:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>"
               name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>">
    </li>
    <li><label for="<?php echo $this->get_field_id('phone_number'); ?>">Phone Number:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('phone_number'); ?>"
               name="<?php echo $this->get_field_name('phone_number'); ?>" type="text" value="<?php echo $phone_number; ?>">
    </li>
    <li><label for="<?php echo $this->get_field_id('address_line_1'); ?>">Address Line 1:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('address_line_1'); ?>"
               name="<?php echo $this->get_field_name('address_line_1'); ?>" type="text" value="<?php echo $address_line_1; ?>">
    </li>
    <li><label for="<?php echo $this->get_field_id('address_line_2'); ?>">Address Line 2:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('address_line_2'); ?>"
               name="<?php echo $this->get_field_name('address_line_2'); ?>" type="text" value="<?php echo $address_line_2; ?>">
    </li>
    <li><label for="<?php echo $this->get_field_id('address_line_3'); ?>">Address Line 3:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('address_line_3'); ?>"
               name="<?php echo $this->get_field_name('address_line_3'); ?>" type="text" value="<?php echo $address_line_3; ?>">
    </li>
    <li><label for="<?php echo $this->get_field_id('postcode'); ?>">Postcode:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('postcode'); ?>"
               name="<?php echo $this->get_field_name('postcode'); ?>" type="text" value="<?php echo $postcode; ?>">
    </li>
    </ul>
</div>
