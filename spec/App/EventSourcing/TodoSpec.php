<?php

namespace spec\App\EventSourcing;

use App\EventSourcing\Todo;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use App\EventSourcing\TodoId;
use App\EventSourcing\TodoCreated;
use Ramsey\Uuid\Uuid;

class TodoSpec extends ObjectBehavior
{
    function it_creates_a_todo(TodoId $todoId)
    {
        $this->beConstructedThrough('create', [$todoId, 'Buy bananas']);

        $id = Uuid::uuid4()->toString();
        $todoId->toString()->willReturn($id);

        $this->shouldHaveRecordedEventsThat(function(array $events) use ($id) {
            foreach ($events as $event) {
                if ($event instanceof TodoCreated) {
                    return $id === $event->aggregateId() && 'Buy bananas' === $event->description();
                }
            }

            return false;
        });

        $this->description()->shouldReturn('Buy bananas');
    }
}
