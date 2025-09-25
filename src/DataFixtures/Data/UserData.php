<?php

namespace App\DataFixtures\Data;

class UserData
{
    /** @return array<mixed> */
    public static function getUsers(): array
    {
        return [
            [
                'email' => 'admin@test.com',
                'username' => 'admin_test',
                'displayName' => 'Admin Test',
                'experienceLevel' => 'beginner',
                'bio' => 'I am an admin',
                'location' => 'London',
                'roles' => ['ROLE_ADMIN'],
            ],
            [
                'email' => 'john-hiker@test.com',
                'username' => 'john_hiker',
                'displayName' => 'John Hiker',
                'experienceLevel' => 'expert',
                'bio' => 'I am an expert hiker, since 1999',
                'location' => 'USA, NC, Greenville',
                'avatar' => 'https://i.pravatar.cc/150?u=a42918319210000',
            ],
            [
                'email' => 'sarah_trek@test.com',
                'username' => 'sarah_trek',
                'displayName' => 'sarah_trek',
                'experienceLevel' => 'intermediate',
                'avatar' => 'https://i.pravatar.cc/150?u=a4291831921dadzajk',
            ],
            [
                'email' => 'toto@test.com',
                'username' => 'toto_backpacking',
                'experienceLevel' => 'expert',
            ],
            [
                'email' => 'new_user@test.com',
                'username' => 'New_user',
                'experienceLevel' => 'beginner',
            ],
        ];
    }
}
