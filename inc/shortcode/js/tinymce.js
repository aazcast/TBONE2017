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
             { text : 'Hover Image', onclick: function() {editor.insertContent('[hover type="normal"]...[/hover]');} },
             { text : 'Hover Image Left', onclick: function() {editor.insertContent('[hover type="left"]...[/hover]');} },
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
        },
        { text: 'Animación',
          menu : [
             { text : 'Zoom Out Left', onclick: function() {editor.insertContent('[animated type="zoom-out-left" duration="" delay=""]...[/animated]');} },
             { text : 'Zoom In', onclick: function() {editor.insertContent('[animated type="zoom-in" duration="" delay=""]...[/animated]');} },
             { text : 'Zoom In Up', onclick: function() {editor.insertContent('[animated type="zoom-in-up" duration="" delay=""]...[/animated]');} },
             { text : 'Zoom In Down', onclick: function() {editor.insertContent('[animated type="zoom-in-down" duration="" delay=""]...[/animated]');} },
             { text : 'Fade', onclick: function() {editor.insertContent('[animated type="fade" duration="" delay=""]...[/animated]');} },
             { text : 'Fade Up', onclick: function() {editor.insertContent('[animated type="fade-up" duration="" delay=""]...[/animated]');} },
             { text : 'Fade Down', onclick: function() {editor.insertContent('[animated type="fade-down" duration="" delay=""]...[/animated]');} },
             { text : 'Fade Right', onclick: function() {editor.insertContent('[animated type="fade-right" duration="" delay=""]...[/animated]');} },
             { text : 'Fade Left', onclick: function() {editor.insertContent('[animated type="fade-left" duration="" delay=""]...[/animated]');} },
             { text : 'Fade Up Right', onclick: function() {editor.insertContent('[animated type="fade-up-right" duration="" delay=""]...[/animated]');} }, 
             { text : 'Fade Up Left', onclick: function() {editor.insertContent('[animated type="fade-up-left" duration="" delay=""]...[/animated]');} },
             { text : 'Fade Down Right', onclick: function() {editor.insertContent('[animated type="fade-down-right" duration="" delay=""]...[/animated]');} },
             { text : 'Fade Down Left', onclick: function() {editor.insertContent('[animated type="fade-down-left" duration="" delay=""]...[/animated]');} },
             { text : 'Flip Up', onclick: function() {editor.insertContent('[animated type="flip-up" duration="" delay=""]...[/animated]');} },
             { text : 'Flip Down', onclick: function() {editor.insertContent('[animated type="flip-down" duration="" delay=""]...[/animated]');} },
             { text : 'Flip Right', onclick: function() {editor.insertContent('[animated type="flip-right" duration="" delay=""]...[/animated]');} },
             { text : 'Flip Left', onclick: function() {editor.insertContent('[animated type="flip-left" duration="" delay=""]...[/animated]');} },
             { text : 'Slide Up', onclick: function() {editor.insertContent('[animated type="slide-up" duration="" delay=""]...[/animated]');} },
             { text : 'Slide Down', onclick: function() {editor.insertContent('[animated type="slide-down" duration="" delay=""]...[/animated]');} },
             { text : 'Slide Left', onclick: function() {editor.insertContent('[animated type="slide-left" duration="" delay=""]...[/animated]');} },
             { text : 'Slide Right', onclick: function() {editor.insertContent('[animated type="slide-right" duration="" delay=""]...[/animated]');} },
          ]
        }
      ]

    });

  });
})();