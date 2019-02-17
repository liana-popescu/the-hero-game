# The Hero Game

This Github repo contains The Hero Game which runs the battles between good and bad in the Emagia forests.

### Using this repository and running locally

1. Make sure you are using php 7.2 or higher
2. Clone this repo 
3. Open a terminal tab and make sure you are in the project root
4. Install composer dependencies by running `composer install`
5. Join the PHP and play The Hero Game by running `php play`. You'll see the battle step by step with new updates after
round. Let's cross our fingers for Hero.

Feel free to change the play as you like. You can run consecutive battles or change the game competitors. 
You should not just watch the battles between Order and Salerus.

### Running test

For running tests use the following command: 

`./vendor/bin/phpunit -c phpunit.xml --coverage-html ./phpunit-results`

This will store the test coverage results into `./phpunit-results` director

Have fun!

