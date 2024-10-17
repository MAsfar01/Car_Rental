    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\userController;
    use App\Http\Controllers\carController;
    use App\Http\Controllers\DB;
    use App\Http\Controllers\planController;

    Route::get('/',function(){
        return view('login_form');
    });
    
    Route::get('/users', [userController::class, 'showUser'])->name('show_users');
    Route::post('/add_users', [userController::class, 'addUser'])->name('addUser');






    Route::view('signup_form','signup_form')->name('signup_form');
    Route::post('registerSave',[userController::class,'register'])->name('registerSave');
    Route::view('login_form','login_form')->name('login_form');
    Route::post('/loginMatch',[userController::class,'login']);

    Route::get('logout',[userController::class,'logout'])->name('logout');

    Route::get('welcome',[userController::class,'dashboardPage'])->name('welcome'); 



    // Route::get('welcome', [userController::class, 'getUserCount'])->name('welcome');

    // Route to display the add car page
    Route::view('add_car', 'add_car')->name('add_car');

    // Route to handle form submission
    Route::post('add_car', [carController::class, 'store'])->name('add_car');

    Route::get('/view_car', [carController::class, 'showCar'])->name('view_car');

    Route::post('edit_car', [carController::class, 'edit'])->name('edit_car');
    Route::post('delete_car', [carController::class, 'delete'])->name('delete_car');


    Route::post('/car/update', [CarController::class, 'update'])->name('car.update');
    Route::delete('/view_car', [CarController::class, 'destroy'])->name('car.delete');

    Route::view('millage_plans','millage_plans');
    Route::post('Plan',[planController::class, 'addPlan'])->name('add.Plan');
    Route::get('millage_plans',[planController::class, 'showPlan'])->name('show.plan');
    Route::post('update',[planController::class, 'updatePlan'])->name('update.plan');
    Route::post('delete', [planController::class, 'deletePlan'])->name('delete.plan');

    
    Route::get('forget_password',[userController::class,'forgot_password']);
    Route::post('forget_password_submit',[userController::class,'forget_password_send']);

    Route::get('otp/{email}',[userController::class,'otp']);
    Route::post('verify_otp',[userController::class,'verifyOTP']);

    Route::get('reset_password/{email}',[userController::class,'reset_password']);
    Route::post('reset_password_update',[userController::class,'updatePassword']);
    
  
    
