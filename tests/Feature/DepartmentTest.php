<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

use App\Models\Department;

use Illuminate\Foundation\Testing\RefreshDatabase;


class DepartmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_department_can_be_created()
    {
        $department = Department::factory()->create([
            'name' => 'Human Resources'
        ]);
 
        $this->assertDatabaseHas('departments', ['name' => 'Human Resources']);
    }

    public function test_a_department_can_have_a_parent_department()
    {
        $parent = Department::factory()->create([
            'name' => 'Human Resources'
        ]);

        $child = Department::factory()->create([
            'name' => 'Recruiting', 
            'parent_id' => $parent->id
        ]);
        
        $this->assertEquals($parent->id, $child->parent->id);
    }
}
