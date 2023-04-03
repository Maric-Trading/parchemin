<?php

namespace MaricTrading\Parchemin\Entity;


use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ORM\Table(name: 'page')]
#[ORM\Unique(name: 'idx_slug', fields: ['slug'])]
class Page {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected int $id;
    #[ORM\Column(type: 'text')]
    protected string $content;
    #[ORM\Column(type: 'string', length: 255)]
    protected string $slug;
    #[ORM\Column(type: 'string', length: 255)]
    protected string $title;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Page
     */
    public function setContent(string $content): Page
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return Page
     */
    public function setSlug(string $slug): Page
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Page
     */
    public function setTitle(string $title): Page
    {
        $this->title = $title;
        return $this;
    }
    
    


}
