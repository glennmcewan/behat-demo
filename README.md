# Behat Playground

[![Build Status](https://travis-ci.org/glennunipro/behat-demo.svg?branch=master)](https://travis-ci.org/glennunipro/behat-demo)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/glennunipro/behat-demo/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/glennunipro/behat-demo/?branch=master)

Playground environment for learning how to set up and install Behat with the Selenium driver, utilising Grid and Chrome driver.

An assumption is made that you'll be running this in a Virtual Machine configured with PHP -- this means that the Selenium Grid will be running **inside** of the VM, and you'll need to register a *node* (a worker) to the Selenium Grid from the host machine. The node is the worker which will launch a visual browser and perform the Selenium tests, whilst being driven by Selenium Grid on the VM.

Another assumption is that you are running this on Windows.

## Dependencies

- Virtualised Environment (Vagrant, Docker, whatever...)
- Composer (https://getcomposer.org/)
- Selenium Standalone Server (host and guest machines both need a copy)
- Chromedriver (or any other chosen driver, but this repo is currently configured for Chromedriver)

## Getting up and running

- Clone this repository locally in your VM of choice

- Change directory into the cloned repository and run `composer install` to install the dependencies from the lock file

- Boot up Selenium Grid in the guest / VM:

- - `java -jar /path/to/selenium-server-standalone.jar -role hub`

- Once the Selenium Grid is running in the guest, register a Selenium Grid Node from the host machine (and update the placeholders in the example below):

- `java -jar /path/to/selenium-server-standalone.jar -role node -hub http://{IP_OF_VM}:4444/grid/register -Dwebdriver.chrome.driver="/path/to/chromedriver.exe" -browser "browserName=chrome,version=ANY,maxInstances=5,platform=WINDOWS"`

- Now you should have Selenium Grid set up and running with one registered node. Back in to the VM...

- Change in to this repo's directory and run `vendor/bin/behat` which will execute the Behat tests -- loading up a Chrome browser window on the host machine

  ​
