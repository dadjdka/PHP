
<?php
function request_by_fsockopen($url,$post_data=array(),$debug=false){
    $url_array = parse_url($url);
    $hostname = $url_array['host'];
    $port = isset($url_array['port'])? $url_array['port'] : 80;
    @$requestPath = $url_array['path'] ."?". $url_array['query'];
    $fp = fsockopen($hostname, $port, $errno, $errstr, 10);
    if (!$fp) {
        echo "$errstr ($errno)";
        return false;
    }
    $method = "GET";
    if(!empty($post_data)){
        $method = "POST";
    }
    $header = "$method $requestPath HTTP/1.1\r\n";
    $header.="Host: $hostname\r\n";
    if(!empty($post_data)){
        // $_post = strval(NULL);
        foreach($post_data as $k => $v){
        $_post[]= $k."=".urlencode($v);//必须做url转码以防模拟post提交的数据中有&符而导致post参数键值对紊乱
        }
        $_post = implode('&', $_post);
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";//POST数据
        $header .= "Content-Length: ". strlen($_post) ."\r\n";//POST数据的长度
        $header.="Connection: Close\r\n\r\n";//长连接关闭
        $header .= $_post; //传递POST数据
    }else{
        $header.="Connection: Close\r\n\r\n";//长连接关闭
    }
    fwrite($fp, $header);
    //-----------------调试代码区间-----------------
    //注如果开启下面的注释,异步将不生效可是方便调试
    if($debug){
    $html = '';
    while (!feof($fp)) {
    $html.=fgets($fp);
    }
    echo $html;
    }
    //-----------------调试代码区间-----------------
    fclose($fp);
}
 
$data=array('name'=>'guoyu','pwd'=>'123456');
$url='http://localhost/PHP/asyn/other.php';
request_by_fsockopen($url,$data,true);