<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /*表示されたタスクの件数が正しいこと*/
    public function testReadyListOnly()
    {
        \App\Models\Task::factory(3)->ready()->create();
        \App\Models\Task::factory(2)->doing()->create();

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewHas('tasks');
        $tasks = $response->original['tasks'];

        $this->assertEquals(5, count($tasks));
    }

    /*ステータスが未着手のタスクのみ表示されていること*/
    public function testReadyListAll()
    {
        \App\Models\Task::factory(3)->ready()->create();

        $response = $this->get("/");
        $response->assertViewHas('tasks', function($tasks) {
            foreach ($tasks as $task) {
                if ($task->status !== 1) {
                    return false;
                }
            }
            return true;
        });
    }

    /*未着手のデータがないとき*/
    public function testReadyListNone()
    {
        \App\Models\Task::factory(3)->doing()->create();

        $response = $this->get("/");
        $response->assertStatus(200);

        $response->assertViewHas('tasks', null);
    }

    /*タスクテーブルにレコードがない場合は空で表示されること*/
    public function testListNone() {

        $response = $this->get("/");
        $response->assertStatus(200);

        $response->assertViewHas('tasks', null);
    }
}
