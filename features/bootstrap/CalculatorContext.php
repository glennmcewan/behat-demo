<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use App\Calculator;

class CalculatorContext implements Context
{
    /**
     * App\Calculator instance
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
    public function __construct()
    {
        //
    }

    /**
     * @Transform /^(-?[0-9]+)$/
     * @param  string $string String representation of a number
     * @return int            Converted the string to an int type.
     */
    public function castStringToNumber($string)
    {
        return intval($string);
    }

    /**
     * @Given /^I have a new calculator instance$/
     */
    public function iHaveANewCalculatorInstance()
    {
        $this->calculator = new Calculator;
    }

    /**
     * @When /^I add the number (-?[0-9]+)$/
     */
    public function iAddTheNumber($number)
    {
        $this->calculator->add($number);
    }

    /**
     * @When /^I add the number (-?[0-9]+) and the number (-?[0-9]+)$/
     */
    public function iAddTheNumberAndTheNumber($first, $second)
    {
        $this->calculator->add($first);
        $this->calculator->add($second);
    }

    /**
     * @When /^I subtract the number (-?[0-9]+)$/
     */
    public function iSubtractTheNumber($number)
    {
        $this->calculator->subtract($number);
    }

    /**
     * @Then /^I should see a total of (-?[0-9]+)$/
     */
    public function iShouldSeeATotalOf($expected)
    {
        $actual = $this->calculator->getSum();

        if ($actual !== $expected) {
            throw new Exception('Actual total: ' . $actual);
        }

        return $actual;
    }
}
