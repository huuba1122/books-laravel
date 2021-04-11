<?php

namespace App\Providers;

use App\Policies\AuthorPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\CustomerPolicy;
use App\Policies\OrderPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\ProductPolicy;
use App\Policies\PublisherPolicy;
use App\Policies\RolePolicy;
use App\Policies\StatusPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Products
        Gate::define('list_product',[ProductPolicy::class,'view']);
        Gate::define('add_product',[ProductPolicy::class,'create']);
        Gate::define('edit_product',[ProductPolicy::class,'update']);
        Gate::define('delete_product',[ProductPolicy::class,'delete']);

        // categories
        Gate::define('list_category',[CategoryPolicy::class,'view']);
        Gate::define('add_category',[CategoryPolicy::class,'create']);
        Gate::define('edit_category',[CategoryPolicy::class,'update']);
        Gate::define('delete_category',[CategoryPolicy::class,'delete']);

        // Author
        Gate::define('list_author', [AuthorPolicy::class,'view']);
        Gate::define('add_author', [AuthorPolicy::class,'create']);
        Gate::define('edit_author', [AuthorPolicy::class,'update']);
        Gate::define('delete_author', [AuthorPolicy::class,'delete']);

        //Publisher
        Gate::define('list_publisher',[PublisherPolicy::class,'view']);
        Gate::define('add_publisher',[PublisherPolicy::class,'create']);
        Gate::define('edit_publisher',[PublisherPolicy::class,'update']);
        Gate::define('delete_publisher',[PublisherPolicy::class,'delete']);

        // Users
        Gate::define('list_user',[UserPolicy::class,'view']);
        Gate::define('add_user',[UserPolicy::class,'create']);
        Gate::define('edit_user',[UserPolicy::class,'update']);
        Gate::define('delete_user',[UserPolicy::class,'delete']);

        // Roles
        Gate::define('list_role',[RolePolicy::class,'view']);
        Gate::define('add_role',[RolePolicy::class,'create']);
        Gate::define('edit_role',[RolePolicy::class,'update']);
        Gate::define('delete_role',[RolePolicy::class,'delete']);

        // Permissions
        Gate::define('list_permission',[PermissionPolicy::class, 'view']);
        Gate::define('add_permission',[PermissionPolicy::class, 'create']);
        Gate::define('edit_permission',[PermissionPolicy::class, 'update']);
        Gate::define('delete_permission',[PermissionPolicy::class, 'delete']);

        //Customers
        Gate::define('list_customer',[CustomerPolicy::class, 'view']);
        Gate::define('add_customer',[CustomerPolicy::class, 'create']);
        Gate::define('edit_customer',[CustomerPolicy::class, 'update']);
        Gate::define('delete_customer',[CustomerPolicy::class, 'delete']);

        // Orders
        Gate::define('list_order',[OrderPolicy::class,'view']);
        Gate::define('add_order',[OrderPolicy::class,'create']);
        Gate::define('edit_order',[OrderPolicy::class,'update']);
        Gate::define('delete_order',[OrderPolicy::class,'delete']);

        // Statuses
        Gate::define('list_status',[StatusPolicy::class,'view']);
        Gate::define('add_status',[StatusPolicy::class,'create']);
        Gate::define('edit_status',[StatusPolicy::class,'update']);
        Gate::define('delete_status',[StatusPolicy::class,'delete']);
    }
}
