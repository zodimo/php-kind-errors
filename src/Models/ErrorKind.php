<?php

declare(strict_types=1);

namespace Zodimo\KindErrors\Models;

use RuntimeException;
use Zodimo\KindErrors\ErrorKindNamespaceInterface;

/**
 * @template KINDS of array<string>
 *
 * @implements ErrorKindInterface<KINDS>
 */
class ErrorKind implements ErrorKindInterface
{
    private string $kind;

    /**
     * @var ErrorKindNamespaceInterface<KINDS>
     */
    private ErrorKindNamespaceInterface $namespace;

    /**
     * @param ErrorKindNamespaceInterface<KINDS> $namespace
     */
    private function __construct(string $kind, ErrorKindNamespaceInterface $namespace)
    {
        $this->kind = $kind;
        $this->namespace = $namespace;
    }

    /**
     * @template _KINDS of array<string>
     *
     * @param value-of<_KINDS>                    $kind
     * @param ErrorKindNamespaceInterface<_KINDS> $namespace
     *
     * @return ErrorKind<_KINDS>
     *
     * @throws RuntimeException
     */
    public static function createUnsafe(string $kind, ErrorKindNamespaceInterface $namespace): ErrorKind
    {
        if (!$namespace->includesKind($kind)) {
            throw new RuntimeException("Namepace[{$namespace->getName()}] does not include kind[{$kind}]");
        }

        return new self($kind, $namespace);
    }

    public function getKind(): string
    {
        return $this->kind;
    }

    public function getNamespace(): ErrorKindNamespaceInterface
    {
        return $this->namespace;
    }
}
