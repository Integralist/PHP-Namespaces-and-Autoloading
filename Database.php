<?php
    namespace Integralist\Database;
    
    class Database {
        private $_dbconnection;

        static function WhoAmI() {
            return '<b>__METHOD__:</b><br>' . __METHOD__;
        }

        /**
         * Constructor that creates a new instance of a PDO connection.
         *
         * @param   string   $username    username access credentials
         * @param   string   $password    password access credentials
         * @param   string   $host        host information (either localhost or ip address, defaults to localhost)
         * @param   string   $dbname      database name to access (defaults to stormtest)
         * @param   object   $errortype   sets the error mode (defaults to ERRMODE_SILENT)
         * @return  object   new class instance object is returned
        */
        public function __construct ($username, $password, $host = 'localhost', $dbname = 'stormtest', $errortype = PDO::ERRMODE_SILENT) {
            try {
                $this->_dbconnection = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
                $this->_dbconnection->setAttribute(PDO::ATTR_ERRMODE, $errortype);

                /*
                    // Different error settings that can be used...

                    $_dbconnection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT );    // Standard
                    $_dbconnection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );   // Useful for debuggin
                    $_dbconnection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); // Shows an exception and hides all other important data
                 */
            } catch (PDOException $error) {
                die($error->getMessage()); // Ideally we'd do something better here than just die!
            }
        }

        /**
         * Fetch data from table using specified SQL command and returns data as either an Array or an Object (depending on what the user specifies).
         *
         * @param   string         $sql             the SQL command to execute
         * @param   object         $response_type   optional response type (defaults to array)
         * @return  object|array   returns either an Array or an Object (depending on what the user specified)
        */
        public function fetch ($sql, $response_type = PDO::FETCH_ASSOC) {
            $query = $this->_dbconnection->query($sql);
            $query->setFetchMode($response_type);
            $results = $query->fetchAll(); // was originally using `fetch` but realised that only returns first result
            return $results;
        }

        // Close the database connection
        public function close () {
            $this->_dbconnection = null;
        }
    }
?>