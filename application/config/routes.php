<?php
    return [
        'login' => 'user/login',
        'registration' => 'user/registration',
        'signOut' => 'user/signOut',
        'profile' => 'user/profile',
        'user/([0-9]+)' => 'user/UserProfile/$1',
        'chat/([0-9]+)/message' => 'chat/SaveMessage/$1',
        'chat/([0-9]+)/connect' => 'chat/Connecting/$1',
        'addPost' => 'post/addPost',
        'suggestPost' => 'page/addPost',
        'messages' => 'page/messages',
        'publish/([0-9]+)' => 'post/publishPost/$1',
        'savePostImages' => 'post/savePostImages',
        'event/([0-9]+)' => 'page/main/$1',
        'addComment/([0-9]+)' => 'post/addComment/$1',
        'changeAvatar' => 'user/changeAvatar',
        'changeUserProfile' => 'user/changeUserProfile',
        'changeTheme' => 'user/changeTheme',

        'adminPanel/users' => 'admin/users',
        'adminPanel/themes' => 'admin/themes',
        'adminPanel' => 'admin/adminPanel',
        'changeUserRole/([0-9]+)' => 'admin/ChangeUserRole/$1',
        'deleteUser/([0-9]+)' => 'admin/deleteUser/$1',
        'addTheme' => 'admin/addTheme',
        'changeStandartTheme' => 'admin/changeStandartTheme',

        '' => 'page/main/1'
    ];