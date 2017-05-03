<?php 
class Turn 
{
	$t_id;
	$history = array();

	// BESOIN DE GÉRER L'HISTORIQUE

	// Setter
	public function setTID( $turn )
	{
		$this->t_id = $turn;
	}

	// Getter
	public function getTID()
	{
		return $this->t_id;
	}

	/**
	*	turnHistory -
	**/
	public function turnHistory()
	{
		// Stock toutes les actions dans un tableau
	}

	/**
	*
	**/
	public function giveMana()
	{
		// Incrémente le $h_mana_stack du héro au début de chaque nouveau tour
	}

	/**
	* endTurn - 
	**/
	public function endTurn()
	{
		// if post bouton alors met fin au tour et incrémente le t_id
	}

	/**
	* surrender - 
	**/
	public function surrender()
	{
		// met fin à la partie et return le joueur adverse
	}

	/**
	* winner - 
	**/
	public function winner()
	{
		// if surrender
		// if $h_vie =< 0 
		// if CountCardDeck + CountCardBoard + CountCardBoard = 0
		// return true
	}

	/**
	* endGame - 
	**/
	public function endGame()
	{
		// if winner = true
		// reset tout
	}




}

 ?>