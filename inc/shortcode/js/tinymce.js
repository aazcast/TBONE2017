/**
* v4.X TinyMCE specific functions. (from wordpress 3.9)
*/

(function() {

  tinymce.PluginManager.add('GRV_shortcode', function(editor, url) {

    editor.addButton('GRV_shortcode_button', {

      type  : 'menubutton',
      title  : 'ShortCodes GRV',
      image : url + '/pbcd.png',
      style : 'background-image: url("' + url + '/pbcd.png' + '"); background-repeat: no-repeat; background-position: 2px 2px;"',
      icon  : true,
      menu  : [
        { text: 'Grid',
          menu : [
             { text : 'Row CF', onclick: function() {editor.insertContent('[row]...[/row]');} },
             { text : '1/2', onclick: function() {editor.insertContent('[two_col]...[/two_col][two_col]...[/two_col]');} },
             { text : '1/3', onclick: function() {editor.insertContent('[three_col]...[/three_col][three_col]...[/three_col][three_col]...[/three_col]');} },
             { text : '1/4', onclick: function() {editor.insertContent('[four_col]...[/four_col][four_col]...[/four_col][four_col]...[/four_col][four_col]...[/four_col]');} },
             { text : '1/5', onclick: function() {editor.insertContent('[five_col]...[/five_col][five_col]...[/five_col][five_col]...[/five_col][five_col]...[/five_col][five_col]...[/five_col]');} },
             { text : '1/6', onclick: function() {editor.insertContent('[six_col]...[/six_col][six_col]...[/six_col][six_col]...[/six_col][six_col]...[/six_col][six_col]...[/six_col][six_col]...[/six_col]');} },
             { text : 'CF', onclick: function() {editor.insertContent('[cf]...[/cf]');} },
          ]
        },
        { text: 'Iconos',
          menu : [
             { icon: 'fa fa-at', text : 'AT', onclick: function() {editor.insertContent('[icon type="at" size="1x"]');} },
             { icon: 'fa fa-refresh', text : 'Refresh', onclick: function() {editor.insertContent('[icon type="refresh" size="1x"]');} },
             { icon: 'fa fa-cog', text : 'Cog', onclick: function() {editor.insertContent('[icon type="cog" size="1x"]');} },
             { icon: 'fa fa-thumbs-o-up', text : 'Thumbs Up', onclick: function() {editor.insertContent('[icon type="thumbs-o-up" size="1x"]');} },
             { icon: 'fa fa-times-circle', text : 'Times Circle', onclick: function() {editor.insertContent('[icon type="times-circle" size="1x"]');} },
             { icon: 'fa fa-star', text : 'Star', onclick: function() {editor.insertContent('[icon type="star" size="1x"]');} },
          ]
        }
      ]

    });

  });
})();