<?php


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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [
	'middleware' => 'auth',
	'before' => 'crsf',
	'uses' => 'HomeController@index']);

// ACCESO A LAS RUTAS DE ALUMNOS
/* Leer */
Route::get('alumnos', 'AlumnoController@index')->name('alumnos');

/* Crear */
Route::post('alumnos/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AlumnoController@create'])->name('alumnos/crear');

Route::put('alumnos/guardar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AlumnoController@store'])->name('alumnos/guardar');

/* Actualizar */
Route::get('alumnos/editar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AlumnoController@edit'])->name('alumnos/editar');

Route::put('alumnos/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'AlumnoController@update'])->name('alumnos/actualizar');

/* Eliminar */
Route::put('alumnos/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'AlumnoController@delete'])->name('alumnos/eliminar');

/* Buscar */
Route::post('alumnos/buscar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AlumnoController@search'])->name('alumnos/buscar');

Route::post('alumnos/filtro', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AlumnoController@filter'])->name('alumnos/filtro');

    Route::get('alumnos/importacion', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@indexAlumno'])->name('alumnos/importacion');

    Route::get('alumnos/exportar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@exportAlumno'])->name('alumnos/exportar');

    Route::put('usuarios/import', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@importAlumno'])->name('alumnos/importar');

// ACCESO A LAS RUTAS DE CURSOS
/* Leer */
Route::get('cursos', 'CursoController@index')->name('cursos');

/* Crear */
Route::post('cursos/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'CursoController@create'])->name('cursos/crear');

Route::put('cursos/guardar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'CursoController@store'])->name('cursos/guardar');

/* Actualizar */
Route::get('cursos/editar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'CursoController@edit'])->name('cursos/editar');

Route::put('cursos/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'CursoController@update'])->name('cursos/actualizar');

/* Eliminar */
Route::put('cursos/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'CursoController@delete'])->name('cursos/eliminar');

/* Buscar */
Route::post('cursos/buscar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'CursoController@search'])->name('cursos/buscar');

Route::post('cursos/filtro', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'CursoController@filter'])->name('cursos/filtro');

    Route::get('cursos/importacion', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@indexCurso'])->name('cursos/importacion');

    Route::get('cursos/exportar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@exportCurso'])->name('cursos/exportar');

    Route::put('cursos/importar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@importCurso'])->name('cursos/importar');

// ACCESO A LAS RUTAS DE ASIGNATURAS
/* Leer */
Route::get('asignaturas', 'AsignaturaController@index')->name('asignaturas');

/* Crear */
Route::post('asignaturas/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsignaturaController@create'])->name('asignaturas/crear');

Route::put('asignaturas/guardar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsignaturaController@store'])->name('asignaturas/guardar');

/* Actualizar */
Route::get('asignatura/editar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsignaturaController@edit'])->name('asignaturas/editar');

Route::put('asignatura/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'AsignaturaController@update'])->name('asignaturas/actualizar');

/* Eliminar */
Route::put('asignaturas/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'AsignaturaController@delete'])->name('asignaturas/eliminar');

/* Buscar */
Route::post('asignaturas/buscar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsignaturaController@search'])->name('asignaturas/buscar');

Route::post('asignaturas/filtro', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsignaturaController@filter'])->name('asignaturas/filtro');

    Route::get('asignaturas/importacion', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@indexAsignatura'])->name('asignaturas/importacion');

    Route::get('asignaturas/exportar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@exportAsignatura'])->name('asignaturas/exportar');

    Route::put('asignaturas/importAsignatura', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@importAsignatura'])->name('asignaturas/importar');


// ACCESO A LAS RUTAS DE ASISTENCIAS
/* Leer */
Route::get('asistencias', 'AsistenciaController@index')->name('asistencias');

/* Crear */
Route::post('asistencias/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsistenciaController@create'])->name('asistencias/crear');

Route::put('asistencias/guardar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsistenciaController@store'])->name('asistencias/guardar');

/* Actualizar */
Route::get('asistencias/editar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsistenciaController@edit'])->name('asistencias/editar');

Route::put('asistencias/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'AsistenciaController@update'])->name('asistencias/actualizar');

/* Eliminar */
Route::put('asistencias/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'AsistenciaController@delete'])->name('asistencias/eliminar');

/* Buscar */
Route::post('asistencias/buscar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsistenciaController@search'])->name('asistencias/buscar');

Route::post('asistencias/filtro', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AsistenciaController@filter'])->name('asistencias/filtro');

    Route::get('asistencias/importacion', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@indexAsistencia'])->name('asistencias/importacion');

    Route::get('asistencias/exportar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@exportAsistencia'])->name('asistencias/exportar');

    Route::put('asistencias/importar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@importAsistencia'])->name('asistencias/importar');

// ACCESO A LAS RUTAS DE PROFESORES
/* Leer */
Route::get('profesores', 'ProfesorController@index')->name('profesores');

/* Crear */
Route::post('profesores/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ProfesorController@create'])->name('profesores/crear');

Route::put('profesores/guardar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ProfesorController@store'])->name('profesores/guardar');

/* Actualizar */
Route::get('profesores/editar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ProfesorController@edit'])->name('profesores/editar');

Route::put('profesores/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'ProfesorController@update'])->name('profesores/actualizar');

/* Eliminar */
Route::put('profesores/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'ProfesorController@delete'])->name('profesores/eliminar');

/* Buscar */
Route::post('profesores/buscar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ProfesorController@search'])->name('profesores/buscar');

Route::post('profesores/filtro', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ProfesorController@filter'])->name('profesores/filtro');

    Route::get('profesores/importacion', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@indexProfesor'])->name('profesores/importacion');

    Route::get('profesores/exportar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@exportProfesor'])->name('profesores/exportar');

    Route::put('profesores/importar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@importProfesor'])->name('profesores/importar');

// ACCESO A LAS RUTAS DE USUARIOS

/* Leer */
Route::get('usuarios', 'UsuarioController@index')->name('usuarios');

/* Crear */
Route::post('usuarios/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'UsuarioController@create'])->name('usuarios/crear');

Route::put('usuarios/guardar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'UsuarioController@store'])->name('usuarios/guardar');

/* Actualizar */
Route::get('usuarios/editar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'UsuarioController@edit'])->name('usuarios/editar');

Route::put('usuarios/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'UsuarioController@update'])->name('usuarios/actualizar');

/* Eliminar */
Route::put('usuarios/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'UsuarioController@delete'])->name('usuarios/eliminar');

/* Buscar */
Route::post('usuarios/buscar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'UsuarioController@search'])->name('usuarios/buscar');

Route::post('usuarios/filtro', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'UsuarioController@filter'])->name('usuarios/filtro');

Route::get('usuarios/importacion', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'CsvFile@indexUser'])->name('usuarios/importacion');

Route::get('usuarios/exportar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'CsvFile@exportUser'])->name('usuarios/exportar');

Route::put('usuarios/importar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'CsvFile@importUser'])->name('usuarios/importar');

// ACCESSO A RUTAS DE NOTAS
/* Leer */
Route::get('notas', 'NotaController@index')->name('notas');

/* Crear */
Route::post('notas/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'NotaController@create'])->name('notas/crear');

Route::put('notas/guardar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'NotaController@store'])->name('notas/guardar');

/* Actualizar */
Route::get('notas/editar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'NotaController@edit'])->name('notas/editar');

Route::put('notas/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'NotaController@update'])->name('notas/actualizar');

/* Eliminar */
Route::put('notas/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'NotaController@delete'])->name('notas/eliminar');

/* Buscar */
Route::post('notas/buscar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'NotaController@search'])->name('notas/buscar');

Route::post('notas/filtro', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'NotaController@filter'])->name('notas/filtro');

Route::get('notas/ver/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'NotaController@ver'])->name('notas/ver');

    Route::get('notas/importacion', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@indexNota'])->name('notas/importacion');

    Route::get('notas/exportar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@exportNota'])->name('notas/exportar');

    Route::put('notas/importar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@importNota'])->name('notas/importar');

// ACCESO A LAS RUTAS DE DEPARTAMENTOS
/* Leer */
Route::get('departamentos', 'DepartamentoController@index')->name('departamentos');

/* Crear */
Route::post('departamentos/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'DepartamentoController@create'])->name('departamentos/crear');

Route::put('departamentos/guardar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'DepartamentoController@store'])->name('departamentos/guardar');

/* Actualizar */
Route::get('departamentos/editar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'DepartamentoController@edit'])->name('departamentos/editar');

Route::put('departamentos/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'DepartamentoController@update'])->name('departamentos/actualizar');

/* Eliminar */
Route::put('departamentos/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'DepartamentoController@delete'])->name('departamentos/eliminar');

/* Buscar */
Route::post('departamentos/buscar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'DepartamentoController@search'])->name('departamentos/buscar');

Route::post('departamentos/filtro', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'DepartamentoController@filter'])->name('departamentos/filtro');

    Route::get('departamentos/importacion', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@indexDepartamento'])->name('departamentos/importacion');

    Route::get('departamentos/exportar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@exportDepartamento'])->name('departamentos/exportar');

    Route::put('departamentos/importar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@importDepartamento'])->name('departamentos/importar');

// ACCESO A LAS RUTAS DE AULAS
/* Leer */
Route::get('aulas', 'AulaController@index')->name('aulas');

/* Crear */
Route::post('aulas/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AulaController@create'])->name('aulas/crear');

Route::put('aulas/guardar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AulaController@store'])->name('aulas/guardar');

/* Actualizar */
Route::get('aulas/editar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AulaController@edit'])->name('aulas/editar');

Route::put('aulas/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'AulaController@update'])->name('aulas/actualizar');

/* Eliminar */
Route::put('aulas/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'AulaController@delete'])->name('aulas/eliminar');

/* Buscar */
Route::post('aulas/buscar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AulaController@search'])->name('aulas/buscar');

Route::post('aulas/filtro', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'AulaController@filter'])->name('aulas/filtro');

    Route::get('aulas/importacion', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@indexAula'])->name('aulas/importacion');

    Route::get('aulas/exportar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@exportAula'])->name('aulas/exportar');

    Route::put('aulas/importar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@importAula'])->name('aulas/importar');

// ACCESO A LAS RUTAS DE EVENTOS
/* Leer */
Route::get('eventos', 'EventoController@index')->name('eventos');

/* Crear */
Route::post('eventos/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'EventoController@create'])->name('eventos/crear');

Route::put('eventos/guardar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'EventoController@store'])->name('eventos/guardar');

/* Actualizar */
Route::get('eventos/editar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'EventoController@edit'])->name('eventos/editar');

Route::put('eventos/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'EventoController@update'])->name('eventos/actualizar');

/* Eliminar */
Route::put('eventos/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'EventoController@delete'])->name('eventos/eliminar');

/* Buscar */
Route::post('eventos/buscar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'EventoController@search'])->name('eventos/buscar');

Route::post('eventos/filtro', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'EventoController@filter'])->name('eventos/filtro');

    Route::get('eventos/importacion', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@indexEvento'])->name('eventos/importacion');

    Route::get('eventos/exportar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@exportEvento'])->name('eventos/exportar');

    Route::put('eventos/importar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@importEvento'])->name('eventos/importar');

// ACCESO A LAS RUTAS DE TAREAS
/* Leer */
Route::get('tareas', 'TareaController@index')->name('tareas');

/* Crear */
Route::post('tareas/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TareaController@create'])->name('tareas/crear');

Route::put('tareas/guardar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TareaController@store'])->name('tareas/guardar');

/* Actualizar */
Route::get('tareas/editar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TareaController@edit'])->name('tareas/editar');

Route::put('tareas/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'TareaController@update'])->name('tareas/actualizar');

/* Eliminar */
Route::put('tareas/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'TareaController@delete'])->name('tareas/eliminar');

/* Buscar */
Route::post('tareas/buscar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TareaController@search'])->name('tareas/buscar');

Route::post('tareas/filtro', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TareaController@filter'])->name('tareas/filtro');

    Route::get('tareas/importacion', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@indexTarea'])->name('tareas/importacion');

    Route::get('tareas/exportar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@exportTarea'])->name('tareas/exportar');

    Route::put('tareas/importar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@importTarea'])->name('tareas/importar');

// ACCESO A LAS RUTAS DE TEMAS
/* Leer */
Route::get('temas', 'TemaController@index')->name('temas');

/* Crear */
Route::post('temas/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TemaController@create'])->name('temas/crear');

Route::put('temas/guardar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TemaController@store'])->name('temas/guardar');

/* Actualizar */
Route::get('temas/editar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TemaController@edit'])->name('temas/editar');

Route::put('temas/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'TemaController@update'])->name('temas/actualizar');

/* Eliminar */
Route::put('temas/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'TemaController@delete'])->name('temas/eliminar');

/* Buscar */
Route::post('temas/buscar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TemaController@search'])->name('temas/buscar');

Route::post('temas/filtro', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'TemaController@filter'])->name('temas/filtro');

    Route::get('temas/importacion', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@indexTema'])->name('temas/importacion');

    Route::get('temas/exportar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@exportTema'])->name('temas/exportar');

    Route::put('temas/importar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@import'])->name('usuarios/importar');

// ACCESO A LAS RUTAS DE RESERVAS
/* Leer */
Route::get('reservas', 'ReservaController@index')->name('reservas');

/* Crear */
Route::post('reservas/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ReservaController@create'])->name('reservas/crear');

Route::put('reservas/guardar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ReservaController@store'])->name('reservas/guardar');

/* Actualizar */
Route::get('reservas/editar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ReservaController@edit'])->name('reservas/editar');

Route::put('reservas/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'ReservaController@update'])->name('reservas/actualizar');

/* Eliminar */
Route::put('reservas/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'ReservaController@delete'])->name('reservas/eliminar');

/* Buscar */
Route::post('reservas/buscar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ReservaController@search'])->name('reservas/buscar');

Route::post('reservas/filtro', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ReservaController@filter'])->name('reservas/filtro');

    Route::get('reservas/importacion', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@indexReserva'])->name('reservas/importacion');

    Route::get('reservas/exportar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@exportReserva'])->name('reservas/exportar');

    Route::put('reservas/importar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@importReserva'])->name('reservas/importar');

// RUTAS DE ACCESO A CLASES

/* Leer */
Route::get('clases', 'ClaseController@index')->name('clases');

/* Crear */
Route::post('clases/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ClaseController@create'])->name('clases/crear');

Route::put('clases/guardar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ClaseController@store'])->name('clases/guardar');

/* Actualizar */
Route::get('clases/editar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ClaseController@edit'])->name('clases/editar');

Route::put('clases/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'ClaseController@update'])->name('clases/actualizar');

/* Eliminar */
Route::put('clases/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'ClaseController@delete'])->name('clases/eliminar');

/* Buscar */
Route::post('clases/buscar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ClaseController@search'])->name('clases/buscar');

Route::post('clases/filtro', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'ClaseController@filter'])->name('clases/filtro');

    Route::get('clases/importacion', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@indexClase'])->name('clases/importacion');

    Route::get('clases/exportar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@exportClase'])->name('clases/exportar');

    Route::put('usuarios/importar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@importClase'])->name('clases/importar');

// ACCESO A RUTAS DE PERFILES

/* Leer */
Route::get('perfiles', 'PerfilController@index')->name('perfiles');

/* Crear */
Route::post('perfiles/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'PerfilController@create'])->name('perfiles/crear');

Route::put('perfiles/guardar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'PerfilController@store'])->name('perfiles/guardar');

/* Actualizar */
Route::get('perfiles/editar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'PerfilController@edit'])->name('perfiles/editar');

Route::put('perfiles/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'PerfilController@update'])->name('perfiles/actualizar');

/* Eliminar */
Route::put('perfiles/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'PerfilController@delete'])->name('perfiles/eliminar');

/* Buscar */
Route::post('perfiles/buscar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'PerfilController@search'])->name('perfiles/buscar');

Route::post('perfiles/filtro', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'PerfilController@filter'])->name('perfiles/filtro');

    Route::get('perfiles/importacion', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@indexPerfil'])->name('perfiles/importacion');

    Route::get('perfiles/exportar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@exportPerfil'])->name('perfiles/exportar');

    Route::put('perfiles/importar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@importPerfil'])->name('perfiles/importar');

// ACCESO A RUTAS DE ROLES

/* Leer */
Route::get('roles', 'RolController@index')->name('roles');

/* Crear */
Route::post('roles/crear', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'RolController@create'])->name('roles/crear');

Route::put('roles/guardar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'RolController@store'])->name('roles/guardar');

/* Actualizar */
Route::get('roles/editar/{id}', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'RolController@edit'])->name('roles/editar');

Route::put('roles/actualizar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'RolController@update'])->name('roles/actualizar');

/* Eliminar */
Route::put('roles/eliminar/{id}', [
    'middleware' => 'auth',
    'before' => 'auth',
    'uses' => 'RolController@delete'])->name('roles/eliminar');

/* Buscar */
Route::post('roles/buscar', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'RolController@search'])->name('roles/buscar');

Route::post('roles/filtro', [
    'middleware' => 'auth',
    'before' => 'crsf',
    'uses' => 'RolController@filter'])->name('roles/filtro');

    Route::get('roles/importacion', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@indexRol'])->name('roles/importacion');

    Route::get('roles/exportar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@exportRol'])->name('roles/exportar');

    Route::put('roles/importar', [
        'middleware' => 'auth',
        'before' => 'crsf',
        'uses' => 'CsvFile@importRol'])->name('roles/importar');
