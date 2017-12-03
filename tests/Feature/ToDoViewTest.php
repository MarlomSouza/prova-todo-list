<?php

namespace Tests\Feature;

use Tests\TestCase;
use TodoList\Todo;
use TodoList\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;;

use Illuminate\Foundation\Testing\RefreshDatabase;

class ToDoViewTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateAToDo()
    {
        $category = factory(Category::class)->create(["name" => 'casa']);
        $category->save();
        $todo = factory(Todo::class)->create(["titulo" => 'titulo3', "category_id" =>$category->id ]);
        $todo->save();
        $this->get('/Todo')->assertSeeText('titulo3');
    }
}