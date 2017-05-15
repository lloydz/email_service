<?php

$sLicense = "2:36705:4:1:1::ineln.integle.com:e1d0123c52c424d8f3bbb25afae26580";

$sLicenseDev = '2:43248:4:1:1::dev.ets.integle.com:b3af4a4bc5f880e77b1e67822aaaeda9';
$sLicensePre = '2:43249:4:1:1::ets.ineln.com:7f10c915e2e5dc46254e00e6cc86e073';
$sLicenseOnline = '2:43250:4:1:1::ets.integle.com:70456ecd1b9ba20ba591a8c54995edba';
// dev
// 2:43248:4:1:1::dev.ets.integle.com:b3af4a4bc5f880e77b1e67822aaaeda9
// 2:43249:4:1:1::ets.ineln.com:7f10c915e2e5dc46254e00e6cc86e073
// 2:43250:4:1:1::ets.integle.com:70456ecd1b9ba20ba591a8c54995edba


//2:36953:4:1:1::www.ineln.com:1ce3353492fa3fb576b7b14789518c15 www.ineln.com
//2:36705:4:1:1::ineln.integle.com:e1d0123c52c424d8f3bbb25afae26580 ineln.integle.com
//2:36046:4:1:1::eln.integle.com:616389c6e9e4b1c7ac6e678d59a5370c eln.integle.com

define('DS', DIRECTORY_SEPARATOR);
if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') { // windows系统(开发用)
    define('UPLOAD_PATH', "\\\\192.168.100.18" . DS . 'uploads' . DS . 'graphics' . DS . 'srcpath' . DS);
} else {
    define('UPLOAD_PATH', '/home' . DS . 'uploads' . DS . 'graphics' . DS . 'srcpath' . DS);
}

if (php_sapi_name() === 'cli' or defined('STDIN')) {
    $hostArray[0] = 'dev';
} else {
    define('PROTOCOL', isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http');
    if (!isset($_SERVER["HTTP_HOST"])) {
        exit('host错误');
    }
    $hostArray = explode('.', $_SERVER["HTTP_HOST"]);
    if (count($hostArray) < 2) {
        exit('host错误');
    }
}

define('DOMAIN_HOST', 'integle.com');
$picUrl = 'http://dev.pic.integle.com/';

if ('dev' == $hostArray[0]) {
    define('ENVIRONMENT', $hostArray[0]);
    $environment = ENVIRONMENT . '.';
    $sLicense = "2:39143:4:1:1::dev.incms2.integle.com:a9f2cce2076a1d2761d11504bda4e73f";
    $sLicense = $sLicenseDev;
} else {
    define('ENVIRONMENT', 'www');
    $environment = '';
    
    $picUrl = 'http://pic.integle.com/';
    
    if('ineln' == $hostArray[1]){
        $picUrl = 'http://pic.ineln.com/';
        $sLicense = "2:39481:4:1:1::incms.ineln.com:3d148768642003aa21d7af88b8cef22c";
        $sLicense = $sLicensePre;
    }elseif('integle' == $hostArray[1]){
        $sLicense = "2:39834:4:1:1::incms.integle.com:04874d8a0b1a8ba719a32fcf6a7ce70a";
        $sLicense = $sLicenseOnline;
    }
    
}

define('UPLOAD_URL', $picUrl);

$sUsername = "admin";
$sPassword = "admin";

$aStyle[1] = "standard650||||||officexp|||uploadfile/|||650|||350|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0||||||||||||1|||0|||650px宽度界面下的标准工具栏按钮|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||000000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|png|||10240|||100|||1|||73|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";
$aStyle[2] = "standard600||||||office2003|||uploadfile/|||600|||350|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0||||||||||||1|||0|||600px宽度界面下的标准工具栏按钮(推荐)|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||000000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|||10240|||100|||1|||66|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";
$aStyle[3] = "standard550||||||office2003|||uploadfile/|||550|||350|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0|||0|||||||||1|||0|||550px宽度界面下的标准工具栏按钮(推荐)|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||000000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|png|||10240|||100|||1|||66|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";
$aStyle[4] = "standard500||||||office2003|||uploadfile/|||500|||350|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0||||||||||||1|||0|||500px宽度界面下的标准工具栏按钮|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||000000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|||10240|||100|||1|||66|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";
$aStyle[5] = "full650||||||office2003|||uploadfile/|||650|||400|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0|||0|||||||||1|||0|||650px宽度界面下的所有功能按钮展示,功能按钮有可能重复|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||000000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|||10240|||100|||1|||73|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";
$aStyle[6] = "mini500||||||office2003|||uploadfile/|||500|||300|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0|||0|||||||||1|||0|||500px宽度界面下的最简工具栏按钮,适合于邮件系统留言系统等只需最简单功能的应用|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||000000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|||10240|||100|||1|||66|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";
$aStyle[7] = "menu400||||||office2003|||uploadfile/|||400|||250|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0|||0|||||||||1|||0|||400px宽度,工具栏全部菜单按钮,所有功能,占位小|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||FF0000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|||10240|||100|||1|||73|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";
$aStyle[8] = "coolblue||||||office2003|||uploadfile/|||550|||350|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|wmf|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0||||||||||||1|||0|||V4.x版保留,standard550标配,office2003皮肤|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||000000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|png|||10240|||100|||1|||66|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||0||||||1|||1|||1";
$aStyle[9] = "gray||||||office2000|||uploadfile/|||550|||350|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0|||0|||||||||1|||0|||V4.x版保留,standard550标配,office2000皮肤|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||000000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|png|||10240|||100|||1|||66|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";
$aStyle[10] = "light||||||light1|||uploadfile/|||550|||350|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0|||0|||||||||1|||0|||V4.x版保留,standard550标配,light1皮肤|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||000000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|png|||10240|||100|||1|||66|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";
$aStyle[11] = "blue||||||blue2|||uploadfile/|||550|||350|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0|||0|||||||||1|||0|||V4.x版保留,standard550标配,blue2皮肤|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||000000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|png|||10240|||100|||1|||66|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";
$aStyle[12] = "green||||||green1|||uploadfile/|||550|||350|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0|||0|||||||||1|||0|||V4.x版保留,standard550标配,green1皮肤|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||000000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|png|||10240|||100|||1|||66|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";
$aStyle[13] = "red||||||red1|||uploadfile/|||550|||350|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0|||0|||||||||1|||0|||V4.x版保留,standard550标配,red1皮肤|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||000000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|png|||10240|||100|||1|||66|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";
$aStyle[14] = "yellow||||||yellow1|||uploadfile/|||550|||350|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0|||0|||||||||1|||0|||V4.x版保留,standard550标配,yellow1皮肤|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||000000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|png|||10240|||100|||1|||66|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";
$aStyle[15] = "mini||||||office2003|||uploadfile/|||550|||350|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0|||0|||||||||1|||0|||V4.x版保留,下拉框及菜单,全功能,占位小|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||FF0000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|||10240|||100|||1|||73|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";
$aStyle[16] = "popup||||||office2003|||uploadfile/|||550|||350|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0|||0|||||||||1|||0|||V4.x版保留,standard550标配,office2003皮肤,弹窗模式调用|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||000000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|png|||10240|||100|||1|||66|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";
$aStyle[17] = "expand650||||||office2003|||uploadfile/|||650|||350|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0||||||||||||1|||0|||650px宽度界面下的扩展工具栏按钮,默认只显示一行工具栏,点击扩展按钮,显示更多|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||000000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|png|||10240|||100|||1|||73|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";
$aStyle[18] = "expand600||||||office2003|||uploadfile/|||600|||350|||rar|zip|pdf|doc|xls|ppt|chm|hlp|||swf|||gif|jpg|jpeg|bmp|png|||rm|flv|wmv|asf|mov|mpg|mpeg|avi|mp3|wav|mid|midi|ra|wma|||gif|jpg|bmp|png|||10240|||10240|||10240|||10240|||10240|||1|||1|||EDIT|||1|||0||||||||||||1|||0|||600px宽度界面下的扩展工具栏按钮(推荐),默认只显示一行工具栏,点击扩展按钮,显示更多|||1|||zh-cn|||0|||300|||120|||0|||版权所有...|||000000|||12|||simkai.ttf||||||0|||jpg|jpeg|||100|||FFFFFF|||1|||1|||gif|jpg|bmp|wmz|||10240|||100|||1|||66|||17|||5|||5|||0|||100|||100|||1|||5|||5|||88|||31|||1|||0|||1|||1|||1|||1|||1|||0|||0|||0|||||||||1|||{page}|||0|||2000|||1|||0||||||0|||200|||1|||2|||1|||1|||1|||0||||||0|||||||||||||||||||||1|||||||||300|||1||||||||||||||||||1||||||1|||1|||1";

$aToolbar[1] = "1|||TBHandle|FormatBlock|FontName|FontSize|Cut|Copy|Paste|PasteText|FormatBrush|TBSep|Delete|RemoveFormat|TBSep|FindReplace|SpellCheck|TBSep|UnDo|ReDo|TBSep|SelectAll|UnSelect|TBSep|absolutePosition|zIndexBackward|zIndexForward|||Toolbar1|||1";
$aToolbar[2] = "1|||TBHandle|Bold|Italic|UnderLine|StrikeThrough|SuperScript|SubScript|UpperCase|LowerCase|TBSep|JustifyLeft|JustifyCenter|JustifyRight|JustifyFull|TBSep|OrderedList|UnOrderedList|Indent|Outdent|TBSep|ForeColor|BackColor|TBSep|BgColor|TBSep|Fieldset|Iframe|HorizontalRule|Marquee|TBSep|CreateLink|Anchor|Map|Unlink|||Toolbar2|||2";
$aToolbar[3] = "1|||TBHandle|Image|File|GalleryMenu|TBSep|TableMenu|FormMenu|TBSep|RemoteUpload|LocalUpload|ImportWord|ImportExcel|ImportPPT|Capture|TBSep|QuickFormat|ParagraphAttr|TBSep|Template|Symbol|Emot|Art|NowDate|NowTime|Quote|TBSep|PrintBreak|Print|TBSep|ShowBorders|ZoomMenu|Maximize|addMetial|takePic|||Toolbar3|||3";
$aToolbar[4] = "2|||TBHandle|FormatBlock|FontName|FontSize|Cut|Copy|Paste|PasteText|FormatBrush|TBSep|Delete|RemoveFormat|TBSep|FindReplace|TBSep|UnDo|ReDo|TBSep|SelectAll|UnSelect|TBSep|UpperCase|LowerCase|||工具栏1|||1";
$aToolbar[5] = "2|||TBHandle|Bold|Italic|UnderLine|StrikeThrough|SuperScript|SubScript|TBSep|JustifyLeft|JustifyCenter|JustifyRight|JustifyFull|ParagraphAttr|TBSep|OrderedList|UnOrderedList|Indent|Outdent|TBSep|ForeColor|BackColor|BgColor|BackImage|TBSep|Fieldset|HorizontalRule|Marquee|TBSep|CreateLink|Unlink|Map|Anchor|||工具栏2|||2";
$aToolbar[6] = "2|||TBHandle|Image|File|GalleryMenu|TBSep|RemoteUpload|LocalUpload|ImportWord|ImportExcel|ImportPPT|Capture|TBSep|TableMenu|FormMenu|TBSep|QuickFormat|TBSep|Template|Symbol|Emot|Art|PrintBreak|NowDate|NowTime|TBSep|Quote|ShowBorders|TBSep|ZoomMenu|Maximize|addMetial|takePic|||工具栏3|||3";
$aToolbar[7] = "3|||TBHandle|FormatBlock|FontName|FontSize|Bold|Italic|UnderLine|StrikeThrough|TBSep|SuperScript|SubScript|UpperCase|LowerCase|TBSep|JustifyLeft|JustifyCenter|JustifyRight|JustifyFull|||工具栏1|||1";
$aToolbar[8] = "3|||TBHandle|Cut|Copy|Paste|PasteText|FindReplace|Delete|RemoveFormat|TBSep|UnDo|ReDo|SelectAll|UnSelect|TBSep|OrderedList|UnOrderedList|Indent|Outdent|ParagraphAttr|TBSep|ForeColor|BackColor|BgColor|BackImage|TBSep|RemoteUpload|ImportWord|ImportExcel|ImportPPT|||工具栏2|||2";
$aToolbar[9] = "3|||TBHandle|Image|File|GalleryMenu|TBSep|TableMenu|FormatBrush|QuickFormat|Capture|TBSep|Fieldset|HorizontalRule|Marquee|CreateLink|Unlink|Map|Anchor|TBSep|Template|Symbol|Emot|Art|Quote|ShowBorders|TBSep|Maximize|addMetial|takePic|||工具栏3|||3";
$aToolbar[10] = "4|||TBHandle|FontNameMenu|FontSizeMenu|Bold|Italic|UnderLine|StrikeThrough|SuperScript|SubScript|UpperCase|LowerCase|TBSep|ForeColor|BackColor|BgColor|BackImage|TBSep|JustifyLeft|JustifyCenter|JustifyRight|JustifyFull|OrderedList|UnOrderedList|Indent|Outdent|||工具栏1|||1";
$aToolbar[11] = "4|||TBHandle|Cut|Copy|Paste|PasteText|FormatBrush|FindReplace|Delete|RemoveFormat|QuickFormat|TBSep|UnDo|ReDo|SelectAll|UnSelect|TBSep|Fieldset|HorizontalRule|Marquee|CreateLink|Unlink|Map|Anchor|TBSep|ParagraphAttr|FormatBlockMenu|||工具栏2|||2";
$aToolbar[12] = "4|||TBHandle|Image|File|GalleryMenu|RemoteUpload|LocalUpload|ImportWord|ImportExcel|ImportPPT|Capture|TBSep|TableMenu|TBSep|Template|Symbol|Emot|Art|PrintBreak|Quote|ShowBorders|TBSep|ZoomMenu|Maximize|addMetial|takePic|||工具栏3|||3";
$aToolbar[13] = "5|||TBHandle|FormatBlock|FontName|FontSize|Cut|Copy|Paste|PasteText|FindReplace|Delete|RemoveFormat|TBSep|FindReplace|SpellCheck|TBSep|UnDo|ReDo|TBSep|SelectAll|UnSelect|TBSep|absolutePosition|zIndexBackward|zIndexForward|||Toolbar1|||1";
$aToolbar[14] = "5|||TBHandle|Bold|Italic|UnderLine|StrikeThrough|SuperScript|SubScript|UpperCase|LowerCase|TBSep|JustifyLeft|JustifyCenter|JustifyRight|JustifyFull|TBSep|OrderedList|UnOrderedList|Indent|Outdent|TBSep|ForeColor|BackColor|TBSep|BgColor|BackImage|TBSep|Fieldset|Iframe|HorizontalRule|Marquee|TBSep|CreateLink|Anchor|Map|Unlink|||Toolbar2|||2";
$aToolbar[15] = "5|||TBHandle|Image|File|GalleryMenu|TBSep|TableMenu|FormMenu|TBSep|RemoteUpload|LocalUpload|ImportWord|ImportExcel|TBSep|BR|Paragraph|ParagraphAttr|TBSep|Symbol|Emot|Art|NowDate|NowTime|Excel|Quote|TBSep|PrintBreak|Print|TBSep|ShowBorders|ZoomMenu|Refresh|Maximize|addMetial|takePic|||Toolbar3|||3";
$aToolbar[16] = "5|||TBHandle|FontMenu|ParagraphMenu|ComponentMenu|ObjectMenu|ToolMenu|FileMenu|TBSep|TableMenu|TableInsert|TableProp|TableCellProp|TableCellSplit|TableRowProp|TableRowInsertAbove|TableRowInsertBelow|TableRowMerge|TableRowSplit|TableRowDelete|TableColInsertLeft|TableColInsertRight|TableColMerge|TableColSplit|TableColDelete|TBSep|FormMenu|FormText|FormTextArea|FormRadio|FormCheckbox|FormDropdown|FormButton|||Toolbar4|||4";
$aToolbar[17] = "5|||TBHandle|TBSep|GalleryMenu|GalleryImage|GalleryFlash|GalleryMedia|GalleryFile|TBSep|Code|MathFlowEQ|TBSep|Big|Small|TBSep|ModeCode|ModeEdit|ModeText|ModeView|TBSep|SizePlus|SizeMinus|TBSep|ZoomSelect|TBSep|Template|QuickFormat|Capture|FontSizeMenu|FontNameMenu|FormatBlockMenu|TBSep|Pagination|PaginationInsert|TBSep|ShowBlocks|FormatBrush|Site|||Toolbar5|||5";
$aToolbar[18] = "6|||TBHandle|Cut|Copy|Paste|TBSep|FontSizeMenu|FontNameMenu|TBSep|Bold|Italic|UnderLine|TBSep|JustifyLeft|JustifyCenter|JustifyRight|TBSep|OrderedList|UnOrderedList|Indent|Outdent|TBSep|CreateLink|Unlink|TBSep|HorizontalRule|ForeColor|BackColor|TBSep|addMetial|takePic|||工具栏1|||1";
$aToolbar[19] = "7|||TBHandle|FontNameMenu|FontSizeMenu|FormatBlockMenu|TBSep|EditMenu|FontMenu|ParagraphMenu|ComponentMenu|ObjectMenu|ToolMenu|FormMenu|TableMenu|FileMenu|GalleryMenu|TBSep|ZoomMenu|Maximize|addMetial|takePic|||mini toolbar|||1";
$aToolbar[20] = "8|||TBHandle|FormatBlock|FontName|FontSize|Bold|Italic|UnderLine|StrikeThrough|TBSep|SuperScript|SubScript|UpperCase|LowerCase|TBSep|JustifyLeft|JustifyCenter|JustifyRight|JustifyFull|TBSep|Cut|Copy|FindReplace|Delete|RemoveFormat|||工具栏1|||1";
$aToolbar[21] = "8|||TBHandle|Image|TableMenu|UnDo|ReDo|SelectAll|UnSelect|TBSep|OrderedList|UnOrderedList|Indent|Outdent|ParagraphAttr|TBSep|ForeColor|BackColor|BgColor|TBSep|ImportWord|ImportExcel|ImportPPT|PasteWord|PasteText|Paste|insertTemperature|Maximize|||工具栏2|||2";
$aToolbar[22] = "9|||TBHandle|FormatBlock|FontName|FontSize|Bold|Italic|UnderLine|StrikeThrough|TBSep|SuperScript|SubScript|UpperCase|LowerCase|TBSep|JustifyLeft|JustifyCenter|JustifyRight|JustifyFull|||工具栏1|||1";
$aToolbar[23] = "9|||TBHandle|Cut|Copy|Paste|PasteText|FindReplace|Delete|RemoveFormat|TBSep|UnDo|ReDo|SelectAll|UnSelect|TBSep|OrderedList|UnOrderedList|Indent|Outdent|ParagraphAttr|TBSep|ForeColor|BackColor|BgColor|BackImage|TBSep|RemoteUpload|ImportWord|ImportExcel|ImportPPT|||工具栏2|||2";
$aToolbar[24] = "9|||TBHandle|Image|File|GalleryMenu|TBSep|TableMenu|FormatBrush|QuickFormat|Capture|TBSep|Fieldset|HorizontalRule|Marquee|CreateLink|Unlink|Map|Anchor|TBSep|Template|Symbol|Emot|Art|Quote|ShowBorders|TBSep|Maximize|addMetial|takePic|||工具栏3|||3";
$aToolbar[25] = "10|||TBHandle|FormatBlock|FontName|FontSize|Bold|Italic|UnderLine|StrikeThrough|TBSep|SuperScript|SubScript|UpperCase|LowerCase|TBSep|JustifyLeft|JustifyCenter|JustifyRight|JustifyFull|||工具栏1|||1";
$aToolbar[26] = "10|||TBHandle|Cut|Copy|Paste|PasteText|FindReplace|Delete|RemoveFormat|TBSep|UnDo|ReDo|SelectAll|UnSelect|TBSep|OrderedList|UnOrderedList|Indent|Outdent|ParagraphAttr|TBSep|ForeColor|BackColor|BgColor|BackImage|TBSep|RemoteUpload|ImportWord|ImportExcel|ImportPPT|||工具栏2|||2";
$aToolbar[27] = "10|||TBHandle|Image|File|GalleryMenu|TBSep|TableMenu|FormatBrush|QuickFormat|Capture|TBSep|Fieldset|HorizontalRule|Marquee|CreateLink|Unlink|Map|Anchor|TBSep|Template|Symbol|Emot|Art|Quote|ShowBorders|TBSep|Maximize|addMetial|takePic|||工具栏3|||3";
$aToolbar[28] = "11|||TBHandle|FormatBlock|FontName|FontSize|Bold|Italic|UnderLine|StrikeThrough|TBSep|SuperScript|SubScript|UpperCase|LowerCase|TBSep|JustifyLeft|JustifyCenter|JustifyRight|JustifyFull|||工具栏1|||1";
$aToolbar[29] = "11|||TBHandle|Cut|Copy|Paste|PasteText|FindReplace|Delete|RemoveFormat|TBSep|UnDo|ReDo|SelectAll|UnSelect|TBSep|OrderedList|UnOrderedList|Indent|Outdent|ParagraphAttr|TBSep|ForeColor|BackColor|BgColor|BackImage|TBSep|RemoteUpload|ImportWord|ImportExcel|ImportPPT|||工具栏2|||2";
$aToolbar[30] = "11|||TBHandle|Image|File|GalleryMenu|TBSep|TableMenu|FormatBrush|QuickFormat|Capture|TBSep|Fieldset|HorizontalRule|Marquee|CreateLink|Unlink|Map|Anchor|TBSep|Template|Symbol|Emot|Art|Quote|ShowBorders|TBSep|Maximize|addMetial|takePic|||工具栏3|||3";
$aToolbar[31] = "12|||TBHandle|FormatBlock|FontName|FontSize|Bold|Italic|UnderLine|StrikeThrough|TBSep|SuperScript|SubScript|UpperCase|LowerCase|TBSep|JustifyLeft|JustifyCenter|JustifyRight|JustifyFull|||工具栏1|||1";
$aToolbar[32] = "12|||TBHandle|Cut|Copy|Paste|PasteText|FindReplace|Delete|RemoveFormat|TBSep|UnDo|ReDo|SelectAll|UnSelect|TBSep|OrderedList|UnOrderedList|Indent|Outdent|ParagraphAttr|TBSep|ForeColor|BackColor|BgColor|BackImage|TBSep|RemoteUpload|ImportWord|ImportExcel|ImportPPT|||工具栏2|||2";
$aToolbar[33] = "12|||TBHandle|Image|File|GalleryMenu|TBSep|TableMenu|FormatBrush|QuickFormat|Capture|TBSep|Fieldset|HorizontalRule|Marquee|CreateLink|Unlink|Map|Anchor|TBSep|Template|Symbol|Emot|Art|Quote|ShowBorders|TBSep|Maximize|addMetial|takePic|||工具栏3|||3";
$aToolbar[34] = "13|||TBHandle|FormatBlock|FontName|FontSize|Bold|Italic|UnderLine|StrikeThrough|TBSep|SuperScript|SubScript|UpperCase|LowerCase|TBSep|JustifyLeft|JustifyCenter|JustifyRight|JustifyFull|||工具栏1|||1";
$aToolbar[35] = "13|||TBHandle|Cut|Copy|Paste|PasteText|FindReplace|Delete|RemoveFormat|TBSep|UnDo|ReDo|SelectAll|UnSelect|TBSep|OrderedList|UnOrderedList|Indent|Outdent|ParagraphAttr|TBSep|ForeColor|BackColor|BgColor|BackImage|TBSep|RemoteUpload|ImportWord|ImportExcel|ImportPPT|||工具栏2|||2";
$aToolbar[36] = "13|||TBHandle|Image|File|GalleryMenu|TBSep|TableMenu|FormatBrush|QuickFormat|Capture|TBSep|Fieldset|HorizontalRule|Marquee|CreateLink|Unlink|Map|Anchor|TBSep|Template|Symbol|Emot|Art|Quote|ShowBorders|TBSep|Maximize|addMetial|takePic|||工具栏3|||3";
$aToolbar[37] = "14|||TBHandle|FormatBlock|FontName|FontSize|Bold|Italic|UnderLine|StrikeThrough|TBSep|SuperScript|SubScript|UpperCase|LowerCase|TBSep|JustifyLeft|JustifyCenter|JustifyRight|JustifyFull|||工具栏1|||1";
$aToolbar[38] = "14|||TBHandle|Cut|Copy|Paste|PasteText|FindReplace|Delete|RemoveFormat|TBSep|UnDo|ReDo|SelectAll|UnSelect|TBSep|OrderedList|UnOrderedList|Indent|Outdent|ParagraphAttr|TBSep|ForeColor|BackColor|BgColor|BackImage|TBSep|RemoteUpload|ImportWord|ImportExcel|ImportPPT|||工具栏2|||2";
$aToolbar[39] = "14|||TBHandle|Image|File|GalleryMenu|TBSep|TableMenu|FormatBrush|QuickFormat|Capture|TBSep|Fieldset|HorizontalRule|Marquee|CreateLink|Unlink|Map|Anchor|TBSep|Template|Symbol|Emot|Art|Quote|ShowBorders|TBSep|Maximize|addMetial|takePic|||工具栏3|||3";
$aToolbar[40] = "15|||TBHandle|FontName|FontSize|TBSep|EditMenu|FontMenu|ParagraphMenu|ComponentMenu|ObjectMenu|ToolMenu|FormMenu|TableMenu|FileMenu|GalleryMenu|FormatBlockMenu|ZoomMenu|TBSep|Maximize|addMetial|takePic|||mini toolbar|||1";
$aToolbar[41] = "16|||TBHandle|FormatBlock|FontName|FontSize|Bold|Italic|UnderLine|StrikeThrough|TBSep|SuperScript|SubScript|UpperCase|LowerCase|TBSep|JustifyLeft|JustifyCenter|JustifyRight|JustifyFull|||工具栏1|||1";
$aToolbar[42] = "16|||TBHandle|Cut|Copy|Paste|PasteText|FindReplace|Delete|RemoveFormat|TBSep|UnDo|ReDo|SelectAll|UnSelect|TBSep|OrderedList|UnOrderedList|Indent|Outdent|ParagraphAttr|TBSep|ForeColor|BackColor|BgColor|BackImage|TBSep|RemoteUpload|ImportWord|ImportExcel|ImportPPT|||工具栏2|||2";
$aToolbar[43] = "16|||TBHandle|Image|File|GalleryMenu|TBSep|TableMenu|FormatBrush|QuickFormat|Capture|TBSep|Fieldset|HorizontalRule|Marquee|CreateLink|Unlink|Map|Anchor|TBSep|Template|Symbol|Emot|Art|Quote|ShowBorders|TBSep|Save|addMetial|takePic|||工具栏3|||3";
$aToolbar[44] = "17|||TBHandle|FontName|FontSize|Cut|Copy|Paste|PasteText|FormatBrush|TBSep|Bold|Italic|UnderLine|StrikeThrough|TBSep|JustifyLeft|JustifyCenter|JustifyRight|JustifyFull|TBSep|OrderedList|UnOrderedList|Indent|Outdent|TBSep|ForeColor|BackColor|TBSep|Maximize|ExpandToolbar|||Toolbar1|||1";
$aToolbar[45] = "17|||TBHandle|UnDo|ReDo|TBSep|FormatBlockMenu|ParagraphAttr|TBSep|PasteWord|SuperScript|SubScript|UpperCase|LowerCase|Delete|RemoveFormat|TBSep|SelectAll|UnSelect|TBSep|FindReplace|SpellCheck|TBSep|BgColor|BackImage|TBSep|Fieldset|Iframe|HorizontalRule|Marquee|TBSep|CreateLink|Anchor|Map|Unlink|TBSep|absolutePosition|zIndexBackward|zIndexForward|||Toolbar2|||2";
$aToolbar[46] = "17|||TBHandle|Image|File|GalleryMenu|TBSep|TableMenu|FormMenu|TBSep|RemoteUpload|LocalUpload|ImportWord|ImportExcel|ImportPPT|Capture|TBSep|QuickFormat|TBSep|Template|Symbol|Emot|Art|NowDate|NowTime|Excel|Quote|TBSep|PrintBreak|Print|TBSep|ShowBorders|ShowBlocks|ZoomMenu|addMetial|takePic|||Toolbar3|||3";
$aToolbar[47] = "18|||TBHandle|FontName|FontSize|Cut|Copy|Paste|PasteText|PasteWord|FormatBrush|TBSep|Bold|Italic|UnderLine|StrikeThrough|TBSep|JustifyLeft|JustifyCenter|JustifyRight|JustifyFull|TBSep|ForeColor|BackColor|TBSep|Maximize|ExpandToolbar|||工具栏1|||1";
$aToolbar[48] = "18|||TBHandle|UnDo|ReDo|TBSep|FormatBlockMenu|ParagraphAttr|TBSep|OrderedList|UnOrderedList|Indent|Outdent|TBSep|SuperScript|SubScript|TBSep|Delete|RemoveFormat|TBSep|SelectAll|UnSelect|TBSep|FindReplace|SpellCheck|TBSep|BgColor|BackImage|TBSep|Fieldset|HorizontalRule|Marquee|TBSep|CreateLink|Unlink|Map|Anchor|||工具栏2|||2";
$aToolbar[49] = "18|||TBHandle|Image|File|GalleryMenu|TBSep|RemoteUpload|LocalUpload|ImportWord|ImportExcel|ImportPPT|Capture|TBSep|TableMenu|FormMenu|TBSep|QuickFormat|TBSep|Template|Symbol|Emot|Art|PrintBreak|NowDate|NowTime|TBSep|Quote|ShowBorders|ShowBlocks|ZoomMenu|addMetial|takePic|||工具栏3|||3";

?>