<?php
/**
 * Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string
 * is valid.
 *
 * An input string is valid if:
 *
 * Open brackets must be closed by the same type of brackets.
 * Open brackets must be closed in the correct order.
 * Every close bracket has a corresponding open bracket of the same type.
 *
 *
 *
 * Example 1:
 *
 * Input: s = "()"
 * Output: true
 *
 * Example 2:
 *
 * Input: s = "()[]{}"
 * Output: true
 *
 * Example 3:
 *
 * Input: s = "(]"
 * Output: false
 */

/**
 * String: s
 * s can be '(', ')', '{', '}', '[' and ']'
 * (){}()
 * ({})
 *
 * declare stack variable
 * declare hashmap with key value pairs for each type of closing bracket
 *
 * loop over each character within the string s
 *  if the char exists as a key in hashmap
 *      if top of stack does not equal the closing pair for hashmap key value
 *          return false
 *      else
 *          pop the top of the stack
 *  else add char to top of stack;
 *
 * check if stack is greater than 0 if so return false
 *
 * else return true
 *
 */

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {

        $stack = [];
        $close_to_open = [
            ')' => '(',
            ']' => '[',
            '}' => '{',
        ];

        foreach (str_split($s) as $char) {
            if (array_key_exists($char, $close_to_open)) {
                if (end($stack) !== $close_to_open[$char]) {
                    return false;
                }
                array_pop($stack);
            } else {
                $stack[] = $char;
            }
        }

        if (count($stack) > 0) {
            return false;
        }
        return true;
    }
}

$s = '([]{}';

$solution = new Solution();
echo $solution->isValid($s);