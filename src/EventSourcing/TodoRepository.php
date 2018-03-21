<?php

declare (strict_types = 1);

namespace App\EventSourcing;

use Prooph\EventSourcing\Aggregate\AggregateRepository;
use App\EventSourcing\Aggregate\Todo;

final class TodoRepository extends AggregateRepository
{
    public function save(Todo $todo): void
    {
        $this->saveAggregateRoot($todo);
    }
}
