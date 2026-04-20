<?php
    class CultureType {
        protected $id, $nom;

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
        public function nom(){ return $this->nom; }

         //setter

        public function setId($id)
        {
            $id = (int) $id;
            $this->id = $id;
        }
        public function setNom($nom)
        {
            if(is_string($nom))
            {
                $this->nom = $nom;
            }
        }
    }