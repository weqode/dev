<?php
/**
 * wq contact form.
 */
 // Form markup
 function wq_form_code()
 {
     ?>
     <div class="wq-contact-form">
         <form action="<?php esc_url($_SERVER['REQUEST_URI']);
     ?>" method="post">
             <p>
              <input type="text" name="wq-name" placeholder="Name ( required )" pattern="[a-zA-Z0-9 ]+" value="<?php isset($_POST['wq-name']) ? esc_attr($_POST['wq-name']) : '';
     ?><?php if (isset($_POST['wq-name'])) {
    echo htmlentities($_POST['wq-name']);
}
     ?>" size="40" />
             </p>
             <p>
              <input type="email" name="wq-email" placeholder="Email ( required )" value="<?php isset($_POST['wq-email']) ? esc_attr($_POST['wq-email']) : '';
     ?><?php if (isset($_POST['wq-email'])) {
    echo htmlentities($_POST['wq-email']);
}
     ?>" size="40" />
             </p>
             <p>
              <input type="tel" name="wq-tel" placeholder="Telephone" pattern="^\s*\(?(020[7,8]{1}\)?[ ]?[1-9]{1}[0-9{2}[ ]?[0-9]{4})|(0[1-8]{1}[0-9]{3}\)?[ ]?[1-9]{1}[0-9]{2}[ ]?[0-9]{3})\s*$" value="<?php isset($_POST['wq-tel']) ? esc_attr($_POST['wq-tel']) : '';
     ?><?php if (isset($_POST['wq-tel'])) {
    echo htmlentities($_POST['wq-tel']);
}
     ?>" size="40" />
             </p>
             <p>
              <textarea class="wq-message" rows="10" cols="35" name="wq-message" placeholder="Message ( required )" onkeyup="adjust_textarea( this )"><?php isset($_POST['wq-message']) ? esc_attr($_POST['wq-message']) : '';
     ?><?php if (isset($_POST['wq-message'])) {
    echo htmlentities($_POST['wq-message']);
}
     ?></textarea>
             </p>
             <p><input type="text" name="content" id="content" value="" class="hpot" /></p>
             <p><input class="wq-submit" type="submit" name="wq-submitted" value="Send"/></p>
         </form>
     </div>
     <?php

 }
 // Form validation
 function wq_validate_form()
 {
     $errors = new WP_Error();
     if (isset($_POST[ 'content' ]) && $_POST[ 'content' ] !== '') {
         $errors->add('bot', 'Sorry, this field should not be filled in. Robots only');
     }
     if (isset($_POST[ 'wq-name' ]) && $_POST[ 'wq-name' ] == '') {
         $errors->add('name_error', 'Please fill in a valid name.');
     }
     if (isset($_POST[ 'wq-email' ]) && $_POST[ 'wq-email' ] == '') {
         $errors->add('email_error', 'Please fill in a valid email.');
     }
     if (isset($_POST[ 'wq-message' ]) && $_POST[ 'wq-message' ] == '') {
         $errors->add('message_error', 'Please fill in a valid message.');
     }

     return $errors;
 }
 // Form delivery
 function wq_deliver_mail($args = array())
 {
     // This $default array is a way to initialize some default values that will be overwritten by our $args array.
     // We could add more keys as we see fit and it's a nice way to see what parameter we are using in our function.
     // It will only be overwritten with the values of our $args array if the keys are present in $args.
     // This uses WP wp_parse_args() function.
     $defaults = array(
         'name' => '',
         'email' => '',
         'tel' => '',
         'message' => '',
         'to' => get_option('admin_email'), // get the administrator's email address
     );
     $args = wp_parse_args($args, $defaults);
     $headers = "From: {$args['name']}  <{$args['email']}>"."\r\n";
     // Send email returns true on success, false otherwise
     if (wp_mail($args['to'], $args['tel'], $args['message'], $headers)) {
         return;
     } else {
         return false;
     }
 }
 // Form sanitize
 function wq_sanitize_field($input)
 {
     return trim(stripslashes(sanitize_text_field($input)));
 }
 // Form success message
 function wq_form_message()
 {
     global $errors;
     if (is_wp_error($errors) && empty($errors->errors)) {
         ?>
         <section class="alertbox-success">
             <div class="wq-success">
                 <p>Thank you for contacting us <?php if (isset($_POST['wq-name']) && !empty($_POST['wq-name'])) {
    echo $_POST['wq-name'];
} else {
    echo '';
}
         ?>, a member of our team will be in touch with you shortly.</p>
             </div>
         </section>
         <?php
         //Empty $_POST because we already sent email
         $_POST = '';
     } else {
         if (is_wp_error($errors) && !empty($errors->errors)) {
             $error_messages = $errors->get_error_messages();
             foreach ($error_messages as $k => $message) {
                 echo '<section class="alertbox-error">';
                 echo '<div class="wq-error '.$k.'">';
                 echo '<p>'.$message.'</p>';
                 echo '</div>';
                 echo '</section>';
             }
         }
     }
 }
 // Form shortcode
 add_shortcode('contact_form', 'wq_contact_form');
 function wq_contact_form()
 {
     ob_start();
     wq_form_message();
     wq_form_code();

     return ob_get_clean();
 }
 // Error validation
 add_action('init', 'wq_wq_form');
 function wq_wq_form()
 {
     if (isset($_POST['wq-submitted'])) {
         global $errors;
         $errors = wq_validate_form();
         if (empty($errors->errors)) {
             $args = array(
                 'name' => wq_sanitize_field($_POST['wq-name']),
                 'email' => wq_sanitize_field($_POST['wq-email']),
                 'tel' => wq_sanitize_field($_POST['wq-tel']),
                 'message' => wq_sanitize_field($_POST['wq-message']),
             );
             wq_deliver_mail($args);
         } else {
             return $errors;
         }
     }
 }
