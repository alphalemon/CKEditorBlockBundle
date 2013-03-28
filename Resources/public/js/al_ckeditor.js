$(document).ready(function() {
    $(document).on("blockEditing", function(event, block)
    {
        if ( $(block).attr('contenteditable') != null ) {
            CKEDITOR.inline( block.get(0), {
                extraPlugins : 'ajaxsave',
                filebrowserBrowseUrl : frontController + 'backend/' + $('#al_available_languages option:selected').val() + '/al_showCkEditorFilesManager',
                language: 'en'
            });
        }
    });
    
    $(document).on("blockStopEditing", function(event, block)
    {
        var instance = CKEDITOR.instances[block.attr("id")];
        if (instance) { instance.destroy(true); }     
    });
});
