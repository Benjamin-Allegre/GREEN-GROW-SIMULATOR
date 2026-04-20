<?php
    class UsersFermesManager {
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function getMaxNiveauByPays($userId, $paysId, $typeId)
        {
            $q = $this->db->prepare('
                SELECT MAX(niveau) as max_niveau 
                FROM user_fermes 
                WHERE user_id = :userId 
                AND pays_id = :paysId
                AND type_id = :typeId
            ');

            $q->execute([
                ':userId' => $userId,
                ':paysId' => $paysId,
                ':typeId'  => $typeId
            ]);

            return $q->fetchColumn(); // retourne null si rien
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
