<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;

Route::post('/mail', [PageController::class, 'contactSubmit'])->name('mail');

Route::localized(function () {
Route::get('home', [PageController::class, 'home'])->name('home');
  Route::get('about-us', [PageController::class, 'about'])->name('about-us');
  Route::get('/', [PageController::class, 'home'])->name('index');
  Route::get('/shop', [PageController::class, 'shop'])->name('shop');
  Route::get('/services', [PageController::class, 'services'])->name('services');
  Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
  Route::get('/blog/category/{slug:slug}', [BlogController::class, 'category'])->name('blog.category');
  Route::get('/blog/author/{slug:slug}', [BlogController::class, 'author'])->name('blog.author');
  Route::get('/blog/{slug:slug}', [BlogController::class, 'details'])->name('blog.details');
  Route::get('/contact-us',[PageController::class, 'contact'])->name('contact-us');
  Route::get('/cart', function () {
    return view('front.cart');
  })->name('cart');
  Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () {
      return view('dashboard');
    })->name('dashboard');
  });
  require __DIR__ . '/auth.php';
}, [
]);

Route::post('menu-reorder', [MenuController::class, 'reorder']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdminMiddleware']], function () {
  Route::get('dashbroad', [AdminController::class, 'dashboard'])->name('admin.dashboard');
  Route::group(['prefix' => 'edit'], function () {
    Route::get('/', [AdminController::class, 'edit'])->name('admin.edit');
    Route::get('/languages', [AdminController::class, 'languages'])->name('admin.edit.languages');
    Route::get('/categories', [CategoryController::class, 'categories'])->name('admin.edit.categories');
    Route::post('/categories', [CategoryController::class, 'addCategory'])->name('admin.edit.addCategory');
    Route::get('/editCategory/{id}', [CategoryController::class, 'editCategory'])->name('admin.edit.editCategory');
    Route::get('/deleteCategory/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.edit.deleteCategory');
    Route::post('/editingCategory', [CategoryController::class, 'updateCategory'])->name('admin.edit.updateCategory');
    Route::post('/languages', [AdminController::class, 'addLanguages'])->name('admin.edit.addLanguages');
    Route::get('/menus', [MenuController::class, 'index'])->name('admin.edit.menus');
    Route::get('/blogs', [BlogController::class, 'blogs'])->name('admin.edit.blogs');
    Route::post('/blogs', [BlogController::class, 'addBlogs'])->name('admin.edit.addBlogs');
    Route::post('/editingBlog', [BlogController::class, 'editingblog'])->name('admin.edit.editingBlog');
    Route::get('/editBlog/{id}', [BlogController::class, 'edit'])->name('admin.edit.editblog');
    Route::post('/menus', [MenuController::class, 'addMenus'])->name('admin.edit.addMenus');
    Route::post('/menu-reorder', [AdminController::class, 'reorder'])->name('admin.edit.reorder');
    Route::get('/deleteLanguages/{id}', [AdminController::class, 'deleteLanguages'])->name('admin.edit.deleteLanguages');
    Route::get('/deleteMenu/{id}', [MenuController::class, 'deleteMenu'])->name('admin.edit.deleteMenu');
    Route::get('/editMenu/{id}', [MenuController::class, 'editMenu'])->name('admin.edit.editMenu');
    Route::post('/editMenu', [MenuController::class, 'editingmenu'])->name('admin.edit.editingmenu');
    Route::get('/editLanguages/{id}', [AdminController::class, 'editLanguages'])->name('admin.edit.editLanguages');
    Route::post('/editingLanguage', [AdminController::class, 'editingLanguages'])->name('admin.edit.editingLanguages');
    Route::get('/deleteBlog/{id}', [BlogController::class, 'deleteBlog'])->name('admin.edit.deleteBlog');
  });
});

