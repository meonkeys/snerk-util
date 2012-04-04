<?php

# Copyright (C) 2012 Adam Monsen <haircut@gmail.com>
# License: MIT License. See end of script for more license information.

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

# "MIT" (Expat) license:
#
# Permission is hereby granted, free of charge, to any person obtaining
# a copy of this software and associated documentation files (the
# "Software"), to deal in the Software without restriction, including
# without limitation the rights to use, copy, modify, merge, publish,
# distribute, sublicense, and/or sell copies of the Software, and to
# permit persons to whom the Software is furnished to do so, subject to
# the following conditions:
#
# The above copyright notice and this permission notice shall be included
# in all copies or substantial portions of the Software.
#
# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
# EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
# MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
# IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
# CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
# TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
# SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
