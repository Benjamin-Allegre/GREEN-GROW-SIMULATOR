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
        public function verifFermePays($userId, $paysId)
        {
            $q = $this->db->prepare('SELECT COUNT(*) FROM user_fermes WHERE user_id = :userId AND pays_id = :paysId');
            $q->execute([':userId' => $userId, ':paysId' => $paysId]);

            return $q->fetchColumn();
        }
        public function getUsersFermePays($userId, $paysId){
            $q = $this->db->prepare('SELECT * FROM user_fermes WHERE user_id = :userId AND pays_id = :paysId');
            $q->execute([':userId' => $userId, ':paysId' => $paysId]);

            return new UsersFermes($q-> fetch(PDO::FETCH_ASSOC));
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
        public function getUserFermesExt($userId){
            $userFermesExt = [];
            $q = $this->db->prepare('SELECT * FROM user_fermes WHERE user_id = :userId AND type_id = 1');
            $q->execute([':userId' => $userId]);

            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                $userFermesExt[] = new UsersFermes($donnees);
            }

            return $userFermesExt;
        }
        public function getUserFermesInt($userId){
            $userFermesInt = [];
            $q = $this->db->prepare('SELECT * FROM user_fermes WHERE user_id = :userId AND type_id = 2');
            $q->execute([':userId' => $userId]);

            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                $userFermesInt[] = new UsersFermes($donnees);
            }

            return $userFermesInt;
        }
        public function getUserFermesHydro($userId){
            $userFermesHydro = [];
            $q = $this->db->prepare('SELECT * FROM user_fermes WHERE user_id = :userId AND type_id = 3');
            $q->execute([':userId' => $userId]);

            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                $userFermesHydro[] = new UsersFermes($donnees);
            }

            return $userFermesHydro;
        }
        public function getUserFermesAero($userId){
            $userFermesAero = [];
            $q = $this->db->prepare('SELECT * FROM user_fermes WHERE user_id = :userId AND type_id = 4');
            $q->execute([':userId' => $userId]);

            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                $userFermesAero[] = new UsersFermes($donnees);
            }

            return $userFermesAero;
        }
        public function addUserFerme(UsersFermes $addUserFerme)
        {
            $q = $this->db->prepare('INSERT INTO user_fermes(pays_id, user_id, ferme_id, niveau, type_id) VALUES (:paysId, :userId, :fermeId, :niveau, :typeId)');

            $q->bindvalue(':paysId', $addUserFerme->pays_id());
            $q->bindvalue(':userId', $addUserFerme->user_id());
            $q->bindvalue(':fermeId', $addUserFerme->ferme_id());
            $q->bindvalue(':niveau', $addUserFerme->niveau());
            $q->bindvalue(':typeId', $addUserFerme->type_id());

            $q->execute();

            $addUserFerme->hydrate([
                'id' => $this->db->lastInsertId()
            ]);

        }
        public function updateUserFerme(UsersFermes $userFerme){
            $q = $this->db->prepare('UPDATE user_fermes SET ferme_id = :fermeId, niveau = :niveau WHERE id = :id');
            $q->execute([':fermeId' => $userFerme->ferme_id() + 1, ':niveau' => $userFerme->niveau() + 1, ':id' => $userFerme->id()]); 
        }
    }

?>
