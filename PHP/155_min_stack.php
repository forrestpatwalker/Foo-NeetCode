<?php
/**
 * Design a stack that supports push, pop, top, and retrieving the minimum element in constant time.
 *
 * Implement the MinStack class:
 *
 * MinStack() initializes the stack object.
 * void push(int val) pushes the element val onto the stack.
 * void pop() removes the element on the top of the stack.
 * int top() gets the top element of the stack.
 * int getMin() retrieves the minimum element in the stack.
 *
 * You must implement a solution with O(1) time complexity for each function.
 *
 * Example 1:
 *
 * Input
 * ["MinStack","push","push","push","getMin","pop","top","getMin"]
 * [[],[-2],[0],[-3],[],[],[],[]]
 *
 * Output
 * [null,null,null,null,-3,null,0,-2]
 *
 * Explanation
 * MinStack minStack = new MinStack();
 * minStack.push(-2);
 * minStack.push(0);
 * minStack.push(-3);
 * minStack.getMin(); // return -3
 * minStack.pop();
 * minStack.top();    // return 0
 * minStack.getMin(); // return -2
 */

/**
 *
 */

class MinStack {

    private $stack;
    private $min_stack;

    function __construct() {
        $this->stack = [];
        $this->min_stack = [];
    }

    function push($val) {
        $this->stack[] = $val;
        $val = empty($this->min_stack) ? $val : min($val, end($this->min_stack));
        $this->min_stack[] = $val;
    }

    function pop() {
        array_pop($this->stack);
        array_pop($this->min_stack);
    }

    function top() {
        return end($this->stack);
    }

    function getMin() {
        return end($this->min_stack);
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */

$obj = new MinStack();
$obj->push(-2);
$obj->push(0);
$obj->push(-3);
echo $obj->getMin() . "\n";
$obj->pop();
echo $obj->top() . "\n";
echo $obj->getMin() . "\n";