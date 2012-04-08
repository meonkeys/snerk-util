<?php

# Copyright (C) 2012 Adam Monsen <haircut@gmail.com>
# License: MIT License. See end of script for more license information.

namespace TwoBulb;

class ArrayUtil {

  /**
   * Reorder array, placing the given $item at the given $position, shifting
   * other items 'right' (to greater indices) in the array. If $position is
   * larger than the array, $item is moved to the end of the array. $arr must
   * not be multi-dimensional.
   *
   * $arr indices are ignored. An $arr of
   * <code>(0 => 'x', 3 => 'y', 50 => 'z')</code> will be treated the
   * same as <code>(0 => 'x', 1 => 'y', 2 => 'z')</code>.
   *
   * @param array $arr array to reorder
   * @param mixed $item item to move
   * @param integer $position new position
   * @return array reordered array
   */
  public static function array_move_item(array $arr, $item, $position) {
    $arrCount = count($arr);
    $itemOldIndex = array_search($item, $arr);
    if (count($arr) < 1) {
      throw new \InvalidArgumentException('$arr must be nonempty');
    }
    if (FALSE === $itemOldIndex) {
      throw new \InvalidArgumentException('$arr must contain item');
    }
    if (is_null($item)) {
      throw new \InvalidArgumentException('$item must not be null');
    }
    if (!is_integer($position) || $position < 0) {
      throw new \InvalidArgumentException('$position must be a nonnegative integer');
    }
    if ($position > $arrCount) {
      // move item to end of array
      $position = count($arr) - 1;
    }
    if ($position === $itemOldIndex) {
      return $arr;
    }

    $removed = array_splice($arr, $itemOldIndex, 1);
    array_splice($arr, $position, 0, $removed);

    return $arr;
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
