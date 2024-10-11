<?php

declare(strict_types=1);

namespace Zodimo\KindErrors;

/**
 * @template NAMESPACE_KINDS of array<string>
 */
class KindErrorService
{
    /**
     * @var ErrorKindNamespaceInterface<NAMESPACE_KINDS>
     */
    private ErrorKindNamespaceInterface $errorKindNamespace;

    /**
     * @param ErrorKindNamespaceInterface<NAMESPACE_KINDS> $errorKindNamespace
     */
    public function __construct(ErrorKindNamespaceInterface $errorKindNamespace)
    {
        $this->errorKindNamespace = $errorKindNamespace;
    }

    /**
     * @template ARGS of array<string,mixed>
     *
     * @param value-of<NAMESPACE_KINDS> $kind
     * @param ARGS                      $args
     *
     * @return KindError<NAMESPACE_KINDS,ARGS>
     */
    public function createErrorUnsafe(string $kind, string $message, array $args = []): KindError
    {
        $errorKind = $this->errorKindNamespace->createErrorKindUnsafe($kind);

        return new KindError($errorKind, $message, $args);
    }
}
