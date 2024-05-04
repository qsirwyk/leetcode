<?php

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {
    /**
     * @param  String[][]  $board
     * @param  String  $word
     * @return Boolean
     */
    function exist($board, $word) {
        $x = count($board);
        $y = count($board[0]);
        $row = array_fill(0, $x, 0);
        $visited = array_fill(0, $y, $row);
        for ($i = 0; $i < $x; $i++) {
            for ($j = 0; $j < $y; $j++) {
                if ($this->dfs($board, $visited, $word, $i, $j, 0)) {
                    return true;
                }
            }
        }
        return false;
    }

    function dfs($board, $visited, $word, $x, $y, $index) {
        // 如果值不相等则当前分支不符合 不再往下搜索
        if ($board[$x][$y] != $word[$index]) {
            return false;
        }
        // 如果是最后一个字符 不用往下搜索
        if (strlen($word) - 1 == $index) {
            return true;
        }

        //从 4 个方向搜索剩余结果 搜索过的不搜索  (通过 visited 实现)
        $visited[$x][$y] = 1; //进入那一层直接标记

        //向左搜索 如果未被访问过
        if ($x > 0 && !$visited[$x - 1][$y]) {
            //如果左分支搜到剩余结果 不在继续搜索
            if ($this->dfs($board, $visited, $word, $x - 1, $y, $index + 1)) {
                return true;
            }
        }
        //向右搜索 如果未被访问过
        if ($x < count($board) && !$visited[$x + 1][$y]) {
            //如果右分支搜索剩余结果 不在继续搜索
            if ($this->dfs($board, $visited, $word, $x + 1, $y, $index + 1)) {
                return true;
            }
        }
        //向上
        if ($y > 0 && !$visited[$x][$y - 1]) {
            if ($this->dfs($board, $visited, $word, $x, $y - 1, $index + 1)) {
                return true;
            }
        }
        //向下
        if ($y < count($board[0]) && !$visited[$x][$y + 1]) {
            if ($this->dfs($board, $visited, $word, $x, $y + 1, $index + 1)) {
                return true;
            }
        }

        //如果 4 个方向均未搜索到剩余结果 那么对于$board[$x][$y]这个点结果就是不存在
        //$visited[$x][$y] = 0; //恢复这个点未被访问 由于是副本这里不写 结果也没错
        return false;
    }
}
//leetcode submit region end(Prohibit modification and deletion)

