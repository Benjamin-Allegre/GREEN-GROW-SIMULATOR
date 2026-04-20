<?php
    class UsersFermes{
        protected $id, $user_id, $pays_id, $ferme_id, $type;

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
        public function user_id(){ return $this->user_id; }
        public function pays_id(){ return $this->pays_id; }
        public function ferme_id(){ return $this->ferme_id; }
        public function type(){ return $this->type; }

        //setter

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
        public function setPaysId($pays_id)
        {
            $pays_id = (int) $pays_id;
            $this->pays_id = $pays_id;
        }
        public function setFermeId($ferme_id)
        {
            $ferme_id = (int) $ferme_id;
            $this->ferme_id = $ferme_id;
        }
        public function setType($type)
        {
            if(is_string($type))
            {
                if($type === 'Extérieur' || $type === 'Intérieur' || $type === 'Hydro' || $type === 'Aéro')
                {
                    $this->type = $type;
                }
            }
        }
    }

    ?>