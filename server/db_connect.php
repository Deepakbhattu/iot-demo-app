<?php	
	define('db_type','MYSQL');
	define ('db_host', 'localhost');
	define ('db_port', '3306');
	define ('db_name', 'galileo');
	define ('db_user', 'root');
	define ('db_pass', '1234');
	define ('db_table_prefix', '');
function db_connect($host = db_host, $port = db_port, $username = db_user, $password = db_pass, $database = db_name) {
    if(!$db = @mysql_connect($host.':'.$port, $username, $password)) {
        return FALSE;
    }
    if((strlen($database) > 0) AND (!@mysql_select_db($database, $db))) {
        return FALSE;
    }
    
    mysql_query('SET NAMES \'utf8\'');
    mysql_query('SET CHARACTER_SET \'utf8\'');
    return $db;
}
?>