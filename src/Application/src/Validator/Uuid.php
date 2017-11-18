<?php

declare(strict_types=1);

namespace Application\Validator;

final class Uuid
{
    const UUID4_REGEX = '[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}';
}
