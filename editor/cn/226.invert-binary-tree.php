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
     * @param  TreeNode  $root
     * @return TreeNode
     */
    function invertTree($root) {
        if ($root->left || $root->right) {
            $left = $this->invertTree($root->left);
            $right = $this->invertTree($root->right);
            printf("root:%d,left:%d,right:%d\n", $root->val, $left->val, $right->val);
            $root->left = $right;
            $root->right = $left;
        }
        return $root;
    }
}
//leetcode submit region end(Prohibit modification and deletion)

