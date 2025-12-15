<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PHPMailerController;

Route::post('send-mail', [PHPMailerController::class, 'store'])->name('send.email.post');

Route::get(
    '/localization/{language}',
    [App\Http\Controllers\LocalizationController::class, 'switch']
)->name('localization.switch');

Route::get('/', [App\Http\Controllers\BlogController::class, 'home'])->name('blog.home');
Route::get('/clientes', [App\Http\Controllers\ClientesController::class, 'index'])->name('clientes.index');
Route::get('/album', [App\Http\Controllers\AlbumController::class, 'mostrar'])->name('album.mostrar');
Route::get('/servicios', [App\Http\Controllers\ServiciosController::class, 'mostrar'])->name('servicios.mostrar');
Route::get('/servicios/{slug}', [App\Http\Controllers\BlogController::class, 'showArticulosByServicios'])->name('blog.articulos.categorias');

Route::get('/articulo/{slug}', [App\Http\Controllers\BlogController::class, 'showArticuloDetail'])->name('blog.articulos.details');

Route::get('/proyectos', [App\Http\Controllers\EventoController::class, 'mostrar'])->name('eventos.mostrar');
Route::get('/proyecto/{slug}', [App\Http\Controllers\BlogController::class, 'showProyectoDetail'])->name('blog.proyecto.details');

Route::get('/contacto', [App\Http\Controllers\ContactoController::class, 'index'])->name('contacto.index');
Route::post('/contacto', [App\Http\Controllers\ContactoController::class, 'sendEmail'])->name('contacto.sendEmail');


Auth::routes([
    'register' => false
]);

Route::group(['prefix' => 'dashboard', 'middleware' => ['web', 'auth']], function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

    //categorias
    Route::get('/categories/select', [\App\Http\Controllers\CategoryController::class, 'select'])->name('categories.select');
    Route::resource('/categories', \App\Http\Controllers\CategoryController::class);

    //album de fotos
    Route::resource('/albums', \App\Http\Controllers\AlbumController::class);

    //tags
    Route::get('/tags/select', [\App\Http\Controllers\TagController::class, 'select'])->name('tags.select');
    Route::resource('/tags', \App\Http\Controllers\TagController::class);

    //artistas
    Route::resource('/artistas', \App\Http\Controllers\ArtistaController::class);

    //noticias
    Route::resource('/noticias', \App\Http\Controllers\NoticiaController::class);

    //eventos
    Route::resource('/eventos', \App\Http\Controllers\EventoController::class);

    //servicios
    Route::get('/servicios/select', [\App\Http\Controllers\ServiciosController::class, 'select'])->name('servicios.select');
    Route::resource('/servicios', \App\Http\Controllers\ServiciosController::class);

    //articulos
    Route::resource('/articulos', \App\Http\Controllers\ArticulosController::class);

    //sliders
    Route::resource('/sliders', \App\Http\Controllers\SliderController::class);

    //contactenos
    Route::get('/contactenos/lista', [\App\Http\Controllers\ContactoController::class, 'lista'])->name('contactenos.lista');
    Route::resource('/contactenos', \App\Http\Controllers\ContactoController::class);

    //videos
    Route::resource('/videos', \App\Http\Controllers\VideoController::class);

    //Profile
    Route::resource('/profiles', \App\Http\Controllers\ProfileController::class);

    Route::group(
        ['prefix' => 'filemanager'],
        function () {
            Route::get(
                '/index',
                [\App\Http\Controllers\FileManagerController::class, 'index']
            )->name('filemanager.index');
            \UniSharp\LaravelFilemanager\Lfm::routes();
        }
    );

    //roles
    Route::get('/roles/select', [\App\Http\Controllers\RoleController::class, 'select'])->name('roles.select');
    Route::resource('/roles', \App\Http\Controllers\RoleController::class);
    //users
    Route::resource('/users', \App\Http\Controllers\UserController::class)->except(['show']);
});
