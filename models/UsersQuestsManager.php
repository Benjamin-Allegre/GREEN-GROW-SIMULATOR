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
                VALUES (:userId, :questId)
            ');

            $q->bindvalue(':userId', $userQuests->userId());
            $q->bindValue(':questName', $userQuests->questName()); 
            
            $q->execute();

            $userQuests->hydrate([
                'id' => $this->db->lastInsertId()
            ]);
        }
    }


?>