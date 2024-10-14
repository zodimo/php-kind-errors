<?php

declare(strict_types=1);

namespace Zodimo\KindErrors\Tests\Unit;

use KindErrors\ErrorContext;
use KindErrors\KindError;
use KindErrors\Tests\TestErrorKind;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class KindErrorTest extends TestCase
{
    public function testCanCreate(): void
    {
        $kind = TestErrorKind::ERROR_1;
        $message = 'error description';
        $kindError = KindError::create($kind, $message);
        $this->assertInstanceOf(KindError::class, $kindError);
        $this->assertEquals($kind, $kindError->getKind());
        $this->assertEquals($message, $kindError->getMessage());
        $this->assertInstanceOf(ErrorContext::class, $kindError->getContext());
    }

    public function testCanStringify(): void
    {
        $kindError = KindError::create(TestErrorKind::ERROR_1, 'error description');
        $expectedErrorAsString = 'KindError(KindErrors\Tests\TestErrorKind::ERROR_1): error description';
        $actualErrorAsString = (string) $kindError;
        $this->assertEquals($expectedErrorAsString, $actualErrorAsString);
    }
}
