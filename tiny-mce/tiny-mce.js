// custom buttons for Tiny MCE - .sr-only - .cite - .highlight (= thin font for header) 

(function() {

    /*
    tinymce.PluginManager - TinyMCE's built-in JavaScript object that manages all plugins,  part of the core TinyMCE library 
    .add('custom_spans', ...) - Registers a new plugin with TinyMCE, parameter 'custom_spans' is the plugin name/identifier
    */ 

    tinymce.PluginManager.add('custom_spans', function(editor, url) {
        
        // .sr-only
        editor.addButton('sr_only_button', {
            title: 'Screen Reader Only Text',
            text: 'SR',
            icon: false,
            onclick: function() {
                var selectedText = editor.selection.getContent();
                if (selectedText) {
                    editor.selection.setContent('<span class="sr-only">' + selectedText + '</span>');
                } else {
                    editor.insertContent('<span class="sr-only">Screen reader text</span>');
                    // Select the placeholder text for easy replacement
                    var node = editor.selection.getNode();
                    if (node && node.classList && node.classList.contains('sr-only')) {
                        editor.selection.select(node);
                        editor.selection.collapse(false);
                    }
                }
            }
        });

        // .highlight 
        editor.addButton('highlight_button', {
            title: 'Thin Header Text',
            text: 'Thin',
            icon: false,
            onclick: function() {
                var selectedText = editor.selection.getContent();
                if (selectedText) {
                    editor.selection.setContent('<span class="highlight">' + selectedText + '</span>');
                } else {
                    editor.insertContent('<span class="highlight">Highlighted text</span>');
                    // Select the placeholder text for easy replacement
                    var node = editor.selection.getNode();
                    if (node && node.classList && node.classList.contains('highlight')) {
                        editor.selection.select(node);
                        editor.selection.collapse(false);
                    }
                }
            }
        });

        // .cite - used in slider blockquote 
        editor.addButton('cite_button', {
            title: 'Citation Text',
            text: 'Cite',
            icon: false,
            onclick: function() {
                var selectedText = editor.selection.getContent();
                if (selectedText) {
                    editor.selection.setContent('<span class="cite">' + selectedText + '</span>');
                } else {
                    editor.insertContent('<span class="cite">Citation text</span>');
                    // Select the placeholder text for easy replacement
                    var node = editor.selection.getNode();
                    if (node && node.classList && node.classList.contains('cite')) {
                        editor.selection.select(node);
                        editor.selection.collapse(false);
                    }
                }
            }
        });


        // format menu items 
        editor.on('init', function() {

            editor.formatter.register('sr_only', {
                inline: 'span',
                classes: ['sr-only']
            });
            
            editor.formatter.register('highlight', {
                inline: 'span', 
                classes: ['highlight']
            });
            
            editor.formatter.register('cite', {
                inline: 'span',
                classes: ['cite']
            });

        });


    }); // END tinymce.PluginManager

})();