<?php
    return [
        'login' => 'user/login',
        'registration' => 'user/registration',
        'signOut' => 'user/signOut',
        'profile' => 'user/profile',
        'chat/([0-9]+)/message' => 'chat/SaveMessage/$1',
        'chat/([0-9]+)/connect' => 'chat/Connecting/$1',
        '' => 'page/main'
    ];