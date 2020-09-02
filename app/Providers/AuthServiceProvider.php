<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Traits\HasRoles as Userrole;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('isSuperadmin', function($user){

            if($user->hasRole('Superadmin')){
                //print 'Access';//
                return $user->hasRole('Superadmin');
            }
            else{
                //return 'No Accessss';
                abort(403, 'Unauthorized action.');
            }         
                  
        }); 

        $gate->define('checkrole_Superadmin', function($user){
            if($user->hasRole('Superadmin')){
                //print 'Access';
                return $user->hasRole('Superadmin');
            }     
                  
        }); 

        $gate->define('checkrole_Univadmin', function($user){
            if($user->hasRole('Universityadmin')){
                //print 'Access';
                return $user->hasRole('Universityadmin');
            }     
                  
        });

        $gate->define('checkrole_SNO', function($user){
            if($user->hasRole('SNO')){
                //print 'Access';
                return $user->hasRole('SNO');
            }                  
        });

        $gate->define('checkrole_TP', function($user){
            if($user->hasRole('TP')){
                //print 'Access';
                return $user->hasRole('TP');
            }                  
        });
        
        
        







    }
}
