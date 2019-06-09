        
        Role::create(['name'=>'Admin']);
        Role::create(['name'=>'Store Admin']);
        Role::create(['name'=>'Store Franchise']);
        
        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'soft delete user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'view user']);

        Permission::create(['name' => 'add categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'soft delete categories']);
        Permission::create(['name' => 'delete categories']);
        Permission::create(['name' => 'view categories']);

        Permission::create(['name' => 'add tags']);
        Permission::create(['name' => 'edit tags']);
        Permission::create(['name' => 'soft delete tags']);
        Permission::create(['name' => 'delete tags']);
        Permission::create(['name' => 'view tags']);

        Permission::create(['name' => 'add store']);
        Permission::create(['name' => 'edit store']);
        Permission::create(['name' => 'soft delete store']);
        Permission::create(['name' => 'delete store']);
        Permission::create(['name' => 'view store']);

        Permission::create(['name' => 'add franchise']);
        Permission::create(['name' => 'edit franchise']);
        Permission::create(['name' => 'soft delete franchise']);
        Permission::create(['name' => 'delete franchise']);
        Permission::create(['name' => 'view franchise']);

        Permission::create(['name' => 'add promotion']);
        Permission::create(['name' => 'edit promotion']);
        Permission::create(['name' => 'soft delete promotion']);
        Permission::create(['name' => 'delete promotion']);
        Permission::create(['name' => 'view promotion']);
        
        Permission::create(['name' => 'add faq']);
        Permission::create(['name' => 'edit faq']);
        Permission::create(['name' => 'soft delete faq']);
        Permission::create(['name' => 'delete faq']);
        Permission::create(['name' => 'view faq']);

        Permission::create(['name' => 'edit profile']);
        Permission::create(['name' => 'view profile']);

 
        //  Admin
        $rolea = Role::findbyId(1);
        $permissiona = Permission::get();
        foreach($permissiona as $permit)
        {
            $rolea->givePermissionTo($permit);
            $permit->assignRole($rolea);
        }



        //Store
        $roleb = Role::findbyId(2);
        $permissionb = Permission::whereNotIn('id',[4,9,14,19,24,29,34])->get();
        foreach($permissionb as $permit)
        {
            $roleb->givePermissionTo($permit);
            $permit->assignRole($roleb);
        }

        
        // Franchise
        $rolec = Role::findbyId(3);
        $permissionc = Permission::whereNotIn('id',[1,2,3,4,5,7,8,9,12,13,14,16,17,18,19,20,22,23,24,27,28,29,33,34])->get();
       foreach($permissionc as $permit)
        {
            $rolec->givePermissionTo($permit);
            $permit->assignRole($rolec);
        }



        <!-- Assign Permission to Model  -->
        
        //      Admin       //
        $usera = User::where('role_id',1)->first();   
        $permissiona = Permission::get();
        foreach($permissiona as $permit)
        {
            $usera->givePermissionTo($permit->name);
        }


        //      Store Admin       //
        $usera = User::where('role_id',2)->first();   
        $permissionb = Permission::whereNotIn('id',[4,9,14,19,24,29,34])->get();
        foreach($permissionb as $permit)
        {
            $usera->givePermissionTo($permit->name);
        }

        //      Store Franchise       //
        $usera = User::where('role_id',3)->first();   
        $permissionc = Permission::whereNotIn('id',[1,2,3,4,5,7,8,9,12,13,14,16,17,18,19,20,22,23,24,27,28,29,33,34])->get();
        foreach($permissionc as $permit)
        {
            $usera->givePermissionTo($permit->name);
        }

        <!-- Assign Roles to Model  -->

        //      Admin       //
        $usera = User::where('role_id',1)->first();   
        $rolea = Role::where('id',1)->first();
        $usera->assignRole($rolea);
            //     Store Admin       //
        $userb = User::where('role_id',2)->first();   
        $roleb = Role::where('id',2)->first();
        $userb->assignRole($roleb);
            //      Store Franchise       //
        $userc = User::where('role_id',3)->first();   
        $rolec = Role::where('id',3)->first();
        $userc->assignRole($rolec);


        <!-- To check user's assigned permissions  -->

        
        return $getuser->permissions;