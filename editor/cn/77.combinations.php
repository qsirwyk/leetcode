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
        $this->dfs3($n,$k,1,[],$result);
        return $result;
    }

    function dfs($n, $k, $start, $path, &$result) {
        if (0 == $k) {
            $result[] = $path;
            return;
        }

        //printf("start:%d,n:%d,path_len:%d\n",$start,$n,count($path));
        if ($start >= $n - $k + 1) {
            return;
        }

        //选择 $start
        $path[] = $start;
        $this->dfs($n, $k - 1, $start + 1, $path, $result);

        //不选择 $start
        array_pop($path);
        $this->dfs($n, $k, $start + 1, $path, $result);
    }

    function dfs2($n, $k,$start, $level,$path, &$result) {
        if (count($path) == $k) {
            $result[] = $path;
            return;
        }

        for ($i = $start; $i <= $n; $i++) {

            if($level + ($n - $start + 1) < $k) {
                continue;
            }

            $path[] = $i;
            $this->dfs2($n,$k,$i + 1,$level + 1,$path,$result);
            array_pop($path);
        }
    }

    function dfs3($n, $k,$start, $path, &$result) {
        if (0 == $k) {
            $result[] = $path;
            return;
        }

        for ($i = $start; $i <= $n; $i++) {

            //if ($start > $n - $k + 1) {
            //    continue;
            //}

            $path[] = $i;
            $this->dfs3($n,$k - 1,$i + 1,$path,$result);
            array_pop($path);
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)

$s = new Solution();
$ret = $s->combine(1, 1);
print_r($ret);