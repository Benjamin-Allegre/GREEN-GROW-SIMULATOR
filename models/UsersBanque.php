<?php
    class UsersBanque{
       private $id, $user_id, $solde, $emprunt, $mensualiter;

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
        public function solde(){ return $this->solde; }
        public function emprunt(){ return $this->emprunt; }
        public function mensualiter(){ return $this->mensualiter; }

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
        public function setSolde($solde)
        {
            $solde = (int) $solde;
            $this->solde = $solde;
        }
        public function setEmprunt($emprunt)
        {
            $emprunt = (int) $emprunt;
            $this->emprunt = $emprunt;
        }
        public function setMensualiter($mensualiter)
        {
            $mensualiter = (int) $mensualiter;
            $this->mensualiter = $mensualiter;
        }
        
    }

?>