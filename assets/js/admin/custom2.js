jQuery(document).ready(function($){

    var updateJs = function(){
        $('#theme_js').val( editor.getSession().getValue() );
    }
    $('#save-custom-js-form').submit( updateJs );

});
var editor = ace.edit("customJS");
editor.setTheme("ace/theme/monokai");
editor.getSession().setMode("ace/mode/javascript");
