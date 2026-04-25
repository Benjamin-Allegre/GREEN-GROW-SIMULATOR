<?php
    class Materiels {
        private $id, $nom, $description, $materiel_type, $culture_type, $volume, $prix;

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
        public function nom(){ return $this->nom;}
        public function description(){ return $this->description; }
        public function materiel_type(){ return $this->materiel_type; }
        public function volume(){ return $this->volume; }
        public function prix(){ return $this->prix; }

        // setter

        public function setId($id)
        {
            $id = (int) $id;
            $this->id = $id;
        }
        public function setNom($nom)
        {
            if(is_string($nom)){
                $this->nom = $nom;
            }
            
        }
        public function setDescription($description)
        {
            if(is_string($description)){
                $this->description = $description;
            }
            
        }
        public function setMaterielType($materiel_type)
        {
            $materiel_type = (int) $materiel_type;
            $this->materiel_type = $materiel_type;
        }
        public function setVolume($volume)
        {
            $volume = (int) $volume;
            $this->volume = $volume;
        }
        public function setPrix($prix)
        {
            $prix = (int) $prix;
            $this->prix = $prix;
        }
    }
?>