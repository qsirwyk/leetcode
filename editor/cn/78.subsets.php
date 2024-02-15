<?php
//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    public $result;

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $this->dfs($nums,0,[]);
        return $this->result;
    }

    function dfs($nums, $start, $path) {
        $this->result[] = $path;
        for ($i = $start, $iMax = count($nums); $i < $iMax; $i++) {
            $path[] = $nums[$i];
            $this->dfs($nums, $i + 1, $path);
            array_pop($path);
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)

