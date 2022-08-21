<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use App\Filters\Auth_Admin;
use App\Filters\Auth_Login;
use App\Filters\Auth_Pendataan;
use App\Filters\Auth_Pengecekan;
use App\Filters\Auth_Pengadaan;
use App\Filters\Auth_Umum;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     			=> CSRF::class,
		'toolbar'  			=> DebugToolbar::class,
		'honeypot'			=> Honeypot::class,
		'auth_admin'    	=> Auth_Admin::class,
		'auth_login'    	=> Auth_Login::class,
		'auth_pendataan'    => Auth_Pendataan::class,
		'auth_pengecekan'   => Auth_Pengecekan::class,
		'auth_pengadaan'    => Auth_Pengadaan::class,
		'auth_umum'    		=> Auth_Umum::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			// 'honeypot',
			// 'csrf',
		],
		'after'  => [
			'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [];
}
