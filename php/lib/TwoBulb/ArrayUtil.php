<?php

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

    $new = array();
    unset($arr[$itemOldIndex]);

    if ($position === 0) {
      $new = array_merge(array($item), array_slice($arr, 0));
    } elseif ($position === ($arrCount-1)) {
      $new = array_merge(array_slice($arr, 0), array($item));
    } else {
      $new = array_merge(
          array_slice($arr, 0, $position),
          array($item),
          array_slice($arr, $position)
          );
    }

    return $new;
  }
}
