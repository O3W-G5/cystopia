<?php
class Hero implements ReceiveDamage
{
	private $h_vie;
	private $h_nom;
	private $h_visuel;
	private $h_faction;

    // Getter
    
    public function getHVie() {
        return $this->h_vie;
    }

    public function getHNom() {
        return $this->h_nom;
    }

    public function getHVisuel() {
        return $this->h_visuel;
    }

    public function getHFaction() {
        return $this->h_faction;
    }


    // Setter
   
    public function setHVie( $hero ) {
        $this->h_vie = $hero;
    }

    public function setHNom( $hero ) {
        $this->h_nom = $hero;
    }

    public function setHVisuel( $hero ) {
        $this->h_visuel = $hero;
    }

    public function setHFaction( $hero ) {
        $this->h_faction = $hero;
    }

    // Construct


	public function __construct( $hero )
	{
		$this->hydrate( $hero );
	}

	public function hydrate ( $hero )
	{
		foreach( $hero as $key => $value )
		{
			$key = substr( $key, 2 );
            $key = str_replace( '_', ' ', $key );
            $key = ucwords( $key );
            $key = str_replace( ' ', '', $key );
            $key = 'setH' . $key;
            if( method_exists( $this, $key ) )
                $this->$key( $value );
		}
	}

}