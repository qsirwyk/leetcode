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

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root) {
        $result = [];
        $this->dfs($root,$result);
        return $result;
    }

    function dfs($root,&$result) {
       if(!$root) return;
       $result[] = $root->val;
       $this->dfs($root->left,$result);
       $this->dfs($root->right,$result);
    }
}
//leetcode submit region end(Prohibit modification and deletion)

