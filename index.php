<?php
     class User{
        private $name;

        public function __construct(string $name){
            $this->name = $name;
        }
        
        public function getName(){
            return $this->name;
        }
     }

     class Article{
        private $title;
        private $text;
        private $author;

        public function __construct(string $title, string $text, User $author){
            $this->text = $text;
            $this->title = $title;
            $this->author = $author;
        }

        public function getAuthor():User
        {
            return $this->author;
        }
     }

     $user = new User('Ivan');
     $article = new Article('title', 'text', $user);
     echo $article->getAuthor()->getName();    

     "My name`s $name";
     'My name`s'.$user->getName();

?>