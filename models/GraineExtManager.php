<?php
    class GraineExtManager {

        private $db;
        
        public function __construct($db){
            $this->db = $db;
        }

        public function getAll(){
            $graines = [];
            $q = $this->db->prepare('SELECT * FROM graines_ext');
            $q->execute();

            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                
                $graines[] = new GraineExt($donnees);
            }
         
            return $graines;
        }
    }
?>
