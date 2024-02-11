<?php
//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        $result = [];
        $this->dfs($n,0,0,'',$result);
        return $result;
    }

    function dfs($n,$l,$r,$path,&$result) {
        if($l == $n && $r == $n) {
            $result[] = $path;
            return;
        }

        if($l < $n) {
            $this->dfs($n,$l + 1,$r,$path . '(',$result);
        }
        if($r < $l) {
            $this->dfs($n,$l,$r+1,$path . ')',$result);
        }

    }
}
//leetcode submit region end(Prohibit modification and deletion)