<?php
require_once get_theme_file_path() .'/cf/codestar-framework.php';
require_once get_theme_file_path() .'/inc/panel.php';
require_once get_theme_file_path() .'/inc/taxonomy-options.samples.php';
/*
 * 自定义 WordPress 仪表盘欢迎面板
 */
add_action( 'welcome_panel', 'rc_my_welcome_panel' );
function rc_my_welcome_panel() {
    ?>
    <script type="text/javascript">
        /* 隐藏默认的欢迎信息 */
        jQuery(document).ready( function($)
        {
            $('div.welcome-panel-content').hide();
        });
    </script>
    <!-- 添加自定义信息 -->
    <div class="custom-welcome-panel-content" style="padding: 23px 10px 0;">
        <h2><?php _e( '欢迎使用Xidorn(<a href="https://&#119;&#119;&#119;&#46;&#97;&#115;&#104;&#117;&#111;&#46;&#99;&#111;&#109;/" title="&#38463;&#26388;" target="_blank">&#38463;&#26388;</a>)开发的小说主题！' ); ?></h2>
        <p class="about-description"><?php _e( '我们准备了几个链接供您开始：' ); ?></p>
        <div class="welcome-panel-column-container">
            <div class="welcome-panel-column">
                <h3 style="font-weight: bold"><?php _e( "开始使用" ); ?></h3>
                <a class="button button-primary button-hero load-customize hide-if-no-customize" href="http://www.ashuo.com"><?php _e( '联系我们' ); ?></a>
                <p class="hide-if-no-customize"><?php printf( __( '或者 <a href="%s">设置网站</a>' ), admin_url( 'options-general.php' ) ); ?></p>
            </div>
            <div class="welcome-panel-column">
                <h4><?php _e( 'Next Steps' ); ?></h4>
                <ul>
                    <?php if ( 'page' == get_option( 'show_on_front' ) && ! get_option( 'page_for_posts' ) ) : ?>
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
                    <?php elseif ( 'page' == get_option( 'show_on_front' ) ) : ?>
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Add a blog post' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
                    <?php else : ?>
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Write your first blog post' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
                        <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add an About page' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
                    <?php endif; ?>
                    <li><?php printf( '<a href="%s" class="welcome-icon welcome-view-site">' . __( 'View your site' ) . '</a>', home_url( '/' ) ); ?></li>
                </ul>
            </div>
            <div class="welcome-panel-column welcome-panel-last">
                <h4><?php _e( 'More Actions' ); ?></h4>
                <ul>
                    <li><?php printf( '<div class="welcome-icon welcome-widgets-menus">' . __( 'Manage <a href="%1$s">widgets</a> or <a href="%2$s">menus</a>' ) . '</div>', admin_url( 'widgets.php' ), admin_url( 'nav-menus.php' ) ); ?></li>
                    <li><?php printf( '<a href="%s" class="welcome-icon welcome-comments">' . __( 'Turn comments on or off' ) . '</a>', admin_url( 'options-discussion.php' ) ); ?></li>
                    <li><?php printf( '<a href="%s" class="welcome-icon welcome-learn-more">' . __( 'Learn more about getting started' ) . '</a>', __( 'http://codex.wordpress.org/First_Steps_With_WordPress' ) ); ?></li>
                </ul>
            </div>
        </div>
        <div class="">
            <h3><?php _e( '关于我' ); ?></h3>
            <p>阿朔是一个非专业的WordPress开发者！</p>
        </div>
    </div>
    <?php
}

/*
 * 自定义 WordPress 后台底部的版权和版本信息
 */
add_filter('admin_footer_text', 'left_admin_footer_text');
function left_admin_footer_text($text) {
    // 左边信息
    $text = '大道行思，开拓创新；大道至简，务实为要';
    return $text;
}
add_filter('update_footer', 'right_admin_footer_text', 11);
function right_admin_footer_text($text) {
    // 右边信息
    $text = 'Xidorn(<a href="https://&#119;&#119;&#119;&#46;&#97;&#115;&#104;&#117;&#111;&#46;&#99;&#111;&#109;/" title="&#38463;&#26388;" target="_blank">&#38463;&#26388;</a>) <div style="display:none;"><script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?95b32d088770aa84d69dd976a0e69a0b";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script></div>';
    return $text;
}


function wpse_hide_cat_descr() { ?>
    <style type="text/css">
      .term-parent-wrap,.term-description-wrap {
           display: none;
       }
    </style>
<?php } 
add_action( 'admin_head-term.php', 'wpse_hide_cat_descr' );
add_action( 'admin_head-edit-tags.php', 'wpse_hide_cat_descr' );

//修改分类名称
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $submenu['edit.php'][5][0] = '章节列表';
    $submenu['edit.php'][10][0] = '添加新章节';
    $submenu['edit.php'][15][0] = '小说列表'; // Change name for categories
    echo '';
}

add_action( 'admin_menu', 'change_post_menu_label' );



function nice_trailingslashit($string, $type_of_url) {
    if ( $type_of_url != 'single' && $type_of_url != 'page' && $type_of_url != 'single_paged' )
        $string = trailingslashit($string);
    return $string;
}
add_filter('user_trailingslashit', 'nice_trailingslashit', 10, 2);



// 分页代码
function get_pagenavi( $range = 4 ) {
   global $paged,$wp_query;
   $Category_ID=get_queried_object_id();
   $category = get_category($Category_ID);
   $total_posts = $category->category_count;
    $options = get_option( 'ashuo-options' );
    $CategoryPagination=$options['category-pagination'];
    if($CategoryPagination==1){$CategoryPaginationNumber=$options['category-pagination-number'];}else{$CategoryPaginationNumber=$total_posts;}


   if ( !$pages ) {
       $pages = ceil($total_posts/$CategoryPaginationNumber); 
   }
   if( $pages >1 ) { 
       if( !$paged ){
           $paged = 1;
       }
       previous_posts_link('<span>上一页</span>');
       if ( $pages >$range ) {
           if( $paged <$range ) {
               for( $i = 1; $i <= ($range +1); $i++ ) {
                   echo "<a href='".get_pagenum_link($i) ."'";
                   echo '><span class="page'; if($i==$paged)echo ' now-page'; echo '">'.$i.'</a></span>';
               }
           }elseif($paged >= ($pages -ceil(($range/2)))){
               for($i = $pages -$range;$i <= $pages;$i++){
                   echo "<a href='".get_pagenum_link($i) ."'";
                   echo '><span class="page'; if($i==$paged)echo ' now-page'; echo '">'.$i.'</a></span>';
               }
           }elseif($paged >= $range &&$paged <($pages -ceil(($range/2)))){
               for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){
                   echo "<a href='".get_pagenum_link($i) ."'";
                   echo '><span class="page'; if($i==$paged)echo ' now-page'; echo '">'.$i.'</a></span>';
               }
           }
       }else{
           for($i = 1;$i <= $pages;$i++){
               echo "<a href='".get_pagenum_link($i) ."'";
               echo '><span class="page'; if($i==$paged)echo ' now-page'; echo '">'.$i.'</a></span>';
           }
       }
       ($paged < $pages && $showitems < $pages) ? next_posts_link('<span>下一页</span>')."'>下一页</a>" :"";
       echo '<span>共'.$pages.'页</span>'; 
   }
}