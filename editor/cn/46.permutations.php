<?php
//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $result = [];
        $used = array_fill(0,count($nums),0);
        $this->dfs($nums,$used,[],$result);
        return $result;
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
}
//leetcode submit region end(Prohibit modification and deletion)

