<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Franchise\FranchiseRegistrationController;
use App\Http\Controllers\Admin\FranchiseControlController;
use App\Http\Controllers\Franchise\FranchisetestBookingController;
use App\Http\Controllers\Franchise\BoysManageController;
use App\Http\Controllers\Admin\TestCreateController;
use App\Http\Controllers\Admin\addcustomer;
use App\Http\Controllers\Admin\paymentController;
use App\Http\Controllers\Franchise\franchiseaddwallet;
use App\Http\Controllers\Admin\getsupportcontroller;
use App\Http\Controllers\Franchise\profile;
use App\Http\Controllers\Franchise\samplecollectioncontroller;
use App\Http\Controllers\Franchise\ordertracking;
use App\Http\Controllers\Franchise\TestBokkingController;
use App\Http\Controllers\Franchise\SlotManagmentController;
use App\Http\Controllers\StripePaymentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/userLogout', [App\Http\Controllers\HomeController::class, 'userLogout'])->name('userLogout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/webhook-info-i', [StripePaymentController::class, 'webhook'])->name('webhook');
Route::group(['prefix' => 'sis'], function () {
    Route::get('/register', [FranchiseRegistrationController::class, 'sisRegister'])->name('sisRegister');
});
Route::group(['prefix' => 'franchise'], function () {
    
    Route::get('/register', [FranchiseRegistrationController::class, 'franchiseRegister'])->name('franchiseRegister');
    Route::post('/franchisesubmitregistration', [FranchiseRegistrationController::class, 'franchisesubmitregistration'])->name('franchisesubmitregistration');
    Route::get('/booktest', [FranchisetestBookingController::class, 'booktest'])->name('booktest');
    Route::get('/manageboys', [BoysManageController::class, 'manageboys'])->name('manageboys');
    Route::get('/editboys/{id}', [BoysManageController::class, 'editboys'])->name('editboys');
    Route::post('/updateboy', [BoysManageController::class, 'updateboy'])->name('updateboy');
    Route::get('/createboy', [BoysManageController::class, 'createboy'])->name('createboy');
    Route::get('/manageslots', [BoysManageController::class, 'manageslots'])->name('manageslots');
    Route::post('/insertnewboy', [BoysManageController::class, 'insertnewboy'])->name('insertnewboy');
    Route::get('/franchiseaddwallet', [franchiseaddwallet::class, 'addwallet'])->name('franchiseaddwallet');
    Route::get('/invoice', [franchiseaddwallet::class, 'invoice'])->name('invoice');
    Route::post('/transactionsuccess', [StripePaymentController::class, 'transactionsuccess'])->name('transactionsuccess');
    Route::get('/transactionfail', [franchiseaddwallet::class, 'transactionfail'])->name('transactionfail');
    Route::get('/franchiseprofile', [profile::class, 'franchiseprofile'])->name('franchiseprofile');
    Route::get('/updatepofilepasswd', [profile::class, 'updatepofilepasswd'])->name('updatepofilepasswd');
    Route::get('/ordertracking', [ordertracking::class, 'customerordertracking'])->name('ordertracking');
    Route::get('/franchisewallet', [FranchiseControlController::class, 'franchisewallet'])->name('franchisewallet'); 
    
      Route::get('/billing/success', [TestBokkingController::class, 'billingsuccess'])->name('billingsuccess'); 
    Route::post('/billing', [TestBokkingController::class, 'billing'])->name('billing');  
    Route::get('/booktest', [TestBokkingController::class, 'booktest'])->name('booktest');  
    Route::post('/booknewtest', [TestBokkingController::class, 'booknewtest'])->name('booknewtest');  
    Route::any('/bookinghistory', [TestBokkingController::class, 'bookinghistory'])->name('bookinghistory');
    Route::get('/export-history', [TestBokkingController::class, 'bookinghistoryExpory'])->name('bookinghistory.export');
    
    // middleawareonly for based on auth role
 Route::get('/bill', [TestBokkingController::class, 'bill'])->name('bill');  
 
 
 Route::get('/transactiondetails', [BoysManageController::class, 'transactiondetails'])->name('transactiondetails');
 Route::get('/transaction-details-view/{id?}', [BoysManageController::class, 'transactiondetailsview'])->name('transcation.details.view');
 Route::get('exportransactions', [BoysManageController::class, 'exportransactions'])->name('exportransactions');
 
 
    // Route::get('/bookinghistory', [TestBokkingController::class, 'bookinghistory']);
    Route::any('/nonassignedslots', [SlotManagmentController::class, 'nonassignedslots'])->name('nonassignedslots');
    Route::get('/viewtestdetails/{id}', [TestBokkingController::class, 'viewtestdetails'])->name('viewtestdetails');
    Route::post('/updatetest', [TestBokkingController::class, 'updatetest'])->name('updatetest');
    Route::get('/changeslot', [SlotManagmentController::class, 'changeslot'])->name('changeslot');
    Route::get('/viewbokkedslot/{id}', [SlotManagmentController::class, 'viewbokkedslot'])->name('viewbokkedslot');
    Route::get('/viewslotdata/{id}', [SlotManagmentController::class, 'viewslotdata'])->name('viewslotdata');
    Route::post('/viewslotdatainfo', [SlotManagmentController::class, 'viewslotdatainfo'])->name('viewslotdatainfo');
    // Route::get('/viewslotdatainfo', [SlotManagmentController::class, 'viewslotdatainfo'])->name('viewslotdatainfo');
    
    Route::post('/updateslotdetails', [SlotManagmentController::class, 'updateslotdetails'])->name('updateslotdetails');
    Route::get('/bokkedtestdetails/{id?}', [TestBokkingController::class, 'bokkedtestdetails'])->name('bokkedtestdetails');
    Route::post('/updateslottoboys', [TestBokkingController::class, 'updateslottoboys'])->name('updateslottoboys');
    Route::post('/samplecollectionformrecived', [samplecollectioncontroller::class, 'samplecollectionformrecived'])->name('samplecollectionformrecived');
    Route::get('/samplesrecived', [samplecollectioncontroller::class, 'samplesrecived'])->name('samplesrecived');
    Route::post('/raiserequest', [samplecollectioncontroller::class, 'raiserequest'])->name('raiserequest');
    Route::get('/requestraised', [samplecollectioncontroller::class, 'requestraised'])->name('requestraised');
    
    Route::get('/productslist', [samplecollectioncontroller::class, 'productslist'])->name('productslist');
    Route::post('/addcart', [samplecollectioncontroller::class, 'addcart'])->name('addcart');
    Route::get('/cartlist', [samplecollectioncontroller::class, 'cartlist'])->name('cartlist');
    Route::any('/deletecart/{id}', [samplecollectioncontroller::class, 'deletecart'])->name('deletecart');
    Route::any('/addorder/{cartlist}', [samplecollectioncontroller::class, 'addorder'])->name('addorder');
    // Route::any('/checkout/{cartlist}/{cartid}/{productid}', [samplecollectioncontroller::class, 'checkout'])->name('checkout');
    Route::get('/deletefromcart/{id}', [samplecollectioncontroller::class, 'deletefromcart'])->name('deletefromcart');
    
});
Route::group(['prefix' => 'boy'], function () {
    Route::post('/setavailibity', [BoysManageController::class, 'setavailibity'])->name('boy/setavailibity');
    Route::post('/getavailibity', [BoysManageController::class, 'getavailibity'])->name('getavailibity');
    Route::get('/testreqform/{id}', [BoysManageController::class, 'testreqform'])->name('testreqform');
    Route::post('/testreqformdocuments/{id}', [BoysManageController::class, 'testreqformdocuments'])->name('testreqformdocuments');
    Route::post('/samplecollectionform', [samplecollectioncontroller::class, 'samplecollectionform'])->name('samplecollectionform');
    Route::get('/collectiondata', [samplecollectioncontroller::class, 'collectiondata'])->name('collectiondata');
    Route::get('/collectiondatatommorow', [samplecollectioncontroller::class, 'collectiondatatommorow'])->name('collectiondatatommorow');
    //userprofile
    
});


Route::group(['prefix' => 'admin'], function () {
    
    Route::post('/support', [FranchiseControlController::class, 'support'])->name('admin.support');
    Route::get('/sisreport', [FranchiseControlController::class, 'sisreport'])->name('admin.sisreport');
    Route::get('/packagelist', [FranchiseControlController::class, 'packagelist'])->name('packagelist');
    Route::get('/exportpackagelist', [FranchiseControlController::class, 'exportpackagelist'])->name('exportpackagelist');
    Route::get('/createpackage', [FranchiseControlController::class, 'createpackage'])->name('createpackage');
    Route::get('/editpackagelist/{id}', [FranchiseControlController::class, 'editpackagelist'])->name('editpackagelist');
    Route::post('/updatepackage', [FranchiseControlController::class, 'updatepackage'])->name('updatepackage');
    Route::post('/createnewpackage', [FranchiseControlController::class, 'createnewpackage'])->name('createnewpackage');
    Route::get('/assignpackage', [FranchiseControlController::class, 'assignpackage'])->name('assignpackage');
    Route::get('/exportassignpackage', [FranchiseControlController::class, 'exportassignpackage'])->name('exportassignpackage');
    Route::get('/assigntesttopackage', [FranchiseControlController::class, 'assigntesttopackage'])->name('assigntesttopackage');
    Route::post('/assignpackagetotest', [FranchiseControlController::class, 'assignpackagetotest'])->name('assignpackagetotest');

    Route::any('/recivedsamples', [TestBokkingController::class, 'recivedsamples'])->name('recivedsamples');
    Route::get('/editpackageinfo/{id}', [TestCreateController::class, 'editpackageinfo'])->name('editpackageinfo');
    Route::post('/deletetest', [TestCreateController::class, 'deletetest'])->name('deletetest');
    
    Route::get('/franchiselist', [FranchiseControlController::class, 'franchiselist'])->name('franchiselist');
    Route::get('/franchisedetails/{id}', [FranchiseControlController::class, 'franchisedetails'])->name('franchisedetails');
    Route::post('/updatelimit', [FranchiseControlController::class, 'updatelimit'])->name('update.limit');
    Route::post('/approvefranchise', [FranchiseControlController::class, 'approvefranchise'])->name('approvefranchise');
    Route::get('/listoffranchise', [FranchiseControlController::class, 'listoffranchise'])->name('listoffranchise'); 
    Route::get('/managetest', [TestCreateController::class, 'managetest'])->name('managetest');
    Route::get('/exportest', [TestCreateController::class, 'exportest'])->name('exportest');

    Route::get('/testedit', [TestCreateController::class, 'testedit'])->name('testedit');
    Route::get('/newtestedit', [TestCreateController::class, 'newtestedit'])->name('newtestedit');
    Route::post('/createnewtest', [TestCreateController::class, 'createnewtest'])->name('createnewtest');
    Route::get('/testeditinfo/{id}', [TestCreateController::class, 'testeditinfo'])->name('testeditinfo');
    Route::post('/testupdate', [TestCreateController::class, 'testupdate'])->name('testupdate');    
    Route::get('/addcustomer', [addcustomer::class, 'addcustomer'])->name('addcustomer');
    Route::get('/listcustomers', [addcustomer::class, 'listcustomers'])->name('listcustomers');
    Route::get('/payment', [paymentController::class, 'payment'])->name('payment');
    Route::get('/getsupport', [GetSupportController::class, 'getsupport'])->name('getsupport');
    Route::get('/collectionagents', [GetSupportController::class, 'collectionagents'])->name('collectionagents');
    Route::get('/addcollectionagent', [GetSupportController::class, 'addcollectionagent'])->name('addcollectionagent');
    Route::post('/insertnewcollection', [GetSupportController::class, 'insertnewcollection'])->name('insertnewcollection');
    Route::get('/collectionrequests', [samplecollectioncontroller::class, 'collectionrequests'])->name('collectionrequests');
    Route::get('/approverequests/{id}', [samplecollectioncontroller::class, 'approverequests'])->name('approverequests');
    Route::post('/assignboyconfirm', [samplecollectioncontroller::class, 'assignboyconfirm'])->name('assignboyconfirm');

    Route::post('/bookinghistroysamples', [samplecollectioncontroller::class, 'bookinghistroysamples'])->name('bookinghistroysamples');

    Route::get('/collectionsrecived', [samplecollectioncontroller::class, 'collectionsrecived'])->name('collectionsrecived');
    Route::post('/admincollectionupdate', [samplecollectioncontroller::class, 'admincollectionupdate'])->name('admincollectionupdate');
    
    Route::get('/products', [samplecollectioncontroller::class, 'products'])->name('products');
    Route::post('/insertProducts', [samplecollectioncontroller::class, 'insertProducts'])->name('insertProducts');
    Route::get('/productsindex', [samplecollectioncontroller::class, 'productsindex'])->name('productsindex');
    Route::get('/productedit/{id}', [samplecollectioncontroller::class, 'productedit'])->name('productedit');
    Route::post('/insertproductedit', [samplecollectioncontroller::class, 'insertproductedit'])->name('insertproductedit');
    
     Route::get('/addwalletamount', [samplecollectioncontroller::class, 'addwalletamount'])->name('addwalletamount');
    Route::post('/addamountwallet', [samplecollectioncontroller::class, 'addamountwallet'])->name('addamountwallet');
    Route::get('/listofwalletamount', [samplecollectioncontroller::class, 'listofwalletamount'])->name('listofwalletamount');



});
Route::get('/userprofile', [BoysManageController::class, 'userprofile'])->name('userprofile');
Route::get('/allnotitification', [BoysManageController::class, 'allnotitification'])->name('allnotitification');
Route::get('/viewbookdetails/{id}', [BoysManageController::class, 'viewbookdetails'])->name('viewbookdetails');
Route::post('/savenotification', [BoysManageController::class, 'savenotification'])->name('savenotification');
Route::get('/savenotification', [BoysManageController::class, 'savenotification']);

Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});

 // listof order products
    Route::get('/orderedslist', [samplecollectioncontroller::class, 'orderedProduct'])->name('orderedProduct');
    Route::get('/orderedetailsview/{id}', [samplecollectioncontroller::class, 'orderedetailsview'])->name('orderedetailsview');
    Route::post('/changeorderstatus', [samplecollectioncontroller::class, 'changeorderstatus'])->name('changeorderstatus');