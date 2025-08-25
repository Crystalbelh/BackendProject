<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;







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
    return view('home');
})->name('home');

Route::get('/', Home::class)->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware(['auth'])->group(function () {
    // Dashboard for all logged-in users
 
// });

//    Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');


// Route::get('/dashboard', function () {
//     $user = Auth::user();
//     return view('dashboard', compact('user'));
// })->name('dashboard');

// ✅ One dashboard route for everyone (fixes error)
Route::middleware(['auth'])->get('/dashboard/user', function () {
    $user = Auth::user();
    return view('dashboard', compact('user'));
})->name('dashboard-auth');

Route::get('/products', function () {
        return view('products');
    })->name('products');

    // Dashboard route
// Route::get('/dashboard', function () {
//     return view('dashboard'); // looks for resources/views/dashboard.blade.php
// })->name('dashboard')->middleware('auth'); 

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    Route::get('/home', function () {
        return view('home');
    })->name('home');

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




// Dashboard (only for authenticated users)
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth')->name('dashboard');



// // Customer dashboard
// Route::middleware(['auth', ''])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     });
// });

// // Admin/SuperAdmin dashboard
// Route::middleware(['auth', ''])->group(function () {
//     Route::get('/admin', function () {
//         return view('admin.dashboard');
//     });
// });




// Public storefront (already in your project)
// Route::get('/', [ProductController::class, 'index'])->name('home');
// Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Auth pages (guests only)
// Route::middleware('guest')->group(function () {
//     Route::get('/login', Login::class)->name('login');
//     Route::get('/register', Register::class)->name('register');
// });

// Logout (POST) for signed-in users
// Route::post('/logout', function (Request $request) {
//     Auth::logout();
//     $request->session()->invalidate();
//     $request->session()->regenerateToken();
//     return redirect()->route('home');
// })->middleware('auth')->name('logout');

// Cart & Checkout access control (example)
// Route::post('/cart/add/{product}', [\App\Http\Controllers\OrderController::class, 'addToCart'])
//     ->name('cart.add'); // guest allowed (CartService will use session)

// Route::get('/checkout', [\App\Http\Controllers\OrderController::class, 'checkout'])
//     ->middleware('auth') // must login to checkout
//     ->name('checkout');

// Admin area
// Route::prefix('admin')->middleware(['auth', 'role:Admin|SuperAdmin'])->group(function () {
//     // Product/category/order management routes live here
//     // Route::resource('products', ProductController::class);
//     // Route::resource('categories', CategoryController::class);
//     // Route::post('orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
// });

// SuperAdmin-only sensitive actions
// Route::prefix('admin')->middleware(['auth', 'role:SuperAdmin'])->group(function () {
    // Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    // Route::post('orders/{order}/refund', [OrderController::class, 'refund'])->name('orders.refund');
// });

