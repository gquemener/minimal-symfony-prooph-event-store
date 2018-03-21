<?php

declare (strict_types = 1);

namespace App\EventSourcing;

use Prooph\EventSourcing\AggregateRoot;
use Prooph\EventSourcing\AggregateChanged;

final class Todo extends AggregateRoot
{
    private $id;

    public static function create(
        TodoId $todoId,
        string $description
    ): self {
        $self = new self();
        $self->recordThat(TodoCreated::occur($todoId->toString(), [
            'description' => $description,
        ]));

        return $self;
    }

    protected function aggregateId(): string
    {
        return $this->id->toString();
    }

    protected function apply(AggregateChanged $event): void
    {
        switch (get_class($event)) {
            case TodoCreated::class:
                $this->id = TodoId::fromString($event->aggregateId());
                break;
        }
    }
}
