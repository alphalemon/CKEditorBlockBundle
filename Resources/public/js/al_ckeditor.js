/**
 * This file is part of the AlphaLemon CMS Application and it is distributed
 * under the GPL LICENSE Version 2.0. To use this application you must leave
 * intact this copyright notice.
 *
 * Copyright (c) AlphaLemon <webmaster@alphalemon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.alphalemon.com
 *
 * @license    GPL LICENSE Version 2.0
 *
 */
 
 $(document).ready(function() {
    CKEDITOR.disableAutoInline = true;
    
    $(document).on("cmsStarted", function(event)
    {
        $('.al-editable-inline').each(function(){
            createCKEditor($(this).attr('id'));
        });
    });
    
    $(document).on("cmsStopped", function(event)
    {
        $('.al-editable-inline').each(function(){
            var instance = CKEDITOR.instances[$(this).attr('id')];
            if (instance) { instance.destroy(true); }    
        });
    });
});

function createCKEditor(id) {
    try {
        CKEDITOR.inline(id, {
            extraPlugins : 'ajaxsave',
            filebrowserBrowseUrl : frontController + 'backend/' + $('#al_available_languages option:selected').val() + '/al_showCkEditorFilesManager',
            language: $('#al_available_languages option:selected').val()
        });
    } catch(ex) {}
}
