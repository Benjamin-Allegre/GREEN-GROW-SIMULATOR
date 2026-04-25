<?php
    class UsersEntrepot{
        private $id, $user_id, $produit_id, $qts;

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
        public function user_id(){ return $this->user_id;}
        public function produit_id(){ return $this->produit_id; }
        public function qts(){ return $this->qts; }
        
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
        public function setProduit_id($produit_id)
        {
            $produit_id = (int) $produit_id;
            $this->produit_id = $produit_id;
        }
        public function setQts($qts)
        {
            $qts = (int) $qts;
            $this->qts = $qts;
        }
    }
?>