<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Google\Cloud\Core\Timestamp;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index']);

Route::get('login', [UserController::class, 'login']);
Route::post('login', [UserController::class, 'doLogin']);
Route::get('register', [UserController::class, 'register']);
Route::post('register', [UserController::class, 'doRegister']);
Route::get('company', [UserController::class, 'company']);
Route::post('company', [UserController::class, 'CreateCompany']);
Route::post('jobs', [UserController::class, 'CreateJobs']);
Route::get('logout', [UserController::class, 'logout']);
Route::get('jobs', [UserController::class, 'jobs']);
Route::get('list-company', [UserController::class, 'CompanyList']);
Route::get('list-jobs', [UserController::class, 'JobsList']);

Route::get('/insert', function () {
    // $userRef = app('firebase.firestore')->database()->collection('users')->newDocument();
    // $userRef->set([
    //     'firstname' => 'Balram', 
    //     'lastname' => 'Kapoor',
    //     'loginFrom' => 'EMAIL',
    //     'isActive' => true,
    //     'creationDate' => new Timestamp(new DateTime())
    // ]);
    $firestore = app('firebase.firestore')
    ->database()
    ->collection('categories')
    ->where('userId', '==', 'qrJ3ycForhPmnmJaxQz5jICQXtC2')->snapshot();;
//     $reg = app('firebase.auth')->createUser(
//         [
//                  'email' => 'tester@gmail.com',                
//                 'password' => 'secret'
//         ]
//     );
dd($firestore);
    // $login = app('firebase.auth')->signInWithEmailAndPassword('brkapoor11@gmail.com', 'secret');
    // dd($login);
});