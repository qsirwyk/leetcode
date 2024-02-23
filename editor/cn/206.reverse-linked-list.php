<?php
//leetcode submit region begin(Prohibit modification and deletion)
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        if (!$head->next) {
            return $head;
        }
        $tail = $this->reverseList($head->next);
        printf("tail:%d,head:%d,head->next:%d\n", $tail->val,$head->val, $head->next->val);
        $head->next->next = $head;
        $head->next = null;
        return $tail;
    }
}
//leetcode submit region end(Prohibit modification and deletion)

