<?php

declare(strict_types=1);

namespace Zodimo\KindErrors;

/**
 * @template NAMESPACE_KINDS of array<string>
 */
class KindErrorNamespaceService
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
     * @param value-of<NAMESPACE_KINDS> $kind
     *
     * @return KindError<NAMESPACE_KINDS>
     */
    public function createErrorUnsafe(string $kind, string $message): KindError
    {
        $errorKind = $this->errorKindNamespace->createErrorKindUnsafe($kind);

        return new KindError($errorKind, $message);
    }
}
