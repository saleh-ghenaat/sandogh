<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\user\RoleController;
use App\Http\Controllers\admin\notify\SMSController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\admin\notify\EmailController;
use App\Http\Controllers\admin\ticket\TicketController;
use App\Http\Controllers\Admin\User\CustomerController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Karbar\KarbarDashboardController;
use App\Http\Controllers\Karbar\Content\PardakhtghestController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\admin\setting\SettingController;
use App\Http\Controllers\admin\user\PermissionController;
use App\Http\Controllers\Admin\Notify\EmailFileController;
use App\Http\Controllers\Admin\Ticket\TicketAdminController;
use App\Http\Controllers\Admin\Ticket\TicketCategoryController;
use App\Http\Controllers\Admin\Ticket\TicketPriorityController;
use App\Http\Controllers\Admin\Content\UserController;
use App\Http\Controllers\Admin\Content\RequestController;
use App\Http\Controllers\Admin\Content\AccountinformationController;
use App\Http\Controllers\Admin\Content\VamController;
use App\Http\Controllers\Admin\Content\PardakhtihaController;
use App\Http\Controllers\Admin\Content\AghsatController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use GuzzleHttp\Middleware;

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

Route::get('', [AuthenticatedSessionController::class, 'create'])
->name('login');

Route::prefix('admin')->namespace('Admin')->group(function () {

    // Route::get('/', 'AdminDashboardController@index')->name('admin.home');
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.home');

    Route::prefix('content')->namespace('Content')->group(function () {

        //user
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.content.user.index');
            Route::get('/api/{users}', [UserController::class, 'api'])->name('admin.content.user.api');
            Route::get('/create', [UserController::class, 'create'])->name('admin.content.user.create');
            Route::post('/store', [UserController::class, 'store'])->name('admin.content.user.store');
            Route::get('/edit/{users}', [UserController::class, 'edit'])->name('admin.content.user.edit');
            Route::put('/update/{users}', [UserController::class, 'update'])->name('admin.content.user.update');
            Route::delete('/destroy/{users}', [UserController::class, 'destroy'])->name('admin.content.user.destroy');
            Route::get('/status/{users}', [UserController::class, 'status'])->name('admin.content.category.status');
        });
        //darkhast
        Route::prefix('request')->group(function () {
            Route::get('/', [RequestController::class, 'index'])->name('admin.content.request.index');
            Route::get('/create', [RequestController::class, 'create'])->name('admin.content.request.create');
            Route::post('/store', [RequestController::class, 'store'])->name('admin.content.request.store');
            Route::get('/edit/{requests}', [RequestController::class, 'edit'])->name('admin.content.request.edit');
            Route::put('/update/{requests}', [RequestController::class, 'update'])->name('admin.content.request.update');
            Route::delete('/destroy/{requests}', [RequestController::class, 'destroy'])->name('admin.content.request.destroy');
            Route::get('/status/{requests}', [RequestController::class, 'status'])->name('admin.content.request.status');
        });
        //account-information
        Route::prefix('accountinformation')->group(function () {
            Route::get('/', [AccountinformationController::class, 'index'])->name('admin.content.accountinformation.index');
            Route::get('/create', [AccountinformationController::class, 'create'])->name('admin.content.accountinformation.create');
            Route::post('/store', [AccountinformationController::class, 'store'])->name('admin.content.accountinformation.store');
            Route::get('/edit/{accountinformations}', [AccountinformationController::class, 'edit'])->name('admin.content.accountinformation.edit');
            Route::put('/update/{accountinformations}', [AccountinformationController::class, 'update'])->name('admin.content.accountinformation.update');
            Route::delete('/destroy/{accountinformations}', [AccountinformationController::class, 'destroy'])->name('admin.content.accountinformation.destroy');
            Route::get('/status/{accountinformations}', [AccountinformationController::class, 'status'])->name('admin.content.category.status');
        });
        //vam
        Route::prefix('vam')->group(function () {
            Route::get('/', [VamController::class, 'index'])->name('admin.content.vam.index');
            Route::get('/listvam', [VamController::class, 'listvam'])->name('admin.content.vam.listvam');
            Route::get('/create', [VamController::class, 'create'])->name('admin.content.vam.create');
            Route::post('/store', [VamController::class, 'store'])->name('admin.content.vam.store');
            Route::get('/edit/{vams}', [VamController::class, 'edit'])->name('admin.content.vam.edit');
            Route::put('/update/{vams}', [VamController::class, 'update'])->name('admin.content.vam.update');
            Route::delete('/destroy/{vams}', [VamController::class, 'destroy'])->name('admin.content.vam.destroy');
            Route::get('/status/{vams}', [VamController::class, 'status'])->name('admin.content.vam.status');
        });
        //aghsat
        Route::prefix('aghsat')->group(function () {
            Route::get('/', [AghsatController::class, 'index'])->name('admin.content.aghsat.index');
            Route::get('/listaghsat', [AghsatController::class, 'listaghsat'])->name('admin.content.aghsat.listaghsat');
            Route::get('/create', [AghsatController::class, 'create'])->name('admin.content.aghsat.create');
            Route::post('/store', [AghsatController::class, 'store'])->name('admin.content.aghsat.store');
            Route::get('/edit/{pardakhtihas}', [AghsatController::class, 'edit'])->name('admin.content.aghsat.edit');
            Route::put('/update/{pardakhtihas}', [AghsatController::class, 'update'])->name('admin.content.aghsat.update');
            Route::delete('/destroy/{pardakhtihas}', [AghsatController::class, 'destroy'])->name('admin.content.aghsat.destroy');
            Route::get('/status/{pardakhtihas}', [AghsatController::class, 'status'])->name('admin.content.aghsat.status');
            Route::get('/emaltaghir/{pardakhtihas}', [AghsatController::class, 'emaltaghir'])->name('admin.content.aghsat.emaltaghir');
        });
        //pardakhtiha
        Route::prefix('pardakhtiha')->group(function () {
            Route::get('/', [PardakhtihaController::class, 'index'])->name('admin.content.pardakhtiha.index');
            Route::get('/create', [PardakhtihaController::class, 'create'])->name('admin.content.pardakhtiha.create');
            Route::post('/store', [PardakhtihaController::class, 'store'])->name('admin.content.pardakhtiha.store');
            Route::get('/edit/{pardakhtihas}', [PardakhtihaController::class, 'edit'])->name('admin.content.pardakhtiha.edit');
            Route::put('/update/{pardakhtihas}', [PardakhtihaController::class, 'update'])->name('admin.content.pardakhtiha.update');
            Route::delete('/destroy/{pardakhtihas}', [PardakhtihaController::class, 'destroy'])->name('admin.content.pardakhtiha.destroy');
            Route::get('/status/{pardakhtihas}', [PardakhtihaController::class, 'status'])->name('admin.content.category.status');
        });
    });

    Route::prefix('user')->namespace('User')->group(function () {

        //admin-user
        Route::prefix('admin-user')->group(function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.admin-user.index');
            Route::get('/create', [AdminUserController::class, 'create'])->name('admin.user.admin-user.create');
            Route::post('/store', [AdminUserController::class, 'store'])->name('admin.user.admin-user.store');
            Route::get('/edit/{admin}', [AdminUserController::class, 'edit'])->name('admin.user.admin-user.edit');
            Route::put('/update/{admin}', [AdminUserController::class, 'update'])->name('admin.user.admin-user.update');
            Route::delete('/destroy/{admin}', [AdminUserController::class, 'destroy'])->name('admin.user.admin-user.destroy');
            Route::get('/status/{user}', [AdminUserController::class, 'status'])->name('admin.user.admin-user.status');
            Route::get('/activation/{user}', [AdminUserController::class, 'activation'])->name('admin.user.admin-user.activation');
        });

        //customer
        Route::prefix('customer')->group(function () {
            Route::get('/', [CustomerController::class, 'index'])->name('admin.user.customer.index');
            Route::get('/create', [CustomerController::class, 'create'])->name('admin.user.customer.create');
            Route::post('/store', [CustomerController::class, 'store'])->name('admin.user.customer.store');
            Route::get('/edit/{user}', [CustomerController::class, 'edit'])->name('admin.user.customer.edit');
            Route::put('/update/{user}', [CustomerController::class, 'update'])->name('admin.user.customer.update');
            Route::delete('/destroy/{user}', [CustomerController::class, 'destroy'])->name('admin.user.customer.destroy');
            Route::get('/status/{user}', [CustomerController::class, 'status'])->name('admin.user.customer.status');
            Route::get('/activation/{user}', [CustomerController::class, 'activation'])->name('admin.user.customer.activation');
        });

        //role
        Route::prefix('role')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('admin.user.role.index');
            Route::get('/create', [RoleController::class, 'create'])->name('admin.user.role.create');
            Route::post('/store', [RoleController::class, 'store'])->name('admin.user.role.store');
            Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('admin.user.role.edit');
            Route::put('/update/{role}', [RoleController::class, 'update'])->name('admin.user.role.update');
            Route::delete('/destroy/{role}', [RoleController::class, 'destroy'])->name('admin.user.role.destroy');
            Route::get('/permission-form/{role}', [RoleController::class, 'permissionForm'])->name('admin.user.role.permission-form');
            Route::put('/permission-update/{role}', [RoleController::class, 'permissionUpdate'])->name('admin.user.role.permission-update');
        });

        //permission
        Route::prefix('permission')->group(function () {
            Route::get('/', [PermissionController::class, 'index'])->name('admin.user.permission.index');
            Route::get('/create', [PermissionController::class, 'create'])->name('admin.user.permission.create');
            Route::post('/store', [PermissionController::class, 'store'])->name('admin.user.permission.store');
            Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('admin.user.permission.edit');
            Route::put('/update/{id}', [PermissionController::class, 'update'])->name('admin.user.permission.update');
            Route::delete('/destroy/{id}', [PermissionController::class, 'destroy'])->name('admin.user.permission.destroy');
        });
    });

    Route::prefix('notify')->namespace('Notify')->group(function () {

        //email
        Route::prefix('email')->group(function () {
            Route::get('/', [EmailController::class, 'index'])->name('admin.notify.email.index');
            Route::get('/create', [EmailController::class, 'create'])->name('admin.notify.email.create');
            Route::post('/store', [EmailController::class, 'store'])->name('admin.notify.email.store');
            Route::get('/edit/{email}', [EmailController::class, 'edit'])->name('admin.notify.email.edit');
            Route::put('/update/{email}', [EmailController::class, 'update'])->name('admin.notify.email.update');
            Route::delete('/destroy/{email}', [EmailController::class, 'destroy'])->name('admin.notify.email.destroy');
            Route::get('/status/{email}', [EmailController::class, 'status'])->name('admin.notify.email.status');
        });

        //email file
        Route::prefix('email-file')->group(function () {
            Route::get('/{email}', [EmailFileController::class, 'index'])->name('admin.notify.email-file.index');
            Route::get('/{email}/create', [EmailFileController::class, 'create'])->name('admin.notify.email-file.create');
            Route::post('/{email}/store', [EmailFileController::class, 'store'])->name('admin.notify.email-file.store');
            Route::get('/edit/{file}', [EmailFileController::class, 'edit'])->name('admin.notify.email-file.edit');
            Route::put('/update/{file}', [EmailFileController::class, 'update'])->name('admin.notify.email-file.update');
            Route::delete('/destroy/{file}', [EmailFileController::class, 'destroy'])->name('admin.notify.email-file.destroy');
            Route::get('/status/{file}', [EmailFileController::class, 'status'])->name('admin.notify.email-file.status');
        });

        //sms
        Route::prefix('sms')->group(function () {
            Route::get('/', [SMSController::class, 'index'])->name('admin.notify.sms.index');
            Route::get('/create', [SMSController::class, 'create'])->name('admin.notify.sms.create');
            Route::post('/store', [SMSController::class, 'store'])->name('admin.notify.sms.store');
            Route::get('/edit/{sms}', [SMSController::class, 'edit'])->name('admin.notify.sms.edit');
            Route::put('/update/{sms}', [SMSController::class, 'update'])->name('admin.notify.sms.update');
            Route::delete('/destroy/{sms}', [SMSController::class, 'destroy'])->name('admin.notify.sms.destroy');
            Route::get('/status/{sms}', [SMSController::class, 'status'])->name('admin.notify.sms.status');
        });
    });

    Route::prefix('ticket')->namespace('Ticket')->group(function () {

        //category
        Route::prefix('category')->group(function () {
            Route::get('/', [TicketCategoryController::class, 'index'])->name('admin.ticket.category.index');
            Route::get('/create', [TicketCategoryController::class, 'create'])->name('admin.ticket.category.create');
            Route::post('/store', [TicketCategoryController::class, 'store'])->name('admin.ticket.category.store');
            Route::get('/edit/{ticketCategory}', [TicketCategoryController::class, 'edit'])->name('admin.ticket.category.edit');
            Route::put('/update/{ticketCategory}', [TicketCategoryController::class, 'update'])->name('admin.ticket.category.update');
            Route::delete('/destroy/{ticketCategory}', [TicketCategoryController::class, 'destroy'])->name('admin.ticket.category.destroy');
            Route::get('/status/{ticketCategory}', [TicketCategoryController::class, 'status'])->name('admin.ticket.category.status');
        });

        //priority
        Route::prefix('priority')->group(function () {
            Route::get('/', [TicketPriorityController::class, 'index'])->name('admin.ticket.priority.index');
            Route::get('/create', [TicketPriorityController::class, 'create'])->name('admin.ticket.priority.create');
            Route::post('/store', [TicketPriorityController::class, 'store'])->name('admin.ticket.priority.store');
            Route::get('/edit/{ticketPriority}', [TicketPriorityController::class, 'edit'])->name('admin.ticket.priority.edit');
            Route::put('/update/{ticketPriority}', [TicketPriorityController::class, 'update'])->name('admin.ticket.priority.update');
            Route::delete('/destroy/{ticketPriority}', [TicketPriorityController::class, 'destroy'])->name('admin.ticket.priority.destroy');
            Route::get('/status/{ticketPriority}', [TicketPriorityController::class, 'status'])->name('admin.ticket.priority.status');
        });

        //admin
        Route::prefix('admin')->group(function () {
            Route::get('/', [TicketAdminController::class, 'index'])->name('admin.ticket.admin.index');
            Route::get('/set/{admin}', [TicketAdminController::class, 'set'])->name('admin.ticket.admin.set');
        });

        //main
        Route::get('/', [TicketController::class, 'index'])->name('admin.ticket.index');
        Route::get('/new-tickets', [TicketController::class, 'newTickets'])->name('admin.ticket.newTickets');
        Route::get('/open-tickets', [TicketController::class, 'openTickets'])->name('admin.ticket.openTickets');
        Route::get('/close-tickets', [TicketController::class, 'closeTickets'])->name('admin.ticket.closeTickets');
        Route::get('/show/{ticket}', [TicketController::class, 'show'])->name('admin.ticket.show');
        Route::post('/answer/{ticket}', [TicketController::class, 'answer'])->name('admin.ticket.answer');
        Route::get('/change/{ticket}', [TicketController::class, 'change'])->name('admin.ticket.change');
    });

    Route::prefix('setting')->namespace('Setting')->group(function () {

        Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
        Route::get('/edit/{setting}', [SettingController::class, 'edit'])->name('admin.setting.edit');
        Route::put('/update/{setting}', [SettingController::class, 'update'])->name('admin.setting.update');
        Route::delete('/destroy/{setting}', [SettingController::class, 'destroy'])->name('admin.setting.destroy');
    });

    Route::post('/notification/read-all', [NotificationController::class, 'readAll'])->name('admin.notification.readAll');
});

Route::prefix('karbar')->namespace('Karbar')->group(function(){
    Route::get('/', [KarbarDashboardController::class, 'index'])->name('karbar.home');
   
    Route::prefix('content')->namespace('Content')->group(function () {

        //pardakhtghest
        Route::prefix('pardakhtghest')->group(function () {
            Route::get('/', [PardakhtghestController::class, 'index'])->name('karbar.content.pardakhtghest.index');
            Route::get('/create', [PardakhtghestController::class, 'create'])->name('karbar.content.pardakhtghest.create');
            Route::post('/store', [PardakhtghestController::class, 'store'])->name('karbar.content.pardakhtghest.store');
            Route::get('/edit/{pardakhtghests}', [PardakhtghestController::class, 'edit'])->name('karbar.content.pardakhtghest.edit');
            Route::put('/update/{pardakhtghests}', [PardakhtghestController::class, 'update'])->name('karbar.content.pardakhtghest.update');
            Route::delete('/destroy/{pardakhtghests}', [PardakhtghestController::class, 'destroy'])->name('karbar.content.pardakhtghest.destroy');
        });
    });


});

require __DIR__.'/auth.php';
