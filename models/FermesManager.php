<?php
    class FermesManager {
        private $db;
        
        public function __construct($db){
            $this->db = $db;
        }

        public function getAllFerme()
        {
            $allfermes = [];
            $q = $this->db->prepare('SELECT id, nom, description, type, capacite, prix FROM fermes');
            $q->execute();

            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                $allfermes[] = new Fermes($donnees);
            }

            return $allfermes;
        }
    }

?>