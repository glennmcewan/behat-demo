<?php

use Behat\Behat\Context\Context;

use App\Calculator;

/**
 * Calculator context.
 */
class CalculatorContext implements Context {

  /**
   * App\Calculator instance.
   *
   * @var App\Calculator
   */
  protected $calculator;

  /**
   * Initializes context.
   *
   * Every scenario gets its own context instance.
   * You can also pass arbitrary arguments to the
   * context constructor through behat.yml.
   */
  public function __construct() {
  }

  /**
   * Behat Transformer method for numbers.
   *
   * @param string $string
   *   String representation of a number.
   *
   * @return int
   *   Converted the string to an int type.
   *
   * @Transform /^(-?[0-9]+)$/
   */
  public function castStringToNumber($string) {
    return intval($string);
  }

  /**
   * Set this.calculator to be a new instance.
   *
   * @Given /^I have a new calculator instance$/
   */
  public function iHaveNewCalculatorInstance() {
    $this->calculator = new Calculator();
  }

  /**
   * Add a number to the calculator.
   *
   * @When /^I add the number (-?[0-9]+)$/
   */
  public function iAddTheNumber($number) {
    $this->calculator->add($number);
  }

  /**
   * Add two numbers to the calculator.
   *
   * @When /^I add the number (-?[0-9]+) and the number (-?[0-9]+)$/
   */
  public function iAddTheNumberAndTheNumber($first, $second) {
    $this->calculator->add($first);
    $this->calculator->add($second);
  }

  /**
   * Subtract a number from the calculator.
   *
   * @When /^I subtract the number (-?[0-9]+)$/
   */
  public function iSubtractTheNumber($number) {
    $this->calculator->subtract($number);
  }

  /**
   * Assert the calculator total is correct.
   *
   * @Then /^I should see a total of (-?[0-9]+)$/
   */
  public function iShouldSeeTotalOf($expected) {
    $actual = $this->calculator->getSum();

    PHPUnit_Framework_Assert::assertSame($expected, $actual);

    return $actual;
  }

}
