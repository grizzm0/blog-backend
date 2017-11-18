<?php

declare(strict_types=1);

namespace Blog\Entity;

use DateTime;
use Ramsey\Uuid\Uuid;

class Post
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var DateTime
     */
    private $created;

    /**
     * Post constructor.
     *
     * @param string $title
     * @param string $content
     */
    public function __construct(string $title, string $content)
    {
        $this->id      = Uuid::uuid4();
        $this->title   = $title;
        $this->content = $content;
        $this->created = new DateTime();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }
}
