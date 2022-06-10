<?php
/**
 * Fired during plugin activation
 *
 * @link       http://eduardogonzalez.me/
 * @since      1.0.0
 *
 * @package    Banner_Notice_For_Wordpress
 * @subpackage Banner_Notice_For_Wordpress/includes
 */

/**

 * @since      1.0.0
 * @package    Banner_Notice_For_Wordpress
 * @subpackage Banner_Notice_For_Wordpress/includes
 * @author     Efrain Gonzalez <elandaverdeg@gmail.com>
 */
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_61ee3d296798c',
        'title' => 'Banners',
        'fields' => array(
            array(
                'key' => 'field_61ee3d3075aba',
                'label' => 'Tipo de Banner',
                'name' => 'tipo_de_banner',
                'type' => 'select',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    1 => 'Imagen',
                    2 => 'Texto',
                    3 => 'Desactivado',
                ),
                'default_value' => false,
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_61ee3d7075abc',
                'label' => 'Imagenes',
                'name' => 'imagenes',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_61ee3d3075aba',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_61ee3fdf9a522',
                        'label' => 'Imagen Mobile',
                        'name' => 'imagen_mobile',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_61ee3d3075aba',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array(
                        'key' => 'field_61ee3ff09a523',
                        'label' => 'Imagen Escritorio',
                        'name' => 'imagen_escritorio',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_61ee3d3075aba',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                ),
            ),
            array(
                'key' => 'field_61ee3d8875abd',
                'label' => 'Texto',
                'name' => 'texto',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_61ee3d3075aba',
                            'operator' => '==',
                            'value' => '2',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'banner-notice',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
        'show_in_rest' => 0,
    ));
    
    endif;

    add_action('acf/init', 'acf_add_local_field_group');
