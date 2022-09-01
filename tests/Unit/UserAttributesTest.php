<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserAttributesTest extends TestCase
{
    public function test_check_courses()
    {
        $user = new User();

        $user->graduation_year = 2023;
        $this->assertEquals(4, $user->course);

        $user->graduation_year = 2024;
        $this->assertEquals(3, $user->course);

        $user->graduation_year = 2025;
        $this->assertEquals(2, $user->course);

        $user->graduation_year = 2026;
        $this->assertEquals(1, $user->course);
    }

    public function test_check_semester()
    {
        $user = new User();

        $user->graduation_year = 2023;
        $this->assertEquals(7, $user->semester);
    }
}
