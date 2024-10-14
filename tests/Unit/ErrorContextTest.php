<?php

declare(strict_types=1);

namespace Zodimo\KindErrors\Tests\Unit;

use KindErrors\ErrorContext;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class ErrorContextTest extends TestCase
{
    public function testCanCreate(): void
    {
        $context = ErrorContext::create();
        $this->assertInstanceOf(ErrorContext::class, $context);
    }

    public function testCanSet(): void
    {
        $key = 'error';
        $value = 'anything';
        $context = ErrorContext::create();
        $context->set($key, $value);
        $this->assertSame($value, $context->get($key));
    }

    public function testHasWithValue(): void
    {
        $key = 'error';
        $value = 'anything';
        $context = ErrorContext::create();
        $context->set($key, $value);
        $this->assertTrue($context->has($key));
    }

    public function testHasWithoutValue(): void
    {
        $context = ErrorContext::create();

        $this->assertFalse($context->has('random'));
    }

    public function testCanUnUnwrapContext(): void
    {
        $key = 'error';
        $value = 'anything';
        $context = ErrorContext::create();
        $context->set($key, $value);

        $expectedContext = [
            $key => $value,
        ];
        $actualContext = $context->unwrapContext();
        $this->assertEquals($expectedContext, $actualContext);
    }
}
