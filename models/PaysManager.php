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

        public function getPays($id){
            $q = $this->db->prepare('SELECT * FROM pays WHERE id = :id');
            $q->execute([':id' => $id]);

            return new Pays($q-> fetch(PDO::FETCH_ASSOC));
        }
    }

?>