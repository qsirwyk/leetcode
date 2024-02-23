<?php
//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    public $result = [];

    /**
     * @param String $s
     * @return String[][]
     */
    function partition($s) {
        $len = strlen($s);
        $this->dfs($s, 0, $len, []);
        return $this->result;
    }

    function dfs($s, $start, $len, $path) {
        if($start == $len) {
            $this->result[] = $path;
            return;
        }
        for ($i = $start; $i < $len; $i++) {
            if (!$this->isPalindrome($s, $start, $i)) {
                continue;
            }
            $path[] = substr($s, $start, $i + 1 - $start);
            $this->dfs($s, $i + 1, $len, $path);
            array_pop($path);
        }
    }

    /**
     * 判断字符串中指定范围是否是回文串
     * @param $s
     * @param $left
     * @param $right
     * @return bool
     */
    function isPalindrome($s, $left, $right) {
        while ($left < $right) {
            if ($s[$left] != $s[$right]) {
                return false;
            }
            $left++;
            $right--;
        }
        return true;
    }
}
//leetcode submit region end(Prohibit modification and deletion)

