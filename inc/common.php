<?php
require_once('inc/ini.php');

// Function autoload pour require les fichiers
function loadClass( $className )
{
	$file = 'classes/'. strtolower( $className ) .'.class.php';
	if( file_exists( $file ) )
		require_once( $file );

	$file = 'interfaces/'. strtolower( $className ) .'.interface.php';
	if( file_exists($file) )
		require_once( $file );
}
spl_autoload_register( 'loadClass' );



