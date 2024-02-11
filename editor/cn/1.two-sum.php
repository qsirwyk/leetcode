<?php
//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        $hash = [];
        foreach ($nums as $i => $iValue) {
            if (isset($hash[$target - $iValue])) {
                return [$hash[$target - $iValue], $i];
            }
            $hash[$iValue] = $i;
        }
        return [];
    }

}
//leetcode submit region end(Prohibit modification and deletion)

