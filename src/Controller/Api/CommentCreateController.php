<?php

namespace App\Controller\Api;

use App\Entity\Comment;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Security\Core\Security;

#[AsController]
class CommentCreateController
{
    public function __construct(private Security $security)
    {
    }

    public function __invoke(Comment $data)
    {
        $data->setAuthor($this->security->getUser());
        return $data;
    }

}
