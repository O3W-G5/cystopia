<?php
abstract class Card
{
	private $c_id;
    private $c_nom;
    private $c_mana_cout;
    private $c_attaque;
    private $c_visuel;
    private $c_citation;
    private $c_faction;

    // Setter
    public function getCId() 
    {
        return $this->c_id;
    }

    public function getCNom() 
    {
        return $this->c_nom;
    }

    public function getCManaCout() 
    {
        return $this->c_mana_cout;
    }

    public function getCAttaque() 
    {
        return $this->c_attaque;
    }

    public function getCVisuel() 
    {
        return $this->c_visuel;
    }

    public function getCCitation() 
    {
        return $this->c_citation;
    }

    public function getCFaction() 
    {
        return $this->c_faction;
    }

    // Getter

    public function setCId( $card ) 
    {
        $this->c_id = $card;
    }

    public function setCNom( $card ) 
    {
        $this->c_nom = $card;
    }

    public function setCManaCout( $card ) 
    {
        $this->c_mana_cout = $card;
    }

    public function setCAttaque( $card ) 
    {
        $this->c_attaque = $card;
    }

    public function setCVisuel( $card ) 
    {
        $this->c_visuel = $card;
    }
    
    public function setCCitation( $card ) 
    {
        $this->c_citation = $card;
    }

    public function setCFaction( $card ) 
    {
        $this->c_faction = $card;
    }

    // Construct


	public function __construct( $card )
	{
		$this->hydrate( $card );
	}


    // Hydrate
	public function hydrate ( $card )
	{
		foreach( $card as $key => $value )
		{
			$key = substr( $key, 2 );
            $key = str_replace( '_', ' ', $key );
            $key = ucwords( $key );
            $key = str_replace( ' ', '', $key );
            $key = 'setC' . $key;
            if( method_exists( $this, $key ) )
                $this->$key( $value );
		}
	}


    // Méchanisme du jeu


    /**
    * attack - 
    **/
    public function attack()
    {
        // Si canAttack = true, alors attack
    }

    /**
    * canAttack - 
    **/
    public function canAttack()
    {
        // Si sleeping = false et si taunt = false, return true
        // Si taunt = true, alors return les objets pour qui taunt = true
    }

    /**
    * spendMana - 
    **/
    public function spendMana()
    {
        // Si canInvoc = true alors $h_stack_mana -= $c_mana_cout 
    }

    /**
    * invocation - 
    **/
    public function invocation()
    {
        // Si canInvoc = true alors on déplace l'objet card de la main vers la plateau
    }

    /**
    * canInvoc - 
    **/
    public function canInvoc()
    {
        // Si $c_mana_cout < $h_mana_stack
    }

    /**
    * spleeping - 
    **/
    public function spleeping()
    {
        // Si la créature est invoquée durant le tour actuel, alors canAttack = false
    }

    /**
    * destroyCard - 
    **/
    public function destroyCard()
    {
        // unset la carte du plateau
    }



}