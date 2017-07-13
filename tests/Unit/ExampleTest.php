<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_custom_trim()
    {
    	$spc = "АБВ abc123!  ■";
    	$trimed = custom_trim($spc);

    	$this->assertEquals("abc123!",$trimed);
    }
}
