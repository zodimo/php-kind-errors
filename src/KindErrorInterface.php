<?php

declare(strict_types=1);

namespace KindErrors;

use UnitEnum;

/**
 * @template KIND of UnitEnum
 */
interface KindErrorInterface
{
    /**
     * @return KIND
     */
    public function getKind(): UnitEnum;

    public function getMessage(): string;

    /**
     * @return array<string,mixed>
     */
    public function getContext(): array;
}
