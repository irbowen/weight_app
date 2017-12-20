<?php declare(strict_types = 1);

require_once('../src/common/LiftCollection.php');

use PHPUnit\Framework\TestCase;

/*
 * Specifies the full set of lifts that this system will track
 * More to be added later
 * 
 * @author Isaac Bowen bowen.isaac@gmail.com
 */
final class LiftTypesTest extends TestCase {

    public function setUp(): void {
        $this->liftCollection = new LiftCollection();
    }

    public function testSquatValuesCorrect(): void {
        $this->assertEquals('squat', 
            $this->liftCollection->getLift(SQUAT)->getShortName());
        $this->assertEquals('Squat', 
            $this->liftCollection->getLift(SQUAT)->getFullName());
    }

    public function testBenchPressValuesCorrecct(): void {
        $this->assertEquals('bench', 
            $this->liftCollection->getLift(BENCH)->getShortName());
        $this->assertEquals('Bench Press', 
            $this->liftCollection->getLift(BENCH)->getFullName());
    }

    public function testGetAllLiftShortNamesReturnsAllValues(): void {
        $allLifts = $this->liftCollection->getAllLiftShortNames();
        $this->assertContains(SQUAT, $allLifts);
        $this->assertContains(BENCH, $allLifts);
    }

}