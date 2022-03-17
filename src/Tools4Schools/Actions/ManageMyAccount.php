<?php

namespace Tools4Schools\SDK\Actions;

trait ManageMyAccount
{
    public function getMe()
    {
        return $this->get('me');
    }
}