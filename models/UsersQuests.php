<?php
    class UsersQuests {
        protected $id, $user_id, $quest_name, $status, $created_at;

        public function __construct(array $donnees)
        {
        
            $this->hydrate($donnees);
        }

        public function hydrate(array $donnees)
        {
            foreach ($donnees as $key => $value)
            {
                // snake_case → camelCase
                $key = str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
                $method = 'set'.$key;

                if (method_exists($this, $method))
                {
                    $this->$method($value);
                }
            }
        }

        // getter

        public function id(){ return $this->id; }
        public function user_id(){ return $this->user_id; }
        public function quest_name(){ return $this->quest_name; }
        public function status(){ return $this->status; }
        public function created_at(){ return $this->created_at; }

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
        public function setQuestName($quest_name)
        {
            if(is_string($quest_name))
            {
                $this->quest_name = $quest_name;
            }
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