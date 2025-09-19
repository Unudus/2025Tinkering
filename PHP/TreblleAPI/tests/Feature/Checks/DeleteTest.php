<?php
namespace Tests\Feature\Checks;

use Tests\TestCase;

class DeleteTest extends TestCase
{

    public function test_unauthorised_user_get_correct_status():void
    {
        $this->markTestIncomplete("todo");
    }

    public function test_authenticated_user_cannot_delete_unowned_resource():void
    {
        $this->markTestIncomplete("todo");
    }

    public function test_autenticated_user_can_delete_owned_resource():void
    {
        $this->markTestIncomplete("todo");
    }
}