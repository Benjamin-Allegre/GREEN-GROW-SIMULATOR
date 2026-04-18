<?php
    class AccountsManager{
        private $db;
        
        public function __construct($db){
            $this->db = $db;
        }

        public function verifUsernameUnique($username)
        {
            $q = $this->db->prepare('SELECT COUNT(*) FROM users WHERE username = :username');
            $q->execute([':username' => $username]);

            return $q->fetchColumn() == 0;
        }
        
        

        public function addAccount(Accounts $user)
        {
            $q = $this->db->prepare('
                INSERT INTO users(username, password, money, xp, level)
                VALUES (:username, :password, :money, :xp, :level)
            ');

            $q->bindValue(':username', $user->username());
            $q->bindValue(':password', $user->password());
            $q->bindValue(':money', $user->money());
            $q->bindValue(':xp', $user->xp());
            $q->bindValue(':level', $user->level());

            $q->execute();

            $user->hydrate([
                'id' => $this->db->lastInsertId()
            ]);
        }
        public function getAccount($valeur){
            if(is_string($valeur)){
                $q = $this->db->prepare('SELECT * FROM users WHERE username = :username');
                $q->execute([':username' => $valeur]);

                return new Accounts($q-> fetch(PDO::FETCH_ASSOC));
            }elseif(is_int($valeur)){
                $q = $this->db->prepare('SELECT * FROM users WHERE id = :id');
                $q->execute([':id' => $valeur]);

                return new Accounts($q-> fetch(PDO::FETCH_ASSOC));
            }
        }
        public function marqueExists($marque)
        {
            $q = $this->db->prepare("SELECT id FROM users WHERE marque = :marque");
            $q->execute([':marque' => $marque]);

            return $q->fetch() !== false;
        }

        public function updateMarque($id, $marque)
        {
            $q = $this->db->prepare("UPDATE users SET marque = :marque WHERE id = :id");
            $q->execute([
                ':marque' => $marque,
                ':id' => $id
            ]);
        }
    }
?>