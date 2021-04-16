<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\loginctr;
use App\Http\Controllers\UsersController;



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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
// Route::get('/', function () {
//     return view('first');
// });

// project final
Route::post("login",[UsersController::class,'login']);
Route::post("register",[UsersController::class,'register']);
Route::get("product",[ProductController::class,'index']);
Route::get("product/details/{name}",[ProductController::class,'details']);
Route::get("search",[ProductController::class,'search']);
Route::post("add_to_cart",[ProductController::class,'addtocart']);
Route::get("cartlist",[ProductController::class,'cartlist']);
Route::get("ordernow",[ProductController::class,'orderNow']);
Route::post("orderplace",[ProductController::class,'orderPlace']);
Route::get("myorder",[ProductController::class,'myorder']);
Route::get("removeCart/{id}",[ProductController::class,'removeCart']);
Route::get("cancleorder/{id}",[ProductController::class,'cancleorder']);
Route::view('register','register');

Route::get("login",function(){
    return view('login');
});
Route::get("logout",function(){
    Session::forget('user');
    return redirect('login');
});















Route::get('first/{name}/{post}',function($name, $post){
return view('first',['name'=>$name,'post'=>$post]);
});
Route::get('param/{id}/{name?}', function($id , $name='madhur'){
    return 'madhur'.' '.$id.' ' .$name;
});
// Route::get('constrain/{name}',function($name){
//     return $name;
// })->where('name','[A-Za-z ]+');


// Route::get('constrain/{age}',function($age){
//     return $age;
// })->where('age','[0-9]+');

Route::get('constrain/{name}/{age}',function($name,$age){
    return  $name . ' '.$age;
// })->where('name', '[A-Za-z ]+')->where('age', '[0-9]+');
})->where(['name','[A-Za-z]+'],['age','[0-9]+']);
// ->where(['age' => '[0-9]+', 'name' => '[a-z]+']);

Route::get('constrain1/{name}',function($name){
    return  $name ;
})->whereAlphaNumeric('name');

Route::get('constrain2/{name}',function($name){
    return  $name ;
})->whereAlpha('name');
// redirecting method
// Route::redirect('info','index');

Route::get('index',function(){
    return 'from redirect abc';
});
// Route::get('info',function(){
//     return redirect()->to(url('index'));
//     });
Route::get('info',function(){
    return redirect('index');
});

Route::get('constrain3/name',function(){
        return  "anything" ;
})->name('constrain3');
    
Route::get('useit',function(){
        return redirect()->route('constrain3');
});
Route::get('usewelcome',function(){
            return redirect()->route('welcome');
});

Route::get('product/name/details', function(){
    //return 'product information';
    return view('product_details');
    })->name('profile');
Route::get('direct', function(){
        //return redirect()->route('profile');
        return view('product');
});
Route::get('redirection',function(){
    return redirect()->to(url('index'));
});      

//user controller
Route::get("user/{id}/{name}",[UserController::class,'show']);
Route::get("user-about",[UserController::class,'about']);
// Route::get("user-about",'App\Http\Controllers\UserController@about');
Route::get("user-dynamic/{name}/{sub}",[UserController::class,'dynamic']);
Route::get("user-dynamic1/{name?}/{sub?}",[UserController::class,'dynamic1']);

Route::get("method",[ProductController::class,'index']);
Route::get("method/about",[ProductController::class,'about']);
Route::get("method/about",[ProductController::class,'show']);

Route::get('directive',function(){
    return view('directive');
});
Route::get('app',function(){
    return view('layout.app');
});
Route::get('child',function(){
    return view('child');
});
Route::get('child1',function(){
    return view('child1');
});


Route::POST("form",[loginctr::class,'data']);
Route::get('form-data',function(){
    return view('form.loginform');
});



