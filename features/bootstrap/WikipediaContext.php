<?php

use Exception;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;

/**
 * Defines application features from the specific context.
 */
class WikipediaContext extends RawMinkContext
{
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
     * @Given I am on Wikipedia
     */
    public function iAmOnWikipedia()
    {
        $this->visitPath('/');
    }

    /**
     * @When I search for :searchString
     */
    public function iSearchFor($searchString)
    {
        $this->getSession()->getPage()->fillField('searchInput', $searchString);
        $this->getSession()->getPage()->find('css', '.searchButton')->click();
    }

    /**
     * @Then the first heading will be :heading
     */
    public function theFirstHeadingWillBe($heading)
    {
        $pageHeading = $this->getSession()->getPage()->find('css', '.firstHeading');

        if ($pageHeading->getText() !== $heading) {
            throw new Exception('Actual heading: ' . $pageHeading->getText());
        }
    }
}