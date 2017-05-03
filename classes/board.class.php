<?php 
class Board {

	protected $inGamePlayer1 = array(); // RAJOUTEE !!!!!!!
	protected $inGamePlayer2 = array();
	protected $handPlayer1 = array();
	protected $handPlayer2 = array();

	/**
	* Set a new game : 2 players, 2 heroes, and shuffle decks
	**/	
	public function newGame( $player1, $player2, $deck1, $deck2, $hero1, $hero2 )
	{
		// instantie le deck et le shuffleDeck() et le hero

		//A Confirmer, vérifier		
		$deck1 = new deck; //CLONE?
		$hero1 = new hero;
		$deck2 = new deck; //CLONE?
		$hero2 = new hero;
		self::shuffleDeck();
		//A Confirmer, vérifier		
	}

	/**
	* shuffle 2 deck, use shuffle function on an array
	**/
	public function shuffleDeck() // VOIR SI PASSAGE EN REFERENCE !!!!
	{
		// Mélange le deck
		$deck1 = shuffle($deck1);
		$deck2 = shuffle($deck2);
	}

	/**
	* Draw 3 cards per player for start game
	**/
	public function drawStart()
	{
		// draw() 3 fois pour chacun des deux joueurs
		for ($i=0; $i < 3 ; $i++):
			$deck1->draw();
			$deck2->draw();
		endfor;
	}

	/**
	* 
	**/
	public function randomStart( $player1, player2 )
	{
		// rand entre 0 et 1 pour déterminer le joueur qui commence
		$rand = rand( 0, 1);

		switch ($rand) {
			case 0 :
				// Le joueur 1 commence
				$player1->BegginFirst();  // A REVOIR !!!!
				break;
			case 1 :
				// Le joueur 2 commence 
				break;
		endswitch;
	}

	/**
	*	CountCardBoard -
	**/
	public function CountCardBoard( player )
	{
		// Compte le nombre de carte dispo sur le board d'un joueur
		switch ('player') :
			case 'player1':
				return count($inGamePlayer1);
				break;
			
			case 'player2':
				return count($inGamePlayer2);
				break;
		endswitch;
	}

	/**
	*	CountCardHand -
	**/
	public function CountCardHand(array)
	{
		// Compte le nombre de carte dispo dans la main du joueur
		switch ('player') :
			case 'player1':
				return count($handPlayer1);
				break;
			
			case 'player2':
				return count($handPlayer2);
				break;
		endswitch;
	}

	
}

 ?>