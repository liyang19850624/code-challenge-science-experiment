<?php

namespace CodeChallenge\ScienceExperiment\Tests;

use CodeChallenge\ScienceExperiment\CommonUtils;
use Mockery;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class CommonUtilsTest extends TestCase {

    public function testDate1() {
        $dateDiffer = new CommonUtils();
        $diffInDays = $dateDiffer->daysInDiff("02/06/1983", "22/06/1983");
        $this->assertEquals(19, $diffInDays);
    }

    public function testDate2() {
        $dateDiffer = new CommonUtils();
        $diffInDays = $dateDiffer->daysInDiff("04/07/1984", "25/12/1984");
        $this->assertEquals(173, $diffInDays);
    }

    public function testDate3() {
        $dateDiffer = new CommonUtils();
        $diffInDays = $dateDiffer->daysInDiff("03/01/1989", "03/08/1983");
        $this->assertEquals(1979, $diffInDays);
    }

}
