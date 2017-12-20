<?php declare(strict_types=1);

require_once('../src/common/MemorySession.php');

use PHPUnit\Framework\TestCase;

/*
 * Specifies the behavior for sessions
 * Only test memory version for now
 * TODO: Test raw php version
 * 
 * @author Isaac Bowen bowen.isaac@gmail.com
 */
const ANY_KEY = 'foo';
const ANY_VALUE = 'bar';

final class SessionTest extends TestCase {

	public function setUp(): void {
		$this->session = new MemorySession();
	}

    public function testCanGetValuesAfterSettting(): void {
        $this->session->set(ANY_KEY, ANY_VALUE);
        $this->assertEquals($this->session->get(ANY_KEY), ANY_VALUE);
    }

    public function testContainsKeyReturnsTrueAfterSettingValue(): void {
        $this->session->set(ANY_KEY, ANY_VALUE);
        $this->assertTrue($this->session->containsKey(ANY_KEY));
    }

}