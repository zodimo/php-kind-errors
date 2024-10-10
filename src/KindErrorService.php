<?php

declare(strict_types=1);

namespace Zodimo\KindErrors;

use Zodimo\BaseReturn\Option;

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
     * @param value-of<NAMESPACE_KINDS> $kind
     */
    public function createErrorUnsafe(string $kind, string $message, ?KindErrorInterface $parentError = null): KindError
    {
        if (null == $parentError) {
            $parentErrorOption = Option::none();
        } else {
            $parentErrorOption = Option::some($parentError);
        }
        $errorKind = $this->errorKindNamespace->createErrorKindUnsafe($kind);

        return new KindError($errorKind, $message, $parentErrorOption);
    }
}
