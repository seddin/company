<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Department;

class DepartmentRelationshipTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_department_has_children()
    {
        $department = Department::factory()->create([
            'name' => 'Human Resources'
        ]);

        $child1 = Department::factory()->create([
            'name' => 'Recruiting', 
            'parent_id' => $department->id
        ]);

        $child2 = Department::factory()->create([
            'name' => 'Employee Relations', 
            'parent_id' => $department->id
        ]);

        $this->assertCount(2, $department->children);
    }

    public function test_a_department_has_a_parent()
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
