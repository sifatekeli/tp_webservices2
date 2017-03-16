<?php

namespace AppBundle\Entity;

    class Book
    {
        public $id;
        public $name;
        public $category;


        public function __construct($id, $name, $category)
        {
            $this->id = $id;
            $this->name = $name;
            $this->category = $category;
        }
    }

?>