/*
Given an integer array nums and an integer val, remove all occurrences of val in nums in-place. The order of the elements may be changed.
Then return the number of elements in nums which are not equal to val.

Consider the number of elements in nums which are not equal to val be k, to get accepted, you need to do the following things:

Change the array nums such that the first k elements of nums contain the elements which are not equal to val.
The remaining elements of nums are not important as well as the size of nums.

Return k.
*/

fn main() {
    let mut nums: Vec<i32> = vec![0, 1, 2, 2, 3, 0, 4, 2];
    let val = 2;

    let k = remove_element(&mut nums, val);

    println!("The answer is {k}");
}

pub fn remove_element(nums: &mut Vec<i32>, val: i32) -> i32 {
    nums.retain(|&x| x != val);
    nums.len() as i32
}


/*
Results - Accepted

Runtime 1 ms - beats 82% of users with Rust
Memory 2.00 MB - beats 95.3 of users with Rust
*/