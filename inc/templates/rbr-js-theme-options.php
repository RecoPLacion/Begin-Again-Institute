<?php 
    $logo = esc_attr( get_option( 'logo_url' ) );
?>
<div class="wrap">
    <h1>Theme Options Panel</h1>
    <?php
        settings_errors();
    ?>
    <div class="theme-panel-wrap">
        <div class="theme-panel-left">
            <div class="theme-box">
                <div class="theme-head">
                    <img src="<?php echo $logo; ?>" alt="">
                    <h3>Version 1.0.0</h3>
                </div>
            </div>
            <div class="theme-powered">
                <p>PinnacleCart Inc.</p>
            </div>
        </div>
        <div class="theme-panel-right">
            <div class="theme-box">
                <form id="save-custom-js-form" action="options.php" method="post" class="theme-options-form">
                    <?php
                        settings_fields('theme-js-option');
                        do_settings_sections('rbr-theme-options-js');
                        submit_button('Save Changes', 'primary', 'btnSubmit');
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>