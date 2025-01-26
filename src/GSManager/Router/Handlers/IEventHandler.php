<?php

namespace GSManager\Router\Handlers;

use GSManager\Router\Router;

interface IEventHandler
{

    /**
     * Get events.
     *
     * @param string|null $name Filter events by name.
     * @return array
     */
    public function getEvents(?string $name): array;

    /**
     * Fires any events registered with given event-name
     *
     * @param Router $router Router instance
     * @param string $name Event name
     * @param array $eventArgs Event arguments
     */
    public function fireEvents(Router $router, string $name, array $eventArgs = []): void;

}