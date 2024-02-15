<?php

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    public $phone = [
        '2' => ['a', 'b', 'c'],
        '3' => ['d', 'e', 'f'],
        '4' => ['g', 'h', 'i'],
        '5' => ['j', 'k', 'l'],
        '6' => ['m', 'n', 'o'],
        '7' => ['p', 'q', 'r', 's'],
        '8' => ['t', 'u', 'v'],
        '9' => ['w', 'x', 'y', 'z']
    ];

    public $result = [];

    /**
     * @param  String  $digits
     * @return String[]
     */
    function letterCombinations($digits) {
        if(strlen($digits) > 0) {
            //$this->dfs($digits, 0,"");
            $this->dfs2($digits, "");
        }
        return $this->result;
    }

    function dfs($digits, $level, $path) {
        if (strlen($digits) == $level) {
            $this->result[] = $path;
            return;
        }
        for ($i = 0, $iMax = count($this->phone[$digits[$level]]); $i < $iMax; $i++) {
            $this->dfs($digits, $level + 1,$path.$this->phone[$digits[$level]][$i]);
        }
    }

    function dfs2($digits, $path) {
        if (strlen($digits) == 0) {
            $this->result[] = $path;
            return;
        }
        foreach ($this->phone[$digits[0]] as $iValue) {
            //$path .= $iValue;
            $this->dfs2(substr($digits, 1), $path . $iValue);
            //$path = substr($path, 0, -1);
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)

