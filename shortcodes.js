(function() {

    tinymce.PluginManager.add('selector_button', function( editor, url ) {
        editor.addButton( 'selector_button', {
            text: 'Shortcodes',
            icon: 'icon',
            type: 'menubutton',
            menu: [
                {
                    text: 'All Child Page',
                    onclick: function() {
                        editor.insertContent('[all-child-page name="Type your page name here"]');
                    }
                },
                {
                    text: 'Page Block',
                    onclick: function() {
                        editor.insertContent('[page-block name="Type your page block name here"]');
                    }
                },
                {
                    text: 'Display Events',
                    onclick: function() {
                        editor.insertContent('[display-events]');
                    }
                }
            ]
        });
    });

})();