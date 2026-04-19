<?php
    class GraineExt{
        protected $id, $nom, $description, $prix, $germ_max, $vege_max, $flo_max, $recolte_max, $eau_max, $engrais_max, $prod_min, $prod_max;

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
        public function prix(){ return $this->prix; }
        public function germ_max(){ return $this->germ_max; }
        public function vege_max(){ return $this->vege_max; }
        public function flo_max(){ return $this->flo_max; }
        public function recolte_max(){ return $this->recolte_max; }
        public function eau_max(){ return $this->eau_max; }
        public function engrais_max(){ return $this->engrais_max; }
        public function prod_min(){ return $this->prod_min; }
        public function prod_max(){ return $this->prod_max; }

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
        public function setPrix($prix)
        {
            $prix = (int) $prix;
            $this->prix = $prix;
        }
        public function setGermMax($germ_max)
        {
            $germ_max = (int) $germ_max;
            $this->germ_max = $germ_max;
        }
        public function setVegMax($vege_max)
        {
            $vege_max = (int) $vege_max;
            $this->vege_max = $vege_max;
        }
        public function setFloMax($flo_max)
        {
            $flo_max = (int) $flo_max;
            $this->flo_max = $flo_max;
        }
        public function setRecolteMax($recolte_max)
        {
            $recolte_max = (int) $recolte_max;
            $this->recolte_max = $recolte_max;
        }
        public function setEauMax($eau_max)
        {
            $eau_max = (int) $eau_max;
            $this->eau_max = $eau_max;
        }
        public function setEngraisMax($engrais_max)
        {
            $engrais_max = (int) $engrais_max;
            $this->engrais_max = $engrais_max;
        }
        public function setProdMin($prod_min)
        {
            $prod_min = (int) $prod_min;
            $this->prod_min = $prod_min;
        }
        public function setProdMax($prod_max)
        {
            $prod_max = (int) $prod_max;
            $this->prod_max = $prod_max;
        }
        
    }
    ?>
