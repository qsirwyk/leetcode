<?php

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param  Integer[]  $candidates
     * @param  Integer  $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) {
        $result = [];
        $this->dfs($candidates, $target,0, [], $result);
        return $result;
    }

    function dfs($candidates, $target, $start, $path, &$result) {
        if ($target == 0) {
            $result[] = $path;
            return;
        }
        if ($target < 0) {
            return;
        }
        for ($i = $start, $iMax = count($candidates); $i < $iMax; $i++) {
            $path[] = $candidates[$i];
            //printf("start:%d,path:%s\n",$start,implode(" ",$path));
            $this->dfs($candidates, $target - $candidates[$i], $i, $path, $result);
            array_pop($path);
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)

