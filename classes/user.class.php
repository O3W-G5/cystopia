<?php
class User
{
	private $u_id;
    private $u_login;
    private $u_prenom;
    private $u_nom;
    private $u_mail;
    private $u_password;
    private $u_actif;
    private $r_id_fk;

    // Getter
    public function getUId() {
        return $this->u_id;
    }
    public function getLogin() {
        return $this->u_login;
    }
    public function getPrenom() {
        return $this->u_prenom;
    }
    public function getNom() {
        return $this->u_nom;
    }
    public function getMail() {
        return $this->u_mail;
    }
    public function getPassword() {
        return $this->u_password;
    }
    public function getActif() {
        return $this->u_actif;
    }
    public function getIdFk() {
        return $this->r_id_fk;
    }

    // Setter
    public function setUId( $user )
    {
    	$this->u_id = $user;
    }

    public function setNom( $user )
    {
    	$this->u_nom = $user;
    }

    public function setPrenom( $user )
    {
    	$this->u_prenom = $user;
    }

    public function setMail( $user )
    {
    	$this->u_mail = $user;
    }

    public function setPassword( $user )
    {
    	$this->u_password = $user;
    }

    public function setActif( $user )
    {
    	$this->u_actif = $user;
    }

    public function setLogin( $user )
    {
    	$this->u_login = $user;
    }

    public function setIdFk( $user )
    {
    	$this->r_id_fk = $user;
    }

    // Construct
	public function __construct( $user )
	{
		$this->hydrate( $user );
	}

	public function hydrate ( $user )
	{
		foreach( $user as $key => $value )
		{
			$key = substr( $key, 2 );
            $key = str_replace( '_', ' ', $key );
            $key = ucwords( $key );
            $key = str_replace( ' ', '', $key );
            $key = 'set' . $key;
            if( method_exists( $this, $key ) )
                $this->$key( $value );
		}
	}

}