<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Livewire\Admin\Orders;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Products;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Roles;




// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/register', Register::class)->name('register');
// Route::get('/login', Login::class)->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::get('/', function () {
    return view('livewire.home');
})->name('home');

Route::get('/', Home::class)->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard (Admin/SuperAdmin only)
Route::get('/dashboard', function () {
    $user = Auth::user();
    return view('dashboard_views.dashboard', compact('user'));
})->middleware(['auth', 'role:Admin|SuperAdmin'])->name('dashboard');

// For customers (must be logged in)
Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/wishlist/add/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
});

Route::middleware(['auth', 'role:Admin|SuperAdmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('/products', Products::class)->name('products');
        Route::get('/orders', Orders::class)->name('orders');
        // Route::get('/users', Users::class)->name('users');
        // Route::get('/payments', Payments::class)->name('payments');
        // Route::get('/reviews', Reviews::class)->name('reviews');
        // Route::get('/discounts', Discounts::class)->name('discounts');
        // Route::get('/reports', Reports::class)->name('reports');
        // Route::get('/settings', Settings::class)->name('settings');
        
        // SuperAdmin only
        Route::middleware(['role:SuperAdmin'])->group(function () {
            // Route::get('/roles', Roles::class)->name('roles');
        });
    });




Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/orders', function () {
    return view('orders');
})->name('orders');

// Route::get('/ad', function () {
//     return view('livewire.admin.dashboard');storage/logs/laravel.log

// })->name('admindashboard');

Route::get('/about', function () {
    return view('dashboard_views.about');
})->name('about');

Route::get('/products', function () {
    return view('dashboard_views.products');
})->name('products');

Route::get('/settings', function () {
    // dd('sidf');
    return view('dashboard_views.settings');
})->name('settings');




   
// Admin routes (only Admin & SuperAdmin)
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('/products', Products::class)->name('products');
        Route::get('/orders', Orders::class)->name('orders');
        // Route::get('/products', Products::class)->name('products');
    });

    // Route::middleware(['auth', 'admin'])
    // ->prefix('admin')
    // ->name('admin.')
    // ->group(function () {
    //     Route::get('/products', Products::class)->name('products');
    // });




     
// Customer routes (only customers)
Route::middleware(['auth'])
    ->group(function () {

    Route::view('user/dashboard', 'dashboard_views.dashboard')->name('user.dashboard');

    });



    Route::middleware(['role:Customer'])->group(function () {
    Route::get('/shop', fn() => 'Customer Dashboard');
});

Route::middleware(['role:Admin'])->group(function () {
    Route::get('/admin', fn() => 'Admin Dashboard');
});

Route::middleware(['role:SuperAdmin'])->group(function () {
    Route::get('/superadmin', fn() => 'SuperAdmin Dashboard');
});

Route::middleware(['role:Customer'])->get('/dashboard', fn() => 'Customer Dashboard');




 // Route::get('/home', function () {
    //     return view('home');
    // })->name('home');

  // Admin routes group
// Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::get('/dashboard', Dashboard::class)->name('dashboard');
    
//     // // Additional admin routes can be added here
//     // Route::get('/orders', function () {
//     //     return view('admin.orders');
//     // })->name('orders');
    
//     // Route::get('/products', function () {
//     //     return view('admin.products');
//     // })->name('products');
    
//     // Route::get('/users', function () {
//     //     return view('admin.users');
//     // })->name('users');
    
//     // You can also add resource routes
//     // Route::resource('products', AdminProductController::class);
// });

// Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('dashboard');
// });
