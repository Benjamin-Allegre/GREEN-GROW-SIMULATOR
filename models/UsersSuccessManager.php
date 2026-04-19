<?php
    class UsersSuccessManager {
        
        private $db;
        
        public function __construct($db){
            $this->db = $db;
        }

        public function addUserSuccess(UsersSuccess $userSuccess)
        {
            $q = $this->db->prepare('
                INSERT INTO user_success(user_id , success_name)
                VALUES (:userId, :successName)
            ');

            $q->bindvalue(':userId', $userSuccess->user_id());
            $q->bindValue(':successName', $userSuccess->success_name()); 
            
            $q->execute();

            $userSuccess->hydrate([
                'id' => $this->db->lastInsertId()
            ]);
        }

        public function getAllSuccessActive($userId){
            $successActive = [];
            $q = $this->db->prepare('SELECT id, user_id, success_name, status, created_at FROM user_success WHERE status = "active" AND user_id = :userId');
            $q->execute([':userId' => $userId]);

            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
                
                $successActive[] = new UsersSuccess($donnees);
            }
         
            return $successActive;
        }
        public function getSuccessContentById($id, $user = null)
        {
            $q = $this->db->prepare('SELECT success_name FROM user_success WHERE id = :id');
            $q->execute([':id' => $id]);

            $data = $q->fetch();

            if (!$data) {
                return "Succés introuvable";
            }

            $projectRoot = dirname(__DIR__, 1);
            $basePath = $projectRoot . '/views/online/success';
           
            $successFile = trim($data['success_name']) . '.php';
            $path = $basePath . '/' . $successFile;

            if (file_exists($path)) {
                ob_start();
                 extract([
                    'user' => $user
                ]);
                include $path;
                return ob_get_clean();
            }

            return "Fichier de succès introuvable";
        }

    }
?>