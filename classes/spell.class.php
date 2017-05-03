<?php 
class Spell extends Card 
{
	// Méchanisme du jeu


    /**
    * attack - 
    **/
    public function attack()
    {
        // Si canAttack = true, alors attack
        // Si Spell alors destroy card
    }

    /**
    * canAttack - 
    **/
    public function canAttack()
    {
    	// Si pas un spell
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