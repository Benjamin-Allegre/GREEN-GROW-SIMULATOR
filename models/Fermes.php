<?php
    class Fermes {
        protected $id, $nom, $description, $niveau, $type, $capacite, $prix;

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
        public function nom(){ return $this->nom; }
        public function description(){ return $this->description; }
        public function niveau(){ return $this->niveau; }
        public function type(){ return $this->type; }
        public function capacite(){ return $this->capacite; }
        public function prix(){ return $this->prix; }

        // setter

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
        public function setDescription($description)
        {
            if(is_string($description))
            {
                $this->description = $description;
            }
        }
        public function setNiveau($niveau)
        {
            $niveau = (int) $niveau;
            $this->niveau = $niveau;
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
        public function setCapacite($capacite)
        {
            $capacite = (int) $capacite;
            $this->capacite = $capacite;
        }
        public function setPrix($prix)
        {
            $prix = (int) $prix;
            $this->prix = $prix;
        }

    }
?>