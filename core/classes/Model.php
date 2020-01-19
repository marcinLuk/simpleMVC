<?php 
/**
 * przechowuje metody klasy Model
 */
abstract class Model {

    /**
     * @return void 
     * 
     * próbuje nawiązać połączenie z bazą danych 
     */
    public function __construct() {

        try {

            $dbh = new PDO(
                'mysql:dbname='.DATABASE_NAME.';host='.DATABASE_HOST.'',
                DATABASE_USER,
                DATABASE_PASSWORD                
            );

            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {

            echo 'Nie można połączyć się z bazą danych: ' . $e->getMessage();

        }

    }

}