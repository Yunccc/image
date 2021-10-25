<?php
error_reporting(0); 
preg_match('/<script id=\"js-initialData\" type=\"text\/json\">(.*?)<\/script>/ism',file_get_contents("https://www.zhihu.com/people/mt36501"),$matchdata);
$data=json_decode($matchdata[1],true);
$json=end($data['initialState']['entities']['articles']);
preg_match('/<noscript><img src=\"(.*?)\"/',$json['content'],$img);
$img=$img[1];//图片地址
$json=strip_tags($json['content'],'<p>');
echo <<<A
    <title>每天60秒读懂世界</title>
    <style type="text/css">
        body{
            background-image:url(bg1.png);
        } 
        .div1{
            margin:2% auto;
            position:relative;
            width: 800px;
            border-radius:30px;
            border:2px solid green;
            padding-top:430px;
        } 
        .div2{
            margin: 0 auto;
            position: absolute;
            width: 720px;
            height: 400px;
            top: 30px; left: 0; bottom: 0; right: 0;
            background: url("$img") no-repeat;
        }
        .div2::after{
            display: inline-block;
            content: "";
            width: 50px;
            height: 50px;
            background-image:url(bg1.png); 
            transform: rotate(45deg); 
            position: absolute; 
            margin:0 720px 200px 0;
            right:-25px;
            bottom:-25px;
            z-index: 2;  
            }
        p{
            font-size:30px;
            text-align: left;
            padding:0% 4%;
        } 
        p:hover{
            font-weight:bold;
        } 
    </style>
A;
echo '<div class="div1"><div class="div2"></div>',$json,'</div>';
?>