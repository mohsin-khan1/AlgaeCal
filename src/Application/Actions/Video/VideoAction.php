<?php
declare(strict_types=1);

namespace App\Application\Actions\Video;

use App\Application\Actions\Action;
use App\Domain\Video\VideoRepository;
use Psr\Log\LoggerInterface;

abstract class VideoAction extends Action
{
    /**
     * @var VideoRepository
     */
    protected $VideoRepository;

    /**
     * @param LoggerInterface $logger
     * @param VideoRepository  $VideoRepository
     */
    public function __construct(LoggerInterface $logger, VideoRepository $VideoRepository)
    {
        parent::__construct($logger);
        $this->VideoRepository = $VideoRepository;
    }
}
