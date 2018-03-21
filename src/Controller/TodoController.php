<?php

declare (strict_types = 1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Form\CreateTodoType;
use App\Model\CreateTodo as CreateTodoDTO;
use Symfony\Component\HttpFoundation\Request;
use Prooph\Bundle\ServiceBus\CommandBus;
use App\Messaging\Command\CreateTodo;
use Ramsey\Uuid\Uuid;

final class TodoController extends Controller
{
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function index()
    {
        $form = $this->createForm(CreateTodoType::class, new CreateTodoDTO());

        return $this->render('todo/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function create(Request $request)
    {
        $createTodo = new CreateTodoDTO();
        $form = $this->createForm(CreateTodoType::class, $createTodo);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $this->commandBus->dispatch(
                new CreateTodo([
                    'id' => Uuid::uuid4()->toString(),
                    'description' => $createTodo->getDescription(),
                ])
            );

            return $this->redirectToRoute('index');
        }

        return $this->render('todo/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
