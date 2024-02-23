<?php

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    public $result = [];
    public $nums = [1, 2, 4, 8, 1, 2, 4, 8, 16, 32]; // LED 转换成一维数组

    /**
     * @param  Integer  $turnedOn
     * @return String[]
     */
    function readBinaryWatch($turnedOn) {
        // h 最多亮 3 个 m 最多亮 5个
        //if ($turnedOn < 9) {
        $this->dfs($turnedOn, 0, 0, 0);
        //}
        return $this->result;
    }

    /**
     * h 4位 m 6位 可以转化成 10 选 n 符合时间的组合 这个 n 就是 $turnedOn 也就是亮着的 LED 的数量
     * @param $turnedOn
     * @param $h  //当前小时
     * @param $m  //当前分钟
     * @param $start  //设置下次搜索起始点
     * @return void
     */
    function dfs($turnedOn, $h, $m, $start) {
        if ($turnedOn == 0) {
            $this->result[] = $h.':'.($m < 10 ? '0'.$m : $m);
            return;
        }
        if ($turnedOn < 0) {
            return;
        }
        for ($i = $start; $i < 10; $i++) {
            if ($i < 4 && $h + $this->nums[$i] < 12) {
                $this->dfs($turnedOn - 1, $h + $this->nums[$i], $m, $i + 1);
            }
            if ($i >= 4 && $m + $this->nums[$i] < 60) {
                $this->dfs($turnedOn - 1, $h, $m + $this->nums[$i], $i + 1);
            }
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)

