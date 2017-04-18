<?php

namespace App;

use Exception;

/**
 * Simple calculator class.
 */
class Calculator {

  /**
   * The total value stored in the calculator.
   *
   * Keeps a record when adding and subtracting.
   *
   * @var int
   */
  protected $sum;

  /**
   * Initialise class properties.
   */
  public function __construct() {
    $this->sum = 0;
  }

  /**
   * Clear the current total.
   */
  public function clear() {
    $this->sum = 0;
  }

  /**
   * Get the current total.
   *
   * @return int
   *   Current total
   */
  public function getSum() {
    return $this->sum;
  }

  /**
   * Add a number to the total.
   *
   * @param int $int
   *   The number to add to the total.
   */
  public function add($int) {
    if (!is_int($int)) {
      throw new Exception('Calculator needs integers.');
    }

    $this->sum += $int;
  }

  /**
   * Subtract a number from the total.
   *
   * @param int $int
   *   The number to subtract from the total.
   */
  public function subtract($int) {
    if (!is_int($int)) {
      throw new Exception('Calculator needs integers.');
    }

    $this->sum -= $int;
  }

  /**
   * Magic method, called when the Calculator object is cast to a string.
   *
   * @return string
   *   Calulator total as a string
   */
  public function __toString() {
    return (string) $this->getSum();
  }

}
