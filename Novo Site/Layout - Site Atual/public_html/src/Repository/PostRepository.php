<?php

namespace App\Repository;

use App\Entity\Post\Link;
use App\Entity\Post\Post;
use App\Infra\Database\DatabaseConnection;

class PostRepository
{
    public function __construct(private DatabaseConnection $conn){}

    public function create(Post $post): mixed
    {
        $this->conn->count("INSERT INTO " . DB_ARK . ".post (title, link, category, content, img_url, views, date) VALUES (:TITLE, :LINK, :CATEGORY, :CONTENT, :IMG_URL, :VIEWS, :DATE)", [
            ':TITLE'    => $post->getTitle(),
            ':LINK'     => $post->getLink(),
            ':CATEGORY' => $post->getCategory(),
            ':CONTENT'  => $post->getContent(),
            ':IMG_URL'  => $post->getImgUrl(),
            ':VIEWS'    => $post->getViews(),
            ':DATE'     => $post->getDate()
        ]);

        return $this->conn->lastInsertId();
    }

    public function update(Post $post): mixed
    {
        $this->conn->count("UPDATE " . DB_ARK . ".post SET title = :TITLE, link = :LINK, category = :CATEGORY, content = :CONTENT, img_url = :IMG_URL, views = :VIEWS, date = :DATE WHERE id = :ID", [
            ':TITLE'    => $post->getTitle(),
            ':LINK'     => $post->getLink(),
            ':CATEGORY' => $post->getCategory(),
            ':CONTENT'  => $post->getContent(),
            ':IMG_URL'  => $post->getImgUrl(),
            ':VIEWS'    => $post->getViews(),
            ':DATE'     => $post->getDate(),
            ':ID'       => $post->getId()
        ]);

        return $post->getId();
    }

    public function listDraft(int $limit = 100): mixed
    {
        return $this->conn->selectAll("SELECT * FROM " . DB_ARK . ".post WHERE date IS NULL ORDER BY id DESC LIMIT :LIMIT", [
            ':LIMIT' => $limit,
        ]);
    }

    public function listPublished(int $amount = 100): mixed
    {
        return $this->conn->selectAll("SELECT * FROM " . DB_ARK . ".post WHERE date IS NOT NULL ORDER BY date DESC LIMIT :LIMIT", [
            ':LIMIT' => $amount,
        ]);
    }

    public function delete(Post $post): void
    {
        $this->conn->count("DELETE FROM " . DB_ARK . ".post WHERE id = :ID", [
            ':ID' => $post->getId(),
        ]);
    }

    public function getByID(int $id): mixed
    {
        return $this->conn->select("SELECT * FROM " . DB_ARK . ".post WHERE id = :ID", [
            ':ID' => $id,
        ]);
    }

    public function getByCategory(string $category, int $limit = 30): mixed
    {
        return $this->conn->selectAll("SELECT * FROM " . DB_ARK . ".post WHERE category = :CATEGORY AND date IS NOT NULL ORDER BY DATE DESC LIMIT :LIMIT", [
            ':CATEGORY' => $category,
            ':LIMIT' => $limit
        ]);
    }

    public function getByLink(Link $link): mixed
    {
        return $this->conn->select("SELECT * FROM " . DB_ARK . ".post WHERE link = :LINK AND date IS NOT NULL", [
            ':LINK' => $link
        ]);
    }

    public function updatePostViews(string $link):void
    {
        $this->conn->count("UPDATE " . DB_ARK . ".post SET views = views + 1 WHERE link = :LINK", [
            ':LINK' => $link
        ]);
    }
}