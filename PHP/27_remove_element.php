<?php
/**
 * Given an integer array nums and an integer val, remove all occurrences of val in nums in-place. The order of the
 * elements may be changed. Then return the number of elements in nums which are not equal to val.
 *
 * Consider the number of elements in nums which are not equal to val be k, to get accepted, you need to do the
 * following things:
 *
 * Change the array nums such that the first k elements of nums contain the elements which are not equal to val. The
 * remaining elements of nums are not important as well as the size of nums.
 * Return k.
 *
 * Custom Judge:
 *
 * The judge will test your solution with the following code:
 *
 * int[] nums = [...]; // Input array
 * int val = ...; // Value to remove
 * int[] expectedNums = [...]; // The expected answer with correct length.
 * // It is sorted with no values equaling val.
 *
 * int k = removeElement(nums, val); // Calls your implementation
 *
 * assert k == expectedNums.length;
 * sort(nums, 0, k); // Sort the first k elements of nums
 * for (int i = 0; i < actualLength; i++) {
 * assert nums[i] == expectedNums[i];
 * }
 *
 * If all assertions pass, then your solution will be accepted.
 */

/**
 * $nums = [3][4][5][6][8][1][5][2]
 * $value = 5
 * remove all occurrences of $value in $nums in place.
 * first k element of nums should be the remaining values after removing $value from $nums
 * return k -> number of remaining elements after removing $value from $nums
 *
 * left_index equals 0 -> tracks next index in $nums to be updated, this will also serve as our value for k;
 * right_index equals 0 -> used to traverse the array.
 *
 * loop through nums while right_index < length of nums
 *  if nums[right_index] equals $value then replace with an empty string, else nums[left_index] equals nums[right_index]
 *  and then increment left_index by 1;
 *
 * return left_index + 1
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val) {
        $left_index = 0;

        for ($right_index = 0; $right_index < count($nums); $right_index++){
            if ($nums[$right_index] != $val) {
                $nums[$left_index] = $nums[$right_index];
                $left_index++;
            }
        }

        return $left_index;
    }
}

$solution = new Solution();

$nums = [3, 4, 5, 6, 1, 3, 5, 10];
$val = 5;

echo "k = " . $solution->removeElement($nums, $val) . "\n";
print_r($nums);