<?php

declare (strict_types = 1);

namespace App\Messaging\Command;

use App\EventSourcing\TodoRepository;
use App\EventSourcing\Todo;
use App\EventSourcing\TodoId;

final class CreateTodoHandler
{
    private $repository;

    public function __construct(TodoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateTodo $createTodo)
    {
        $todo = Todo::create(
            TodoId::fromString($createTodo->id()),
            $createTodo->description()
        );

        $this->repository->save($todo);
    }
}
