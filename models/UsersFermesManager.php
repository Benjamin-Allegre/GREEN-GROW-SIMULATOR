<?php
    class UsersFermesManager {
        private $db;

        public function __construct($db){
            $this->db = $db;
        }



        public function getAllUsersFermes($userId){
            $allUsersFermes = [];
            $q = $this->db->prepare('SELECT * FROM user_fermes WHERE user_id = :userId');
            $q->execute([':userId' => $userId]);

            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                $allUsersFermes[] = new UsersFermes($donnees);
            }

            return $allUsersFermes;
        }
    }

?>
