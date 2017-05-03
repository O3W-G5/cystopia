<?php 
class Creature extends Card implements ReceiveDamage
{
	private $c_vie;
	private $c_legendaire;
	private $c_shield;

	// Getter

	public function getCVie() 
    {
        return $this->c_vie;
    }

    public function getCLegendaire() 
    {
        return $this->c_legendaire;
    }

    // Setter

    public function setCVie( $creature ) 
    {
        $this->c_vie = $creature;
    }

    public function setCLegendaire( $creature ) 
    {
        $this->c_legendaire = $creature;
    }

    // Hydrate

	public function hydrate ( $creature )
	{
		foreach( $creature as $key => $value )
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


 ?>