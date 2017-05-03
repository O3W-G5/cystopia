<?php 
class Shield extends Creature
{

	// Getter

    public function getCShield() 
    {
        return $this->c_shield;
    }


    // Setter

    public function setCShield( $creature ) 
    {
        $this->c_shield = $creature;
    }


    // Méchanisme du jeu

     public function taunt()
    {
        // Taunt mais bon en vrai on en sait rien
    }

}


 ?>