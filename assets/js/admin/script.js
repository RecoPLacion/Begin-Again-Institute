jQuery(document).ready(function($){

    var logoUploader; //var logo uploader

    //logo uploader
    $( '#upload_button' ).on('click', function(e){
        e.preventDefault();
        if( logoUploader ){
            logoUploader.open();
            return;
        }

        logoUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Logo',
            button: {
                text: 'Choose Logo'
            },
            multiple: false
        });

        logoUploader.on('select', function(){
            attachment = logoUploader.state().get('selection').first().toJSON();
            $( '#logo_url' ).val(attachment.url);
            $( '#img_logo' ).attr('src', '' + attachment.url + '' );
        });

        logoUploader.open();

    });
    //end of logo uploader

    $('#remove_button').on('click', function(e){
        e.preventDefault();
        var answer = confirm("Are you sure you want to remove the logo?");
        if( answer == true ){
            $( '#logo_url' ).val('');
            $('.theme-options-form').submit();
        }   
        return;
    });

});

jQuery(document).ready(function($){

    var favUploader; //var fav uploader

    //fav uploader
    $( '#fav_upload_button' ).on('click', function(e){
        e.preventDefault();
        if( favUploader ){
            favUploader.open();
            return;
        }

        favUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Favicon',
            button: {
                text: 'Choose Favicon'
            },
            multiple: false
        });

        favUploader.on('select', function(){
            attachment = favUploader.state().get('selection').first().toJSON();
            $( '#favicon_url' ).val(attachment.url);
            $( '#img_fav' ).attr('src', '' + attachment.url + '' );
        });

        favUploader.open();

    });
    //end of logo uploader

    $('#fav_remove_button').on('click', function(e){
        e.preventDefault();
        var answer = confirm("Are you sure you want to remove the logo?");
        if( answer == true ){
            $( '#favicon_url' ).val('');
            $('.theme-options-form').submit();
        }   
        return;
    });

});