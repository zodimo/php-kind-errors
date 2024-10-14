<?php

declare(strict_types=1);

namespace KindErrors;

use UnitEnum;

/**
 * @template KIND of UnitEnum
 *
 * @implements KindErrorInterface<KIND>
 */
class KindError implements KindErrorInterface
{
    /**
     * @var KIND
     */
    private UnitEnum $kind;
    private string $message;

    private ErrorContext $context;

    /**
     * @param KIND $kind
     */
    private function __construct(UnitEnum $kind, string $message, ErrorContext $context)
    {
        $this->kind = $kind;
        $this->message = $message;
        $this->context = $context;
    }

    public function __toString(): string
    {
        $kindClass = get_class($this->kind);
        $kindKey = $this->kind->name;
        $message = $this->getMessage();
        $kindAsString = "{$kindClass}::{$kindKey}";

        return "KindError({$kindAsString}): {$message}";
    }

    /**
     * @template _KIND of UnitEnum
     *
     * @param _KIND $kind
     *
     * @return KindError<_KIND>
     */
    public static function create(UnitEnum $kind, string $message, ?ErrorContext $context = null): KindError
    {
        $context ??= ErrorContext::create();

        return new self($kind, $message, $context);
    }

    public function getKind(): UnitEnum
    {
        return $this->kind;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getContext(): ErrorContext
    {
        return $this->context;
    }
}
