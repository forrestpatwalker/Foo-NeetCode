<?php
/**
 * Given an integer array nums sorted in non-decreasing order, remove the duplicates in-place such that each unique
 * element appears only once. The relative order of the elements should be kept the same. Then return the number of
 * unique elements in nums.
 *
 * Consider the number of unique elements of nums to be k, to get accepted, you need to do the following things:
 *
 * Change the array nums such that the first k elements of nums contain the unique elements in the order they were
 * present in nums initially. The remaining elements of nums are not important as well as the size of nums.
 *
 * Return k.
 *
 * Custom Judge:
 * The judge will test your solution with the following code:
 *
 * int[] nums = [...]; // Input array
 * int[] expectedNums = [...]; // The expected answer with correct length
 *
 * int k = removeDuplicates(nums); // Calls your implementation
 *
 * assert k == expectedNums.length;
 * for (int i = 0; i < k; i++) {
 * assert nums[i] == expectedNums[i];
 * }
 *
 * If all assertions pass, then your solution will be accepted.
 */

/**
 * [1][23][23][44][66][66][99][123]
 *
 * nums = integer array sorted in non-decreasing order.
 * k = number of unique elements in nums.
 *
 * nums.length will not matter at the end.
 * the first k elements in nums contain the unique elements in the order they were present in nums, the remaining
 * elements do not matter.
 *
 * return k
 *
 *
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $left_index = 1;

        for ($right_index = 1; $right_index < count($nums); $right_index++){
            if ($nums[$right_index] != $nums[$right_index - 1]) {
                $nums[$left_index] = $nums[$right_index];
                $left_index++;
            }
        }

        return $left_index;
    }
}

$nums = [0, 0, 1, 1, 1, 2, 2, 3, 4, 4, 5, 5, 5, 5, 5];

$solution = new Solution();
echo "K = " . $solution->removeDuplicates($nums) . "\n";
print_r($nums);
