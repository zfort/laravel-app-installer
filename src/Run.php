<?php

namespace ZFort\AppInstaller;

use ZFort\AppInstaller\Contracts\Runner;

class Run implements Runner
{
    protected $commands = [];

    public function artisan(string $command, array $arguments = []): Runner
    {
        $this->pushCommand(__FUNCTION__, $command, $arguments);

        return $this;
    }

    public function external(string $command, ...$arguments): Runner
    {
        $this->pushCommand(__FUNCTION__, $command, $arguments);

        return $this;
    }

    public function callable(callable $function, ...$arguments): Runner
    {
        $this->pushCommand(__FUNCTION__, $function, $arguments);

        return $this;
    }

    public function dispatch($job): Runner
    {
        $this->pushCommand(__FUNCTION__, $job);

        return $this;
    }

    public function dispatchNow($job): Runner
    {
        $this->pushCommand(__FUNCTION__, $job);

        return $this;
    }

    protected function pushCommand(string $type, $command, array $arguments = [])
    {
        $this->commands[] = compact('type', 'command', 'arguments');
    }

    public function getCommands(): array
    {
        return $this->commands;
    }
}
