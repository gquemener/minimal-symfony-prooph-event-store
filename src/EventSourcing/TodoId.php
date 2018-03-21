<?php

declare (strict_types = 1);

namespace App\EventSourcing;

use Ramsey\Uuid\Uuid;

final class TodoId
{
    private $todoId;

    private function __construct(string $todoId)
    {
        if (!Uuid::isValid($todoId)) {
            throw new \InvalidArgumentException(sprintf(
                'Todo id "%s" is not a valid UUID.',
                $todoId
            ));
        }
        $this->todoId = $todoId;
    }

    public static function fromString(string $todoId): self
    {
        return new self($todoId);
    }

    public function toString(): string
    {
        return $this->todoId;
    }
}
