<?php

declare (strict_types = 1);

namespace App\Messaging\Command;

use Prooph\Common\Messaging\Command;
use Prooph\Common\Messaging\PayloadTrait;
use Prooph\Common\Messaging\PayloadConstructable;
use App\Model\CreateTodo as CreateTodoDTO;

final class CreateTodo extends Command implements PayloadConstructable
{
    use PayloadTrait;

    public function id(): ?string
    {
        return $this->payload['id'];
    }

    public function description(): ?string
    {
        return $this->payload['description'];
    }
}
