<?php

use App\Model\PropertyType;
use App\Model\PropertyBuilding;
use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/add-resource', function () {

        $propertyBuildings = PropertyBuilding::where('user_id', auth()->user()->id)
            ->latest()
            ->get();
        $propertyTypes = PropertyType::where('user_id', auth()->user()->id)
            ->latest()
            ->get();

        return view('admin.property-mgt.index', compact('propertyBuildings', 'propertyTypes'));
    })->name('add-resource');

    // property
    Route::resource('/property', 'PropertyController');
    Route::get('property/destroy/{property}', 'PropertyController@destroy')->name('property.destroy');
    Route::post('import-property', 'PropertyController@importProperty')->name('import-property');


    // add property type
    Route::resource('/property-type', 'PropertyTypeController');
    Route::get('property-type/destroy/{propertyType}', 'PropertyTypeController@destroy')->name('property-type.destroy');
    Route::post('import-property-type', 'PropertyTypeController@importPropertyType')->name('import-property-type');



    // add property brand
    Route::resource('property-brand', 'PropertyBrandController');
    Route::get('property-brand/destroy/{propertyBrand}', 'PropertyBrandController@destroy')->name('property-brand.destroy');
    Route::post('import-property-brand', 'PropertyBrandController@importPropertyBrand')->name('import-property-brand');



    // add property building
    Route::resource('property-building', 'PropertyBuildingController');
    Route::post('import-property-building', 'PropertyBuildingController@importPropertyBuilding')->name('building.import');
    Route::get('property-building/destroy/{propertyBuilding}', 'PropertyBuildingController@destroy')->name('property-building.destroy');


    // add room
    Route::resource('room', 'RoomController');
    Route::get('room/destroy/{room}', 'RoomController@destroy')->name('room.destroy');
    Route::post('import-room', 'RoomController@importRoom')->name('room.import');


    // add room type
    Route::resource('room-type', 'RoomTypeController');
    Route::get('room-type/destroy/{roomType}', 'RoomTypeController@destroy')->name('room-type.destroy');
    Route::post('import-room-type', 'RoomTypeController@importRoomType')->name('room-type.import');



    // service routes
    Route::resource('service', 'ServiceController');
    Route::get('service/destroy/{service}', 'ServiceController@destroy')->name('service.destroy');
    Route::post('service-import', 'ServiceController@importService')->name('service.import');



    // attendants routes
    Route::resource('attendant', 'AttendantController');
    Route::get('attendant/destroy/{attendant}', 'AttendantController@destroy')->name('attendant.destroy');
    Route::post('import-attendant', 'AttendantController@importAttendant')->name('import-attendant');

    // inspector routes
    Route::resource('inspector', 'InspectorController');
    Route::get('inspector/destroy/{inspector}', 'InspectorController@destroy')->name('inspector.destroy');

    // houseman routes
    Route::resource('houseman', 'HousemanController');
    Route::get('houseman/destroy/{houseman}', 'HousemanController@destroy')->name('houseman.destroy');


    // supervisor routes
    Route::resource('supervisor', 'SuperVisorController');
    Route::get('supervisor/destroy/{supervisor}', 'supervisorController@destroy')->name('supervisor.destroy');

    // schedule routes
    Route::resource('schedule', 'ScheduleController');
    Route::get('schedule/destroy/{schedule}', 'ScheduleController@destroy')->name('schedule.destroy');
    Route::get('schedule-data', 'ScheduleController@showCalendar')->name('schedule-data');
    Route::get('show-calendar', 'ScheduleController@calendarView')->name('show-calendar');

    // vacant routes
    Route::get('room-status', 'VacantRoomController@index')->name('room-status');
    Route::get('room-filter', 'VacantRoomController@filterByProperty')->name('room.filter');

    // transaction Routes
    Route::get('transaction', 'TransactionController@index')->name('transaction.index');
    Route::post('transaction/store', 'TransactionController@store')->name('transaction.store');
    Route::post('transaction/filter', 'TransactionController@filter')->name('transaction.filter');
    Route::get('transaction/{id}', 'TransactionController@getProperties');
    Route::get('transactions-listing', 'TransactionController@transactionListing')->name('transaction.listing');

    // dispatch routes
    Route::resource('dispatch', 'DispatchController');
    Route::get('dispatchs/{id}', 'DispatchController@getProperties');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');