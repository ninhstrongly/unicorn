<?php

return [
    /*
     * The log profile which determines whether a request should be logged.
     * It should implement `LogProfile`.
     */
    'add_user' => \Unicorn\Author\Http\Requests\AddUserRequest::class,
    'edit_user' => \Unicorn\Author\Http\Requests\EditUserRequest::class,
];
