<?php

declare(strict_types=1);

namespace KindErrors;

class ErrorContext
{
    /**
     * @var array<string,mixed>
     */
    private array $context;

    private function __construct()
    {
        $this->context = [];
    }

    public static function create(): ErrorContext
    {
        return new self();
    }

    /**
     * @param mixed $value
     */
    public function set(string $name, $value): ErrorContext
    {
        $this->context[$name] = $value;

        return $this;
    }

    /**
     * @template VALUE of mixed
     *
     * @param null|VALUE $default
     *
     * @return VALUE
     */
    public function get(string $name, $default = null)
    {
        return $this->context[$name] ?? $default;
    }

    public function has(string $name): bool
    {
        return isset($this->context[$name]);
    }

    /**
     * @return array<string,mixed>
     */
    public function unwrapContext(): array
    {
        return $this->context;
    }
}
