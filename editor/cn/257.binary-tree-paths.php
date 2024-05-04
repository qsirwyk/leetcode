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
     * @param TreeNode $root
     * @return String[]
     */
    function binaryTreePaths($root) {
        $this->dfs2($root,'');
        return $this->result;
    }

    function dfs($root, $path) {
        if (!$root) {
            return;
        }
        $path .= $root->val;
        if (!$root->left && !$root->right) {
            $this->result[] = $path;
            return;
        }
        $path .= '->';
        $this->dfs($root->left, $path);
        $this->dfs($root->right, $path);
    }

    function dfs2($root, $path) {
        if (!$root->left && !$root->right) {
            $this->result[] = $path . $root->val;
            return;
        }
        $path .= $root->val . '->';
        $this->dfs($root->left, $path );
        $this->dfs($root->right, $path);
    }

}
//leetcode submit region end(Prohibit modification and deletion)

