<?php
//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    public $result = [];

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $result = [];
        //$used = array_fill(0,count($nums),0);
        //$this->dfs($nums,$used,[],$result);
        $this->dfs2($nums, 0, count($nums));
        return $this->result;
    }

    function dfs($nums, $used, $path, &$result) {
        if(count($path) == count($nums)) {
            $result[] = $path;
            return;
        }
        foreach($nums as $i => $num) {
            if(!$used[$i]) {
                $path[] = $num;
                $used[$i] = 1;
                $this->dfs($nums,$used,$path,$result);
                $used[$i] = 0;
                array_pop($path);
            }
        }
    }

    function dfs2($nums, $start, $end) {
        if ($start == $end) {
            $this->result[] = $nums;
            return;
        }

        for($i = $start, $iMax = count($nums); $i < $iMax; $i++) {
            [$nums[$i], $nums[$start]] = [$nums[$start], $nums[$i]];
            $this->dfs2($nums,$start + 1,$end);
            [$nums[$i], $nums[$start]] = [$nums[$start], $nums[$i]];
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)

