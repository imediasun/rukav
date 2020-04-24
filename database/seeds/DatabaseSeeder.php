<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.

     *
     * @return void
     */
    public function run()
    {
        $this->call(CompaniesTableSeeder::class);
        $this->call(CategoriesTableSeederSecondEdition::class);
        $this->call(UsersTableSeeder::class);
		$this->call(PermissionItemTableSeeder::class);
		$this->call(RolesAndPermissionsSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(CustomersTableSeeder::class);

        $this->call(ManagersTableSeeder::class);
        $this->call(BadgesTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(LogosTableSeeder::class);

        //$this->call(LanguagesTableSeeder::class);
    }
}
