<?php

declare (strict_types = 1);

namespace App\Model;

final class CreateTodo
{
    private $description;

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
}
