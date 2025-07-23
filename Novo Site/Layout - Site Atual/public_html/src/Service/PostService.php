<?php

namespace App\Service;

use App\Entity\Post\Link;
use App\Entity\Post\Post;
use App\Repository\PostRepository;

class PostService 
{
    public function __construct(
        private PostRepository $postRepository
    ){}

    public function getArticle(Link $link): Post
    {   
        $dataFromDatabase = $this->postRepository->getByLink($link);
        
        if (empty($dataFromDatabase)) {
            throw new \InvalidArgumentException();
        }

        $post = Post::createFromArray($dataFromDatabase);
        $post->setViews($post->getViews() + 1);

        $this->postRepository->update($post);

        return $post;
    }

    public function listPublished(): array
    {
        $dataFromDatabase = $this->postRepository->listPublished(amount: 4);
        $postList = [];

        foreach ($dataFromDatabase as $postData) {
            $postList[] = Post::createFromArray($postData);
        }

        return $postList;
    }

    public function listByCategory(string $category): array
    {
        $dataFromDatabase = $this->postRepository->getByCategory($category);
        $postList = [];

        foreach ($dataFromDatabase as $postData) {
            $postList[] = Post::createFromArray($postData);
        }

        return $postList;
    }
}