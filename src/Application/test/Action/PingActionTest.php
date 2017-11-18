<?php

namespace ApplicationTest\Action;

use Application\Action\PingAction;
use Interop\Http\ServerMiddleware\DelegateInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class PingActionTest extends TestCase
{
    public function testResponse()
    {
        $pingAction = new PingAction();

        /** @var ServerRequestInterface $serverRequest */
        $serverRequest = $this->prophesize(ServerRequestInterface::class)->reveal();

        /** @var DelegateInterface $delegator */
        $delegator = $this->prophesize(DelegateInterface::class)->reveal();

        $response = $pingAction->process(
            $serverRequest,
            $delegator
        );

        $json = json_decode((string) $response->getBody());

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertTrue(isset($json->ack));
    }
}
