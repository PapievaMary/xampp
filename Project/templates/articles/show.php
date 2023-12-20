<?php
require __DIR__.'/../header.php';
?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?=$article->getName();?></h5>
    <p class="card-text"><?=$article->getText();?></p>
    <p class="card-text"><?=$article->getAuthorId()->getNickname();?></p>
    <a href="/Stady/Project/www/article/edit/<?=$article->getId();?>" class="btn btn-primary">edit</a>
    <a href="/Stady/Project/www/article/delete/<?=$article->getId();?>" class="btn btn-primary">delete</a>
    <a href="/Stady/Project/www/comment/create/<?=$article->getId();?>" class="btn btn-primary">add comment</a>
  </div>
</div>
<h3>Comments</h3>
<?php foreach($comments as $comment):?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?=$comment->getUserById()->getNickname();?></h5>
    <p class="card-text"><?=$comment->getText();?></p>
    <a href="/Stady/Project/www/comment/edit/<?=$comment->getId();?>" class="/Stady/Project/www/">edit comment</a>
    <a href="/Stady/Project/www/comment/delete/<?=$comment->getId();?>" class="/Stady/Project/www/">delete comment</a>
  </div>
</div>
<?php endforeach;?>
<?php
require __DIR__.'/../footer.html';