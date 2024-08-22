$observers = [
    [
        'eventname' => '\core\event\user_loggedin',
        'callback' => 'block_logincounter_observer::user_loggedin',
    ],
];
