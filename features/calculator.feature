Feature: Calculator
  In order to add and subtract numbers
  As anybody
  I should be able to successfully retrieve the total of the given numbers

Scenario: Add numbers together, and display get the sum
  Given I have a new calculator instance
  When I add the number 50 and the number 25
  Then I should see a total of 75