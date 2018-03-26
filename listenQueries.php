<?php

class QueryTimeCollector implements MongoDB\Driver\Monitoring\CommandSubscriber
{
    public $filename;
    public $events = [];

    public function __construct($filename) {
        $this->filename = rtrim($filename, '.php') . '.txt';
    }

    public function commandStarted(MongoDB\Driver\Monitoring\CommandStartedEvent $event)
    {
        file_put_contents($this->filename, json_encode($event->getCommand()), FILE_APPEND);
    }

    public function commandSucceeded(MongoDB\Driver\Monitoring\CommandSucceededEvent $event)
    {
        //
    }

    public function commandFailed(MongoDB\Driver\Monitoring\CommandFailedEvent $event)
    {
        //
    }
}
