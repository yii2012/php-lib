<?php

#开启，具体参数说明可以查看官方文档
//xhprof_enable(XHPROF_FLAGS_NO_BUILTINS | XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);
xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);

//这里写要测试的php代码
for($i = 0; $i < 1000; $i++) {
    echo 'test code';
}

#关闭
$xhprof_data = xhprof_disable();

#这里的路径根据自己的站点来配置
$XHPROF_ROOT = '/opt/case/tools/xhprof';
include_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_lib.php";
include_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_runs.php";


$xhprof_runs = new XHProfRuns_Default();
$run_id = $xhprof_runs->save_run($xhprof_data, "xhprof");
#这里打印出本次测试的id，方便到报表列表页面【http://xxxx/xhprof_html/】去通过对应的id找到对应的结果
echo "<a target='_blank' href='http://test.tools.com/xhprof/xhprof_html/index.php?run={$run_id}&source=xhprof'>查询xhprof</a>";