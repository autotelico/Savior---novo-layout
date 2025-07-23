<?php

namespace App\Entity\Post;

use App\Helper\Feedback;
use App\Helper\PostCategory;

class Post
{
    private int $id, $views = 0;
    private ?\DateTimeInterface $date = null;

    //Link Gerado a partir do Título
    private Link $link;
    private string $title, $category, $content, $imgUrl;

	public static function createFromArray(array $array): Post
	{
		$date = isset($array['date']) ? new \DateTime($array['date']) : null;

		$post = new self();
		$post->setId((int) $array['id'])
			 ->setDate($date)
			 ->setViews((int) $array['views'])
			 ->setTitle($array['title'])
			 ->setLink(self::createLink($array))
			 ->setCategory($array['category'])
			 ->setContent($array['content'])
			 ->setImgUrl($array['img_url']);

		return $post;
	}

	private static function createLink(array $array): Link
	{
		if (!empty($array['link'])) {
			return new Link($array['link']);
		} else {
			$link = $array['title'] . '-' . date('dm');
			return new Link($link);
		}
	}

	public function getId(): int 
    {
		return $this->id;
	}
	
	public function setId(int $id): self 
    {
		$this->id = $id;
		return $this;
	}

	public function getDate(): ?string 
    {
        if ($this->date === null) {
            return $this->date;
        }

		return $this->date->format('Y-m-d H:i:s');
	}
	
	public function setDate(?\DateTimeInterface $date): self 
    {
		$this->date = $date;
		return $this;
	}

	public function getViews(): int 
    {
		return $this->views;
	}
	
	public function setViews(int $views): self 
    {
		$this->views = $views;
		return $this;
	}

	public function getTitle(): string 
    {
		return $this->title;
	}
	
	public function setTitle(?string $title): self 
    {
        if (is_null($title) || empty($title)) {
            throw new \InvalidArgumentException(Feedback::INVALID_POST_TITLE->value);
        }

		$this->title = $title;
		return $this;
	}

	public function getLink(): Link 
    {
		return $this->link;
	}
	
	public function setLink(?Link $link): self 
    {
		$this->link = $link;
		return $this;
	}

	public function getCategory(): string 
    {
		return $this->category;
	}
	
	public function setCategory(?string $category): self 
    {
        if (is_null($category) || empty($category)) {
            throw new \InvalidArgumentException(Feedback::INVALID_POST_CATEGORY->value);
        }

        PostCategory::getValue($category);

		$this->category = $category;
		return $this;
	}

	public function getContent(): string 
    {
		return $this->content;
	}
	
	public function setContent(?string $content): self 
    {
        if (is_null($content) || empty($content)) {
            throw new \InvalidArgumentException(Feedback::INVALID_POST_CONTENT->value);
        }
        
		$this->content = $content;
		return $this;
	}

	public function getImgUrl(): string 
    {
		return $this->imgUrl;
	}
	
	public function setImgUrl(?string $imgUrl): self 
    {
        if (is_null($imgUrl)) {
            throw new \InvalidArgumentException(Feedback::INVALID_POST_IMG->value);
        }

		$this->imgUrl = $imgUrl;
		return $this;
	}
}