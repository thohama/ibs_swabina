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

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Auth::routes();

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('requestpekerjaan', function () {
    return view('request_pekerjaan');
});

Route::get('datakaryawan', 'HomeController@data_karyawan');

Route::get('data_payroll','HomeController@data_payroll');

Route::get('generate_payroll','HomeController@generate_payroll');
Route::post('generate_payroll/simpan','HomeController@simpan_generate_payroll');

Route::get('print_data_payroll/{id}','HomeController@print_data_payroll');


Route::get('setup_komponen_gaji', 'HomeController@setup_komponen_gaji');
Route::post('setup_komponen_gaji/simpan', 'HomeController@simpan_komponen_gaji');
Route::post('setup_komponen_gaji/edit', 'HomeController@edit_komponen_gaji');
Route::delete('setup_komponen_gaji/delete', 'HomeController@delete_komponen_gaji');


Route::get('setup_periode_gaji', 'HomeController@setup_periode_gaji');
Route::post('setup_periode_gaji/simpan', 'HomeController@simpan_periode_gaji');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});

Route::get('cetakpdf','HomeController@cetakPdf');
Route::get('basicform','HomeController@basicform');
Route::get('admin/tambah_data_pegawai','HomeController@tambah_pegawai');
Route::get('admin/data_pegawai','HomeController@index_pegawai')->name('pegawai.index');
Route::post('admin/import_data_pegawai', 'HomeController@import_excel')->name('pegawai.import');
Route::post('admin/store_data_pegawai','HomeController@store_pegawai');
Route::get('detail_pelamar/{id}','HomeController@detail_pelamar');

Route::prefix('jobseeker')->group(function(){
    //-x regular
    Route::get('profil/', 'JobseekerController@getProfil');
    Route::get('profil/edit/{id}', 'JobseekerController@editProfil');
    Route::get('notifikasi', 'JobseekerController@getNotifikasi');
    Route::get('riwayattes', 'JobseekerController@getRiwayattes');
    Route::get('lowonganpekerjaan', 'JobseekerController@getLowonganpekerjaan');

    //-x data diri
    Route::get('datadiri/', 'JobseekerController@showDataDiri')->name('JobseekerDatadiri');
    Route::get('datadiri/insert', 'JobseekerController@insertDataDiri');

    //-x Hubungan jobseeker dengan lowongan
    Route::get('dashboard', 'JobseekerController@getDashboard')->name('JobseekerDashboard');
    Route::get('dashboard/show/{id}', 'JobseekerController@showLowongan');
    Route::post('lamaran/subscribe','JobseekerController@subscribeLamaran')->name('JobseekerLowonganSubscribe');

    //-x create method
    Route::get('profil/riwayatpekerjaan/create', 'JobseekerController@createRiwayatpekerjaan');
    Route::get('profil/riwayatpendidikan/create', 'JobseekerController@createRiwayatPendidikan');
    Route::get('profil/sertifikatkeahlian/create', 'JobseekerController@createSertifikatkeahlian');
    Route::get('profil/kemampuanbahasa/create', 'JobseekerController@createKemampuanbahasa');
    Route::get('profil/curiculumvitae/create', 'JobseekerController@createCuriculumvitae');
    Route::get('profil/tentangsaya/create', 'JobseekerController@createTentangsaya');
    Route::get('notifikasi/create', 'JobseekerController@createNotifikasi');
    Route::get('riwayattes/create', 'JobseekerController@createRiwayattes');
    Route::get('lowonganpekerjaan/create', 'JobseekerController@createtLowonganpekerjaan');

    //-x Store method
    Route::post('datadiri/submitdatadiriawal/', 'JobseekerController@storeDataDiriAwal');
    Route::post('datadiri/submitdatadiri/', 'JobseekerController@storeDataDiri');
    Route::post('datadiri/submitpendidikanformal/', 'JobseekerController@storeDataPendidikanFormal');
    Route::post('datadiri/submitpendidikaninformal/', 'JobseekerController@storeDataPendidikanInformal');
    Route::post('datadiri/submitpendidikanbahasa/', 'JobseekerController@storeDataPendidikanBahasa');
    Route::post('datadiri/submitpengalamankerja/', 'JobseekerController@storeDataPengalamanKerja');
    Route::post('datadiri/submitpengalamanorganisasi/', 'JobseekerController@storeDataPengalamanOrganisasi');
    Route::post('datadiri/submitriwayatpenyakit/', 'JobseekerController@storeDataRiwayatPenyakit');
    Route::post('datadiri/submitminat/', 'JobseekerController@storeDataMinat');
    Route::post('datadiri/submitlampiran/', 'JobseekerController@storeDataLampiran');

    //delete data
    Route::delete('datadiri/deletependidikanformal/', 'JobseekerController@destroyDataPendidikanFormal');
    Route::delete('datadiri/deletependidikaninformal/', 'JobseekerController@destroyDataPendidikanInformal');
    Route::delete('datadiri/deletependidikanbahasa/', 'JobseekerController@destroyDataPendidikanBahasa');
    Route::delete('datadiri/deletepengalamankerja/', 'JobseekerController@destroyDataPengalamanKerja');
    Route::delete('datadiri/deletepengalamanorganisasi/', 'JobseekerController@destroyDataPengalamanOrganisasi');
    Route::delete('datadiri/deleteriwayatpenyakit/', 'JobseekerController@destroyDataRiwayatPenyakit');
    Route::delete('datadiri/deleteminat/', 'JobseekerController@destroyDataMinat');
    Route::delete('datadiri/deletelampiran/', 'JobseekerController@destroyDataLampiran');

    //-x support ajax
    Route::post('support/getst/', 'SupportController@getSt');

    Route::get('lampiran/{kategori}','JobSeekerController@getLampiran');
    Route::get('cetakpdf','JobSeekerController@getCetakPdf');

});

//recruitment
Route::get('apply', 'RecruitmentController@create');
Route::post('recruitment/store', 'RecruitmentController@store');


