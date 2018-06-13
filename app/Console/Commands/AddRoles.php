<?php

namespace App\Console\Commands;

use App\Role;
use Illuminate\Console\Command;

class AddRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roles:populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add all of the roles';

    protected $roles = [
        'admin',
        'company_admin',
        'employee',
        'candidate'
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('------------------------- START ADDING -------------------------');

        foreach ($this->roles as $role) {
            Role::firstOrNew([
                'name' => $role
            ])->save();
        }

        $this->info('------------------------- FINISHED -------------------------');
    }
}
