<?php
$options = get_option( 'ashuo-options' );
$category = get_the_category();  
if($category[0]){  
	$Category_ID=$category[0]->term_id;
}  
$meta = get_term_meta( $Category_ID, 'ashuo_taxonomy_options', true );
$prev_post= get_previous_post($category );//与当前文章同分类的上一篇文章
$next_post = get_next_post($category,'');//与当前文章同分类的下一篇文章
if(get_previous_post($Category_ID)){
	$PrevLink=get_permalink( $prev_post->ID );
}else{
	$PrevLink= get_category_link($Category_ID );
}
if(get_next_post($Category_ID)){
	$NextLink=get_permalink( $next_post->ID );
}else{
	$NextLink=get_category_link($Category_ID );
}
//获取变量
$SiteName=get_bloginfo('name');
$NovelName=get_cat_name($Category_ID);
$ChapterName=get_the_title();
$CategoryName = ( ! empty( $meta['novel-taxonomy'] ) ) ? $meta['novel-taxonomy'] : '';
$NovelAuthorName = ( ! empty( $meta['novel-author'] ) ) ? $meta['novel-author'] : '';
$NovelNovelProtagonist = ( ! empty( $meta['novel-protagonist'] ) ) ? $meta['novel-protagonist'] : '';
//导航变量
$NavNovel = ( ! empty( $options['nav-novel'] ) ) ? $options['nav-novel'] : '';
//全局SEO标题
$SeoTitle=( ! empty( $options['seo']['seo-single-title'] ) ) ? $options['seo']['seo-single-title'] : '';
$SeoKeywords=( ! empty( $options['seo']['seo-single-keywords'] ) ) ? $options['seo']['seo-single-keywords'] : '';
$SeoDescription=( ! empty( $options['seo']['seo-single-description'] ) ) ? $options['seo']['seo-single-description'] : '';
if($SeoTitle!=""){
  $title=$SeoTitle;
  $title = str_replace('{SiteName}',$SiteName,$title);
  $title = str_replace('{CategoryName}',$CategoryName,$title);
  $title = str_replace('{NovelName}',$NovelName,$title);
  $title = str_replace('{ChapterName}',$ChapterName,$title);
  $title = str_replace('{NovelAuthorName}',$NovelAuthorName,$title);
  $title = str_replace('{NovelNovelProtagonist}',$NovelNovelProtagonist,$title);
}else{
  $title=$ChapterName.'-'.$SiteName;
}
if($SeoKeywords!=""){
  $keywords=$SeoKeywords;
  $keywords = str_replace('{SiteName}',$SiteName,$keywords);
  $keywords = str_replace('{CategoryName}',$CategoryName,$keywords);
  $keywords = str_replace('{NovelName}',$NovelName,$keywords);
  $keywords = str_replace('{ChapterName}',$ChapterName,$keywords);
  $keywords = str_replace('{NovelAuthorName}',$NovelAuthorName,$keywords);
  $keywords = str_replace('{NovelNovelProtagonist}',$NovelNovelProtagonist,$keywords);
}else{$keywords=$ChapterName.','.$SiteName;}
if($SeoDescription!=""){
  $description=$SeoDescription;
  $description = str_replace('{SiteName}',$SiteName,$description);
  $description = str_replace('{CategoryName}',$CategoryName,$description);
  $description = str_replace('{NovelName}',$NovelName,$description);
  $description = str_replace('{ChapterName}',$ChapterName,$description);
  $description = str_replace('{NovelAuthorName}',$NovelAuthorName,$description);
  $description = str_replace('{NovelNovelProtagonist}',$NovelNovelProtagonist,$description);
}else{$description= mb_strimwidth(strip_tags(apply_filters('the_content',$post->post_content)),0,200);}
?>
<!DOCTYPE html>
<html class="no-js" lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <meta http-equiv="Cache-Control" content="no-transform" />
  <title><?php echo trim(strip_tags($title));?></title>
  <meta name="description" content="<?php echo trim(strip_tags($description));?>" />
  <meta name="keywords" content="<?php echo trim(strip_tags($keywords));?>" />
  <meta name="mobile-agent" content="format=html5; url=<?php the_permalink();?>">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
  <script src="<?php echo get_template_directory_uri();?>/js/jquery-2.2.4.min.js" type="text/javascript"></script>
  <script src="<?php echo get_template_directory_uri();?>/js/main.js" type="text/javascript" ></script>
  <script src="<?php echo get_template_directory_uri();?>/js/custom.js" type="text/javascript"></script>
</head>
<body>

  <header id="header">
    <div id="topbar">
      <div class="hd">
        <div class="logo"><a href="<?php echo home_url();?>" title="<?php echo get_bloginfo('name'); ?>"><?php echo get_bloginfo('name'); ?></a></div>
        <div class="proclamation"><?php $Proclamation = ( ! empty( $options['proclamation'] ) ) ? $options['proclamation'] : ''; if($Proclamation!==''){echo $Proclamation;}?></div>
      </div>
    </div>
    <div class="clear"></div>
  </header>
  <div class="crumbs">
    <div class="fl"><span>当前位置：</span><a href="<?php echo home_url();?>">首页</a> &gt; <a href="<?php echo get_category_link($Category_ID ); ?>" title="<?php echo get_cat_name($Category_ID); ?>"><?php echo get_cat_name($Category_ID); ?></a> &gt; <a href="<?php the_permalink();?>" title="<?php echo get_cat_name($Category_ID).' '.get_the_title();?>"><?php the_title();?></a></div>
  </div>
  
  <div class="container">
    <div class="bookset"> 
      <script>if(system.win||system.mac||system.xll){bookset();}</script> 
    </div>
    <div class="article" id="main">
      <div class="inner" id="BookCon">
        <h1><?php the_title();?></h1>
        <div class="link xb">
         <a href="<?php echo $PrevLink; ?>" rel="prev">上一篇</a>←<a href="<?php echo get_category_link($Category_ID ); ?>">返回列表</a>→<a href="<?php echo $NextLink; ?>" rel="next">下一篇</a>            </div>
         <div class="ads">
          <?php 
          $AdSingleTop = ( ! empty( $options['ad-single-top'] ) ) ? $options['ad-single-top'] : '';
          if($AdSingleTop!==''){echo $AdSingleTop;}
          ?>
        </div>
        <div id="BookText">
         <?php if (have_posts()) : while (have_posts()) : the_post(); ?><?php the_content(); ?>
         <?php endwhile; else: ?>
         <?php endif; ?> </div>
         <div class="ads">
          <?php 
          $AdSinglePageAbove = ( ! empty( $options['ad-single-page-above'] ) ) ? $options['ad-single-page-abovep'] : '';
          if($AdSinglePageAbove!==''){echo $AdSinglePageAbove;}
          ?>
        </div>
        <div class="link">
         <a href="<?php echo $PrevLink; ?>" rel="prev">上一篇</a>←<a href="<?php echo get_category_link($Category_ID ); ?>">返回列表</a>→<a href="<?php echo $NextLink; ?>" rel="next">下一篇</a>            </div>
       </div>
       <div class="ads">
         <?php 
         $AdSinglePageBelow = ( ! empty( $options['ad-single-page-below'] ) ) ? $options['ad-single-page-below'] : '';
         if($AdSinglePageBelow!==''){echo $AdSinglePageBelow;}
         ?>
       </div>
     </div>
   </div>
   <div id="footer">
    <div class="hd">&copy;<?php echo date("Y");?> <a href="<?php echo home_url();?>" title="<?php echo get_bloginfo('name'); ?>"><?php echo get_bloginfo('name'); ?></a> 版权所有</div>
  </div>
  <script>backtotop();</script> 
  <script type="text/javascript">
    var back_page = "<?php echo $PrevLink; ?>";
    var next_page = "<?php echo $NextLink; ?>";
    document.onkeydown = function(evt){
     var e = window.event || evt;
     if (e.keyCode == 37) location.href = back_page;
     if (e.keyCode == 39) location.href = next_page;
   }
 </script>
 <?php 
 $AdSingleFloat = ( ! empty( $options['ad-single-float'] ) ) ? $options['ad-single-float'] : '';
 if($AdSingleFloat!==''){echo $AdSingleFloat;}
 $TrackBaidu = ( ! empty($options['webmaster']['track-baidu']) ) ? $options['webmaster']['track-baidu']['track-baidu-full'] : '';
 $TrackCnzz = ( ! empty($options['webmaster']['track-cnzz']) ) ? $options['webmaster']['track-cnzz']['track-cnzz-full'] : '';
 $TrackGoogle = ( ! empty($options['webmaster']['track-google']) ) ? $options['webmaster']['track-google'] : '';
 $Track51la = ( ! empty($options['webmaster']['track-51la']) ) ? $options['webmaster']['track-51la'] : '';
 $TrackOther = ( ! empty($options['webmaster']['track-other']) ) ? $options['webmaster']['track-other'] : '';
 if($TrackBaidu!==''){echo $TrackBaidu;}
 if($TrackCnzz!==''){echo $TrackCnzz;}
 if($TrackGoogle!==''){echo $TrackGoogle;}
 if($Track51la!==''){echo $Track51la;}
 if($TrackOther!==''){echo $TrackOther;}
 ?>
</body>
</html>