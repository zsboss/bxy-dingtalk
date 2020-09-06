<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace HyperfTest\Cases;

use Bxy\Dingtalk\ApplicationFactory;
use Bxy\Dingtalk\RebotService;
use Hyperf\Utils\ApplicationContext;
use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class RebotTest extends AbstractTestCase
{
    public function testSendText()
    {
         $data=make(ApplicationFactory::class)->sendText('[业务报警]我就是我, 是不一样的烟火');
         $this->assertEquals( [
             'errcode' => 0,
             'errmsg' => 'ok'
         ],json_decode($data,true));
//        $this->assertTrue(true);
//
//        $this->assertTrue(extension_loaded('swoole'));
    }
}
