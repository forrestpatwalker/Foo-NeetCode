<?php
/**
 * You are keeping the scores for a baseball game with strange rules. At the beginning of the game, you start with an empty record.
 *
 * You are given a list of strings operations, where operations[i] is the ith operation you must apply to the record and is one of the following:
 *
 * An integer x.
 * Record a new score of x.
 * '+'.
 * Record a new score that is the sum of the previous two scores.
 * 'D'.
 * Record a new score that is the double of the previous score.
 * 'C'.
 * Invalidate the previous score, removing it from the record.
 *
 * Return the sum of all the scores on the record after applying all the operations.
 *
 * The test cases are generated such that the answer and all intermediate calculations fit in a 32-bit integer and that all operations are valid.
 *
 *
 *
 * Example 1:
 *
 * Input: ops = ["5","2","C","D","+"]
 * Output: 30
 * Explanation:
 * "5" - Add 5 to the record, record is now [5].
 * "2" - Add 2 to the record, record is now [5, 2].
 * "C" - Invalidate and remove the previous score, record is now [5].
 * "D" - Add 2 * 5 = 10 to the record, record is now [5, 10].
 * "+" - Add 5 + 10 = 15 to the record, record is now [5, 10, 15].
 * The total sum is 5 + 10 + 15 = 30.
 *
 * Example 2:
 *
 * Input: ops = ["5","-2","4","C","D","9","+","+"]
 * Output: 27
 * Explanation:
 * "5" - Add 5 to the record, record is now [5].
 * "-2" - Add -2 to the record, record is now [5, -2].
 * "4" - Add 4 to the record, record is now [5, -2, 4].
 * "C" - Invalidate and remove the previous score, record is now [5, -2].
 * "D" - Add 2 * -2 = -4 to the record, record is now [5, -2, -4].
 * "9" - Add 9 to the record, record is now [5, -2, -4, 9].
 * "+" - Add -4 + 9 = 5 to the record, record is now [5, -2, -4, 9, 5].
 * "+" - Add 9 + 5 = 14 to the record, record is now [5, -2, -4, 9, 5, 14].
 * The total sum is 5 + -2 + -4 + 9 + 5 + 14 = 27.
 *
 * Example 3:
 *
 * Input: ops = ["1","C"]
 * Output: 0
 * Explanation:
 * "1" - Add 1 to the record, record is now [1].
 * "C" - Invalidate and remove the previous score, record is now [].
 * Since the record is empty, the total sum is 0.
 */

/**
 * empty record to start
 * list of strings $operations where $operations[i] is the ith operation you must apply to the record.
 *
 * an integer x - record a new score of x
 * '+' - Record a new score that is the sum of the previous two scores.
 * 'D' - Record a new score that is the double of the previous score.
 * 'C' - Invalidate the previous score, removed it from the record.
 *
 * return the sum of all the scores on the record after applying all the operations.
 *
 * set initial stack - record
 *
 * loop through operations
 *  if current operation is a number add to the top of the stack
 *  if current operation is '+' add the top two values of the stack and the result is added to the top of the stack
 *  if "" "" "" 'D' double the top of the stack and add the result to the top of the stack.
 *  if "" "" "" 'C' pop the top of the stack.
 *
 * after loop add all the values in the stack together and return the result from that.
 */

class Solution {

    /**
     * @param String[] $operations
     * @return Integer
     */
    function calPoints($operations) {
        $record = [];

        foreach ($operations as $op) {
            switch ($op) {
                case '+':
                    $record[] = end($record) + prev($record);
                    break;
                case 'C':
                    array_pop($record);
                    break;
                case 'D':
                    $record[] = end($record) * 2;
                    break;
                default:
                    $record[] = (int)$op;
                    break;
            }
        }

        return array_sum($record);
    }
}

$nums = ['5', '2', 'C', 'D', '+'];

$solution = new Solution();
echo $solution->calPoints($nums);