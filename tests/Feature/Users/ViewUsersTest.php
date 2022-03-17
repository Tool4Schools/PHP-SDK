<?php

namespace Tools4Schools\Tests\SDK\Feature\Users;

use Tools4Schools\Tests\SDK\TestCase;

class ViewUsersTest extends TestCase
{
    public function get_user_details_of_the_token_owner()
    {
        $me = User::me();
    }
}