<?php
//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    public $result = [];
    public $cnt = [0];

    /**
     * @param Integer $n
     * @return Integer
     */
    function nextBeautifulNumber($n) {
        $this->cnt = array_fill(0, 10, 0);
        for ($i = 1; $i < 7; $i++) {
            $this->dfs($i, 0, 0);
        }
        //return implode(' ', $this->result);
        $this->result[] = 1224444;
        foreach ($this->result as $v) {
            if ($v > $n) {
                return $v;
            }
        }
    }

    function dfs($len, $sum, $level) {
        if($level == $len) {
            if($this->checkIsBeatutifulNumber()) {
                $this->result[] = $sum;
            }
            return;
        }

        for ($i = 1; $i <= $len; $i++) { // 剪枝一: 当前总位数多少，最多可使用的数值就是多少
            if ($this->cnt[$i] >= $i) { // // 剪枝二: 数值出现的次数不能超过当前数
                continue;
            }
            $this->cnt[$i]++;
            $this->dfs($len, $sum * 10 + $i, $level + 1);
            $this->cnt[$i]--;
        }

    }

    function checkIsBeatutifulNumber() {
        foreach ($this->cnt as $index => $val) {
            if ($val > 0 && $index != $val) {
                return false;
            }
        }
        return true;
    }
}
//leetcode submit region end(Prohibit modification and deletion)

