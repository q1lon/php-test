<?php
/**
 * 返回链接中的文件名 正经链接
 * @param $url
 */
function urlBasename1($url) {
   return pathinfo(parse_url( $url, PHP_URL_PATH ), PATHINFO_BASENAME );
}
echo urlBasename1('https://baidu.com/iikb-app/preview/rich_text/a47ee94f927b45c2b9bce6fd16b5f2e2/image.png');
/**
 * 返回链接中的文件名 不正经链接
 * @param $url
 */
function urlBasename2($url) {
    $arr= explode('/',$url);
    return $arr[count($arr)-1];
}
echo urlBasename2('https://baidu.com/iikb-app/preview/getPdfFile?filePath=rich_text/a47ee94f927b45c2b9bce6fd16b5f2e2/image.png');