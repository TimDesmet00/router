<?php

declare(strict_types=1);

namespace App\models;

class Article
{
    public $id;
    public string $title;
    public ?string $description;
    public ?string $publishDate;
    public $id_author;
    public ?string $img;

    public function __construct($id, string $title, ?string $description, ?string $publishDate, $id_author, ?string $img)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->publishDate = $publishDate;
        $this->id_author = $id_author;
        $this->img = $img;
    }

    public function formatPublishDate($format = 'd-m-Y H:i')
    {
        $date = new \DateTime($this->publishDate);
        return $date->format($format);
    }
}
