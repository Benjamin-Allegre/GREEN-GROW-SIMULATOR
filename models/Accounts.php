<?php
    class Accounts{
        protected $id, $username, $marque, $password, $role, $created_at, $money, $xp, $level;

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

        //getter

        public function id(){ return $this->id; }
        public function username(){ return $this->username; }
        public function marque(){ return $this->marque; }
        public function password(){ return $this->password; }
        public function role(){ return $this->role; }
        public function created_at(){ return $this->created_at; }
        public function money(){ return $this->money; }
        public function xp(){ return $this->xp; }
        public function level(){ return $this->level; }

        //setter

        public function setId($id)
        {
            $id = (int) $id;
            $this->id = $id;
        }
        public function setUsername($username)
        {
            if(is_string($username))
            {
                $this->username = $username;
            }
        }
        public function setMarque($marque)
        {
            if(is_string($marque))
            {
                $this->marque = $marque;
            }
        }
        public function setPassword($password)
        {
            if(is_string($password))
            {
                $this->password = $password;
            }
        }
        public function setRole($role)
        {
            if(is_string($role))
            {
                if($role === 'player' || $role === 'moderator' || $role === 'admin')
                {
                    $this->role = $role;
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
        public function setMoney($money)
        {
            $money = (int) $money;
            $this->money = $money;
        }
        public function setXp($xp)
        {
            $xp = (int) $xp;
            $this->xp = $xp;
        }
        public function setLevel($level)
        {
            $level = (int) $level;
            $this->level = $level;
        }
    }

?>