<?php
class Solution {
    private $dict = [];

    public function nextBeautifulNumber($n) {
        $cnt = [0];
        for ($i = 1; $i < 7; ++$i) {
            $cnt[] = $i;
            $this->dfs($i, 0, 0, 0, $cnt);
        }
        $this->dict[] = 1224444;

        foreach ($this->dict as $value) {
            if ($value > $n) {
                return $value;
            }
        }
    }

    private function dfs($len, $level, $num, $sum, &$cnt) {
        if ($level == $len) {
            $this->dict[] = $num;
            return;
        }

        for ($i = 1; $i <= $len; ++$i) {
            if ($cnt[$i] == 0) continue;
            if ($cnt[$i] == $i && $sum + $i > $len) continue;

            if ($cnt[$i] == $i) $sum += $i;
            --$cnt[$i];
            $this->dfs($len, $level + 1, $num * 10 + $i, $sum, $cnt);
            ++$cnt[$i];
            if ($cnt[$i] == $i) $sum -= $i;
        }
    }
}

// 使用示例
$solution = new Solution();
echo $solution->nextBeautifulNumber(1) . "\n"; // 应输出大于1的最小平衡数
echo $solution->nextBeautifulNumber(1000) . "\n"; // 应输出大于1000的最小平衡数
echo $solution->nextBeautifulNumber(3000) . "\n"; // 应输出大于3000的最小平衡数

