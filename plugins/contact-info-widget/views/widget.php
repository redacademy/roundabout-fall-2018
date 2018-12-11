<!-- This file is used to markup the public-facing widget. -->
<?php if(strlen(trim($email)) > 0) : ?>
<ul>
<li class="info">
    <a href="mailto:<?php echo $email?>"><?php echo $email?></a>
</li>
<?php endif; ?>
<?php if(strlen(trim($phone_number)) > 0) : ?>
<li class="info">
    <?php echo $phone_number?>
</li>
<?php endif;?>
<?php if(strlen(trim($address_line_1)) > 0) : ?>
<li class="info">
    <?php echo $address_line_1?>
</li>
<?php endif; ?>
<?php if(strlen(trim($address_line_2)) > 0) : ?>
<li class="info">
    <?php echo $address_line_2?>
</li>
<?php endif; ?>
<?php if(strlen(trim($address_line_3)) > 0) : ?>
<li class="info">
    <?php echo $address_line_3?>
</li>
<?php endif; ?>
<?php if(strlen(trim($postcode)) > 0) : ?>
<li class="info">
    <?php echo $postcode?>
</li>
<?php endif; ?>
</ul>