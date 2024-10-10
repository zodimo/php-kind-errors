<?php

declare(strict_types=1);

namespace Zodimo\KindErrors;

use Zodimo\KindErrors\Models\ErrorKindInterface;

/**
 * @template KINDS of array<string>
 */
interface KindErrorInterface
{
    /**
     * @return ErrorKindInterface<KINDS>
     */
    public function getErrorKind(): ErrorKindInterface;

    public function getMessage(): string;
}
