<?php

ini_set("memory_limit", "1024M");
require dirname(__FILE__).'/core/init.php';

$configs = array(
	//定义当前爬虫名称
	'name' => '77xsk小说网',
	//是否显示日志
	//为true时显示调试信息
	//为false时显示爬取面板
	'log_show' => false,
	//日志位置
	'log_file' => 'data/log/xsk.log',
	//显示和记录的日志类型
	//普通类型: info
	//警告类型: warn
	//调试类型: debug
	//错误类型: error
	//'log_type' => 'error,debug'
	'log_type' => '',
	//输入编码
	//明确指定输入的页面编码格式(UTF-8,GB2312,…..)，防止出现乱码,如果设置null则自动识别
	'input_encoding' => '',
	//输出编码
	//明确指定输出的编码格式(UTF-8,GB2312,…..)，防止出现乱码,如果设置null则为utf-8
	'output_encoding' => '',
	//同时工作的爬虫任务数
	//需要配合redis保存采集任务数据，供进程间共享使用
	'tasknum' => 5,
	//多服务器处理
	//需要配合redis来保存采集任务数据，供多服务器共享数据使用
	'multiserver' => false,
	//服务器ID
	'serverid' => 1,
	//保存爬虫运行状态
	//需要配合redis来保存采集任务数据，供程序下次执行使用
	//注意：多任务处理和多服务器处理都会默认采用redis，可以不设置这个参数
	'save_running_state' => false,
	//代理服务器
	//如果爬取的网站根据IP做了反爬虫, 可以设置此项
	'proxy' => '',
	//爬虫爬取每个网页的时间间隔
	//单位：毫秒
	'interval' => 1000,
	//爬虫爬取每个网页的超时时间
	//单位：秒
	'timeout' => 5,
	//爬虫爬取每个网页失败后尝试次数
	//网络不好可能导致爬虫在超时时间内抓取失败, 可以设置此项允许爬虫重复爬取
	'max_try' => 5,
	//爬虫爬取网页深度，超过深度的页面不再采集
	//max_depth默认值为0，即不限制
	'max_depth' => 0,
	//爬虫爬取内容网页最大条数
	//抓取到一定的字段后退出
	//max_fields默认值为0，即不限制
	'max_fields' => 0,
	//爬虫爬取网页所使用的浏览器类型
	'user_agent' => phpspider::AGENT_PC,
	'user_agents' => array(
		"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36",
    	"Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_3 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13G34 Safari/601.1",
    	"Mozilla/5.0 (Linux; U; Android 6.0.1;zh_cn; Le X820 Build/FEXCNFN5801507014S) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 Chrome/49.0.0.0 Mobile Safari/537.36 EUI Browser/5.8.015S",
	),
	//爬虫爬取网页所使用的伪IP，用于破解防采集
	'client_ip' => '',
	//爬虫爬取网页所使用的随机伪IP，用于破解防采集
	'client_ips' => array(),
	//爬虫爬取数据导出
	//type：导出类型 csv、sql、db
	//file：导出 csv、sql 文件地址
	//table：导出db、sql数据表名
	'export' => array(
		'type' => 'db',
    	'table' => 'xiaoshuo',  // 如果数据表没有数据新增请检查表结构和字段名是否匹配
	),
	//定义爬虫爬取哪些域名下的网页, 非域名下的url会被忽略以提高爬取速度
	'domains' => array(
		'',
	),
	//定义爬虫的入口链接, 爬虫从这些链接开始爬取,同时这些链接也是监控爬虫所要监控的链接
	'scan_urls' => array(
		'',
	),
	//定义内容页url的规则
	//内容页是指包含要爬取内容的网页 比如http://www.qiushibaike.com/article/115878724 就是糗事百科的一个内容页
	'content_url_regexes' => array(
    	"http://www.qiushibaike.com/article/\d+",
	),
	//定义列表页url的规则
	//对于有列表页的网站, 使用此配置可以大幅提高爬虫的爬取速率
	//列表页是指包含内容页列表的网页 比如http://www.qiushibaike.com/8hr/page/2/?s=4867046 就是糗事百科的一个列表页
	'list_url_regexes' => array(
	    "http://www.qiushibaike.com/8hr/page/\d+\?s=\d+",
	),
	//定义内容页的抽取规则
	//规则由一个个field组成, 一个field代表一个数据抽取项
	'fields' => array(
	    array(
	        'name' => "content",
	        'selector_type' => 'xpath',
	        'selector' => "//*[@id='single-next-link']",
	        'required' => true,
	    ),
	    array(
	        'name' => "author",
	        'selector_type' => 'xpath',
	        'selector' => "//div[contains(@class,'author')]//h2",
	    )
	)
);