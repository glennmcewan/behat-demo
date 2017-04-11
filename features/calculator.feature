@calculator
Feature: Calculator
  In order to add and subtract numbers
  As anybody
  I should be able to successfully retrieve the total of the given numbers

Scenario: Add numbers together, and display get the sum
  Given I have a new calculator instance
  When I add the number 50 and the number 25
  Then I should see a total of 75

Scenario: The calculator should be able to handle negative values
  Given I have a new calculator instance
  When I add the number 8
  Then I should see a total of 8
  When I subtract the number 5
  Then I should see a total of 3
  When I subtract the number 5
  Then I should see a total of -2

Scenario: The calculator should be able to keep an accurate track of additions and subtractions
  Given I have a new calculator instance
  When I add the number 30 and the number 13
  Then I should see a total of 43
  When I subtract the number 15
  Then I should see a total of 28

Scenario: The calculator should be able handle addition & subtraction of negative numbers
  Given I have a new calculator instance
  When I add the number 10
  Then I should see a total of 10
  When I add the number -15
  Then I should see a total of -5
  When I subtract the number -8
  Then I should see a total of 3
  When I subtract the number -5
  Then I should see a total of 8
