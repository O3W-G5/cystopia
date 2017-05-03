<?php 
class Deck
{


	protected $deckArray = array(); // RAJOUTEE !!!!!!!
	
	/**
	*	build deck -
	**/
	public function SetDeck() // RAJOUTEE !!!!!!!
	{
		pour les 20 cartes, aller chercher les cartes dans la bdd
		ne pas oublier les doublons pour les boucliers identiques
		les mettre dans $deckArray
		FAIRE APPEL AU MANAGER !
	}

	/**
	*	get deck -
	**/
	public function GetDeck() // RAJOUTEE !!!!!!!
	{
		return $this->deckArray;
	}

	/**
	*	CountCardDeck - Count how many cards are available
	**/
	public function CardAvailable()
	{
		return count( $deckArray );
	}

	/**
	*	Draw - 
	*	$deck = array()
	*	$hand = array()
	* 	take out a card from the deck and put it into hand
	**/

	public function Draw( $deck, $hand )
	{
		// Si NoMoreCard = false
		// array_rand du tableau deck au tableau main
				if ( self::NoMoreCard() == false ):
					$drawedCard = array_shift( $deck );
					$hand = array_push( $hand, $drawedCard );
				endif;
	}

	/**
	*	NoMoreCard -
	**/

	public function NoMoreCard()
	{
		// Si CardAvailable = 0 alors return true
		if (self::CardAvailable() == 0) :
			return true;
		else:
			return false;
		endif;
	}



}

 ?>