<?php
	class Database {

		/* 
		 * Constructor - connects to database.
		 * @global $params - core parameters from glob.php
		 */
		public function __construct() {

			global $params;
			$this->connection =  new mysqli($params['db']['hostname'], $params['db']['username'], $params['db']['password'], $params['db']['database']);

			if($this->connection->connect_errno > 0){
				die('Unable to connect to database [' . $db->connect_error . ']');
			}

		}
		
		/*
		 * Query - executes a MySQL query.
		 * @param  $string - required. the input SQL string.
		 * @return $q      - the resulting query.
		 */
		public function query( $string )   {

			$q = mysqli_query($this->connection, $string);

			if( !$q ) {

				echo "<div style=\"font-family: tahoma; font-size: 11px; width: 400px; margin: auto;\">";
				echo "<big><center><strong>MySQL Error:</strong></center></big>";
				echo mysql_error();
				echo "</div>";

				die();

			}

			return $q;

		}
		
		/*
		 * Num - fetches the number of rows from an SQL query.
		 * @param  $query - required. input SQL query.
		 * @return $num   - the number of rows generated from SQL query.
		 */
		public function num( $query )   {

			return mysqli_num_rows( $query );

		}
		
		/*
		 * Assoc - fetches an associative array of the rows generated by an SQL query.
		 * @param  $query - required. input SQL query.
		 * @return $array - associative array of rows.
		 */
		public function assoc( $query ) {

			return mysqli_fetch_assoc( $query );

		}

		/*
		 * Arr - fetches an array of the rows generated by an SQL query.
		 * @param  $query - required. input SQL query.
		 * @return $array - array of rows.
		 */
		public function arr( $query )   {

			return mysqli_fetch_array( $query );

		}
		
		/*
		 * Escape - tidies up a string for use in a query.
		 * @param  $string - required. the text to escape.
		 * @return $string - the escaped string.
		 */
		public function escape( $string ) {

			return mysqli_real_escape_string($this->connection, $string );

		}

	}

	$db = new Database();
?>