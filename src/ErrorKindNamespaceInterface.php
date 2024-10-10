<?php

declare(strict_types=1);

namespace Zodimo\KindErrors;

use Zodimo\KindErrors\Models\ErrorKindInterface;

/**
 * @template KINDS of array<string>
 */
interface ErrorKindNamespaceInterface
{
    public function getName(): string;

    /**
     * @return KINDS
     */
    public function getErrorKinds(): array;

    public function includesKind(string $kind): bool;

    /**
     * @return ErrorKindInterface<KINDS>
     */
    public function createErrorKindUnsafe(string $kind): ErrorKindInterface;
}
