<?php

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param  Integer[]  $candidates
     * @param  Integer  $target
     * @return Integer[][]
     */
    function combinationSum2($candidates, $target) {
        $result = [];
        $used = array_fill(0, count($candidates), 0);
        sort($candidates);
        $this->dfs($candidates, $target, 0, $used, [], $result);
        return $result;
    }

    function dfs($candidates, $target, $start, $used, $path, &$result) {
        if ($target == 0) {
            $result[] = $path;
            return;
        }
        if ($target < 0) {
            return;
        }
        for ($i = $start, $iMax = count($candidates); $i < $iMax; $i++) {
            if (!$used[$i]) {
                //if ($i > 0 && $candidates[$i] == $candidates[$i - 1] && !$used[$i - 1]) {
                //    continue;
                //}
                if ($i > $start && $candidates[$i] == $candidates[$i - 1]) {
                    continue;
                }
                $used[$i] = 1;
                $path[] = $candidates[$i];
                $this->dfs($candidates, $target - $candidates[$i], $i + 1, $used, $path, $result);
                array_pop($path);
                $used[$i] = 0;
            }
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)

