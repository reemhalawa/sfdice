<?php

/**
 * dice actions.
 *
 * @package    greed
 * @subpackage dice
 * @author     Reem Halawa
 */
class diceActions extends sfActions
{
	private 
		$aGreedRules = array(
			'three_1' 	=> 1000,
			'three_2' 	=> 200,
			'three_3' 	=> 300,
			'three_4' 	=> 400,
			'three_5' 	=> 500,
			'three_6' 	=> 600,
			
			'one_1'		=> 100,
			'one_2'		=> 0,
			'one_3'		=> 0,
			'one_4'		=> 0,
			'one_5'		=> 50,
			'one_6'		=> 0
		);
		
	/**
	* Executes index action
	*/
	public function executeIndex()
	{
		
	}

	/**
	* Executes Roll action
	*/
	public function executeRoll()
	{
		$this->dThrow = 1;
		if($this->getRequestParameter('dThrow'))
		{
			$this->dThrow = $this->getRequestParameter('dThrow');
		}
		
		
		for($dThrowCounter = 1; $dThrowCounter <= $this->dThrow; $dThrowCounter++)
		{
			$aDicesResult 		= $this->rollDices();
			$aSideRepetition	= $this->countSideRepetition($aDicesResult);
			
			$aPrintedDicesResult[$dThrowCounter]['aDices'] = $aDicesResult;
			$aPrintedDicesResult[$dThrowCounter]['dScore'] = $this->getRollScore($aSideRepetition);
		}

		$this->aPrintedDicesResult = $aPrintedDicesResult;
	}

	/**
	* Roll Dices
	* @return: $aDicesResult array()
	*/
	private function rollDices()
	{
		$dNumThrow = 5;
		$aDicesResult = array();
		
		for($dThrowLoop = 1; $dThrowLoop <= $dNumThrow; $dThrowLoop++)
		{
			$aDicesResult[$dThrowLoop] = rand(1, 6);
		}
		
		return $aDicesResult;
	}
	
	/**
	* count Side Repetition
	* @return: $aSideRepetition array()
	*/
	private function countSideRepetition($aSideRepetition)
	{
		$aSidesCounter = array();
		if($aSideRepetition && count($aSideRepetition))
		{
			foreach($aSideRepetition as $dKey=>$dSide)
			{
				$dCount = 1;
				if(isset($aSidesCounter[$dSide]))
				{
					$dCount = $aSidesCounter[$dSide]+1;
				}
				
				$aSidesCounter[$dSide] = $dCount;
			}
		}
		return $aSidesCounter;
	}
	
	/**
	* get Roll Score
	* @return: $dScore int
	*/
	private function getRollScore($aSideRepetition)
	{
		$dScore				= 0;
		$dMaxRepeatTime		= 3;
		
		$aRepeatTime['3']	= 'three_';
		$aRepeatTime['1']	= 'one_';
		
		if($aSideRepetition && count($aSideRepetition))
		{
			foreach($aSideRepetition as $dSide=>$dRepetetion)
			{
				if($dRepetetion > $dMaxRepeatTime)
				{
					$dScore += $this->aGreedRules[$aRepeatTime['3'].$dSide];
					$dScore += $this->aGreedRules[$aRepeatTime['1'].$dSide] * ($dRepetetion-$dMaxRepeatTime);
				}
				elseif($dRepetetion == $dMaxRepeatTime)
				{
					$dScore += $this->aGreedRules[$aRepeatTime['3'].$dSide];
				}
				else
				{
					$dScore += $this->aGreedRules[$aRepeatTime['1'].$dSide] * $dRepetetion;
				}
			}
		}
		return $dScore;
	}
}
