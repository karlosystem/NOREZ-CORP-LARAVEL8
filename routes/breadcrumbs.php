<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function ($trail) {
  $trail->push('Principal', route('dashboard.index'));
});

Breadcrumbs::for('dashboard_home', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Inicio', '#');
});

//Perfil
Breadcrumbs::for('profiles', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Profiles', route('profiles.index'));
});


//Contactenos
Breadcrumbs::for('contactenos', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Contactenos', route('contactenos.index'));
});

//Contenidos
Breadcrumbs::for('contenidos', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Contenidos', route('contenidos.index'));
});

Breadcrumbs::for('add_contenido', function ($trail) {
  $trail->parent('contenidos');
  $trail->push('Agregar', route('contenidos.create'));
});

Breadcrumbs::for('edit_contenido', function ($trail, $contenido) {
  $trail->parent('contenidos');
  $trail->push('Edit', route('contenidos.edit', ['contenido' => $contenido]));
  $trail->push($contenido->title, route('contenidos.edit', ['contenido' => $contenido]));
});


//Noticias
Breadcrumbs::for('noticias', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Noticias', route('noticias.index'));
});

Breadcrumbs::for('add_noticia', function ($trail) {
  $trail->parent('noticias');
  $trail->push('Agregar', route('noticias.create'));
});

Breadcrumbs::for('edit_noticias', function ($trail, $noticia) {
  $trail->parent('noticias');
  $trail->push('Edit', route('noticias.edit', ['noticia' => $noticia]));
  $trail->push($noticia->name, route('noticias.edit', ['noticia' => $noticia]));
});

Breadcrumbs::for('detail_noticias', function ($trail, $noticia) {
  $trail->parent('noticias');
  $trail->push('Detail', route('noticias.show', ['noticia' => $noticia]));
  $trail->push($noticia->name, route('noticias.show', ['noticia' => $noticia]));
});

//Clientes
Breadcrumbs::for('clientes', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Clientes', route('videos.index'));
});

Breadcrumbs::for('edit_videos', function ($trail, $video) {
  $trail->parent('videos');
  $trail->push('Edit', route('videos.edit', ['video' => $video]));
  $trail->push($video->name, route('videos.edit', ['video' => $video]));
});

//Sliders
Breadcrumbs::for('sliders', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Sliders', route('sliders.index'));
});

Breadcrumbs::for('add_slider', function ($trail) {
  $trail->parent('sliders');
  $trail->push('Agregar', route('sliders.create'));
});

Breadcrumbs::for('edit_sliders', function ($trail, $slider) {
  $trail->parent('sliders');
  $trail->push('Edit', route('sliders.edit', ['slider' => $slider]));
  $trail->push($slider->name, route('sliders.edit', ['slider' => $slider]));
});

Breadcrumbs::for('detail_sliders', function ($trail, $slider) {
  $trail->parent('sliders');
  $trail->push('Detail', route('sliders.show', ['slider' => $slider]));
  $trail->push($slider->name, route('sliders.show', ['slider' => $slider]));
});


//Proyectos
Breadcrumbs::for('proyectos', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('proyectos', route('eventos.index'));
});

Breadcrumbs::for('add_evento', function ($trail) {
  $trail->parent('proyectos');
  $trail->push('Agregar', route('eventos.create'));
});

Breadcrumbs::for('edit_eventos', function ($trail, $evento) {
  $trail->parent('proyectos');
  $trail->push('Edit', route('eventos.edit', ['evento' => $evento]));
  $trail->push($evento->name, route('eventos.edit', ['evento' => $evento]));
});

Breadcrumbs::for('detail_eventos', function ($trail, $evento) {
  $trail->parent('proyectos');
  $trail->push('Detail', route('eventos.show', ['evento' => $evento]));
  $trail->push($evento->name, route('eventos.show', ['evento' => $evento]));
});

//Servicios
Breadcrumbs::for('servicios', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Servicios', route('servicios.index'));
});

Breadcrumbs::for('add_servicio', function ($trail) {
  $trail->parent('servicios');
  $trail->push('Agregar', route('servicios.create'));
});

Breadcrumbs::for('edit_servicios', function ($trail, $servicio) {
  $trail->parent('servicios');
  $trail->push('Edit', route('servicios.edit', ['servicio' => $servicio]));
  $trail->push($servicio->title, route('servicios.edit', ['servicio' => $servicio]));
});

//Articulos
Breadcrumbs::for('articulos', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Articulos', route('articulos.index'));
});

Breadcrumbs::for('add_articulo', function ($trail) {
  $trail->parent('articulos');
  $trail->push('Agregar', route('articulos.create'));
});

Breadcrumbs::for('edit_articulos', function ($trail, $articulo) {
  $trail->parent('articulos');
  $trail->push('Edit', route('articulos.edit', ['articulo' => $articulo]));
  $trail->push($articulo->title, route('articulos.edit', ['articulo' => $articulo]));
});


//Galeria de Fotos
Breadcrumbs::for('albums', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Albums', route('albums.index'));
});

Breadcrumbs::for('add_album', function ($trail) {
  $trail->parent('albums');
  $trail->push('Agregar', route('albums.create'));
});

Breadcrumbs::for('detail_album', function ($trail, $album) {
  $trail->parent('albums');
  $trail->push('Detail', route('albums.show', ['album' => $album]));
  $trail->push($album->name, route('albums.show', ['album' => $album]));
});

Breadcrumbs::for('edit_albums', function ($trail, $album) {
  $trail->parent('albums');
  $trail->push('Edit', route('albums.edit', ['album' => $album]));
  $trail->push($album->name, route('albums.edit', ['album' => $album]));
});

//CATEGORIAS
Breadcrumbs::for('categories', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Generos', route('categories.index'));
});

Breadcrumbs::for('add_category', function ($trail) {
  $trail->parent('categories');
  $trail->push('Agregar', route('categories.create'));
});

Breadcrumbs::for('edit_category', function ($trail, $category) {
  $trail->parent('categories');
  $trail->push('Edit', route('categories.edit', ['category' => $category]));
});

Breadcrumbs::for('edit_category_title', function ($trail, $category) {
  $trail->parent('edit_category', $category);
  $trail->push($category->title, route('categories.edit', ['category' => $category]));
});
//show
Breadcrumbs::for('detail_category', function ($trail, $category) {
  $trail->parent('categories');
  $trail->push('Detail', route('categories.show', ['category' => $category]));
});

Breadcrumbs::for('detail_category_title', function ($trail, $category) {
  $trail->parent('detail_category', $category);
  $trail->push($category->title, route('categories.show', ['category' => $category]));
});

//TAGS
Breadcrumbs::for('tags', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Tags', route('tags.index'));
});

Breadcrumbs::for('add_tags', function ($trail) {
  $trail->parent('tags');
  $trail->push('Add', route('tags.create'));
});


Breadcrumbs::for('edit_tags', function ($trail, $tag) {
  $trail->parent('tags');
  $trail->push('Edit', route('tags.edit', ['tag' => $tag]));
  $trail->push($tag->title, route('tags.edit', ['tag' => $tag]));
});

//ARTISTAS
Breadcrumbs::for('artistas', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Artistas', route('artistas.index'));
});

Breadcrumbs::for('detail_artistas', function ($trail, $artista) {
  $trail->parent('artistas');
  $trail->push('Detail', route('artistas.show', ['artista' => $artista]));
  $trail->push($artista->title, route('artistas.show', ['artista' => $artista]));
});

Breadcrumbs::for('edit_artistas', function ($trail, $artista) {
  $trail->parent('artistas');
  $trail->push('Edit', route('artistas.edit', ['artista' => $artista]));
  $trail->push($artista->title, route('artistas.edit', ['artista' => $artista]));
});

//GALERIA DE FOTOS
Breadcrumbs::for('filemanager', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('File manager', route('filemanager.index'));
});

//Roles
Breadcrumbs::for('roles', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Roles', route('roles.index'));
});

Breadcrumbs::for('add_role', function ($trail) {
  $trail->parent('roles');
  $trail->push('Add', route('roles.create'));
});

Breadcrumbs::for('detail_role', function ($trail, $role) {
  $trail->parent('roles');
  $trail->push('Detail', route('roles.show', ['role' => $role]));
  $trail->push($role->name, route('roles.show', ['role' => $role]));
});

//editar
Breadcrumbs::for('edit_role', function ($trail, $role) {
  $trail->parent('roles');
  $trail->push('Edit', route('roles.edit', ['role' => $role]));
  $trail->push($role->name, route('roles.show', ['role' => $role]));
});

//usuarios
Breadcrumbs::for('users', function ($trail) {
  $trail->parent('dashboard');
  $trail->push('Users', route('users.index'));
});

Breadcrumbs::for('add_user', function ($trail) {
  $trail->parent('users');
  $trail->push('Add', route('users.create'));
});

Breadcrumbs::for('edit_user', function ($trail, $user) {
  $trail->parent('users');
  $trail->push('Edit', route('users.edit', ['user' => $user]));
  $trail->push($user->name, route('users.show', ['user' => $user]));
});
