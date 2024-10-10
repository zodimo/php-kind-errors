<?php

declare(strict_types=1);

namespace Zodimo\KindErrors;

use Zodimo\KindErrors\Models\ErrorKindInterface;

/**
 * @template KINDS of array<string>
 *
 * @implements KindErrorInterface<KINDS>
 */
class KindError implements KindErrorInterface
{
    /**
     * @var ErrorKindInterface<KINDS>
     */
    private ErrorKindInterface $errorkind;
    private string $message;

    /**
     * @param ErrorKindInterface<KINDS> $errorKind
     */
    public function __construct(ErrorKindInterface $errorKind, string $message)
    {
        $this->errorkind = $errorKind;
        $this->message = $message;
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
