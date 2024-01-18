/*
Given an integer array nums of length n, you want to create an array ans of length 2n where ans[i] == nums[i] and ans[i + n] == nums[i] for 0 <= i < n (0-indexed).

Specifically, ans is the concatenation of two nums arrays.

Return the array ans.
*/

fn main() {
    let nums = vec![1, 2, 1];
    let ans = get_concatenation(nums);

    println!("The solution is {:?}", ans);
}

pub fn get_concatenation(nums: Vec<i32>) -> Vec<i32> {
    let mut nums_clone = nums.clone();
    nums_clone.extend(nums.iter());

    nums_clone
}

/*
Results - Accepted
Runtime 4 ms - Beats 81.25% of users with Rust
Memory 2.02 MB - Beats 80% of users with Rust
*/