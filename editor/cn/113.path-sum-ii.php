<?php
//leetcode submit region begin(Prohibit modification and deletion)

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    public $result = [];

    /**
     * @param  TreeNode  $root
     * @param  Integer  $targetSum
     * @return Integer[][]
     */
    function pathSum($root, $targetSum) {
        if ($root) {
            $this->dfs($root, $targetSum, []);
        }
        return $this->result;
    }

    function dfs($root, $targetSum, $path) {

        if (!$root || $targetSum < $root->val) {
            return;
        }

        $path[] = $root->val;
        $targetSum -= $root->val;

        //printf("root:%d,target:%d,path:%s\n", $root->val, $targetSum, implode(" ", $path));
        //如果是叶子节点且与目标值相等 那么找到了一个路径解
        if (!$root->left && !$root->right && $targetSum == 0) {
            $this->result[] = $path;
            return;
        }

        $this->dfs($root->left, $targetSum, $path);
        $this->dfs($root->right, $targetSum, $path);

        //printf("B root:%d,target:%d,path:%s\n", $root->val, $targetSum, implode(" ", $path));
        //array_pop($path);
    }

    function dfs2($root, $targetSum, $path) {

        if (!$root) {
            return;
        }

        $path[] = $root->val;

        //如果是叶子节点且与目标值相等 那么找到了一个路径解
        if (!$root->left && !$root->right && $targetSum == $root->val) {
            $this->result[] = $path;
            return;
        }

        printf("root:%d,target:%d,path:%s\n", $root->val, $targetSum, implode(" ", $path));

        $this->dfs2($root->left, $targetSum - $root->val, $path);
        $this->dfs2($root->right, $targetSum - $root->val, $path);
        //array_pop($path);
    }
}

//leetcode submit region end(Prohibit modification and deletion)