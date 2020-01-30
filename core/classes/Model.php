<?php 
namespace Core;
use \PDO;
/**
 * It contain methods and properties fof Controller Class
 */
abstract class Model {

    /**
     * @return void 
     * 
     * connect to database
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

            echo 'Cannot create a database: ' . $e->getMessage();

        }

    }

}