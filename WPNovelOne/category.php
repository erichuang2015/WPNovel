<?php
$options = get_option( 'ashuo-options' );
$CategoryLatestChapterNumber = ( ! empty( $options['category-latest-chapter-number'] ) ) ? $options['category-latest-chapter-number'] : '';
$Category_ID=get_queried_object_id();
$meta = get_term_meta( $Category_ID, 'ashuo_taxonomy_options', true );

$CategoryPagination=( ! empty( $options['category-pagination'] ) ) ? $options['category-pagination'] : '';
$CategoryPaginationNumber=( ! empty( $options['category-pagination-number'] ) ) ? $options['category-pagination-number'] : '';
if($CategoryPagination==1){$CategoryShowChapterNumber=$CategoryPaginationNumber;}else{$CategoryShowChapterNumber='-1';}

//获取当前页码
$PagedNumber = (get_query_var('paged')) ? get_query_var('paged') : 1;


//获取变量
$SiteName=get_bloginfo('name');
$NovelName=get_cat_name($Category_ID);
$CategoryName = ( ! empty( $meta['novel-taxonomy'] ) ) ? $meta['novel-taxonomy'] : '';
$NovelAuthorName = ( ! empty( $meta['novel-author'] ) ) ? $meta['novel-author'] : '';
$NovelNovelProtagonist = ( ! empty( $meta['novel-protagonist'] ) ) ? $meta['novel-protagonist'] : '';
$NovelDescription = ( ! empty( $meta['novel-description'] ) ) ? $meta['novel-description'] : '';
$NovelThumbnail = ( ! empty( $meta['novel-thumbnail'] ) ) ? $meta['novel-thumbnail'] : '';
$NovelStatus = ( ! empty( $meta['novel-status'] ) ) ? $meta['novel-status'] : '';
//导航变量
$NavNovel = ( ! empty( $options['nav-novel'] ) ) ? $options['nav-novel'] : '';
//全局SEO标题
$SeoTitle = ( ! empty( $options['seo']['seo-category-title'] ) ) ? $options['seo']['seo-category-title'] : '';
$SeoKeywords = ( ! empty( $options['seo']['seo-category-keywords'] ) ) ? $options['seo']['seo-category-keywords'] : '';
$SeoDescription = ( ! empty( $options['seo']['seo-category-description'] ) ) ? $options['seo']['seo-category-description'] : '';
//分类SEO标题
$TaxonomySeoTitle=( ! empty( $meta['taxonomy-seo-title'] ) ) ? $meta['taxonomy-seo-title'] : '';
$TaxonomySeoKeywords=( ! empty( $meta['taxonomy-seo-keywords'] ) ) ? $meta['taxonomy-seo-keywords'] : '';
$TaxonomySeoDescription=( ! empty( $meta['taxonomy-seo-description'] ) ) ? $meta['taxonomy-seo-description'] : '';
if($TaxonomySeoTitle!==''){
	$title=$TaxonomySeoTitle;
	$title = str_replace('{SiteName}',$SiteName,$title);
	$title = str_replace('{CategoryName}',$CategoryName,$title);
	$title = str_replace('{NovelName}',$NovelName,$title);
	$title = str_replace('{NovelAuthorName}',$NovelAuthorName,$title);
	$title = str_replace('{NovelNovelProtagonist}',$NovelNovelProtagonist,$title);
}elseif($SeoTitle!==''){
	$title=$SeoTitle;
	$title = str_replace('{SiteName}',$SiteName,$title);
	$title = str_replace('{CategoryName}',$CategoryName,$title);
	$title = str_replace('{NovelName}',$NovelName,$title);
	$title = str_replace('{NovelAuthorName}',$NovelAuthorName,$title);
	$title = str_replace('{NovelNovelProtagonist}',$NovelNovelProtagonist,$title);
}else{
	$title=$NovelName.'-'.$SiteName;
}
if($TaxonomySeoKeywords!==''){
	$keywords=$TaxonomySeoKeywords;
	$keywords = str_replace('{SiteName}',$SiteName,$keywords);
	$keywords = str_replace('{CategoryName}',$CategoryName,$keywords);
	$keywords = str_replace('{NovelName}',$NovelName,$keywords);
	$keywords = str_replace('{NovelAuthorName}',$NovelAuthorName,$keywords);
	$keywords = str_replace('{NovelNovelProtagonist}',$NovelNovelProtagonist,$keywords);
}elseif($SeoKeywords!==''){
	$keywords=$SeoKeywords;
	$keywords = str_replace('{SiteName}',$SiteName,$keywords);
	$keywords = str_replace('{CategoryName}',$CategoryName,$keywords);
	$keywords = str_replace('{NovelName}',$NovelName,$keywords);
	$keywords = str_replace('{NovelAuthorName}',$NovelAuthorName,$keywords);
	$keywords = str_replace('{NovelNovelProtagonist}',$NovelNovelProtagonist,$keywords);
}else{
	$keywords=$NovelName.','.$SiteName;
}
if($TaxonomySeoDescription!==''){
	$description=$TaxonomySeoDescription;
	$description = str_replace('{SiteName}',$SiteName,$description);
	$description = str_replace('{CategoryName}',$CategoryName,$description);
	$description = str_replace('{NovelName}',$NovelName,$description);
	$description = str_replace('{NovelAuthorName}',$NovelAuthorName,$description);
	$description = str_replace('{NovelNovelProtagonist}',$NovelNovelProtagonist,$description);
}elseif($SeoDescription!==''){
	$description=$SeoDescription;
	$description = str_replace('{SiteName}',$SiteName,$description);
	$description = str_replace('{CategoryName}',$CategoryName,$description);
	$description = str_replace('{NovelName}',$NovelName,$description);
	$description = str_replace('{NovelAuthorName}',$NovelAuthorName,$description);
	$description = str_replace('{NovelNovelProtagonist}',$NovelNovelProtagonist,$description);
}else{$description= $NovelName.'小说由'. $NovelAuthorName.'创作，《'. $NovelName.'》情节跌宕起伏、扣人心弦，是一本情节与文笔俱佳的'.$CategoryName.'小说，'.get_bloginfo('name').'小说网为您免费提供'.$NovelName.'最新章节无弹窗的纯文字在线阅读。';}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title><?php echo trim(strip_tags($title));?></title>
	<meta name="description" content="<?php echo trim(strip_tags($description));?>" />
	<meta name="keywords" content="<?php echo trim(strip_tags($keywords));?>" />
	<meta name="mobile-agent" content="format=html5; url=<?php echo get_category_link( $Category_ID ); ?>">
	<meta name="generator" content="Ashuo Novel" />
	<meta property="og:type" content="novel"/>
	<meta property="og:title" content="<?php single_cat_title();?>"/>
	<meta property="og:description" content="<?php if($NovelDescription !== '' ){echo $NovelDescription;}else{echo '未填写描述';}?>"/>
	<meta property="og:image" content="<?php if($NovelThumbnail !== '' ){ echo $NovelThumbnail;}else{ echo get_template_directory_uri().'/images/nocover.jpg';}?>"/>
	<meta property="og:novel:category" content="<?php if($CategoryName !== '' ){echo $CategoryName;}else{ echo '未分类';};?>"/>
	<meta property="og:novel:author" content="<?php if($NovelAuthorName !== '' ){echo $NovelAuthorName;}else{ echo '未填写作者';};?>"/>
	<meta property="og:novel:book_name" content="<?php single_cat_title();?>"/>
	<meta property="og:novel:read_url" content="<?php echo get_category_link( $Category_ID ); ?>"/>
	<meta property="og:url" content="<?php echo get_category_link( $Category_ID ); ?>"/>
	<meta property="og:novel:status" content="<?php if($NovelStatus !== '' ){if($NovelStatus==1){echo '连载中';}}else{echo '已完结';}?>"/>
	<meta property="og:novel:update_time" content="<?php query_posts('posts_per_page=1&cat=' .$Category_ID); while(have_posts()):the_post();?><?php the_modified_time('Y-n-j H:i:s'); ?>"/>
	<meta property="og:novel:latest_chapter_name" content="<?php the_title();?>"/>
	<meta property="og:novel:latest_chapter_url" content="<?php the_permalink()?><?php endwhile;wp_reset_query();?>"/>
	<link rel="canonical" href="<?php echo get_category_link($Category_ID);?>">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
	<script src="<?php echo get_template_directory_uri();?>/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri();?>/js/main.js" type="text/javascript" ></script>
</head>
<body>

	<header id="header">
		<div id="topbar">
			<div class="hd">
				<div class="logo"><a href="<?php echo home_url();?>" title="<?php echo get_bloginfo('name'); ?>"><?php echo get_bloginfo('name'); ?></a></div>
				<div class="proclamation"><?php echo $options['proclamation']; ?></div>
			</div>
		</div>
		<div class="clear"></div>
	</header>
	<div class="container">
		<?php if($PagedNumber ==1){ ?>
			<div class="bookinfo">
				<div class="btitle"><h1><a href="<?php echo get_category_link( $Category_ID ); ?>"><?php echo single_cat_title(); ?></a></h1><em>作者：<?php if($NovelAuthorName !== '' ){echo $NovelAuthorName;}else{ echo '未填写作者';};?></em></div>

				<p class="stats"> <span class="fl"><b>最新章节：</b><?php query_posts('posts_per_page=1&cat=' .$Category_ID); while(have_posts()):the_post();?><a href="<?php the_permalink()?>" target="_blank" title="<?php echo single_cat_title().' '.get_the_title();?>"><?php the_title();?></a><?php endwhile;wp_reset_query();?></span> </p>
				<div class="status"><font color="#999999">状态：</font><?php if($NovelStatus !== '' ){if($NovelStatus==1){echo '连载中';}}else{echo '已完结';}?>&nbsp;&nbsp;&nbsp;<font color="#999999">更新时间：</font><?php the_modified_time('Y-n-j H:i:s'); ?></div>
				<div class="intro"> <b>内容简介：</b><p><?php if($NovelDescription !== '' ){echo $NovelDescription;}else{echo '未填写描述';}?></p>
					<?php
					$RelatedNovel = ( ! empty( $meta['related-novel'] ) ) ? $meta['related-novel'] : '';
					$ManualRelatedNovel = ( ! empty( $meta['manual-related-novel'] ) ) ? $meta['manual-related-novel'] : '';
					$ManualRecommendNovel = ( ! empty($meta['manual-recommend-novel']) ) ? $meta['manual-recommend-novel'] : '';
					if($RelatedNovel!==''||$ManualRelatedNovel!==""){
						if($NovelAuthorName !== '' ){
							echo '<p><strong>'.$NovelAuthorName.'其他作品：</strong>';
						}else{
							echo '<p><strong>其他作品：</strong>';
						}
					}
					if($RelatedNovel!==''){
						foreach($RelatedNovel as $k=>$RelatedNovelID){
							echo '<a href="'.get_category_link($RelatedNovelID).'" title="'.get_cat_name($RelatedNovelID).'">'.get_cat_name($RelatedNovelID).'</a>&nbsp;';
						}
          }//手动添加URL
          if($ManualRecommendNovel!=""){
          	foreach($ManualRecommendNovel as $k=>$ManualRelatedNovelID){
          		echo '<a href="'.$ManualRelatedNovelID["related-novel-url"].'" title="'.$ManualRelatedNovelID["related-novel-name"].'">'.$ManualRelatedNovelID["related-novel-name"].'</a>&nbsp;';
          	}
          }
          if($RelatedNovel!==''||$ManualRelatedNovel!==""){
          	echo '</p>';
          }
          ?>
          <?php
          $SimilarNovel = ( ! empty( $meta['similar-novel'] ) ) ? $meta['similar-novel'] : '';
          $ManualSimilarNovel = ( ! empty( $meta['manual-similar-novel'] ) ) ? $meta['manual-similar-novel'] : '';
          if($SimilarNovel!==''||$ManualSimilarNovel!==''){
          	echo '<p>同类型小说推荐：';
          }
          if($SimilarNovel!=""){
          	foreach($SimilarNovel as $k=>$SimilarNovelID){
          		echo '<a href="'.get_category_link($SimilarNovelID).'" title="'.get_cat_name($SimilarNovelID).'">'.get_cat_name($SimilarNovelID).'</a>('.$meta['novel-author'].')&nbsp;';
          	}
          }
          ?>
          <?php
   //手动添加URL
          if($ManualSimilarNovel!=""){
          	foreach($ManualSimilarNovel as $k=>$ManualSimilarNovelID){
          		echo '<a href="'.$ManualSimilarNovelID["similar-novel-url"].'" title="'.$ManualSimilarNovelID["similar-novel-name"].'">'.$ManualSimilarNovelID["similar-novel-name"].'</a>&nbsp;';
          	}
          }
          if($SimilarNovel!==''||$ManualSimilarNovel!==''){
          	echo '</p>';
          }
          ?>
      </div>
  </div>
  <div class="inner">
  	<dl class="chapterlist cate">
  		<dt class="title"><?php echo single_cat_title(); ?>小说最新章节</dt>
  		<?php
  		$args=array(
              'cat' => $Category_ID,   // 分类ID
              'posts_per_page' => $CategoryLatestChapterNumber, // 显示篇数
              'order' => 'DESC',
          );
  		query_posts($args);
  		if(have_posts()) : while (have_posts()) : the_post();
  			?>
  			<dd><a href="<?php the_permalink(); ?>" title="<?php echo single_cat_title().' '.get_the_title();?>"><?php the_title();?></a></dd>
  		<?php  endwhile; endif; wp_reset_query(); ?>
  	</dl>
  	<div class="clear"></div>
  </div> 
<?php } ?>
<div class="inner">
	<dl class="chapterlist cate">
		<dt class="title"><?php echo single_cat_title(); ?>全文免费阅读</dt>
		<?php if (have_posts()) : ?>
			<?php
			$limit = get_option('posts_per_page');
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts('cat='.$Category_ID.'&order=ASC&showposts='.$CategoryShowChapterNumber.'&paged=' . $paged);
			$wp_query->is_archive = true; $wp_query->is_home = false;
			?>
			<?php while (have_posts()) : the_post(); ?>

				<dd><a href="<?php the_permalink(); ?>" title="<?php echo single_cat_title().' '.get_the_title();?>"><?php the_title();?></a></dd>

			<?php endwhile;?>
		<?php endif; wp_reset_query(); ?>
	</dl>
	<div class="clear"></div>
	<div class="pagebar">
		<?php get_pagenavi();?>
	</div>

</div> 
</div>
<div id="footer">
	<div class="hd">&copy;<?php echo date("Y");?> <a href="<?php echo home_url();?>" title="<?php echo get_bloginfo('name'); ?>"><?php echo get_bloginfo('name'); ?></a> 版权所有</div>
</div>
<script>backtotop();</script> 
<?php
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