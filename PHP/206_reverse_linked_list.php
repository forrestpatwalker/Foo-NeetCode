<?php

/**
 * Given the head of a singly linked list, reverse the list, and return the reversed list.
 *
 * Example 1:
 *
 * Input: head = [1,2,3,4,5]
 * Output: [5,4,3,2,1]
 *
 * Example 2:
 *
 * Input: head = [1,2]
 * Output: [2,1]
 *
 * Example 3:
 *
 * Input: head = []
 * Output: []
 *
 * Follow up: A linked list can be reversed either iteratively or recursively. Could you implement both?
 */

/**
 * variable $prev - initially set to null since we are reversing the linked list the last node should be null;
 * variable $current - set to $head
 *
 * loop through each node while $current_node does not equal null
 *  variable $next - set to $current->next
 *  current->next equals $prev
 *  $prev equals $current
 *  $current equals $next
 *
 * return $prev since this is now our new head
 */
class ListNode {
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseListIterative($head) {
        $prev = null;
        $current = $head;

        while ($current !== null) {
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }

        return $prev;
    }

    function reverseListRecursive($head) {
        if (is_null($head)){
            return null;
        }

        $new_head = $head;
        if (!is_null($head->next)) {
            $new_head = $this->reverseListRecursive($head->next);
            $head->next->next = $head;
        }

        $head->next = null;

        return $new_head;
    }
}

$node_5 = new ListNode(5);
$node_4 = new ListNode(4, $node_5);
$node_3 = new ListNode(3, $node_4);
$node_2 = new ListNode(2, $node_3);
$node_head = new ListNode(1, $node_2);

$solution = new Solution();
$result = $solution->reverseListIterative($node_head);
print_r($result);

$result = $solution->reverseListRecursive($node_5);
print_r($result);