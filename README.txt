sfdice
======
Calculate the points of a dice game.


Project Requirements
====================
- Throw 5 dices randomly.
- Form page to enter N number of throws. 
	- Default N handled in code (Default is 1)
- Result page: calculate the points for each thrown dice.
	- Show N times of thrown.
	- Sides result for each thrown dice.
	- Score result for each thrown dice.
- Calculate points as follows:
	Three 1 	=> 1000 points
	Three 6 	=> 600 points
	Three 5 	=> 500 points
	Three 4 	=> 400 points
	Three 3 	=> 300 points
	Three 2 	=> 200 points 
	One   1 	=> 100 points
	One   5 	=> 50 points
	
	
Functions Descriptions
======================
- rollDices()
	- Randomly roll 5 dices.
	- Returns an array(key => sideNum).
- countSideRepetition()
	- Count repetition for each side.
	- Returns an array(SideNum => RepetitionNum).
- getRollScore()
	- Get the score for each Rolled dice.
	- returns an integer.

	
Brief project description
=========================
- Built an application named "greed".
- Built a module named "dice".


NOTES
=====
- Since I'm a starter in Symfony. I started with Jobeet project to understand Symfony, and how to build its applications and modules.
- Once you download the project, and have your local environment ready, you can access the page by this URL:
	- http://localhost/sfdice/web/greed_dev.php/dice
