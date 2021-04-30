<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Video;

use App\Domain\Video\Video;
use App\Domain\Video\VideoNotFoundException;
use App\Domain\Video\VideoRepository;

class InMemoryVideoRepository implements VideoRepository
{
    /**
     * @var Video[]
     */
    private $Videos;

    /**
     * InMemoryVideoRepository constructor.
     *
     * @param array|null $Videos
     */
    public function __construct(array $Videos = null)
    {
        $this->Videos = $Videos ?? [
            1 => new Video(1, "What It's Like To Work At AlgaeCal", "Discover what it's like to work at AlgaeCal with this quick video!", "https://cdn.bitdegree.org/learn/Pexels%20Videos%203373.mp4?raw=true"),
            2 => new Video(2, "Esther Mangini Testimonial", "Esther's journey to healthier bones", "https://cdn.bitdegree.org/learn/Pexels%20Videos%203373.mp4?raw=true"),
            3 => new Video(3, "Teresa Cucurull Testimonial", "Teresa's journey to healthier bones", "https://cdn.bitdegree.org/learn/Pexels%20Videos%203373.mp4?raw=true"),
            4 => new Video(4, "Perfect Pilates For Osteoporosis - Legwork", "Bone Healthy Exercises!" , "https://cdn.bitdegree.org/learn/Pexels%20Videos%203373.mp4?raw=true"),
            5 => new Video(5, "Perfect Pilates For Osteoporosis - Amazing Abs", "Bone Healthy Exercises!", "https://cdn.bitdegree.org/learn/Pexels%20Videos%203373.mp4?raw=true"),
            6 => new Video(6, "Lara's Homemade Granola", "Bone Healthy Recipes" , "https://cdn.bitdegree.org/learn/Pexels%20Videos%203373.mp4?raw=true"),
            7 => new Video(7, "Brazil Nut Pesto", "Bone Healthy Exercises!", "https://cdn.bitdegree.org/learn/Pexels%20Videos%203373.mp4?raw=true"),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->Videos);
    }

    /**
     * {@inheritdoc}
     */
    public function findVideoOfId(int $id): Video
    {
        if (!isset($this->Videos[$id])) {
            throw new VideoNotFoundException();
        }

        return $this->Videos[$id];
    }
}
