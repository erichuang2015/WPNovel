var system ={
win : false,
mac : false,
xll : false
};
//检测平台
var p = navigator.platform;
system.win = p.indexOf("Win") == 0;
system.mac = p.indexOf("Mac") == 0;
system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);
//Back to up
function backtotop(){
document.writeln('<script type="text/javascript">$(function(){$("#floatPanel > .ctrolPanel > a.arrow").eq(0).click(function(){$("html,body").animate({scrollTop :0}, 800);return false;});$("#floatPanel > .ctrolPanel > a.arrow").eq(1).click(function(){$("html,body").animate({scrollTop : $(document).height()}, 800);return false;});});</script>');
document.writeln('<div id="floatPanel"><div class="ctrolPanel"><a class="arrow" href="javascript:void(0);"><span>顶部</span></a><a class="arrow" href="javascript:void(0);"><span>底部</span></a></div></div>');
}
function addBookmark(_this){var _title=document.title;var url=document.URL;try{var ua=navigator.userAgent.toLowerCase();if(window.sidebar){if(ua.indexOf("firefox")>-1&&window.sidebar.addPanel){window.sidebar.addPanel(url,_title)}else{_this.setAttribute("title",_title);return true}}else{if(document.all&&window.external){window.external.AddFavorite(url,_title)}else{alert("浏览器不支持该操作，尝试快捷键 Ctrl + D !")}}}catch(e){alert("浏览器不支持该操作，尝试快捷键 Ctrl + D !")}return false};