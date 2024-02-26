<?php

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    public $result = [];

    /**
     * @param  Integer[]  $nums
     * @return Integer[][]
     */
    function permuteUnique($nums) {
        $result = [];
        sort($nums);
        //$used = array_fill(0,count($nums),0);
        //$this->dfs($nums,$used,[],$result);
        //return $result;
        $this->dfs2($nums, 0);
        return $this->result;
    }

    function dfs($nums, $used, $path, &$result) {
        if (count($path) == count($nums)) {
            $result[] = $path;
            return;
        }
        foreach ($nums as $i => $num) {
            //当前分支和前一个分支数相等 且 前一个分支注意是前一个分支是撤销状态
            if ($i > 0 && $nums[$i] == $nums[$i - 1] && $used[$i - 1] == 0) {
                continue;
            }
            if (!$used[$i]) {
                $path[] = $num;
                $used[$i] = 1;
                $this->dfs($nums,$used,$path,$result);
                $used[$i] = 0;
                array_pop($path);
            }
        }
    }

    function dfs2($nums, $level) {
        if ($level == count($nums)) {
            $this->result[] = $nums;
            return;
        }

        for ($i = $level, $iMax = count($nums); $i < $iMax; $i++) {
            //if ($i > $level && $nums[$i] == $nums[$i - 1]) { //不能这样做 因为即使是排序后的数组 因为需要交换数组也不是有序的
            //    continue;
            //}
            if($this->shouldSwap($nums,$level,$i)) {
                [$nums[$i], $nums[$level]] = [$nums[$level], $nums[$i]];
                $this->dfs2($nums, $level + 1);
                [$nums[$i], $nums[$level]] = [$nums[$level], $nums[$i]];
            }
        }
    }

    function shouldSwap($nums, $start, $cur) {
        for ($i = $start; $i < $cur; $i++) {
            if ($nums[$i] == $nums[$cur]) {
                return false;
            }
        }
        return true;
    }
}
//leetcode submit region end(Prohibit modification and deletion)

