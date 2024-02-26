<?php

class Solution {

    public $result = [];

    function permuteUnique($nums) {
        sort($nums);
        printf("%s\n",implode($nums));
        $this->dfs2($nums, 0);
        return $this->result;
    }

    function dfs2($nums, $level) {
        if ($level == count($nums)) {
            $this->result[] = $nums;
            return;
        }

        for ($i = $level, $iMax = count($nums); $i < $iMax; $i++) {
            // 只有当当前元素与它前一个元素不同，或者它是当前递归层级的第一个元素时，才进行交换
            if ($i == $level || $nums[$i] != $nums[$i - 1]) {
                [$nums[$i], $nums[$level]] = [$nums[$level], $nums[$i]];
                $this->dfs2($nums, $level + 1);
                [$nums[$i], $nums[$level]] = [$nums[$level], $nums[$i]];
            }
        }
    }

}

print_r((new Solution())->permuteUnique([0,1,0,0,9]));




