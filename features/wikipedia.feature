Feature: Search Wikipedia for BDD
  In order to learn about BDD
  As a passionate developer
  I need to be able to search Wikipedia to find our more information on BDD

Scenario: Search Wikipedia for BDD
  Given I am on Wikipedia
  When I search for "Behaviour driven development"
  Then the first heading will be "Behavior-driven development"