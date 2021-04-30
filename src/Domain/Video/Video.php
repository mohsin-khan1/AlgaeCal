<?php
declare(strict_types=1);

namespace App\Domain\Video;

use JsonSerializable;

class Video implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $video_id;

    /**
     * @param int|null  $id
     * @param string    $title
     * @param string    $description
     * @param string    $video_id
     */
    public function __construct(?int $id, string $title, string $description, string $video_id)
    {
        $this->id = $id;
        $this->title = strtolower($title);
        $this->description = ucfirst($description);
        $this->video_id = ucfirst($video_id);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function gettitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getdescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getvideo_id(): string
    {
        return $this->video_id;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'video_id' => $this->video_id,
        ];
    }
}
