<?php

declare (strict_types = 1);

namespace App\PhpSpec;

use PhpSpec\Extension;
use PhpSpec\ServiceContainer;
use App\PhpSpec\Matcher\RecordedEventsThatMatcher;

final class ProophExtension implements Extension
{
    public function load(ServiceContainer $container, array $params)
    {
        $container->define('gquemener.matchers.recorded_events_that', function ($c) {
            return new RecordedEventsThatMatcher($c->get('formatter.presenter'));
        }, ['matchers']);
    }
}
