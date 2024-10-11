<?php

declare(strict_types=1);

namespace Zodimo\KindErrors;

use Zodimo\KindErrors\Models\ErrorKindInterface;

/**
 * @template KINDS of array<string>
 * @template ARGS of array<string,mixed>
 *
 * @implements KindErrorInterface<KINDS,ARGS>
 */
class KindError implements KindErrorInterface
{
    /**
     * @var ErrorKindInterface<KINDS>
     */
    private ErrorKindInterface $errorkind;
    private string $message;

    /**
     * @var array<string,mixed>
     */
    private array $args;

    /**
     * @param ErrorKindInterface<KINDS> $errorKind
     * @param ARGS                      $args
     */
    public function __construct(ErrorKindInterface $errorKind, string $message, array $args = [])
    {
        $this->errorkind = $errorKind;
        $this->message = $message;
        $this->args = $args;
    }

    /**
     * @template _KINDS of array<string>
     * @template _ARGS of array<string,mixed>
     *
     * @param ErrorKindInterface<_KINDS> $errorKind
     * @param _ARGS                      $args
     *
     * @return KindError<_KINDS,_ARGS>
     */
    public static function create(ErrorKindInterface $errorKind, string $message, array $args = []): KindError
    {
        return new self($errorKind, $message, $args);
    }

    public function getErrorKind(): ErrorKindInterface
    {
        return $this->errorkind;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return ARGS
     */
    public function getArgs(): array
    {
        return $this->args;
    }
}
