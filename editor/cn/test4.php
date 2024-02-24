<?php

// 生成 6 个不同的数字
$numbers = range(1, 3);

// 使用递归函数实现全排列
function permute($nums, $start, $end) {
    if ($start == $end) {
        echo implode(' ', $nums) . PHP_EOL;
        return;
    }

    for ($i = $start; $i <= $end; $i++) {
        // 交换位置
        [$nums[$i], $nums[$start]] = [$nums[$start], $nums[$i]];
        permute($nums, $start + 1, $end);
        // 恢复原始顺序
        [$nums[$i], $nums[$start]] = [$nums[$start], $nums[$i]];
    }
}

permute($numbers, 0, count($numbers) - 1);
