<?php
    class UsersQuests {
        protected $id, $user_id, $quest_id, $status, $created_at;

        public function __construct(array $donnees)
        {
        
            $this->hydrate($donnees);
        }

        public function hydrate(array $donnees)
        {
            
            foreach ($donnees as $key => $value)
                
            {
                $method = 'set'.ucfirst($key);

                if (method_exists($this, $method))
                {
                    $this->$method($value);
                }
                
            }
        }

        // getter

        public function id(){ return $this->id; }
        public function userId(){ return $this->user_id; }
        public function questId(){ return $this->quest_id; }
        public function status(){ return $this->status; }
        public function createdAt(){ return $this->created_at; }

        // setter

        public function setId($id)
        {
            $id = (int) $id;
            $this->id = $id;
        }
        public function setUserId($user_id)
        {
            $user_id = (int) $user_id;
            $this->user_id = $user_id;
        }
        public function setQuestId($quest_id)
        {
            $quest_id = (int) $quest_id;
            $this->quest_id = $quest_id;
        }
        public function setStatus($status)
        {
            if(is_string($status))
            {
                if($status === 'active' || $status === 'completed')
                {
                    $this->status = $status;
                }
            }
        }
        public function setCreatedAt($created_at)
        {
            if (is_string($created_at) || is_int($created_at))
            {
                $this->created_at = $created_at;
            }
        }
    }


?>