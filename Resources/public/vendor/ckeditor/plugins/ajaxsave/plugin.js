CKEDITOR.plugins.add( 'ajaxsave', {
    init: function( editor ) {
        editor.addCommand( 'save', {
            exec: function( editor ) {    
                $('body').EditBlock('Content', editor.getData(), null, function(activeBlock){ 
                    editor.destroy(true); 
                    
                    createCKEditor(activeBlock.attr('id'));
                });
            }
        });
        editor.ui.addButton( 'Save', {
            label: 'Save content',
            command: 'save',
            toolbar: 'others',            
            icon: this.path + "icons/floppy16.png"
        });
    }
});
