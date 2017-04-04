<?php

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = array(
            array(
                'email'    => 'Denis_U@inbox.ru',
                'password'    => '1111',
                'name'    => 'Denis',
                'surname'    => 'Kuchevskyi',
                'phone'    => '+38(097)591-48-10',
                'address'    => 'Moskalenka 40/8',
                'about_me'    => '...',
                'birthday' => date('Y-m-d','1986-11-02'),
            )
        );

        $users = $this->table('users');
        $users->insert($data)
            ->save();
    }
}
