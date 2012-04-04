<?php

namespace TwoBulb;

require_once 'ArrayUtil.php';

class ArrayUtilTest extends \PHPUnit_Framework_TestCase {

  public function testKeepLastInPlace() {
    $a = ArrayUtil::array_move_item(array('a', 'b', 'c'), 'c', 5);
    $this->assertEquals(array('a', 'b', 'c'), $a);
  }

  public function testPromoteLastToFirst() {
    $a = ArrayUtil::array_move_item(array('a', 'b', 'c'), 'c', 0);
    $this->assertEquals(array('c', 'a', 'b'), $a);
  }

  public function testPromoteLastOnePosition() {
    $a = ArrayUtil::array_move_item(array('a', 'b', 'c'), 'c', 1);
    $this->assertEquals(array('a', 'c', 'b'), $a);
  }

  public function testKeepMiddleInPlace() {
    $a = ArrayUtil::array_move_item(array('a', 'b', 'c'), 'b', 1);
    $this->assertEquals(array('a', 'b', 'c'), $a);
  }

  public function testDemoteFirstOnePosition() {
    $a = ArrayUtil::array_move_item(array('a', 'b', 'c'), 'a', 1);
    $this->assertEquals(array('b', 'a', 'c'), $a);
  }

  public function testPromoteMiddlToFirst() {
    $a = ArrayUtil::array_move_item(array('a', 'b', 'c'), 'b', 0);
    $this->assertEquals(array('b', 'a', 'c'), $a);
  }

  public function testNumericReposition() {
    $a = ArrayUtil::array_move_item(array(17, 99, 84, 27), 27, 1);
    $this->assertEquals(array(17, 27, 99, 84), $a);
  }

  public function testWonkyIndexesDoNotMatter() {
    $a = ArrayUtil::array_move_item(array(0 => 'a', 40 => 'b', 50 => 'c'), 'a', 1);
    $this->assertEquals(array('b', 'a', 'c'), $a);
  }

}
