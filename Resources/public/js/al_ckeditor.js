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
