<?php
declare(strict_types=1);

namespace App\Application\Actions\Video;

use Psr\Http\Message\ResponseInterface as Response;

class ViewVideoAction extends VideoAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $VideoId = (int) $this->resolveArg('id');
        $Video = $this->VideoRepository->findVideoOfId($VideoId);

        $this->logger->info("Video of id `${VideoId}` was viewed.");

        return $this->respondWithData($Video);
    }
}
