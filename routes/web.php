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

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('siakad/index');
});

Route::get('/dashboard', function () {
    return view('admin/dashboard');
});

Route::get('/guru', function () {
    return view('admin/guru');
});


Route::get('keluar',function(){
    Auth::logout();
    return redirect('/login');
});

Auth::routes();
Route::get('/login', 'login@loginPage');
Route::post('/checklogin', 'login@Login');
Route::get('/admin','AdminController@dashboard')->name('admin')->middleware('admin');
Route::get('/guru','GuruController@dashboard')->name('guru')->middleware(['auth', 'guru']);
Route::get('/siswa','SiswaController@dashboard')->name('siswa')->middleware('siswa');
Route::get('/kepsek','KepsekController@dashboard')->name('kepsek')->middleware('kepsek');
Route::get('/home', 'HomeController@index');
Route::get('/logout', 'LoginController@logout');
Route::post('/daftar', 'Auth\RegisterController@register');
Route::get('/register', function () {
    return view('auth/register');
});

Route::post('/cek-email', 'UserController@email')->name('cek-email')->middleware('guest');
Route::get('/reset/password/{id}', 'UserController@password')->name('reset.password')->middleware('guest');
Route::patch('/reset/password/update/{id}', 'UserController@update_password')->name('reset.password.update')->middleware('guest');

Route::group(['middleware' =>['auth']], function() {

    Route::prefix('admin')->group(function () {
        Route::get('/', function() {
            return view('admin/dashboard');
        })->name('home');

        Route::prefix('user')->group(function () {
            Route::get('/', 'UserController@index')->name('admin/users')->middleware('admin');
            Route::get('/setting', 'UserController@create')->name('admin.users.create');
            Route::post('/setting', 'UserController@update')->name('admin.users.update');
        });
    });
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::put('/profile/update', 'UserController@updateProfile');
    Route::put('/profile/guru/update', 'UserController@updateProfileGuru');
    Route::put('/profile/siswa/update', 'UserController@updateProfileSiswa');
    Route::put('/profile/kepsek/update', 'UserController@updateProfileKepsek');

    Route::middleware(['guru'])->group(function () {
        Route::get('guru/dashboard', 'PegawaiController@dashboard');
        Route::get('guru/beranda', 'PegawaiController@beranda');
        Route::get('/absen/harian', 'PegawaiController@absen')->name('absen.harian');
        Route::post('/absen/simpan', 'PegawaiController@simpan')->name('absen.simpan');
        Route::get('/jadwal/guru', 'JadwalController@guru')->name('jadwal.guru');
        Route::get('/nilai', 'NilaiController@index');
        Route::resource('/ulangan', 'UlanganController');
        Route::resource('/sikap', 'SikapController');
        Route::get('/rapot/predikat', 'RapotController@predikat');
        Route::resource('/rapot', 'RaportController');
        Route::get('/guru/lihat-siswa', 'PegawaiController@lihatSiswa');
        Route::get('/guru/lihat-TU', 'PegawaiController@lihatTU');
        Route::get('/guru/lihat-info', 'PegawaiController@lihatInfo');

        Route::get('/absen', 'AbsenController@index');
        Route::get('/absen/detail/{idAbsen}', 'AbsenController@show');
        Route::get('/absen/cetak/{idAbsen}', 'AbsenController@getPdf');
        Route::get('/absen/list/{id}', 'AbsenController@listAbsen');
        Route::get('/absen/list/{idJadwal}/add/{idKelas}', 'AbsenController@listSiswa');
        Route::post('/absen/save', 'AbsenController@store');

        Route::get('/listmapel', 'MapelController@listMapelByGuru');
        Route::get('/listSiswa/{id}', 'NilaiController@listSiswa');
        Route::get('/detailNilai/{idMapel}', 'NilaiController@detailNilai');
        Route::post('/inputNilai', 'NilaiController@inputNilai');
    });

    Route::middleware(['siswa'])->group(function () {
        Route::get('/siswa/beranda', 'SiswaController@beranda');
        Route::get('/siswa/jadwal/lihat-jadwal', 'SiswaController@lihatJadwal');
        Route::get('/siswa/lihat-nilai', 'SiswaController@lihatNilai');
        Route::get('/siswa/lihat-pengumuman', 'SiswaController@lihatInfo');
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('admin/beranda', 'AdminController@dashboard');
        Route::get('admin/raport/kelas', 'RaportController@index');
        Route::get('admin/raport/kelas/{idKelas}', 'RaportController@show');
        Route::get('admin/raport/cetak/{idSiswa}', 'RaportController@cetak');

        // Route::get('/admin/jadwal/index', 'PembelajaranController@index');

        Route::get('admin/users/create', 'UserController@create');
        Route::post('admin/users', 'UserController@store');
        Route::get('admin/users/edit/{idUsers}/{idSiswa}/{idPegawai}', 'UserController@edit');
        Route::patch('admin/users/{id}', 'UserController@update');
        Route::get('admin/users/show/{id}', 'UserController@show');
        Route::delete('admin/users/destroy/{id}', 'UserController@destroy');

        Route::get('admin/petugasTU/create', 'PetugasTUController@create');
        Route::get('admin/petugasTU/index', 'PetugasTUController@index');
        Route::post('admin/petugasTU/index', 'PetugasTUController@store')->name('petugasTU');
        Route::post('admin/petugasTU', 'PetugasTUController@store');
        Route::get('admin/petugasTU/edit/{idPetugasTU}', 'PetugasTUController@edit');
        Route::put('admin/petugasTU/{idPetugasTU}', 'PetugasTUController@update');
        Route::get('admin/petugasTU/show/{id}', 'PetugasTUController@show');
        Route::delete('admin/petugasTU/destroy/{id}', 'PetugasTUController@destroy');


        // Route::get('admin/jadwal/index', 'PembelajaranController@index');
        // Route::get('admin/jadwal/show/{idKelas}/{idJadwal}', 'JadwalController@show');
        // Route::get('admin/jadwal/create', 'JadwalController@create');
        // Route::post('admin/jadwal', 'JadwalController@store');
        // Route::get('admin/jadwal/pilihSemester/{id}', 'JadwalController@pilihSemester');
        // Route::get('admin/jadwal/edit/{idJadwal}', 'JadwalController@edit');
        // Route::patch('admin/jadwal/{id}', 'JadwalController@update');
        // Route::get('admin/jadwal/detail/{id}', 'JadwalController@detail');
        // Route::delete('admin/jadwal/destroy/{idJadwal}', 'JadwalController@destroy');
        Route::get('admin/siswa/pilihKelas', 'SiswaController@pilihKelas');
        Route::get('admin/siswa/pilihSemester/{id}', 'SiswaController@pilihSemester');
        Route::get('admin/siswa/index/', 'SiswaController@index');
        Route::get('admin/siswa/tahunajaran/{year}', 'SiswaController@perTahunAjaran');
        Route::get('admin/siswa/tahunajaran', 'SiswaController@getTahunAjaran');
        Route::get('admin/siswa/create', 'SiswaController@create');
        Route::post('admin/siswa/', 'SiswaController@store');
        Route::get('admin/siswa/edit/{idSiswa}', 'SiswaController@edit');
        Route::put('admin/siswa/{idSiswa}', 'SiswaController@update');
        Route::get('admin/siswa/show/{idKelas}', 'SiswaController@show');
        Route::delete('admin/siswa/destroy/{id}', 'SiswaController@destroy');
        Route::get('admin/siswa/cetak-data-siswa', 'SiswaController@cetakSiswa')->name('cetak-data-siswa');
        Route::get('exportSiswa', 'SiswaController@siswaexport')->name('exportSiswa');
        Route::put('importSiswa', 'SiswaController@siswaimportexcel')->name('importSiswa');
        // Route::get('admin/cetak-tanggalsiswa', 'HistorisiswaController@cetakForm')->name('cetak-tanggalsiswa');
        // Route::get('admin/histori/cetak-data-pertanggal/{tglawal}/{tglakhir}', 'HistorisiswaController@cetakHistoriPertanggal')->name('cetak-data-pertanggal');

        Route::get('admin/cetak-siswa', 'SiswaController@cetakForm')->name('cetak-siswa');
        Route::get('admin/siswa/cetak-data-siswa/{tglawal}/{tglakhir}', 'SiswaController@cetakSiswa')->name('cetak-data-siswa');
        // kupisah disini
        Route::get('admin/siswa/filtersiswa/{year}', 'SiswaController@getDataPerYear');
        // end

        Route::get('admin/kelas/index', 'KelasController@index');
        Route::get('admin/kelas/create', 'KelasController@create');
        Route::post('admin/kelas', 'KelasController@store');
        Route::get('admin/kelas/edit/{id}', 'KelasController@edit');
        Route::put('admin/kelas/{id}', 'KelasController@update');
        Route::get('admin/kelas/show/{id}', 'KelasController@show');
        Route::delete('admin/kelas/destroy/{id}', 'KelasController@destroy');

        Route::get('admin/info/index', 'InfoController@index');
        Route::get('admin/info/create', 'InfoController@create');
        Route::post('admin/info', 'InfoController@store');
        Route::get('admin/info/edit/{id}', 'InfoController@edit');
        
        Route::put('admin/info/{id}', 'InfoController@update');
        Route::get('admin/info/show/{id}', 'InfoController@show');
        Route::delete('admin/info/destroy/{id}', 'InfoController@destroy');

        Route::get('admin/bayar/index', 'BayarController@index');
        Route::get('admin/bayar/create', 'BayarController@create');
        Route::post('admin/bayar', 'BayarController@store');
        Route::get('admin/bayar/edit/{id}', 'BayarController@edit');
        Route::patch('admin/bayar/{id}', 'BayarController@update');
        Route::get('admin/bayar/show/{id}', 'BayarController@show');
        Route::delete('admin/bayar/destroy/{id}', 'BayarController@destroy');
        Route::get('admin/pembayaran/show', 'PembayaranController@show');
        Route::get('admin/pembayaran/index', 'PembayaranController@index');
        Route::get('admin/pembayaran/create', 'PembayaranController@create');
        Route::post('admin/pembayaran', 'PembayaranController@store');
        Route::get('admin/pembayaran/edit/{id}', 'PembayaranController@edit');
        Route::patch('admin/pembayaran/{id}', 'PembayaranController@update');
        Route::delete('admin/pembayaran/destroy/{id}', 'PembayaranController@destroy');
        // Route::get('admin/cetak-pembayaran', 'PembayaranController@cetakForm')->name('cetak-pembayaran');
        Route::get('admin/pembayaran/cetak-data-pembayaran', 'PembayaranController@cetakPembayaran')->name('cetak-data-pembayaran');
        // Route::get('admin/pembayaran/cetak-data-pertanggal/{tglawal}/{tglakhir}', 'PembayaranController@cetakPembayaranPertanggal')->name('cetak-data-pertanggal');


        Route::get('admin/jadwal/pilihKelas', 'JadwalController@index');
        Route::get('admin/jadwal/pilihSemester/{id}', 'JadwalController@pilihSemester');
        Route::get('admin/jadwal/show/{idKelas}/{id}', 'JadwalController@show');
        Route::get('admin/jadwal/create/{id}', 'JadwalController@create');
        Route::post('admin/jadwal', 'JadwalController@store');
        Route::get('admin/jadwal/edit/{id}', 'JadwalController@edit');
        Route::patch('admin/jadwal/{id}', 'JadwalController@update');
        Route::delete('admin/jadwal/show/{idKelas}/{id}', 'JadwalController@destroy');
        // Route::get('admin/jadwal/index', 'PembelajaranController@index');
        // Route::get('admin/jadwal/show/{idKelas}/{idJadwal}', 'JadwalController@show');
        // Route::get('admin/jadwal/create', 'JadwalController@create');
        // Route::post('admin/jadwal', 'JadwalController@store');
        // Route::get('admin/jadwal/pilihSemester/{id}', 'JadwalController@pilihSemester');
        // Route::get('admin/jadwal/edit/{idJadwal}', 'JadwalController@edit');
        // Route::patch('admin/jadwal/{id}', 'JadwalController@update');
        // Route::get('admin/jadwal/detail/{id}', 'JadwalController@detail');
        // Route::delete('admin/jadwal/destroy/{idJadwal}', 'JadwalController@destroy');
        Route::get('admin/cetak-jadwal', 'JadwalController@cetakForm')->name('cetak-jadwal');
        Route::get('admin/jadwal/cetak-data-pertanggal/{tglawal}/{tglakhir}', 'JadwalController@cetakJadwalPertanggal')->name('cetak-data-pertanggal');
        Route::get('admin/pembelajaran/create', 'PembelajaranController@create');

        Route::get('admin/semester/index', 'SemesterController@index');
        Route::get('admin/semester/pilihSemester', 'SemesterController@index');
        Route::get('admin/semester/create', 'SemesterController@create');
        Route::post('admin/semester', 'SemesterController@store');
        Route::get('admin/semester/edit/{id}', 'SemesterController@edit');
        Route::put('admin/semester/{id}', 'SemesterController@update');
        Route::get('admin/semester/show/{id}', 'SemesterController@show');
        Route::delete('admin/semester/destroy/{id}', 'SemesterController@destroy');

        Route::get('admin/mapel/index', 'MapelController@index');
        Route::get('admin/mapel/create', 'MapelController@create');
        Route::post('admin/mapel', 'MapelController@store');
        Route::get('admin/mapel/edit/{id}', 'MapelController@edit');
        Route::put('admin/mapel/{id}', 'MapelController@update');
        Route::get('admin/mapel/show/{id}', 'MapelController@show');
        Route::delete('admin/mapel/destroy/{id}', 'MapelController@destroy');

        Route::get('admin/lks/index', 'LksController@index');
        Route::get('admin/lks/create', 'LksController@create');
        Route::post('admin/lks', 'LksController@store');
        Route::get('admin/lks/edit/{id}', 'LksController@edit');
        Route::put('admin/lks/{id}', 'LksController@update');
        Route::get('admin/lks/show/{id}', 'LksController@show');
        Route::delete('admin/lks/destroy/{id}', 'LksController@destroy');
        Route::get('admin/lks/cetak-data-lks/{tglawal}/{tglakhir}', 'LksController@cetakLks')->name('cetak-data-lks');

        Route::get('admin/iuran/index', 'IuranController@index');
        Route::get('admin/iuran/create', 'IuranController@create');
        Route::post('admin/iuran', 'IuranController@store');
        Route::get('admin/iuran/edit/{id}', 'IuranController@edit');
        Route::put('admin/iuran/{id}', 'IuranController@update');
        Route::get('admin/iuran/show/{id}', 'IuranController@show');
        Route::delete('admin/iuran/destroy/{id}', 'IuranController@destroy');
        Route::get('admin/cetak-iuran', 'IuranController@cetakForm')->name('cetak-iuran');
        Route::get('admin/iuran/cetak-data-iuran/{tglawal}/{tglakhir}', 'IuranController@cetakIuran')->name('cetak-data-iuran');

        Route::get('admin/histori/index-histori', 'SiswaController@indexHistori');
        Route::get('admin/histori/show-histori/{idKelas}', 'SiswaController@showHistori');
        Route::get('admin/histori/histori-siswa', 'HistorisiswaController@indexHistori');
        Route::get('admin/histori/detail-histori', 'HistorisiswaController@detailHistori');
        Route::get('admin/pembayaran/show/{id}', 'HistorisiswaController@show');
        Route::get('admin/jadwal/create', 'JadwalController@create');
        Route::post('admin/jadwal', 'JadwalController@store');
        Route::get('admin/jadwal/pilihSemester/{id}', 'JadwalController@pilihSemester');
        Route::get('admin/jadwal/edit/{idJadwal}', 'JadwalController@edit');
        Route::patch('admin/jadwal/{id}', 'JadwalController@update');
        Route::get('admin/jadwal/detail/{id}', 'JadwalController@detail');
        Route::delete('admin/jadwal/destroy/{idJadwal}', 'JadwalController@destroy');
        Route::get('admin/cetak-jadwal', 'JadwalController@cetakForm')->name('cetak-jadwal');
        Route::get('admin/jadwal/cetak-data-pertanggal/{tglawal}/{tglakhir}', 'JadwalController@cetakJadwalPertanggal')->name('cetak-data-pertanggal');
    });

    Route::middleware(['kepsek'])->group(function () {
        Route::get('kepsek/beranda', 'KepsekController@beranda');
        Route::get('kepsek/pegawai/index', 'PegawaiController@index');
        Route::get('kepsek/pegawai/create', 'PegawaiController@create');
        Route::post('kepsek/pegawai', 'PegawaiController@store');
        Route::get('kepsek/pegawai/edit/{idPegawai}', 'PegawaiController@edit');
        Route::put('kepsek/pegawai/{idPegawai}', 'PegawaiController@update');
        Route::get('kepsek/pegawai/show/{id}', 'PegawaiController@show');
        Route::delete('kepsek/pegawai/destroy/{id}', 'PegawaiController@destroy');
        Route::get('kepsek/pegawai/cetak-data-pegawai', 'PegawaiController@cetakPegawai')->name('cetak-data-pegawai');
        Route::get('exportPegawai', 'PegawaiController@pegawaiexport')->name('exportPegawai');
        Route::put('importPegawai', 'PegawaiController@pegawaiimportexcel')->name('importPegawai');
        Route::get('kepsek/lihat-info', 'KepsekController@lihatInfo');
        Route::get('kepsek/lihat-TU', 'KepsekController@lihatTU');

        Route::get('kepsek/users/index', 'UserController@index');
        Route::get('kepsek/users/create', 'UserController@create');
        Route::post('kepsek/users', 'UserController@store');
        Route::get('kepsek/users/edit/{id}', 'UserController@edit');
        Route::patch('kepsek/users/{id}', 'UserController@update');
        Route::get('kepsek/users/show/{id}', 'UserController@show');
        Route::delete('kepsek/users/destroy/{id}', 'UserController@destroy');
    });
});
