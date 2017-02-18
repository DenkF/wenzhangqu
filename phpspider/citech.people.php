<?php
/**
 * Created by PhpStorm.
 * User: zhang
 * Date: 2017/2/11 0011
 * Time: 15:18
 */

require dirname(__FILE__).'/core/init.php';

/* Do NOT delete this comment */
/* 不要删除这段注释 */

$configs = array(
    'name' => '人民网-科技',
    'log_file' => 'data/log/citech.people.log',
    'tasknum' => 1,
    'domains' => array(
        'www.people.com.cn',
        'people.com.cn',
        'scitech.people.com.cn',
    ),
    'scan_urls' => array(
        'http://scitech.people.com.cn/GB/59405/index1.html',
    ),
    'list_url_regexes' => array(
        "http://scitech.people.com.cn/GB/59405/index\d+.html",
    ),
    'content_url_regexes' => array(
        "http://scitech.people.com.cn/n1/\d{4}/\d{4}/c\d{4}-\d{8}.html",
    ),
    'max_try' => 5,
    'export' => array(
        'type' => 'sql',
        'file' => 'data/sql/citech.people.sql',
        'table' => 'people',
    ),
    'fields' => array(
        array(
            'name' => "title",
            'selector' => "//div[contains(@class,'clearfix w1000_320 text_title')]//h1",
            ),
        array(
            'name' => "text",
            'selector' => "//div[contains(@class,'box01')]//div[contains(@class,'fl')]",
        ),
        array(
            'name' => "classification",
            'selector' => "//*[@id=\"rwb_navpath\"]//a[2]",
        ),
        array(
            'name' => "content",
            'selector' => "//*[@id='rwb_zw']",
            'required' => true,
        ),
    ),
);

$spider = new phpspider($configs);


$spider->start();