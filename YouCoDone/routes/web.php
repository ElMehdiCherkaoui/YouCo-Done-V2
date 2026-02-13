<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Types\Relations\Role;
use App\Http\Controllers\clientController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AdminRestaurantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FavouritController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ClientReservationController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\AdminStatisticsController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
	return view('welcome');
});

Route::get('/dashboard', function () {
	$user = auth()->user();
	if ($user->hasRole('admin')) {
		return view('admin.dashboard');
	} elseif ($user->hasRole('client')) {
		return view('client.dashboard');
	} elseif ($user->hasRole('restaurant')) {
		return view('restaurateur.dashboard');
	}
	abort(403);
})->middleware(['auth'])->name('dashboard');

Route::get('/client/restaurants', [clientController::class, 'index'])->middleware(['auth'])->name('client.restaurant');

Route::get('/client/restaurants/details', function () {
	return view('client.restaurantDetails');
})->middleware(['auth'])->name('client.restaurantDetails');

Route::post('/client/{restaurant}/favorite', [FavouritController::class, 'store'])->middleware('auth')->name('restaurant.favorite.store');

Route::delete('/client/{restaurant}/favorite', [FavouritController::class, 'destroy'])->middleware('auth')->name('restaurant.favorite.destroy');


Route::get('/restaurateur/restaurants', [RestaurantController::class, 'index'])->middleware(['auth'])->name('restaurateur.restaurants');

Route::get('/restaurateur/restaurants/create', [RestaurantController::class, 'create'])->middleware(['auth'])->name('restaurateur.create');

Route::get('/restaurateur/restaurants/edit/{restaurant}', [RestaurantController::class, 'edit'])->middleware(['auth'])->name('restaurateur.edit');

Route::post('/restaurateur/restaurants/{restaurant}', [RestaurantController::class, 'update'])->middleware(['auth'])->name('restaurateur.restaurant.update');

Route::get('/restaurateur/restaurant/{restaurant}/menu/create', [MenuController::class, 'create'])->name('restaurateur.menu.create');

Route::post('/restaurateur/restaurant/{restaurant}/menu', [MenuController::class, 'store'])->name('restaurateur.menu.store');

Route::delete('/restaurateur/menu/{id}', [MenuController::class, 'destroy'])->name('restaurateur.menu.destroy');

Route::get('/restaurateur/restaurant/{id}', [RestaurantController::class, 'show'])->middleware(['auth'])->name('restaurateur.restaurant.show');

Route::post('/restaurateur/restaurant/Store', [RestaurantController::class, 'store'])->middleware(['auth'])->name('restaurateur.store');

Route::get('/admin/restaurants', [AdminRestaurantController::class, 'index'])->middleware(['auth'])->name('admin.restaurants');

Route::get('/admin/users', [UserController::class, 'index'])->middleware(['auth'])->name('admin.users');

Route::delete('/admin/restaurants/{restaurant}', [RestaurantController::class, 'destroy'])->middleware(['auth'])->name('restaurants.destroy');

Route::get('/client/restaurants/{restaurant}', [clientController::class, 'show'])->middleware(['auth'])->name('client.restaurant.show');

Route::get('/client/Reservation', [ClientReservationController::class, 'index'])->middleware(['auth'])->name('client.reservation');

Route::get('/client/restaurants/{restaurant}/reserve',[ReserveController::class, 'index'])->middleware(['auth'])->name('client.reserve');

Route::post('/client/restaurants/store',[ReserveController::class, 'store'])->middleware(['auth'])->name('client.reservation.store');

Route::get('/client/{restaurant}/{reservation}/payment', [PaymentController::class, 'index'])->middleware(['auth'])->name('client.payment');

Route::get('/restaurateur/reservations', [ReservationController::class, 'index'])->middleware(['auth'])->name('restaurateur.reservations');

Route::get('/restaurateur/notification', [NotificationController::class, 'index'])->middleware(['auth'])->name('restaurateur.notification');

Route::get('restaurateur/restaurants/{restaurant}/availabilities',[AvailabilityController::class, 'index']);

Route::get('/admin/reservation', [AdminReservationController::class, 'index'])->name('admin.reservation');

Route::get('/admin/payments', [AdminPaymentController::class, 'index'])->name('admin.payments');

Route::get('/admin/statistics', [AdminStatisticsController::class, 'index'])->name('admin.statistics');

Route::get('/payment/success', [PaymentController::class, 'success'])->name('client-paymentSuccess');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('client-paymentCancel');

Route::post('restaurateur/restaurants/{restaurant}/availabilities',[AvailabilityController::class, 'store'])->name('availabilities.store');

Route::get('/reservation/{reservation}/invoice', 
    [PaymentController::class, 'downloadInvoice'])
    ->name('reservation.invoice');


Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';