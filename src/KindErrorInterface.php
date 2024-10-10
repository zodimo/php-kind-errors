<?php

declare(strict_types=1);

namespace Zodimo\KindErrors;

use Zodimo\BaseReturn\Option;
use Zodimo\KindErrors\Models\ErrorKindInterface;

interface KindErrorInterface
{
    public function hasParentError(): bool;

    /**
     * @return Option<ErrorKindInterface>
     */
    public function getParentError(): Option;

    public function getErrorKind(): ErrorKindInterface;

    public function getMessage(): string;
}
