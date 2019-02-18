# The Hero Game

This Github repo contains The Hero Game which runs the battles between good and bad in the Emagia forests.

### Getting started

These instructions will get you a copy of the project up and running on your local machine

#### Prerequisites

1. Make sure you are using php 7.2 or higher
2. If you do not already have it, install [composer](https://getcomposer.org/download/)

#### Installing

1. Clone this repo 
2. Open a terminal tab and make sure you are in the project root
3. Install the composer dependencies by running `composer install`
4. Join the PHP and play The Hero Game by running `php play`. 

You'll see the battle step by step with new updates after
each round. Let's cross our fingers for Hero.

Feel free to change the play as you like. You can run consecutive battles or change the game competitors. 
You should not just watch the battles between Order and Celirus.

### Running the tests

For running tests use the following command: 

- if you have xdebug enabled: `./vendor/bin/phpunit -c phpunit.xml --testdox --coverage-html ./phpunit-results`. 
This will store the test coverage results into `./phpunit-results` director
- if you don't have xdebug enabled: `./vendor/bin/phpunit -c phpunit.xml --testdox`. 
This will simply display the test results

Have fun!

