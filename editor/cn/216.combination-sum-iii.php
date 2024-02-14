<?php

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param  Integer  $k
     * @param  Integer  $n
     * @return Integer[][]
     */
    function combinationSum3($k, $n) {
        $result = [];
        $this->dfs($k, $n, 1, [], $result);
        return $result;
    }

    function dfs($k, $target, $start, $path, &$result) {
        if ($k == 0 && $target == 0) {
            $result[] = $path;
            return;
        }
        if ($target < 0) {
            return;
        }
        for ($i = $start; $i < 10; $i++) {
            $path[] = $i;
            //printf("i:%d, k:%d, t:%d, path:%s\n", $i, $k, $target, implode(" ", $path));
            $this->dfs($k - 1, $target - $i, $i + 1, $path, $result);
            array_pop($path);
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)

