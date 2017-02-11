<?php
/**
 * Created by PhpStorm.
 * User: zhangxudong
 * Date: 2017/2/9
 * Time: 下午11:21
 */
ini_set("memory_limit", "1024M");
require dirname(__FILE__).'/core/init.php';

$configs = array(
    //爬虫名称
    'name' => '凤凰科技',
    //是否显示日志 ， true显示调试信息 false显示爬取面板
    'log_show' => 'false',
    //日志存放位置
    'log_file' => 'data/log/ifengkeji.log',
    //日志记录类型
    'log_type' => 'error,debug',
    //编码 null为自动识别
    'input_encoding' => null,
    'output_encoding' => 'utf-8',
    //爬取页面时间间隔
    'interval' => 1000, //1s
    'timeout' => 5, //爬取页面超时时间 5s
    'max_try' => 3, //爬取失败尝试次数
    'max_depth' => 0,
    'export' => array(
        'type' => 'db',
        'table' => 'pc_article',
    ),
    'domains' => array(
        'ifeng.com',
        'www.ifeng.com',
    ),
    'scan_urls' => array(

    ),
    'content_url_regexes' => array(

    ),
    'list_url_regexes' => array(

    ),
    'fields' => array(

    ),


);