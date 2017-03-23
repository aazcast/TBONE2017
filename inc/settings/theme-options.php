<?php
/**
 * The default Theme Options
 *
 * @package WordPress
 * @subpackage g-heirsbridge
 * @since g-heirsbridge 3.6
 */

/*-----------------------------------------------------------------------------------*/
/*  Initialize the options before anything else.
/*-----------------------------------------------------------------------------------*/

add_action( 'admin_init', 'grv_theme_options', 1 );

/*-----------------------------------------------------------------------------------*/
/*  Build the custom settings & update OptionTree.
/*-----------------------------------------------------------------------------------*/
if (!function_exists('grv_theme_options')) {
  function grv_theme_options() { 
    /*-----------------------------------------------------------
      Get a copy of the saved settings array.
    -----------------------------------------------------------*/
    $saved_settings = get_option( 'option_tree_settings', array() );

    /*-----------------------------------------------------------
      Custom settings array that will eventually be  passes
      to the OptionTree Settings API Class.
    -----------------------------------------------------------*/
    $grv_custom_settings = array(
      'contextual_help' => array( 
        'content'       => array( 
          array(
            'id'        => 'option_types_help',
            'title'     => __( 'Option Types', 'option-tree-theme' ),
            'content'   => '<p>' . __( 'Help content goes here!', 'option-tree-theme' ) . '</p>'
          )
        ),
        'sidebar'       => '<p>' . __( 'Sidebar content goes here!', 'option-tree-theme' ) . '</p>'
      ), //End Contextual Help Array
      /*-----------------------------------------------------------
        Sections
      -----------------------------------------------------------*/
      'sections'        => array(


        array(
          'title'       => __('General', 'g-heirsbridge'),
          'id'          => 'general_settings'
        ),
        /*-----------------------------------------------------------
          TopBar Settings
        -----------------------------------------------------------*/

        array(
          'title'       => __('TopBar', 'g-heirsbridge'),
          'id'          => 'topbar_settings'
        ),
        /*-----------------------------------------------------------
          Header Settings
        -----------------------------------------------------------*/

        array(
          'title'       => __('Header', 'g-heirsbridge'),
          'id'          => 'header_settings'
        ),
        /*-----------------------------------------------------------
          Blog Settings
        -----------------------------------------------------------*/

        array(
          'title'       => __('Blog', 'g-heirsbridge'),
          'id'          => 'blog_settings'
        ),
        /*-----------------------------------------------------------
          Marca Settings
        -----------------------------------------------------------*/

        array(
          'title'       => __('Marca', 'g-heirsbridge'),
          'id'          => 'marca_settings'
        ),
        /*-----------------------------------------------------------
          Footer Settings
        -----------------------------------------------------------*/

        array(
          'title'       => __('Footer', 'g-heirsbridge'),
          'id'          => 'footer_settings'
        ),
        /*-----------------------------------------------------------
          Otros Settings
        -----------------------------------------------------------*/

        array(
          'title'       => __('Otros', 'g-heirsbridge'),
          'id'          => 'otros_settings'
        ),
        /*-----------------------------------------------------------
          Custom Code CSS
        -----------------------------------------------------------*/

        array(
          'title'       => __('Custom CSS', 'g-heirsbridge'),
          'id'          => 'code_settings'
        ),
      ),

      /*-----------------------------------------------------------
        Settings
      -----------------------------------------------------------*/

      'settings'        => array(


        array(
          'label'       => __('Activar Breadcrumbs','g-heirsbridge'),
          'id'          => 'grv_breadcrumbs_status',
          'type'        => 'on-off',
          'desc'        => __('Activate the Breadcrumbs on site','g-heirsbridge'),
          'std'         => 'on',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'general_settings'
        ),
        array(
          'label'       => __('Color de los Bradcrumbs','g-heirsbridge'),
          'id'          => 'grv_breadcrumbs_color',
          'type'        => 'colorpicker-opacity',
          'desc'        => __('Ingresa el color del Background del Breadcrubs.','g-heirsbridge'),
          'post_type'   => '',
          'section'     => 'topbar_settings'
        ),
        array(
          'label'       => __('Multi-Language','g-heirsbridge'),
          'id'          => 'grv_language_status',
          'type'        => 'on-off',
          'desc'        => __('Activa si el sitio va a tener más de un lenguaje, Compatible con Plugin WPML solamente','g-heirsbridge'),
          'std'         => 'off',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'general_settings'
        ),
        array(
          'label'       => __('Botones Compartir en Post','g-heirsbridge'),
          'id'          => 'grv_share_btn_single_post',
          'type'        => 'on-off',
          'desc'        => __('Activa si el sitio quieres que en los post esten los botones de compartir','g-heirsbridge'),
          'std'         => 'on',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'general_settings'
        ),
        array(
          'label'       => __( 'Google Maps API Key', 'g-heirsbridge' ),
          'id'          => 'grv_maps_api_key',
          'type'        => 'text',
          'desc'        => sprintf( __( 'Enter your Google Maps API browser key here. This is a free code which allows maps to be displayed on your site. To create a browser key, follow these instructions in the <a href="%s">Google Maps API documentation</a>.', 'g-heirsbridge' ), 'https://developers.google.com/maps/documentation/javascript/get-api-key#key' ),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'general_settings'
        ),

        /*-----------------------------------------------------------
          TopBar Settings
        -----------------------------------------------------------*/
        array(
          'label'       => __('Background Top Bar','g-heirsbridge'),
          'id'          => 'grv_topBar',
          'type'        => 'colorpicker-opacity',
          'desc'        => __('Ingresa el color del Background del Top Bar.','g-heirsbridge'),
          'post_type'   => '',
          'section'     => 'topbar_settings'
        ),
        array(
          'label'       => __('Color Texto TopBar','g-heirsbridge'),
          'id'          => 'grv_colorTopBar',
          'type'        => 'colorpicker',
          'desc'        => __('Ingresa el color del Texto del Top Bar. (Links e Iconos)','g-heirsbridge'),
          'post_type'   => '',
          'section'     => 'topbar_settings'
        ),
        array(
          'label'       => __('Teléfono Link','g-heirsbridge'),
          'id'          => 'grv_phone_number',
          'type'        => 'text',
          'desc'        => __('Agrega el link al telefono. ej: tel:40016783.','g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'topbar_settings'
        ),
        array(
          'label'       => __('Teléfono Texto','g-heirsbridge'),
          'id'          => 'grv_phone_text',
          'type'        => 'text',
          'desc'        => __('Agrega el texto del telefono. ej: telefono.','g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'topbar_settings'
        ),
        array(
          'label'       => __('Enviar un Mail Link','g-heirsbridge'),
          'id'          => 'grv_send_mail',
          'type'        => 'text',
          'desc'        => __('Agrega el link al Envio. ej: mailto:info@...','g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'topbar_settings'
        ),
        array(
          'label'       => __('Enviar un Mail Text','g-heirsbridge'),
          'id'          => 'grv_send_text',
          'type'        => 'text',
          'desc'        => __('Agrega el texto al envio','g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'topbar_settings'
        ),
        array(
          'label'       => __('Redes Sociales','g-heirsbridge'),
          'id'          => 'grv_topbar_social',
          'type'        => 'list-item',
          'desc'        => __('Preciona en el boton <strong>Add New</strong> para agregar nuevos links de redes sociales.','g-heirsbridge'),
          'settings'    => array(
            array(
              'label'       => __('Red Social','g-heirsbridge'),
              'id'          => 'grv_share_item_name',
              'type'        => 'text',
              'desc'        => __('El nombre de la Red Social Ejemplo: "Facebook"','g-heirsbridge'),
              'std'         => '',
              'rows'        => '',
              'post_type'   => '',
              'taxonomy'    => '',
              'class'       => '',
              'section'     => ''
            ),
            array(
              'label'       => __('URL','g-heirsbridge'),
              'id'          => 'grv_share_item_url',
              'type'        => 'text',
              'desc'        => __('Ingresa la URL de la red social ej: http://www.facebook.com/gravitycr','g-heirsbridge'),
              'std'         => '',
              'rows'        => '',
              'post_type'   => '',
              'taxonomy'    => '',
              'class'       => '',
              'section'     => ''
            ),
            array(
              'label'       => __('Icono','g-heirsbridge'),
              'id'          => 'grv_share_item_icon',
              'type'        => 'text',
              'desc'        => __('<strong>IMPORTANTE</strong>: Elige un item de la siguiente lista: <br />fa fa-facebook, <br />fa fa-github, <br />fa fa-twitter, <br />fa fa-pinterest, <br />fa fa-linkedin, <br />fa fa-google-plus, <br />fa fa-youtube, <br />fa fa-skype, <br />fa fa-vk, <br />fa fa-vimeo, <br />fa fa-instagram','g-heirsbridge'),
              'std'         => 'fa fa-',
              'rows'        => '',
              'post_type'   => '',
              'taxonomy'    => '',
              'class'       => '',
              'section'     => ''
            ),
          ),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'topbar_settings'
        ),
        /*-----------------------------------------------------------
          Header Settings
        -----------------------------------------------------------*/
        array(
          'label'       => __('Background Header Menu','g-heirsbridge'),
          'id'          => 'grv_bgHeader',
          'type'        => 'colorpicker-opacity',
          'desc'        => __('Ingresa el color del Background del Header. Prf #fff','g-heirsbridge'),
          'post_type'   => '',
          'section'     => 'header_settings'
        ),
        array(
          'label'       => __('Color Links','g-heirsbridge'),
          'id'          => 'grv_colorhdLinks',
          'type'        => 'colorpicker',
          'desc'        => __('Ingresa el color de los links','g-heirsbridge'),
          'post_type'   => '',
          'section'     => 'header_settings'
        ),
        array(
          'label'       => __('Color Links Hover','g-heirsbridge'),
          'id'          => 'grv_colorhdLinksHover',
          'type'        => 'colorpicker',
          'desc'        => __('Ingresa el color de los links en estado hover','g-heirsbridge'),
          'post_type'   => '',
          'section'     => 'header_settings'
        ),
        array(
          'label'       => __('Color Barra Active State','g-heirsbridge'),
          'id'          => 'grv_colorlinkactive',
          'type'        => 'colorpicker',
          'desc'        => __('Ingresa el color de la barra debajo de los links al estar en estado active','g-heirsbridge'),
          'post_type'   => '',
          'section'     => 'header_settings'
        ),
        array(
          'label'       => __('Color de SubMenu y Menu Movil','g-heirsbridge'),
          'id'          => 'grv_bgSubMenu',
          'type'        => 'colorpicker',
          'desc'        => __('Color de SubMenu y MenuMovi. Recomendado mismo color del TopBar','g-heirsbridge'),
          'post_type'   => '',
          'section'     => 'header_settings'
        ),
        array(
          'label'       => __('Color de SubMenu hover','g-heirsbridge'),
          'id'          => 'grv_bgSubMenuHover',
          'type'        => 'colorpicker',
          'desc'        => __('Color de SubMenu Hover','g-heirsbridge'),
          'post_type'   => '',
          'section'     => 'header_settings'
        ),
        /*-----------------------------------------------------------
          Blog Settings
        -----------------------------------------------------------*/
        array(
          'label'       => __('Activar Sidebar en Blog Index','g-heirsbridge'),
          'id'          => 'grv_sidebarblogindex_status',
          'type'        => 'on-off',
          'desc'        => __('Activar Sidebar en el Index del Blog','g-heirsbridge'),
          'std'         => 'off',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'blog_settings'
        ),
        array(
          'label'       => __('Activar Sidebar en Blog Single','g-heirsbridge'),
          'id'          => 'grv_sidebarblogsingle_status',
          'type'        => 'on-off',
          'desc'        => __('Activar Sidebar en cada post por separado del blog','g-heirsbridge'),
          'std'         => 'on',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'blog_settings'
        ),
        /*-----------------------------------------------------------
          Marca Settings
        -----------------------------------------------------------*/

        array(
          'label'       => __('Logo','g-heirsbridge'),
          'id'          => 'grv_logo',
          'type'        => 'upload',
          'desc'        => __('Sube tu Logo', 'g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'marca_settings'
        ),
        array(
          'label'       => __('Favicon','g-heirsbridge'),
          'id'          => 'grv_favicon',
          'type'        => 'upload',
          'desc'        => __('Sube tu Favicon, PNG. Tamaño 64x64px', 'g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'marca_settings'
        ),
        array(
          'label'       => __('Color Barra Navegador Custom','g-heirsbridge'),
          'id'          => 'grv_headAndroidColor',
          'type'        => 'colorpicker',
          'desc'        => __('Este es el color que se muestra en la barra del navegador, normalmento solo funciona con dispositivos android y Vivaldi Browser', 'g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'marca_settings'
        ),
        array(
          'label'       => __('Color o Imágen debajo del Logo','g-heirsbridge'),
          'id'          => 'grv_logoBg',
          'type'        => 'background',
          'desc'        => __('Selecciona el color solamente o incluso agrega una imágen y selecciona todos los parametros necesarios', 'g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'marca_settings'
        ),

        /*-----------------------------------------------------------
          Footer Settings
        -----------------------------------------------------------*/
        array(
          'label'       => __('Color o Imágen debajo del Footer','g-heirsbridge'),
          'id'          => 'grv_footerBg',
          'type'        => 'background',
          'desc'        => __('Selecciona el color solamente o incluso agrega una imágen y selecciona todos los parametros necesarios', 'g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'footer_settings'
        ),
        array(
          'label'       => __('Color de titulos','g-heirsbridge'),
          'id'          => 'grv_footerTitle',
          'type'        => 'colorpicker',
          'desc'        => __('Selecciona el color de los titulos en el footer', 'g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'footer_settings'
        ),
        array(
          'label'       => __('Color de Texto','g-heirsbridge'),
          'id'          => 'grv_footerText',
          'type'        => 'colorpicker',
          'desc'        => __('Selecciona el color del texto en el backgorund', 'g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'footer_settings'
        ),
        array(
          'label'       => __('Color de Links','g-heirsbridge'),
          'id'          => 'grv_footerLinks',
          'type'        => 'colorpicker',
          'desc'        => __('Selecciona el color de los links en el backgorund', 'g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'footer_settings'
        ),
        array(
          'label'       => __('Color de Barra divisora en footer','g-heirsbridge'),
          'id'          => 'grv_footerHr',
          'type'        => 'colorpicker-opacity',
          'desc'        => __('Selecciona el color background de la barra divisora en el footer', 'g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'footer_settings'
        ),
        /*-----------------------------------------------------------
          otros
        -----------------------------------------------------------*/
        array(
          'label'       => __('Background Color del Call to Action','g-heirsbridge'),
          'id'          => 'grv_callactionbg',
          'type'        => 'colorpicker-opacity',
          'desc'        => __('Selecciona el color background del Call to action bg widget', 'g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'otros_settings'
        ),
        array(
          'label'       => __('Color del Titulo en el call to action','g-heirsbridge'),
          'id'          => 'grv_callactiontitle',
          'type'        => 'colorpicker',
          'desc'        => __('Selecciona el color del texto del call to action', 'g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'otros_settings'
        ),
        array(
          'label'       => __('Color de btn General','g-heirsbridge'),
          'id'          => 'grv_link',
          'type'        => 'colorpicker',
          'desc'        => __('El color de los BTN de forma general class .btn', 'g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'otros_settings'
        ),
        array(
          'label'       => __('Color de btn General Hover','g-heirsbridge'),
          'id'          => 'grv_linkHover',
          'type'        => 'colorpicker',
          'desc'        => __('Selecciona el color del hover de los btn .btn:hover', 'g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'otros_settings'
        ),
        /*-----------------------------------------------------------
          Custom Code
        -----------------------------------------------------------*/
        array(
          'label'       => __('Imagen News','g-heirsbridge'),
          'id'          => 'grv_newsbg',
          'type'        => 'background',
          'desc'        => __('Selecciona la imagen de news', 'g-heirsbridge'),
          'std'         => '',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'otros_settings'
        ),

        array(
          'label'       => __('Custom CSS','g-heirsbridge'),
          'id'          => 'grv_css',
          'type'        => 'css',
          'desc'        => __('Add custom CSS to your theme.','g-heirsbridge'),
          'std'         => '/*Custom CSS*/',
          'rows'        => '10',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'code_settings'
        ),
      ) //end settings
    );
    /* settings are not the same update the DB */
    if ( $saved_settings !== $grv_custom_settings ) {
      update_option( 'option_tree_settings', $grv_custom_settings );
    }
  } //End Function Grv Theme Options
}