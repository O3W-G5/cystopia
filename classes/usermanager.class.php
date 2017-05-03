<?php
class UserManager
{

	private $pdo;
	private $table;

	public function __construct($host, $name, $user, $pass)
	{
		try{
			$this->pdo = new PDO( 'mysql:host=' . $host . ';dbname=' . $name . ';charset=utf8', $user, $pass, array( PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION ) );
		} catch( PDOException $e )
		{
				die( $e->getMessage() );
		}
	}

	public function setTable( $value )
	{
		$this->table = $value;
	}
	public function getTable()
	{	
		return $this->table;
	}

	private function executeQuery( $sql, $binds = array() ) {
        if( count( $binds )>0 ) {
            if( ( $stmt = $this->pdo->prepare( $sql ) )!==false ) {
                foreach( $binds as $key => $value ) {
                    if( !$stmt->bindValue( $key, $value ) ) {
                        return false;
                    }
                }

                if( $stmt->execute() ) {
                    if( strtoupper( substr( $sql, 0, 6 ) ) == 'SELECT' ) {
                        return $stmt->fetchAll( PDO::FETCH_ASSOC );
                    } else {
                        return true;
                    }
                }
            }
        } else {
            if( ( $stmt = $this->pdo->query( $sql ) )!==false ) {
                if( strtoupper( substr( $sql, 0, 6 ) ) == 'SELECT' ) {
                    return $stmt->fetchAll( PDO::FETCH_ASSOC );
                } else {
                    return true;
                }
            }
        }

        return false;
    }

    /**
	* login - 
	**/
	public function login()
	{
	
	}

	/**
	* register - 
	**/
	public function register()
	{
	
	}

	/**
	* joinLobby - 
	**/
	public function joinLobby()
	{
		// (A voir) 
	}

	/**
	* selectHero - 
	**/
	public function selectHero()
	{
		// Selectionne le hero voulu avant de lancer la partie
	}

	/**
	* startGame - 
	**/
	public function startGame()
	{
		// si les deux joueurs sont prêt, alors initialise la partie
	}

}