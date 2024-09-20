<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class ClearDatabaseController extends Controller
{
    //
    function index(){
        return view('admin.clear-database.index');
    }

    function clearDatabase() {
        try {
            // wipe database
            Artisan::call('migrate:fresh');
            // seed default data
            Artisan::call('db:seed', ['--class' => 'RolePermissionSeeder']);
            Artisan::call('db:seed', ['--class' => 'AdminSeeder']);
            Artisan::call('db:seed', ['--class' => 'SiteSettingSeeder']);
            Artisan::call('db:seed', ['--class' => 'MenuSeeder']);
            Artisan::call('db:seed', ['--class' => 'PaymentSettingSeeder']);

            // delete files
            $this->deleteFiles();

            return response(['message' => 'Database wiped successfully!']);

        } catch(\Exception $e) {
            throw $e;
        }
    }

    function deleteFiles() : void {
        $path = public_path('uploads');
        $allFlies = File::allFiles($path);

        foreach($allFlies as $file) {
            $filename = $file->getFilename();

            File::delete($filename);
        }
    }

}
