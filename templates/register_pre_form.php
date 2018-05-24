

<div id="register-pre-form" class="widecolumn">
    <?php if ($attributes['show_title']): ?>
        <h3><?php _e('Register', 'personalize-login');?></h3>
    <?php endif;?>

    <?php if (count($attributes['errors']) > 0): ?>
        <?php foreach ($attributes['errors'] as $error): ?>
            <p>
                <?php echo $error; ?>
            </p>
        <?php endforeach;?>
    <?php endif;?>
    
    <form id="signup-pre-form" action="" method="post">
        <p class="form-row">
            <label for="school"><?php _e('학교', 'personalize-login'); ?></label>
            <input type="text" name="school" id="school">
        </p>
        <p class="form-row">
            <label for="name"><?php _e('이름', 'personalize-login'); ?></label>
            <input type="text" name="nick_name" id="nick-name">
        </p>
        <p class="register-pre-form-submit">
            <input type="submit" name="submit" class=""
                    value="<?php _e('확인', 'personalize-login'); ?>">
        </p>
    </form>
</div>