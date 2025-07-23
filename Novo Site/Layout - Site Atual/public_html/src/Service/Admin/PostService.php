<?php

namespace App\Service\Admin;

use App\Entity\Post\Post;
use App\Helper\Feedback;
use App\Repository\PostRepository;

class PostService
{
    public function __construct(
        private PostRepository $postRepository
    ){}

    public function getPost(int $id): Post
    {
        $dataFromDatabase = $this->postRepository->getByID($id);
        
        if (empty($dataFromDatabase)) {
            throw new \UnexpectedValueException(Feedback::POST_NOT_FOUND->value);
        }

        return Post::createFromArray($dataFromDatabase);
    }

    public function listDraft(?array $dataFromRequest): string
    {
        $limit = $dataFromRequest['limit'] ?? 5;

        return json_encode($this->postRepository->listDraft($limit));
    }

    public function listPublished(?array $dataFromRequest): string
    {
        $limit = $dataFromRequest['limit'] ?? 5;

        return json_encode($this->postRepository->listPublished($limit));
    }

    public function delete(int $postId): void 
    {   
        $post = $this->getPost(($postId));
        $this->postRepository->delete($post);
    }

    public function create(array $dataFromRequest): Post
    {
        $post = Post::createFromArray($dataFromRequest);

        $publish = isset($dataFromRequest['publish']);

        $postId = $this->getPostId($post, $publish);
    
        return $post->setId($postId);
    }

    private function getPostId(Post $post, bool $publish): int
    {
        //Se for um post novo, e estiver definido para públicar
        if ($publish && $post->getId() === 0) {
            return $this->postRepository->create($post);
        }
    
        //Aqui definimos que não vai ser públicado
        if (!$publish) {
            $post->setDate(null);
        }
    
        //Atualiza post que já existe (rascunho)
        if ($post->getId() > 0) {
            return $this->postRepository->update($post);
        }

        //Cria como rascunho
        return $this->postRepository->create($post);
    }
}