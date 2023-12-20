<?php

return $route = [
    '~^hello/(.*)$~' =>[src\Controllers\MainControllers::class, 'sayHello'],
    //'~^$~' => [src\Controllers\MainControllers::class,'main'],
    '~^$~' => [src\Controllers\ArticleController::class,'index'],
    '~^article/(\d+)$~' => [src\Controllers\ArticleController::class,'show'],
    '~^article/update/(\d+)$~' => [src\Controllers\ArticleController::class,'update'],
    '~^article/edit/(\d+)$~' => [src\Controllers\ArticleController::class,'edit'],
    '~^article/delete/(\d+)$~' => [src\Controllers\ArticleController::class,'delete'],
    '~^article/store$~' => [src\Controllers\ArticleController::class,'store'],
    '~^article/create$~' => [src\Controllers\ArticleController::class,'create'], 
    '~^comment/create/(\d+)$~' => [src\Controllers\CommentController::class,'create'],
    '~^comment/store$~' => [src\Controllers\CommentController::class,'store'],
    '~^comment/edit/(\d+)$~' => [src\Controllers\CommentController::class,'edit'],
    '~^comment/update/(\d+)$~' => [src\Controllers\CommentController::class,'update'],
    '~^comment/delete/(\d+)$~' => [src\Controllers\CommentController::class,'delete'],
];