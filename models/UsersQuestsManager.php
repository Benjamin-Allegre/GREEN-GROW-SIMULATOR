<?php
    class UsersQuestsManager {
        
        private $db;
        
        public function __construct($db){
            $this->db = $db;
        }

        public function addUserQuest(UsersQuests $userQuests)
        {
            $q = $this->db->prepare('
                INSERT INTO user_quests(user_id , quest_name)
                VALUES (:userId, :questName)
            ');

            $q->bindvalue(':userId', $userQuests->user_id());
            $q->bindValue(':questName', $userQuests->quest_name()); 
            
            $q->execute();

            $userQuests->hydrate([
                'id' => $this->db->lastInsertId()
            ]);
        }

        public function getAllQuestsActive($userId){
            $questsActive = [];
            $q = $this->db->prepare('SELECT id, user_id, quest_name, status, created_at FROM user_quests WHERE status = "active" AND user_id = :userId');
            $q->execute([':userId' => $userId]);

            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                
                $questsActive[] = new UsersQuests($donnees);
            }
         
            return $questsActive;
        }
        public function getQuestContentById($id, $user = null)
        {
            $q = $this->db->prepare('SELECT quest_name FROM user_quests WHERE id = :id');
            $q->execute([':id' => $id]);

            $data = $q->fetch();

            if (!$data) {
                return "Quête introuvable";
            }

            $projectRoot = dirname(__DIR__, 1);
            $basePath = $projectRoot . '/views/online/quests';
           
            $questFile = trim($data['quest_name']) . '.php';
            $path = $basePath . '/' . $questFile;

            if (file_exists($path)) {
                ob_start();
                 extract([
                    'user' => $user
                ]);
                include $path;
                return ob_get_clean();
            }

            return "Fichier de quête introuvable";
        }

    }
?>