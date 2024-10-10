<?php

declare(strict_types=1);

namespace Zodimo\KindErrors\Models;

use Zodimo\KindErrors\ErrorKindNamespaceInterface;

/**
 * @template KINDS of array<string>
 */
interface ErrorKindInterface
{
    public function getKind(): string;

    /**
     * @return ErrorKindNamespaceInterface<KINDS>
     */
    public function getNamespace(): ErrorKindNamespaceInterface;
}
