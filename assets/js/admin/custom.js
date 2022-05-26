jQuery(document).ready(function($){

    var updateCss = function(){
        $('#theme_css').val( editor.getSession().getValue() );
    }
    $('#save-custom-css-form').submit( updateCss );

});

var editor = ace.edit("customCSS");
editor.setTheme("ace/theme/monokai");
editor.getSession().setMode("ace/mode/css");

