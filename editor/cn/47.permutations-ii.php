<?php

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param  Integer[]  $nums
     * @return Integer[][]
     */
    function permuteUnique($nums) {
        $result = [];
        $used = array_fill(0,count($nums),0);
        sort($nums);
        $this->dfs($nums,$used,[],$result);
        return $result;
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
}
//leetcode submit region end(Prohibit modification and deletion)

