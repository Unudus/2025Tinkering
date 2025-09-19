<?php
namespace Tests\Feature\Services;

use Tests\TestCase;

class ShowTest extends TestCase
{

    public function test_unauthorised_user_get_correct_status():void
    {
        $this->markTestIncomplete("todo");
    }

    public function test_user_will_recieve_correct_status_when_resource_doesnt_exist():void
    {
        $this->markTestIncomplete("todo");
    }

    public function test_authenticated_user_cannot_view_unowned_resources():void
    {
        $this->markTestIncomplete("todo");
    }

    public function test_authenticated_user_gets_correct_payload():void
    {
        $this->markTestIncomplete("todo");
    }
}