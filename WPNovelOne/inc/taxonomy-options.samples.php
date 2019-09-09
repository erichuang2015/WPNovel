<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = 'ashuo_taxonomy_options';

//
// Create taxonomy options
//
CSF::createTaxonomyOptions( $prefix, array(
  'taxonomy' => 'category',
) );

//
// Create a section
//
CSF::createSection( $prefix, array(
  'fields' => array(

    //
    // A text field
    //

    array(
      'id'         => 'novel-status',
      'type'       => 'switcher',
      'title'      => '小说状态',
      'text_on'    => '连载中',
      'text_off'   => '已完结',
      'text_width' => '100',
      'default' => true,
    ),
    array(
      'id'    => 'novel-author',
      'type'  => 'text',
      'title' => '小说作者',
    ),

    array(
      'id'    => 'novel-protagonist',
      'type'  => 'text',
      'title' => '小说主角',
    ),

    array(
      'id'    => 'novel-taxonomy',
      'type'  => 'text',
      'title' => '小说分类',
    ),

    array(
      'id'    => 'novel-description',
      'type'  => 'textarea',
      'title' => '小说介绍',
    ),

    array(
      'id'    => 'novel-thumbnail',
      'type'  => 'upload',
      'title' => '小说封面图',
    ),

    array(
      'id'    => 'taxonomy-seo-title',
      'type'  => 'textarea',
      'title' => 'SEO标题',
    ),

    array(
      'id'    => 'taxonomy-seo-keywords',
      'type'  => 'textarea',
      'title' => 'SEO关键词',
    ),

    array(
      'id'    => 'taxonomy-seo-description',
      'type'  => 'textarea',
      'title' => 'SEO描述',
    ), 

    array(
        'id'      => 'related-novel',
        'type'    => 'checkbox',
        'before'   => '<h4>作者其他作品推荐</h4>',
        'options' => 'categories',
      ),

      array(
        'id'     => 'manual-related-novel',
        'type'   => 'group',
        'before'   => '<h4>手动推荐作者其他作品</h4>',
        'accordion_title_number' => true,
        'fields' => array(
          array(
            'id'    => 'related-novel-name',
            'type'  => 'text',
            'title' => '作品（小说）名称',
          ),
          array(
            'id'    => 'related-novel-url',
            'type'  => 'text',
            'title' => '作品（小说）网址',
        ),
      ),
    ),
    //同类型小说推荐
      array(
        'id'      => 'similar-novel',
        'type'    => 'checkbox',
        'before'   => '<h4>同类型小说推荐</h4>',
        'options' => 'categories',
      ),
      array(
        'id'     => 'manual-similar-novel',
        'type'   => 'group',
        'before'   => '<h4>手动推荐同类型小说</h4>',
        'accordion_title_number' => true,
        'fields' => array(
          array(
            'id'    => 'similar-novel-name',
            'type'  => 'text',
            'title' => '网站名称',
          ),
          array(
            'id'    => 'similar-novel-url',
            'type'  => 'text',
            'title' => '网站地址',
        ),
      ),
    ),

    array(
      'type'       => 'notice',
      'style'      => 'success',
      'content'    => 'OK了，请点击下面的添加新分类或者更新',
    ),



  )
) );
