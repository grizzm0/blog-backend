<?php

declare(strict_types=1);

namespace Blog\Collection;

use Zend\Paginator\Paginator;

final class PostCollection extends Paginator
{
    const PER_PAGE = 25;
}
