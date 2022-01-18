<?php

if((!defined('z'))){ define('z','0');  }

$FILE		= array();
$FILEBLOCK	= array();
$REPLACE	= array();
$GET_FILE	= 0;
$EVALBOX	= 0;
$VARMSG		= 0;

$FILE = [
 'head.php'
,'body.php'
];
  
$REPLACE = [
 '{#TITLE#}'		=> 'Simple HTML/PHP - TEMPLATE/PARSER - PHP EVAL HACKS'
,'{#CONTENT#}'		=> 'HACKBUGZ | Simple HTML/PHP TEMPLATE V.2'
,'{#TIMESTAMP#}'	=> '<?php echo date("Y"); ?>'
];
  	
$VARMSG	= '<br>PHP MESSAGE';
  	
foreach($FILE as $GET_FILE){
  array_push($FILEBLOCK, file_get_contents($GET_FILE));
}	
$FILEBLOCK	= implode($FILEBLOCK);
	
ob_start();
eval(" ?> $FILEBLOCK <?php ");
$FILEBLOCK 	= ob_get_clean();

$EVALBOX 	= (preg_replace (array_keys($REPLACE), $REPLACE, $FILEBLOCK) );
eval(" ?> $EVALBOX <?php ");
	
exit;

?>
