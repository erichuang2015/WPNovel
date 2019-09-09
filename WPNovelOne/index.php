<?php
$options = get_option( 'ashuo-options' );
$OptionsHomeStickyNovel = ( ! empty( $options['home-sticky-novel'] ) ) ? $options['home-sticky-novel'] : '';
if($OptionsHomeStickyNovel!==''){$HomeStickyNovel=$OptionsHomeStickyNovel;}else{$HomeStickyNovel=1;}
$HomeLatestChapterNumber = ( ! empty( $options['home-latest-chapter-number'] ) ) ? $options['home-latest-chapter-number'] : '';
$HomeChapterNumber = ( ! empty( $options['home-chapter-number'] ) ) ? $options['home-chapter-number'] : '';
$meta = get_term_meta( $HomeStickyNovel, 'ashuo_taxonomy_options', true );
//获取变量
$SiteName=get_bloginfo('name');
$NovelName=get_cat_name($HomeStickyNovel);
$CategoryName = ( ! empty( $meta['novel-taxonomy'] ) ) ? $meta['novel-taxonomy'] : '';
$NovelAuthorName = ( ! empty( $meta['novel-author'] ) ) ? $meta['novel-author'] : '';
$NovelNovelProtagonist = ( ! empty( $meta['novel-protagonist'] ) ) ? $meta['novel-protagonist'] : '';
$NovelDescription = ( ! empty( $meta['novel-description'] ) ) ? $meta['novel-description'] : '';
$NovelThumbnail = ( ! empty( $meta['novel-thumbnail'] ) ) ? $meta['novel-thumbnail'] : '';
$NovelStatus = ( ! empty( $meta['novel-status'] ) ) ? $meta['novel-status'] : '';
//导航变量
$NavNovel = ( ! empty( $options['nav-novel'] ) ) ? $options['nav-novel'] : '';
//全局SEO标题
$SeoTitle = ( ! empty( $options['seo']['seo-home-title'] ) ) ? $options['seo']['seo-home-title'] : '';
$SeoKeywords = ( ! empty( $options['seo']['seo-home-keywords'] ) ) ? $options['seo']['seo-home-keywords'] : '';
$SeoDescription = ( ! empty( $options['seo']['seo-home-description'] ) ) ? $options['seo']['seo-home-description'] : '';
if($SeoTitle!==''){
	$title=$SeoTitle;
	$title = str_replace('{SiteName}',$SiteName,$title);
	$title = str_replace('{CategoryName}',$CategoryName,$title);
	$title = str_replace('{NovelName}',$NovelName,$title);
	$title = str_replace('{ChapterName}',$ChapterName,$title);
	$title = str_replace('{NovelAuthorName}',$NovelAuthorName,$title);
	$title = str_replace('{NovelNovelProtagonist}',$NovelNovelProtagonist,$title);
}else{
	$title=$SiteName;
}
if($SeoKeywords!==''){
	$keywords=$SeoKeywords;
	$keywords = str_replace('{SiteName}',$SiteName,$keywords);
	$keywords = str_replace('{CategoryName}',$CategoryName,$keywords);
	$keywords = str_replace('{NovelName}',$NovelName,$keywords);
	$keywords = str_replace('{NovelAuthorName}',$NovelAuthorName,$keywords);
	$keywords = str_replace('{NovelNovelProtagonist}',$NovelNovelProtagonist,$keywords);
}else{$keywords=$SiteName;}
if($SeoDescription!==''){
	$description=$SeoDescription;
	$description = str_replace('{SiteName}',$SiteName,$description);
	$description = str_replace('{CategoryName}',$CategoryName,$description);
	$description = str_replace('{NovelName}',$NovelName,$description);
	$description = str_replace('{NovelAuthorName}',$NovelAuthorName,$description);
	$description = str_replace('{NovelNovelProtagonist}',$NovelNovelProtagonist,$description);
}else{$description= $SiteName;}
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
	<meta name="mobile-agent" content="format=html5; url=<?php echo home_url();?>">
	<meta name="generator" content="Ashuo Novel" />
	<meta property="og:type" content="novel"/>
	<meta property="og:title" content="<?php echo get_cat_name($HomeStickyNovel); ?>"/>
	<meta property="og:description" content="<?php if($NovelDescription !== '' ){echo $NovelDescription;}else{echo '未填写描述';}?>"/>
	<meta property="og:image" content="<?php if($NovelThumbnail !== '' ){ echo $NovelThumbnail;}else{ echo get_template_directory_uri().'/images/nocover.jpg';}?>"/>
	<meta property="og:novel:category" content="<?php if($CategoryName !== '' ){echo $CategoryName;}else{ echo '未分类';};?>"/>
	<meta property="og:novel:author" content="<?php if($NovelAuthorName !== '' ){echo $NovelAuthorName;}else{ echo '未填写作者';};?>"/>
	<meta property="og:novel:book_name" content="<?php echo get_cat_name($HomeStickyNovel); ?>"/>
	<meta property="og:novel:read_url" content="<?php echo home_url();?>"/>
	<meta property="og:url" content="<?php echo home_url();?>"/>
	<meta property="og:novel:status" content="<?php if($NovelStatus !== '' ){if($NovelStatus==1){echo '连载中';}}else{echo '已完结';}?>"/>
	<meta property="og:novel:update_time" content="<?php query_posts('posts_per_page=1&cat=' .$HomeStickyNovel); while(have_posts()):the_post();?><?php the_modified_time('Y-n-j H:i:s'); ?>"/>
	<meta property="og:novel:latest_chapter_name" content="<?php the_title();?>"/>
	<meta property="og:novel:latest_chapter_url" content="<?php the_permalink()?><?php endwhile;wp_reset_query();?>"/>
	<link rel="canonical" href="<?php echo home_url();?>">
	<link rel="stylesheet" rev="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all"/>
	<script src="<?php echo get_template_directory_uri();?>/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri();?>/js/main.js" type="text/javascript" ></script>
	<?php $GeneralVerify = ( ! empty( $options['webmaster']['general-verify'] ) ) ? $options['webmaster']['general-verify'] : ''; if($GeneralVerify!==''){echo $GeneralVerify;}?>
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
	<div class="container">
		<div class="bookinfo">
			<div class="btitle"><h1><a href="<?php echo home_url();?>"><?php echo get_cat_name($HomeStickyNovel); ?></a></h1><em>作者：<?php if($NovelAuthorName !== '' ){echo $NovelAuthorName;}else{ echo '未填写作者';};?></em></div>
			
			<p class="stats"> <span class="fl"><b>最新章节：</b><?php query_posts('posts_per_page=1&cat=' .$HomeStickyNovel); while(have_posts()):the_post();?><a href="<?php the_permalink()?>" target="_blank" title="<?php echo get_cat_name($HomeStickyNovel).' '.get_the_title();?>"><?php the_title();?></a><?php endwhile;wp_reset_query();?></span> </p>
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
				}
          //手动添加URL
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
				$RecommendNovel = ( ! empty($options['recommend-novel']) ) ? $options['recommend-novel'] : '';
				$AutoRecommendNovel = ( ! empty($options['auto-recommend-novel']) ) ? $options['auto-recommend-novel'] : '';
				$ManualRecommendNovel = ( ! empty($options['manual-recommend-novel']) ) ? $options['manual-recommend-novel'] : '';
				if($RecommendNovel!==''||$AutoRecommendNovel==1||$ManualRecommendNovel!==''){
					echo '<p>好看的小说推荐：';
				}
				if($RecommendNovel!==''){
					foreach($RecommendNovel as $k=>$RecommendNovelID){
						echo '<a href="'.get_category_link($RecommendNovelID).'" title="'.get_cat_name($RecommendNovelID).'">'.get_cat_name($RecommendNovelID).'</a>&nbsp;';
					}
				}
				if($AutoRecommendNovel==1){
					?>
					<!--自动推荐-->
					<?php
					$args=array(
						'orderby' => 'ID',
						'order' => 'ASC'
					);
					$categories=get_categories($args);
					foreach($categories as $category) {
						echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . $category->name  . '" ' . '>' . $category->name.'</a>&nbsp;';
					}
				}
				?>
				<?php
        //手动添加URL
				if($ManualRecommendNovel!==''){
					foreach($ManualRecommendNovel as $k=>$ManualRecommendNovelID){
						echo '<a href="'.$ManualRecommendNovelID["recommend-novel-url"].'" title="'.$ManualRecommendNovelID["recommend-novel-name"].'">'.$ManualRecommendNovelID["recommend-novel-name"].'</a>&nbsp;';
					}
				}
				if($RecommendNovel!==''||$AutoRecommendNovel==1||$ManualRecommendNovel!==''){
					echo '</p>';
				}
				?></div>
			</div>
			<div class="ads">
				<div class="adleft"></div>
				<div class="adright"></div>
			</div>
			<div class="inner">
				<dl class="chapterlist cate">
					<dt class="title"><?php echo get_cat_name($HomeStickyNovel); ?>小说最新章节</dt>
					<?php
					$args=array(
              'cat' => $HomeStickyNovel,   // 分类ID
              'posts_per_page' => $HomeLatestChapterNumber, // 显示篇数
              'order' => 'DESC',
          );
					query_posts($args);
					if(have_posts()) : while (have_posts()) : the_post();
						?>
						<dd><a href="<?php the_permalink(); ?>" title="<?php echo get_cat_name($HomeStickyNovel).' '.get_the_title();?>"><?php the_title();?></a></dd>
					<?php  endwhile; endif; wp_reset_query(); ?>
				</dl>
				<div class="clear"></div>
			</div> 
			<div class="inner">
				<dl class="chapterlist cate">
					<dt class="title"><?php echo get_cat_name($HomeStickyNovel); ?>全文免费阅读</dt>
					<?php
					$args=array(
              'cat' => $HomeStickyNovel,   // 分类ID
              'posts_per_page' => $HomeChapterNumber, // 显示篇数
              'order' => 'ASC',
          );
					query_posts($args);
					if(have_posts()) : while (have_posts()) : the_post();
						?>
						<dd><a href="<?php the_permalink(); ?>" title="<?php echo get_cat_name($HomeStickyNovel).' '.get_the_title();?>"><?php the_title();?></a></dd>
					<?php  endwhile; endif; wp_reset_query(); ?>
				</dl>
				<div class="clear"></div>
			</div> 
			
		</div>
		<div class="container">
			<div id="content">
				<div class="inner">
					<div class="title">
						<h3>最近更新</h3>
					</div>
					<div class="details">
						<ul class="gengxin">
							<?php
                           //随机显示分类
							$order_options = array();
							$categories = get_categories();
							shuffle( $categories );
							$categories = array_slice( $categories, 0, 8 );
							foreach ($categories as $category):
								$catids = $category->term_id;
								$order_options[$catids] = $catids;
							endforeach;
							?>
							<?php foreach($order_options as $key=>$value){ ?> 
								<li>
									<span class="col1"><a href="<?php  echo get_category_link($value); ?>"><?php echo get_cat_name($value);?></a></span> 
									<?php $posts = query_posts($query_string . "&cat={$value}&showposts=1" ); ?>  
									<?php while(have_posts()) : the_post(); ?>
										<?php $meta = get_term_meta( $value, 'ashuo_taxonomy_options', true ); $NovelAuthorName = ( ! empty( $meta['novel-author'] ) ) ? $meta['novel-author'] : '';?>
										<span class="col2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
										<span class="col3"><?php if($NovelAuthorName !== '' ){echo $NovelAuthorName;}else{ echo '未填写作者';};?></span>
										<span class="col4"><?php the_time( 'Y-m-d H:i:s' ) ?></span>
									<?php endwhile; ?> 
								</li> 
							<?php }?>
						</ul>
					</div>
				</div>
			</div>
			<div id="sidebar">
				<div class="inner">
					<div class="title">
						<h3>最新入库</h3>
					</div>
					<div class="details">
						<ul class="item-list"><?php
						$order_options = array();
						$categories = get_categories('orderby=id&hide_empty==0&order=DESC&number=8');
						foreach ($categories as $category):
							$catids = $category->term_id;
							$order_options[$catids] = $catids;
						endforeach;
						?>
						<?php foreach($order_options as $key=>$value){ ?> 
							<li> 
								<span class="col1"><a href="<?php echo get_category_link($value); ?>"><?php echo get_cat_name($value);?></a></span> 
							</li> 
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="inner links">
			<div class="title">友情链接</div>
			<ul class="link">
				<?php
                //手动添加URL
				$FriendLink = ( ! empty( $options['friend-link'] ) ) ? $options['friend-link'] : '';
				if($FriendLink!=""){
					foreach($FriendLink as $k=>$FriendLinkID){
						echo '<li><a href="'.$FriendLinkID["friend-link-url"].'" title="'.$FriendLinkID["friend-link-name"].'">'.$FriendLinkID["friend-link-name"].'</a></li>';
					}
				}
				?>
			</ul>
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