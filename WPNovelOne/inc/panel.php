<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'ashuo-options';

  //
  // Create options
  CSF::createOptions( $prefix, array(
    'menu_title' => '控制面板',
    'menu_slug'  => 'WPNovel',
  ) );


  //
  // 首页设置
  //

  CSF::createSection( $prefix, array(
    'title' => '首页设置',
    'icon'  => 'fa fa-home',
    'description' => '<iframe src="http://u.ashuo.com/novel.html" width="100%;" height="60px;" border="0" frameborder="no"></iframe>',
    'fields' => array(
      array(
        'id'      => 'proclamation',
        'type'    => 'textarea',
        'title'   => '网站公告',
        'default' => '您好，欢迎访问本站。',
      ),
      array(
        'id'          => 'home-sticky-novel',
        'type'        => 'select',
        'title'       => '首页封推',
        'placeholder' => '请选择推荐的小说',
        'options'     => 'categories',
      ),
       array(
        'id'       => 'home-latest-chapter-number',
        'type'     => 'spinner',
        'title'    => '首页最新章节数',
        'subtitle' => '推荐12章',
        'step'     => 1,
        'default'  => 12,
      ),
       array(
        'id'       => 'home-chapter-number',
        'type'     => 'spinner',
        'title'    => '首页全文章节数',
        'subtitle' => '推荐100章左右',
        'step'     => 1,
        'default'  => 36,
      ),
       array(
        'id'       => 'category-latest-chapter-number',
        'type'     => 'spinner',
        'title'    => '分类页最新章节数',
        'subtitle' => '推荐12章',
        'step'     => 1,
        'default'  => 12,
      ),
      array(
        'id'         => 'category-pagination',
        'type'       => 'switcher',
        'title'      => '小说全文列表启用分页',
        'text_on'    => '开启',
        'text_off'   => '关闭',
        'text_width' => '100',
        'label' => '开启后，小说列表页面将自动分页',
      ),
       array(
        'id'       => 'category-pagination-number',
        'type'     => 'spinner',
        'title'    => '分页显示章节数',
        'step'     => 1,
        'default'  => 10,
        'dependency' => array( 'category-pagination', '==', 'true' ),
      ),

      array(
        'id'      => 'recommend-novel',
        'type'    => 'checkbox',
        'title'   => '本站小说推荐',
        'options' => 'categories',
      ),
      array(
        'id'         => 'auto-recommend-novel',
        'type'       => 'switcher',
        'title'      => '自动推荐所有小说',
        'text_on'    => '开启',
        'text_off'   => '关闭',
        'text_width' => '100',
        'label' => '开启后，自动推荐所有小说到首页、小说介绍页和章节页',
      ),
      array(
        'id'     => 'manual-recommend-novel',
        'type'   => 'group',
        'title'  => '手动推荐的小说',
        'subtitle'  => '这里主要推荐站外的小说',
        'accordion_title_number' => true,
        'fields' => array(
          array(
            'id'    => 'recommend-novel-name',
            'type'  => 'text',
            'title' => '网站名称',
          ),
          array(
            'id'    => 'recommend-novel-url',
            'type'  => 'text',
            'title' => '网站地址',
        ),
      ),
    ),
      array(
        'id'     => 'friend-link',
        'type'   => 'group',
        'title'  => '友情链接',
        'accordion_title_number' => true,
        'fields' => array(
          array(
            'id'    => 'friend-link-name',
            'type'  => 'text',
            'title' => '网站名称',
          ),
          array(
            'id'    => 'friend-link-url',
            'type'  => 'text',
            'title' => '网站地址',
        ),
      ),
    ),

      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => 'WPNovel官方QQ交流群：<a href="//shang.qq.com/wpa/qunwpa?idkey=0911c9044593a9872a35a3593de6dfa80e8d79fe36b7c56f41e56d3af483fbed" target="_blank">773028330</a>',
      ),
    )
  ) );


  //
  // 广告设置
  //
  CSF::createSection( $prefix, array(
    'title' => '广告设置',
    'icon'  => 'fa fa-money',
    'description' => '<iframe src="http://u.ashuo.com/novel.html" width="100%;" height="60px;" border="0" frameborder="no"></iframe>',
    'fields' => array(
     
      // 文章顶部广告
      array(
        'id'    => 'ad-single-top',
        'type'  => 'textarea',
        'title' => '文章顶部广告',
        'after'  => '<p>显示在文章内容最顶端</p>',
        'placeholder' => '请把您获取到的JS或其他格式的广告代码，粘贴到这里。',
        'after'  => '<p><xmp>您可以添加如<script language="javascript" src="http://ashuo.com/ad.js"></script>的JS广告代码，</xmp><xmp>也可以添加如<a href="https://www.ashuo.com"><img src="https://www.ashuo.com/logo.jpg"/></a>的广告代码</xmp></p>',
      ),
      // 文章顶部广告
      array(
        'id'    => 'ad-single-page-above',
        'type'  => 'textarea',
        'title' => '文章底部翻页上',
        'after'  => '<p>显示在文章底部翻页上</p>',
        'placeholder' => '请把您获取到的JS或其他格式的广告代码，粘贴到这里。',
        'after'  => '<p><xmp>您可以添加如<script language="javascript" src="http://ashuo.com/ad.js"></script>的JS广告代码，</xmp><xmp>也可以添加如<a href="https://www.ashuo.com"><img src="https://www.ashuo.com/logo.jpg"/></a>的广告代码</xmp></p>',
      ),
      // 文章顶部广告
      array(
        'id'    => 'ad-single-page-below',
        'type'  => 'textarea',
        'title' => '文章底部翻页下',
        'after'  => '<p>显示在文章底部翻页下</p>',
        'placeholder' => '请把您获取到的JS或其他格式的广告代码，粘贴到这里。',
        'after'  => '<p><xmp>您可以添加如<script language="javascript" src="http://ashuo.com/ad.js"></script>的JS广告代码，</xmp><xmp>也可以添加如<a href="https://www.ashuo.com"><img src="https://www.ashuo.com/logo.jpg"/></a>的广告代码</xmp></p>',
      ),
      // 文章顶部广告
      array(
        'id'    => 'ad-single-float',
        'type'  => 'textarea',
        'title' => '文章悬浮广告',
        'after'  => '<p>文章页底部或者顶部悬浮（顶飘）显示。</p>',
        'placeholder' => '请把您获取到的JS或其他格式的广告代码，粘贴到这里。',
        'after'  => '<p><xmp>您可以添加如<script language="javascript" src="http://ashuo.com/ad.js"></script>的JS广告代码，</xmp><xmp>也可以添加如<a href="https://www.ashuo.com"><img src="https://www.ashuo.com/logo.jpg"/></a>的广告代码</xmp></p>',
      ),

      array(
        'type'    => 'submessage',
        'style'   => 'warning',
        'content' => '买主机，就到&#32858;&#31449;&#20113;：<a href="http://&#119;&#119;&#119;&#46;&#106;&#117;&#122;&#104;&#97;&#110;&#121;&#117;&#110;&#46;&#99;&#111;&#109;/" title="&#32858;&#31449;&#20113;" target="_blank">http://&#119;&#119;&#119;&#46;&#106;&#117;&#122;&#104;&#97;&#110;&#121;&#117;&#110;&#46;&#99;&#111;&#109;/</a>',
      ),



    )
  ) );

  //
  // 站长工具设置
  //
  CSF::createSection( $prefix, array(
    'title'  => '站长工具',
    'icon'  => 'fa fa-cogs',
    'description' => '<iframe src="http://u.ashuo.com/novel.html" width="100%;" height="60px;" border="0" frameborder="no"></iframe>',
    'fields' => array(
      array(
      'id'    => 'webmaster',
      'type'  => 'tabbed',
      'tabs'  => array(


        array(
          'title'  => '统计代码',
          'icon'  => 'fa fa-bar-chart',
          'fields' => array(
            // 百度统计
            array(
              'id'     => 'track-baidu',
              'type'   => 'fieldset',
              'before'   => '<h4>一、百度统计</h4>',
              'fields' => array(
                array(
                  'id'    => 'track-baidu-full',
                  'type'  => 'textarea',
                  'before'   => '<h4>百度统计完整代码</h4>',
                  'placeholder' => '请把您获取到的统计代码，粘贴到这里。',
                  'desc'  => '获取地址：<a href="http://tongji.baidu.com" title="百度统计" target="_blank">http://tongji.baidu.com</a>',
                ),
                array(
                  'id'    => 'track-baidu-id',
                  'type'  => 'text',
                  'before'   => '<h4>百度统计ID</h4>',
                  'placeholder' => '请把您获取到的统计代码，粘贴到这里。',
                  'desc'  => '这里主要MIP主题使用',
                  'attributes' => array(
                    'style'    => 'width: 100%; height: 40px; border-color: #93C054;'
                  ),
                ),
              ),
            ),
            // CNZZ统计
            array(
              'id'     => 'track-cnzz',
              'type'   => 'fieldset',
              'before'   => '<h4>二、CNZZ统计</h4>',
              'fields' => array(
                array(
                  'id'    => 'track-cnzz-full',
                  'type'  => 'textarea',
                  'before'   => '<h4>CNZZ统计完整代码</h4>',
                  'placeholder' => '请把您获取到的统计代码，粘贴到这里。',
                  'desc'  => '获取地址：<a href="http://www.umeng.com" title="CNZZ" target="_blank">http://www.umeng.com</a>',
                ),
                array(
                  'id'    => 'track-cnzz-id',
                  'type'  => 'text',
                  'before'   => '<h4>CNZZ统计ID</h4>',
                  'placeholder' => '请把您获取到的统计代码，粘贴到这里。',
                  'desc'  => '这里主要MIP主题使用',
                  'attributes' => array(
                    'style'    => 'width: 100%; height: 40px; border-color: #93C054;'
                  ),
                ),
              ),
            ),
            // Google Analytics
            array(
              'id'    => 'track-google',
              'type'  => 'textarea',
              'before'   => '<h4>三、Google Analytics</h4>',
              'placeholder' => '请把您获取到的统计代码，粘贴到这里。',
              'desc'  => '获取地址：<a href="https://analytics.google.com/" title="Google Analytics" target="_blank">https://analytics.google.com/</a>',
            ),
            // 51啦统计
            array(
              'id'    => 'track-51la',
              'type'  => 'textarea',
              'before'   => '<h4>四、51啦统计</h4>',
              'placeholder' => '请把您获取到的统计代码，粘贴到这里。',
              'desc'  => '获取地址：<a href="http://www.51.la" title="51啦" target="_blank">http://www.51.la</a>',
            ),
            // 其他统计
             array(
              'id'    => 'track-other',
              'type'  => 'textarea',
              'placeholder' => '请把您获取到的统计代码，粘贴到这里。',
              'before'   => '<h4>五、其他统计</h4>',
            ),
             array(
              'type'    => 'submessage',
              'style'   => 'info',
              'content' => '&#38463;&#26388;官网：<a href="https://&#119;&#119;&#119;&#46;&#97;&#115;&#104;&#117;&#111;&#46;&#99;&#111;&#109;/" title="&#38463;&#26388;" target="_blank">https://&#119;&#119;&#119;&#46;&#97;&#115;&#104;&#117;&#111;&#46;&#99;&#111;&#109;/</a>',
            ),


           ),
        ),
        // A textarea field
        array(
          'title' => '常规验证',
          'icon'  => 'fa fa-stop-circle',
          'fields' => array(
            // 验证统计
            array(
              'id'    => 'general-verify',
              'type'  => 'textarea',
              'placeholder' => '请把您获取到的验证代码，粘贴到这里。',
              'after'  => '<p><xmp>一般用于将代码添加到您的网站<head>标签与</head>标签之间的各类验证。</xmp></p>',
            ),
          ),
        ),
      ),
    ),
    )
  )
);

 
//
// 首页SEO设置
//
CSF::createSection( $prefix, array(
  'title'       => 'SEO设置',
  'icon'        => 'fa fa-search',
  'description' => '<iframe src="http://u.ashuo.com/novel.html" width="100%;" height="60px;" border="0" frameborder="no"></iframe>',
  'fields'      => array(

    array(
      'id'    => 'seo',
      'type'  => 'tabbed',
      'tabs'  => array(

        array(
          'title'  => '首页设置',
          'fields' => array(
            array(
              'id'    => 'seo-home-title',
              'type'  => 'textarea',
              'title' => '首页标题设置',
              'default' => '{NovelName}({NovelAuthorName})最新章节-{NovelName}小说全文免费阅读-{SiteName}',
              'after'   => '<p>一般不超过80个字符（网站名称变量：{SiteName}，分类名称变量：{CategoryName}，小说名称变量：{NovelName}，章节名变量：{ChapterName}，小说作者变量：{NovelAuthorName}，小说主角变量：{NovelNovelProtagonist}）</p>',
            ),
            array(
              'id'      => 'seo-home-keywords',
              'type'    => 'textarea',
              'title'   => '首页关键词设置',
              'default' => '{NovelName},{NovelNovelProtagonist},{NovelAuthorName},{SiteName}',
              'after'   => '<p>一般不超过100个字符（网站名称变量：{SiteName}，分类名称变量：{CategoryName}，小说名称变量：{NovelName}，章节名变量：{ChapterName}，小说作者变量：{NovelAuthorName}，主角变量：{NovelNovelProtagonist}）</p>',
            ),
            array(
              'id'      => 'seo-home-description',
              'type'    => 'textarea',
              'title'    => '首页描述',
              'default' => '{NovelName}是由{NovelAuthorName}创作的{CategoryName}小说，{NovelNovelProtagonist}是小说中的主角，{SiteName}为您提供{NovelName}小说的全文免费在线阅读。',
              'after'   => '<p>一般不超过200个字符（网站名称变量：{SiteName}，分类名称变量：{CategoryName}，小说名称变量：{NovelName}，章节名变量：{ChapterName}，小说作者变量：{NovelAuthorName}，主角变量：{NovelNovelProtagonist}）</p>',
            ),

            array(
              'type'    => 'submessage',
              'style'   => 'danger',
               'content' => '阿朔网(<a href="https://&#119;&#119;&#119;&#46;&#97;&#115;&#104;&#117;&#111;&#119;&#97;&#110;&#103;&#46;&#99;&#111;&#109;/" title="&#38463;&#26388;" target="_blank">https://&#119;&#119;&#119;&#46;&#97;&#115;&#104;&#117;&#111;&#119;&#97;&#110;&#103;&#46;&#99;&#111;&#109;/</a>)：分享主机折扣、域名优惠码信息',
             ),
          ),
        ),
        array(
          'title'  => '小说页设置',
          'fields' => array(
            array(
              'id'    => 'seo-category-title',
              'type'  => 'textarea',
              'title' => '小说页标题设置',
              'default' => '{NovelName}({NovelAuthorName})最新章节-{NovelName}小说全文免费阅读-{SiteName}',
              'after'   => '<p>一般不超过80个字符（网站名称变量：{SiteName}，分类名称变量：{CategoryName}，小说名称变量：{NovelName}，章节名变量：{ChapterName}，小说作者变量：{NovelAuthorName}，小说主角变量：{NovelNovelProtagonist}）</p>',
            ),
            array(
              'id'      => 'seo-category-keywords',
              'type'    => 'textarea',
              'title'   => '小说页标题设置',
              'default' => '{NovelName},{NovelNovelProtagonist},{NovelAuthorName},{SiteName}',
              'after'   => '<p>一般不超过100个字符（网站名称变量：{SiteName}，分类名称变量：{CategoryName}，小说名称变量：{NovelName}，章节名变量：{ChapterName}，小说作者变量：{NovelAuthorName}，主角变量：{NovelNovelProtagonist}）</p>',
            ),
            array(
              'id'      => 'seo-category-description',
              'type'    => 'textarea',
              'title'    => '小说页关键词设置',
              'default' => '{NovelName}是由{NovelAuthorName}创作的{CategoryName}小说，{NovelNovelProtagonist}是小说中的主角，{SiteName}为您提供{NovelName}小说的全文免费在线阅读。',
              'after'   => '<p>一般不超过200个字符（网站名称变量：{SiteName}，分类名称变量：{CategoryName}，小说名称变量：{NovelName}，章节名变量：{ChapterName}，小说作者变量：{NovelAuthorName}，主角变量：{NovelNovelProtagonist}）</p>',
            ),
          ),
        ),
        array(
          'title'  => '章节页设置',
          'fields' => array(
            array(
              'id'    => 'seo-single-title',
              'type'  => 'textarea',
              'title' => '文章页标题设置',
              'default' => '{NovelName} {ChapterName}-{SiteName}',
              'after'   => '<p>一般不超过80个字符（网站名称变量：{SiteName}，分类名称变量：{CategoryName}，小说名称变量：{NovelName}，章节名变量：{ChapterName}，小说作者变量：{NovelAuthorName}，小说主角变量：{NovelNovelProtagonist}）</p>',
            ),
            array(
              'id'      => 'seo-single-keywords',
              'type'    => 'textarea',
              'title'   => '文章页标题设置',
              'default' => '{NovelName} {ChapterName},{SiteName}',
              'after'   => '<p>一般不超过100个字符（网站名称变量：{SiteName}，分类名称变量：{CategoryName}，小说名称变量：{NovelName}，章节名变量：{ChapterName}，小说作者变量：{NovelAuthorName}，主角变量：{NovelNovelProtagonist}）</p>',
            ),
            array(
              'id'      => 'seo-single-description',
              'type'    => 'textarea',
              'title'    => '文章页关键词设置',
              'after'   => '<p>一般不超过200个字符（网站名称变量：{SiteName}，分类名称变量：{CategoryName}，小说名称变量：{NovelName}，章节名变量：{ChapterName}，小说作者变量：{NovelAuthorName}，主角变量：{NovelNovelProtagonist}）</p>',
            ),
          ),
        ),

      ),
    ),


  )
) );


}