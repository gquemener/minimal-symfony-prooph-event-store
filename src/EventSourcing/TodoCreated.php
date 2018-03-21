<?php

declare (strict_types = 1);

namespace App\EventSourcing;

use Prooph\EventSourcing\AggregateChanged;

final class TodoCreated extends AggregateChanged
{
    public function description(): string
    {
        return $this->description;
    }
}
