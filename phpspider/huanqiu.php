<?php
/**
 * Created by PhpStorm.
 * User: zhang
 * Date: 2017/2/11 0011
 * Time: 15:18
 */

require dirname(__FILE__).'/core/init.php';

$configs = array(
    'name' => '环球新闻-国际',
    'log_show' => 'false',
    'log_file' => 'data/sannong.log',
    'log_type' => 'error,debug',
    'input_encoding' => null,
    'output_encoding' => null,
    'tasknum' => 1,
    'multiserver' => false,
    'serverid' => 1,
    'save_running_state' => false,
    'interval' => 1000,
    'timeout' => 5,
    'max_try' => 3,
    'max_depth' => 1,
    'max_fields' => 0,
    'user_agent' => phpspider::AGENT_PC,
    'user_agents' => array(
        "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36",
        "Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_3 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13G34 Safari/601.1",
        "Mozilla/5.0 (Linux; U; Android 6.0.1;zh_cn; Le X820 Build/FEXCNFN5801507014S) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 Chrome/49.0.0.0 Mobile Safari/537.36 EUI Browser/5.8.015S",
    ),
    'export' => array(
        'type' => 'db',
        'table' => 'pc_article',
    ),
    'domains' => array(
        'huanqiu.com'
    ),
    'scan_urls' => array(
        'http://world.huanqiu.com/exclusive/',
        'http://china.huanqiu.com/article/',
        'http://taiwan.huanqiu.com/article/',
        'http://society.huanqiu.com/article/',
        'http://oversea.huanqiu.com/article/',
    ),
//    'list_url_regexes' => array(
//        "http://sannong.cctv.com/\d+/\d+/\d+/\w.shtml"
//    ),
    'fields' => array(
        array(
            'name' => 'title',
            'selector' => '/html/body/div[4]/div/div[1]/div[1]/div[2]/h1',
            'required' => true
        ),
        array(
            'name' => 'source',
            'selector' => '//*[@id="source_baidu"]/a',
            'required' => true
        ),array(
            'name' => 'time',
            'selector' => '//*[@id="pubtime_baidu"]',
            'required' => true
        ),
        array(
            'name' => 'articletext',
            'selector' => '//*[@id="text"]',
            'required' => true
        ),
    ),
);

$spider = new phpspider($configs);

$spider->start();