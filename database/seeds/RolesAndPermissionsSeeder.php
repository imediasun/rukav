<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
    // Reset cached roles and permissions
    app()['cache']->forget('spatie.permission.cache');

    // create permissions
    //Permission::create(['name' => 'view_training_applications','guard_name'=>'web']);
    //Permission::create(['name' => 'confirmation_of_applications_for_training','guard_name'=>'web']);
    //Permission::create(['name' => 'removing_applications_for_training_in_the_archive_and_restoring_from_it','guard_name'=>'web']);
    //Permission::create(['name' => 'access_to_application_display_rules','guard_name'=>'web']);
    // create roles and assign created permissions

    //$role = Role::create(['name' => 'Manager','description'=>'Менеджер']);
    /*$role->givePermissionTo(['start','moderator','contacter','notification','manager','manager_without_emails',
	'message_notifications','create_request_notification','request_reply_notification','property_added_notification',
	'property_edited_notification','admins',
	'permissions','admins_view']);*/
    //$role->givePermissionTo(['view_training_applications', 'confirmation_of_applications_for_training']);

    //$role = Role::create(['name' => 'admin']);
    //$role->givePermissionTo(['start','manager_on_email']);

    //$role = Role::create(['name' => 'editor']);
    //$role->givePermissionTo(['start','manager_on_article', 'manager_on_estate', 'manager_on_category']);
	
	   DB::table('model_has_roles')->insert([

           /*1*/
           [

               'role_id' => 1,
               'model_type'=>'App\User',
			   'model_id'=>1
           ],
		    [

               'role_id' => 2,
               'model_type'=>'App\User',
			   'model_id'=>2
           ],
           [

               'role_id' => 3,
               'model_type'=>'App\User',
               'model_id'=>3
           ],
           [

               'role_id' => 4,
               'model_type'=>'App\User',
               'model_id'=>5
           ],
           [

               'role_id' => 5,
               'model_type'=>'App\User',
               'model_id'=>5
           ],
           [

               'role_id' => 6,
               'model_type'=>'App\User',
               'model_id'=>4
           ],
           [

               'role_id' => 5,
               'model_type'=>'App\User',
               'model_id'=>4
           ],
           [

               'role_id' => 5,
               'model_type'=>'App\User',
               'model_id'=>1
           ],
		]);

    }
}