<?php

declare (strict_types = 1);

namespace App\Messaging\Event;

use App\EventSourcing\TodoCreated;

final class TodoCreatedListener
{
    public function __invoke(TodoCreated $event)
    {
        die(var_dump($event));
    }
}
