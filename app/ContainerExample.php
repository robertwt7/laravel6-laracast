<?php

namespace app;

// Service container is bind at AppServiceProvider by default, but even if its not bind
// Laravel will try to find the class available
class ContainerExample
{
    // Laravel will try to find the initiated variable if it can be instantiated by a class
    protected $collaborator;

    public function __construct(Collaborator $collaborator)
    {
        $this->collaborator = $collaborator;
    }
}
