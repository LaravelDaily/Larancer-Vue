<?php

Route::group(['prefix' => '/v1', 'middleware' => ['auth:api'], 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::post('change-password', 'ChangePasswordController@changePassword')->name('auth.change_password');
    Route::apiResource('rules', 'RulesController', ['only' => ['index']]);
    Route::apiResource('clients', 'ClientsController');
    Route::apiResource('projects', 'ProjectsController');
    Route::apiResource('notes', 'NotesController');
    Route::apiResource('documents', 'DocumentsController');
    Route::apiResource('transactions', 'TransactionsController');
    Route::apiResource('currencies', 'CurrenciesController');
    Route::apiResource('transaction-types', 'TransactionTypesController');
    Route::apiResource('income-sources', 'IncomeSourcesController');
    Route::apiResource('client-statuses', 'ClientStatusesController');
    Route::apiResource('project-statuses', 'ProjectStatusesController');
    Route::apiResource('permissions', 'PermissionsController');
    Route::apiResource('roles', 'RolesController');
    Route::apiResource('users', 'UsersController');

    Route::get('reports', 'ReportsController@index')->name('reports.index');
    Route::get('user-actions', 'UserActionsController@index')->name('user-actions.index');
});
