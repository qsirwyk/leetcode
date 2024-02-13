<?php
//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    function combine($n, $k) {
        $result = [];
        $this->dfs($n,$k,1,0,[],$result);
        return $result;
    }

    function dfs($n, $k,$start, $level,$path, &$result) {
        if (count($path) == $k) {
            $result[] = $path;
            return;
        }

        for ($i = $start; $i <= $n; $i++) {

            if($level + ($n - $start + 1) < $k) {
                continue;
            }

            $path[] = $i;
            $this->dfs($n,$k,$i + 1,$level + 1,$path,$result);
            array_pop($path);
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)

$s = new Solution();
$ret = $s->combine(4, 3);
print_r($ret);