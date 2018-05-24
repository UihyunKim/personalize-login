<div class="login-form-container">
    <?php if ( $attributes['show_title'] ) : ?>
        <h2><?php _e( 'Sign In', 'personalize-login' ); ?></h2>
    <?php endif; ?>
    
    <!-- Show errors if there are any -->
    <?php if ( count( $attributes['errors'] ) > 0 ) : ?>
        <?php foreach ( $attributes['errors'] as $error ) : ?>
            <p class="login-error">
                <?php echo $error; ?>
            </p>
        <?php endforeach; ?>
    <?php endif; ?>
    
    <?php 
        // Check if user just logged out
        $attributes['logged_out'] = isset($_REQUEST['logged_out']) && $_REQUEST['logged_out'] == true;
    ?>
    
    <!-- Show logged out message if user just logged out -->
    <?php if ( $attributes['logged_out'] ) : ?>
        <p class="login-info">
            <?php _e( 'You have signed out. Would you like to sign in again?', 'personalize-login' ); ?>
        </p>
    <?php endif; ?>
    
    <?php if ($attributes['registered']): ?>
        <p class="login-info">
            <?php
            printf(
                __('You have successfully registered to <strong>%s</strong>. We have emailed your password to the email address you entered.', 'personalize-login'),
                get_bloginfo('name')
            );
            ?>
        </p>
    <?php endif;?>
    
    <?php if ($attributes['password_updated']): ?>
        <p class="login-info">
            <?php _e('Your password has been changed. You can sign in now.', 'personalize-login');?>
        </p>
    <?php endif;?>
    
    <?php
        wp_login_form(
            array(
                'label_username' => __( 'Email', 'personalize-login' ),
                'label_log_in' => __( 'Sign In', 'personalize-login' ),
                'redirect' => $attributes['redirect'],
            )
        );
    ?>
     
    <a class="forgot-password" href="<?php echo wp_lostpassword_url(); ?>">
        <?php _e( 'Forgot your password?', 'personalize-login' ); ?>
    </a> <br/>
    <a class="member-register" href="<?php echo wp_registration_url(); ?>">
        <?php _e( '회원가입', 'personalize-login' ); ?>
    </a>
</div>