<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\SiteInfoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\TodoController;


Route::get('/', function () {
    return view('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// admin panel link start 

// Service routes
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::delete('/{id}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');

    Route::get('/services/index', [ServiceController::class, 'index1'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

    Route::get('/messages/index', [ContactMessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{id}', [ContactMessageController::class, 'show'])->name('messages.show');
    Route::get('/messages/{id}/reply', [ContactMessageController::class, 'reply'])->name('messages.reply');


    Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
    Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
    Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');

    Route::post('/schedules', [TodoController::class, 'storeSchedule'])->name('schedules.store');
    Route::delete('/schedules/{id}', [TodoController::class, 'destroySchedule'])->name('schedules.destroy');

    Route::get('/projects', [ProjectController::class, 'index1'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    
    Route::get('/reviews', [ReviewController::class, 'index1'])->name('reviews.index');
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    
    Route::get('/banner', [BannerController::class, 'index1'])->name('banner.index');
    Route::get('/banner/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('/banner', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/banner/{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');
    Route::put('/banner/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::delete('/banner/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');
    
    Route::get('/team', [TeamMemberController::class, 'index1'])->name('team.index');
    Route::get('/team/create', [TeamMemberController::class, 'create'])->name('team.create');
    Route::post('/team', [TeamMemberController::class, 'store'])->name('team.store');
    Route::get('/team/{id}/edit', [TeamMemberController::class, 'edit'])->name('team.edit');
    Route::put('/team/{id}', [TeamMemberController::class, 'update'])->name('team.update');
    Route::delete('/team/{id}', [TeamMemberController::class, 'destroy'])->name('team.destroy');
    
    Route::get('/site_info', [SiteInfoController::class, 'index1'])->name('site_info.index');
    Route::get('/site_info/create', [SiteInfoController::class, 'create'])->name('site_info.create');
    Route::post('/site_info', [SiteInfoController::class, 'store'])->name('site_info.store');
    Route::get('/site_info/{id}/edit', [SiteInfoController::class, 'edit'])->name('site_info.edit');
    Route::put('/site_info/{id}', [SiteInfoController::class, 'update'])->name('site_info.update');
    Route::delete('/site_info/{id}', [SiteInfoController::class, 'destroy'])->name('site_info.destroy');

    Route::get('/visitors', [VisitorController::class, 'index'])->name('visitors.index');
});

// admin panel link end 


// template link start ---------------------------------------------------------------------------------------
Route::group(['prefix' => 'basic-ui'], function () {
    Route::get('accordions', function () {
        return view('pages.basic-ui.accordions');
    });
    Route::get('buttons', function () {
        return view('pages.basic-ui.buttons');
    });
    Route::get('badges', function () {
        return view('pages.basic-ui.badges');
    });
    Route::get('breadcrumbs', function () {
        return view('pages.basic-ui.breadcrumbs');
    });
    Route::get('dropdowns', function () {
        return view('pages.basic-ui.dropdowns');
    });
    Route::get('modals', function () {
        return view('pages.basic-ui.modals');
    });
    Route::get('progress-bar', function () {
        return view('pages.basic-ui.progress-bar');
    });
    Route::get('pagination', function () {
        return view('pages.basic-ui.pagination');
    });
    Route::get('tabs', function () {
        return view('pages.basic-ui.tabs');
    });
    Route::get('typography', function () {
        return view('pages.basic-ui.typography');
    });
    Route::get('tooltips', function () {
        return view('pages.basic-ui.tooltips');
    });
});

Route::group(['prefix' => 'advanced-ui'], function () {
    Route::get('dragula', function () {
        return view('pages.advanced-ui.dragula');
    });
    Route::get('clipboard', function () {
        return view('pages.advanced-ui.clipboard');
    });
    Route::get('context-menu', function () {
        return view('pages.advanced-ui.context-menu');
    });
    Route::get('popups', function () {
        return view('pages.advanced-ui.popups');
    });
    Route::get('sliders', function () {
        return view('pages.advanced-ui.sliders');
    });
    Route::get('carousel', function () {
        return view('pages.advanced-ui.carousel');
    });
    Route::get('loaders', function () {
        return view('pages.advanced-ui.loaders');
    });
    Route::get('tree-view', function () {
        return view('pages.advanced-ui.tree-view');
    });
});

Route::group(['prefix' => 'forms'], function () {
    Route::get('basic-elements', function () {
        return view('pages.forms.basic-elements');
    });
    Route::get('advanced-elements', function () {
        return view('pages.forms.advanced-elements');
    });
    Route::get('dropify', function () {
        return view('pages.forms.dropify');
    });
    Route::get('form-validation', function () {
        return view('pages.forms.form-validation');
    });
    Route::get('step-wizard', function () {
        return view('pages.forms.step-wizard');
    });
    Route::get('wizard', function () {
        return view('pages.forms.wizard');
    });
});

Route::group(['prefix' => 'editors'], function () {
    Route::get('text-editor', function () {
        return view('pages.editors.text-editor');
    });
    Route::get('code-editor', function () {
        return view('pages.editors.code-editor');
    });
});

Route::group(['prefix' => 'charts'], function () {
    Route::get('chartjs', function () {
        return view('pages.charts.chartjs');
    });
    Route::get('morris', function () {
        return view('pages.charts.morris');
    });
    Route::get('flot', function () {
        return view('pages.charts.flot');
    });
    Route::get('google-charts', function () {
        return view('pages.charts.google-charts');
    });
    Route::get('sparklinejs', function () {
        return view('pages.charts.sparklinejs');
    });
    Route::get('c3-charts', function () {
        return view('pages.charts.c3-charts');
    });
    Route::get('chartist', function () {
        return view('pages.charts.chartist');
    });
    Route::get('justgage', function () {
        return view('pages.charts.justgage');
    });
});

Route::group(['prefix' => 'tables'], function () {
    Route::get('basic-table', function () {
        return view('pages.tables.basic-table');
    });
    Route::get('data-table', function () {
        return view('pages.tables.data-table');
    });
    Route::get('js-grid', function () {
        return view('pages.tables.js-grid');
    });
    Route::get('sortable-table', function () {
        return view('pages.tables.sortable-table');
    });
});

Route::get('notifications', function () {
    return view('pages.notifications.index');
});

Route::group(['prefix' => 'icons'], function () {
    Route::get('material', function () {
        return view('pages.icons.material');
    });
    Route::get('flag-icons', function () {
        return view('pages.icons.flag-icons');
    });
    Route::get('font-awesome', function () {
        return view('pages.icons.font-awesome');
    });
    Route::get('simple-line-icons', function () {
        return view('pages.icons.simple-line-icons');
    });
    Route::get('themify', function () {
        return view('pages.icons.themify');
    });
});

Route::group(['prefix' => 'maps'], function () {
    Route::get('vector-map', function () {
        return view('pages.maps.vector-map');
    });
    Route::get('mapael', function () {
        return view('pages.maps.mapael');
    });
    Route::get('google-maps', function () {
        return view('pages.maps.google-maps');
    });
});

Route::group(['prefix' => 'user-pages'], function () {
    Route::get('login', function () {
        return view('pages.user-pages.login');
    });
    Route::get('login-2', function () {
        return view('pages.user-pages.login-2');
    });
    Route::get('multi-step-login', function () {
        return view('pages.user-pages.multi-step-login');
    });
    Route::get('register', function () {
        return view('pages.user-pages.register');
    });
    Route::get('register-2', function () {
        return view('pages.user-pages.register-2');
    });
    Route::get('lock-screen', function () {
        return view('pages.user-pages.lock-screen');
    });
});

Route::group(['prefix' => 'error-pages'], function () {
    Route::get('error-404', function () {
        return view('pages.error-pages.error-404');
    });
    Route::get('error-500', function () {
        return view('pages.error-pages.error-500');
    });
});

Route::group(['prefix' => 'general-pages'], function () {
    Route::get('blank-page', function () {
        return view('pages.general-pages.blank-page');
    });
    Route::get('landing-page', function () {
        return view('pages.general-pages.landing-page');
    });
    Route::get('profile', function () {
        return view('pages.general-pages.profile');
    });
    Route::get('email-templates', function () {
        return view('pages.general-pages.email-templates');
    });
    Route::get('faq', function () {
        return view('pages.general-pages.faq');
    });
    Route::get('faq-2', function () {
        return view('pages.general-pages.faq-2');
    });
    Route::get('news-grid', function () {
        return view('pages.general-pages.news-grid');
    });
    Route::get('timeline', function () {
        return view('pages.general-pages.timeline');
    });
    Route::get('search-results', function () {
        return view('pages.general-pages.search-results');
    });
    Route::get('portfolio', function () {
        return view('pages.general-pages.portfolio');
    });
    Route::get('user-listing', function () {
        return view('pages.general-pages.user-listing');
    });
});

Route::group(['prefix' => 'ecommerce'], function () {
    Route::get('invoice', function () {
        return view('pages.ecommerce.invoice');
    });
    Route::get('invoice-2', function () {
        return view('pages.ecommerce.invoice-2');
    });
    Route::get('pricing', function () {
        return view('pages.ecommerce.pricing');
    });
    Route::get('product-catalogue', function () {
        return view('pages.ecommerce.product-catalogue');
    });
    Route::get('project-list', function () {
        return view('pages.ecommerce.project-list');
    });
    Route::get('orders', function () {
        return view('pages.ecommerce.orders');
    });
});

// template link end ------------------------------------------------------------------------------------------------