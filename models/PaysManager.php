<?php
    class PaysManager {
        private $db;
        
        public function __construct($db){
            $this->db = $db;
        }

        public function getAllPays()
        {
            $allPays = [];
            $q = $this->db->prepare('SELECT * FROM pays');
            $q->execute();

            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                $allPays[] = new Pays($donnees);
            }
            return $allPays;
        }
    }

?>