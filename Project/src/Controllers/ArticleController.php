<?php

namespace src\Controllers;
use src\Models\Articles\Article;
use src\View\View;
use src\Models\Users\User;
use src\Models\ActiveRecordEntity;
use src\Models\Comment\Comment;

class ArticleController{
    private $view;

    public function __construct(){
        $this->view = new View(dirname(dirname(__DIR__)).'/templates');

    }

    public function index(){
        $articles = Article::findAll();
        $this->view->renderHtml('/articles/view.php', ['articles'=>$articles]);
    }

    public function create(){
        $users = User::findAll();
        $this->view->renderHtml('/articles/create.php', ['users'=>$users]);
    }

    public function store(){
        $article = new Article;
        $article -> setName($_POST['name']);
        $article -> setText($_POST['text']);
        $article -> setAuthorId($_POST['author']);
        $article -> save();
        header('Location: http://localhost/Stady/Project/www/');
    }

    public function show ($id){
        $article = Article::getById($id);
        $comments = Comment::findAllComments($id);
        $this->view->renderHtml('/articles/show.php', ['article'=>$article, 'comments'=>$comments]);
    }

    public function update ($id){
        $article = Article::getById($id);
        $article -> setName($_POST['name']);
        $article -> setText($_POST['text']);
        $article -> setAuthorId($_POST['author']);
        $article -> save();
        $this->show($id);
    }

    public function edit ($id){
        $users = User::findAll();
        $article = Article::getById($id);
        $this->view->renderHtml('/articles/edit.php', ['article'=>$article, 'users'=>$users]);
    }

    public function delete($id){
        $article = Article::getById($id);
        if(Comment::findAllComments($article->getId()) != null){
        $comments = Comment::findAllComments($article->getId());
        foreach($comments as $comment){
        $comment->delete();
        }
        }
        $article->delete();
        return header('Location: http://localhost/Stady/Project/www');
    }
    
}