Feature: Search Wikipedia for BDD
  In order to learn about BDD
  As a passionate developer
  I need to be able to search Wikipedia to find our more information on BDD

@javascript
Scenario: Search Wikipedia for BDD
  Given I am on the url "/"
  When I search for "Behaviour driven development"
  Then the first heading will be "Behavior-driven development"

Scenario Outline: Ensure that an article can be translated
  Given I am on the url "/wiki/Computer_science"
  When I translate to <language>
  Then the first heading will be <heading>

  Examples:
    | language   |    heading              |
    | Dutch      | "Informatica"           |
    | French     | "Informatique"          |
    | Portuguese | "Ciência da computação" |
