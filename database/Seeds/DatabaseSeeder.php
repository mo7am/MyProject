<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(guists::class);
        $this->call(messages::class);
        $this->call(rooms::class);
        $this->call(roomtypes::class);
        $this->call(staffDB::class);
        $this->call(states::class);

        $this->call(userrooms::class);
        $this->call(users::class);
        $this->call(usertypes::class);
        $this->call(Specialists::class);
        $this->call(Mobiles::class);
        $this->call(Service::class);
        $this->call(Staff_Service::class);

        $this->call(roleDB::class);
        $this->call(rolehaspermissionDB::class);
        $this->call(permissionDB::class);
        $this->call(model_has_permissionsDB::class);
        $this->call(model_has_rolesDB::class);

        $this->call(PostDB::class);
        $this->call(CommentDB::class);
    }
}
