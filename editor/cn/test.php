<?php
class Solution {

    public $result = [];

    //组合的递归写法
    function combination($arr) {
        $this->dfs($arr, '', 0);
        return $this->result;
    }

    function dfs($arr, $path, $level) {
        if ($level == count($arr)) {
            $this->result[] = $path;
            return;
        }

        foreach ($arr[$level] as $num) {
            $this->dfs($arr, $path.$num, $level + 1);
        }

    }
}

$arr = [['a', 'b', 'c'], ['d', 'e', 'f']];
print_r((new Solution)->combination($arr));

