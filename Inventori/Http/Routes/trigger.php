<?php

$middleware = ['wala.jwt.request.parser','wala.jwt.request.validation','auth.db.overwrite','auth.req.tenantIdOverwrite'];

Route::group(['prefix' => 'trigger', 'middleware' => $middleware], function() {

	Route::get('email-maintenance-reminder', function() {

		$inventoris = Inventori\App\Inventori\InventoriModel::all();

			foreach ($inventoris as $inventori) {
				
				if($inventori->calculate()->JumlahHariSejakMaintenanceTerakhir() > $inventori->maintenance_inventori) {

					$inventori->email()->maintenanceReminder();
				}
			}
	});

	Route::get('email-checkinventori-reminder', function() {

		$inventoris = Inventori\App\Inventori\InventoriModel::all();

			foreach ($inventoris as $inventori) {
				
				if ($inventori->calculate()->JumlahHariSejakCheckTerakhir() > $inventori->check_inventori) {
					
					$inventori->email()->checkInventoriReminder();
				}
			}
	});

});