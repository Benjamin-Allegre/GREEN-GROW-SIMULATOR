<?php
    class UsersFermes{
        protected $id, $pays_id, $user_id, $ferme_id, $niveau, $type_id, $created_at;

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
        public function pays_id(){ return $this->pays_id; }
        public function user_id(){ return $this->user_id; }
        public function ferme_id(){ return $this->ferme_id; }
        public function niveau(){ return $this->niveau; }
        public function type_id(){ return $this->type_id; }
        public function created_at(){ return $this->created_at; }

        //setter

        public function setId($id)
        {
            $id = (int) $id;
            $this->id = $id;
        }
        public function setPaysId($pays_id)
        {
            $pays_id = (int) $pays_id;
            $this->pays_id = $pays_id;
        }
        public function setUserId($user_id)
        {
            $user_id = (int) $user_id;
            $this->user_id = $user_id;
        }
        
        public function setFermeId($ferme_id)
        {
            $ferme_id = (int) $ferme_id;
            $this->ferme_id = $ferme_id;
        }
        public function setNiveau($niveau)
        {
            $niveau = (int) $niveau;
            $this->niveau = $niveau;
        }
        public function setTypeId($type_id)
        {
            $type_id = (int) $type_id;
            $this->type_id = $type_id;

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