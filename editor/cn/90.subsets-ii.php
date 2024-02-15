<?php

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    public $result;

    /**
     * @param  Integer[]  $nums
     * @return Integer[][]
     */
    function subsetsWithDup($nums) {
        sort($nums);
        $this->dfs($nums, 0, []);
        return $this->result;
    }

    function dfs($nums, $start, $path) {
        $this->result[] = $path;
        for ($i = $start, $iMax = count($nums); $i < $iMax; $i++) {
            //同一层级相同元素非第一个分支剪枝 注意需要排序后才方便去重
            if($i > $start && $nums[$i] == $nums[$i - 1]) continue;
            $path[] = $nums[$i];
            $this->dfs($nums, $i + 1, $path);
            array_pop($path);
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)

