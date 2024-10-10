<?php

declare(strict_types=1);

namespace Zodimo\KindErrors;

use Zodimo\BaseReturn\Option;
use Zodimo\KindErrors\Models\ErrorKindInterface;

class KindError implements KindErrorInterface
{
    /**
     * @var Option<ErrorKindInterface>
     */
    private Option $parentError;

    private ErrorKindInterface $errorkind;
    private string $message;

    /**
     * @param Option<ErrorKindInterface> $parentError
     */
    public function __construct(ErrorKindInterface $errorKind, string $message, Option $parentError)
    {
        $this->errorkind = $errorKind;
        $this->message = $message;
        $this->parentError = $parentError;
    }

    public function hasParentError(): bool
    {
        return $this->parentError->isSome();
    }

    /**
     * @return Option<ErrorKindInterface>
     */
    public function getParentError(): Option
    {
        return $this->parentError;
    }

    public function getErrorKind(): ErrorKindInterface
    {
        return $this->errorkind;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
