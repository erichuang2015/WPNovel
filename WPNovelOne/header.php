<?php
$options = get_option( 'ashuo-options' );
$category = get_the_category();  




//不同页面获取分类ID
if(is_category()){$Category_ID=get_queried_object_id();}

if(is_single()){
if($category[0]){  
    $Category_ID=$category[0]->term_id;
}  
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
//文章页引用

?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<title>第二章 学其上，仅得其中_沧元图-笔趣阁</title>
<meta name="keywords" content="第二章 学其上，仅得其中,沧元图" />
<meta name="description" content="清晨。镜湖孟府的练武场，柳七月在练着箭，而孟川在角落练着刀法。呼呼。刀法飘忽，诡异难以捉摸。并且速度极快，这是凡俗当中能够学到的最顶尖的一门快刀刀法，名叫《落叶刀》。他六岁孩童时就经过家族考验，确定了在快刀上最有天赋，他也最喜" />
<meta name="mobile-agent" content="format=html5; url=<?php the_permalink();?>">
<meta name="applicable-device" content="pc,mobile">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta http-equiv="Cache-Control" content="no-transform" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.sidr.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/wap.js"></script>
</head>
<body>
</body>
<div class="m-doc">
<!--top-->
<div class="m-hd">
<div class="m-header">
<div class="m-logo"><a href="<?php echo home_url();?>" title="<?php echo get_bloginfo('name'); ?>"><?php echo get_bloginfo('name'); ?></a></div>
<div class="m-nav"  id="sidr">
<ul>
<?php
     
     $NavNovel =$options['nav-novel'];
         if($NavNovel!=""){
           foreach($NavNovel as $k=>$NavNovelID){
             echo '<li><a href="'.get_category_link($NavNovelID).'" title="'.get_cat_name($NavNovelID).'">'.get_cat_name($NavNovelID).'</a></li>';
           }
         }
         ?>
         	
         </ul>
</div>
<span href="#sidr-right" id="simple-menu"></span>
</div>
</div>
<div class="m-snav">
<div class="m-path">
               <span>当前位置：</span>
                <ul>
                <li><a href="<?php echo home_url();?>">首页</a></li>
                <li><a href="<?php echo get_category_link($Category_ID ); ?>" title="<?php echo get_cat_name($Category_ID); ?>"><?php echo get_cat_name($Category_ID); ?></a></li>
                <li><a href="<?php the_permalink();?>" title="<?php echo get_cat_name($Category_ID).' '.get_the_title();?>"><?php the_title();?></a></li>
            </ul>
<div class="m-set"><script>show_setbgsize();</script></div>
    </div>
</div>