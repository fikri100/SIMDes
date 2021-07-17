<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

// --------------------------------------------------------------------------------

define('JK', array('l'=>'Laki-laki', 'p'=>'Perempuan'));
define('GOLDAR', array('a'=>'A', 'b'=>'B', 'ab'=>'AB', 'o'=>'O', 'belum'=>'Belum Tahu'));
define('DUSUN', array('0'=>'Belum Diisi','1'=>'Pager', '2'=>'Ngumbuk', '3'=>'Bendet'));
define('AGAMA', array('islam'=>'Islam', 'kristen'=>'Kristen', 'katolik'=>'Katolik', 'hindu'=>'Hindu', 'buddha'=>'Buddha', 'konghucu'=>'Konghucu', 'lain'=>'Lainnya'));
define('PENDIDIKAN', array('sd'=>'SD', 'sltp'=>'SLTP/Sederajat', 'slta'=>'SLTA/Sederajat', 'd1'=>'Diploma 1', 'd2'=>'Diploma 2', 'd3'=>'Diploma 3', 's1'=>'Sarjana/Sederajat', 's2'=>'Magister', 's3'=>'Doktor'));
define('PEKERJAAN', array('petani'=>'Petani/Peternak', 'swasta'=>'Karyawan Swasta', 'pns'=>'PNS', 'wiraswasta'=>'Wiraswasta', 'pelajar'=>'Pelajar/Mahasiswa', 'rumah'=>'Mengurus Rumah Tangga', 'lain'=>'Lainnya'));
define('PERKAWINAN', array('belum'=>'Belum Menikah', 'sudah'=>'Sudah Menikah', 'cerai_hidup'=>'Cerai Hidup', 'cerai_mati'=>'Cerai Mati'));
define('HUBUNGAN', array('anak'=>'Anak','orang_tua'=>'Orang Tua','saudara'=>'Saudara','pasangan'=>'Suami/Istri','tetangga'=>'Tetangga','lain'=>'Lain-lain'));
define('TABEL', array('kelahiran' => 'tbl_kelahiran', 'kematian'=>'tbl_kematian', 'tdkmampu'=>'tbl_tdk_mampu', 'biodata'=>'tbl_biodata', 'umum'=>'tbl_umum', 'domisili'=>'tbl_domisili'));
define('CAPTION', array('kelahiran' => 'Surat Kelahiran', 'kematian'=>'Surat Kematian', 'tdkmampu'=>'Surat Tidak Mampu', 'biodata'=>'Surat Biodata', 'umum'=>'Surat Umum', 'domisili'=>'Surat Domisili'));

define('BIDANG_BUMDES', array('layanan'=>'Layanan','keuangan'=>'Keuangan','penyewaan'=>'Penyewaan','perantara'=>'Perantara','perdagangan'=>'Perdagangan','induk'=>'Induk Usaha'));
define('BIDANG_UMKM', array('otomotif'=>'Otomotif','fashion'=>'Fashion','kuliner'=>'Kuliner','kecantikan'=>'Kecantikan','kerajinan'=>'Kerajinan Tangan','travel'=>'Tour & Travel','agribisnis'=>'Agribisnis','pendidikan'=>'Pendidikan','kelontong'=>'Toko Kelontong'));
// --------------------------------------------------------------------------------
define('TAHUN', '2021');

// Status User
define('user_baru', 0);
define('profil_lengkap', 1);
// define('sudah_valid', 2);

// Role User
define('warga',0);
define('kades',1);
define('sekretaris',2);
define('bpd',3);
define('master',99);

// Status Surat
define('surat_ditolak',-1);
define('surat_baru',0);
define('surat_proses',1);
define('surat_selesai',2);
define('surat_diterima',3);

// Status Pengaduan
define('pengaduan_baru',0);
define('pengaduan_proses',1);
define('pengaduan_selesai',2);
define('pengaduan_ditolak',3);

// Status Kegiatan
define('kegiatan_baru',0);
define('kegiatan_rencana',1);
define('kegiatan_proses',2);
define('kegiatan_selesai',3);
define('kegiatan_arsip',4);
define('kegiatan_revisi',5);

// Status Berita
define('berita_baru',0);
define('berita_valid',1);
define('berita_diturunkan',2);
define('berita_ditolak',3);

define('kata_sandi', 'pagerngumbukmakmur');
