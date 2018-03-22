<?php

declare (strict_types = 1);

namespace App\EventSourcing;

use Prooph\EventSourcing\Aggregate\AggregateRepository;

final class TodoRepository extends AggregateRepository
{
    public function save(Todo $todo): void
    {
        $this->saveAggregateRoot($todo);
    }
}
