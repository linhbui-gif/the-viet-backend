<?php

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
require "admin.php";

Route::namespace('Enduser')->group(function(){
    /*------ End-user -------*/

    /*---- ajax ------*/
//    Route::get('/ajax/get-shipping', 'HomeController@getShipping')->name('ajax.getShipping');
//    Route::get('/ajax/get-district', 'HomeController@getDistrict')->name('ajax.getDistrict');
//    Route::get('/ajax/get-ward', 'HomeController@getWard')->name('ajax.getWard');
//    Route::get('/', 'HomeController@index')->name('siteIndex');
    Route::get('/', 'PageController@getIndex')->name('siteIndex');
    Route::get('/gioi-thieu', 'PageController@about')->name('siteAbout');
    Route::get('/dich-vu', 'PageController@service')->name('siteService');
//    Route::get('/du-thuyen', 'PageController@duthuyen')->name('siteDuthuyen');
//    /* --- AUTH --- */
    Route::get('/login', 'UserController@index')->name('user.login');
    Route::get('/postLogout', 'UserController@postLogout')->name('user.postLogout');
    Route::post('/login/post', 'UserController@postLogin')->name('user.postlogin');
    Route::get('/profile', 'UserController@profile')->name('user.profile')->middleware('checkloginweb');
//    Route::get('/redirect/{driver}', 'UserController@redirectToProvider')->name('user.loginProvider');
//    Route::get('/callback/{driver}', 'UserController@handleProviderCallback')->name('user.callbackSocial');
//    Route::get('/register', 'UserController@register')->name('user.register');
//    Route::post('/register/post', 'UserController@postRegister')->name('user.postregister');
//    Route::get('/logout', 'UserController@logout')->name('user.logout');
//    Route::get('/change-password', 'UserController@changePassword')->name('user.changePassword');
//    Route::get('/forgot-password', 'UserController@forgotPassword')->name('user.forgotPassword');
//    Route::post('/reset-password', 'UserController@sendMail')->name('user.senMail');
//    Route::get('/reset-password/{token}', 'UserController@formReset')->name('user.formReset');
//    Route::post('/post-forget-password', 'UserController@postForgetPass')->name('user.postForgetPass');

    /* -- SEARCH -- */
//    Route::get('/search-result', 'CourseController@searchResult')->name('course.searchResult');
    Route::get('/search', 'BlogController@search')->name('blog.search');

    /* -- ORDER -- */
//    Route::get('/gio-hang', 'OrderController@cart')->name('order.cart');
//    Route::get('them-vao-gio-hang', 'OrderController@addCart')->name('order.addCart');
//
//    Route::get('xoa-gio-hang/{id}', 'OrderController@deleteCart')->name('order.deleteCart');
//    Route::post('cart/update/{id}','OrderController@updateCart')->name('order.updateCart');
//
//
//    Route::get('/check-coupon', 'OrderController@checkCoupon')->name('checkCoupon');
//    Route::middleware('checklogin')->group(function(){
//        Route::get('/learnNow', 'OrderController@learnNow')->name('order.learnNow');
//        Route::get('/thanh-toan', 'OrderController@checkout')->name('order.checkout');
//        Route::post('/thanh-toan', 'OrderController@postCheckout')->name('order.postCheckout');
//        Route::get('/thanh-toan-thanh-cong', 'OrderController@checkoutSuccess')->name('order.checkoutSuccess');
//        /* --- ACCOUNT --- */
//
//        Route::post('/change-profile', 'AccountController@changeProfile')->name('account.changeProfile');
//        Route::post('/change-password', 'AccountController@changePassword')->name('account.changePassword');
//        Route::get('/my-profile', 'AccountController@myProfile')->name('account.myProfile');
//        Route::get('/my-questions', 'AccountController@myQuestions')->name('account.myQuestions');
//        Route::get('/my-coupon', 'AccountController@myCoupon')->name('account.myCoupon');
//        Route::get('/my-courses', 'AccountController@myCourses')->name('account.myCourses');
//        Route::get('/my-order', 'AccountController@myOrder')->name('account.myOrder');
//        Route::get('/my-order-detail/{order_id}', 'AccountController@myOrderDetail')->name('account.myOrderDetail');
//        Route::get('/address', 'AccountController@address')->name('account.address');
//        Route::get('/address/{id}', 'AccountController@editAddress')->name('account.editAddress');
//        Route::post('/address/{id}', 'AccountController@updateAddress')->name('account.updateAddress');
//        Route::get('/delete-address/{id}', 'AccountController@deleteAddress')->name('account.deleteAddress');
//        Route::get('/add-address', 'AccountController@addAddress')->name('account.addAddress');
//        Route::post('/add-address', 'AccountController@postAddress')->name('account.postAddress');
//
//        Route::get('/download-document', 'AccountController@downloadDocument')->name('account.downloadDocument');
//        Route::post('/post-become-teacher', 'AccountController@postBecomeTeacher')->name('account.postBecomeTeacher');
//        Route::post('/khoa-hoc/add-comment', 'CourseController@addComment')->name('course.addComment');
//        Route::post('/khoa-hoc/like-comment', 'CourseController@likeComment')->name('course.likeComment');
//
//        Route::get('/become-teacher/form', 'AccountController@formTeacher')->name('account.formTeacher');
//        Route::post('/become-teacher/form', 'AccountController@postFormTeacher')->name('account.postFormTeacher');
//        Route::post('/lesson-detail/{slug_lesson}', 'CourseController@postExam')->name('course.postExam');
//
//        Route::post('/question/post', 'PageController@postquestionClient')->name('page.questionClient');
//    });
    Route::get('/lien-he', 'PageController@lienhe')->name('siteContact');
//    Route::post('/ajax/lien-he', 'HomeController@ajaxContact')->name('ajaxContact');
    /* -- PRODUCT -- */
    Route::get('/danh-sach-san-pham', 'ProductController@productList')->name('product.productList');
    Route::get('/cong-tac-vien', 'PageController@partnerIndex')->name('sitePartner');

    Route::get('/san-pham/{slug_category}', 'ProductController@productListByCategory')->name('product.productListByCategory');
    Route::get('/product-lists/tag/{slug}', 'ProductController@productTagSlug')->name('product.productTagSlug');
    Route::get('/san-pham/{slug_category}/{slug}', 'ProductController@productDetail')->name('product.productDetail');
    /* -- COURSE -- */
   // Route::get('/course-detail', 'CourseController@courseDetail')->name('course.courseDetail');
//    Route::get('/danh-sach-khoa-hoc', 'CourseController@courseList')->name('course.courseList');
//    Route::get('/khoa-hoc/tag/{slug}', 'CourseController@courseTagSlug')->name('course.courseTagSlug');
//    Route::get('/khoa-hoc/{slug_category}', 'CourseController@courseListInCategory')->name('course.courseListInCategory');
//    Route::get('/khoa-hoc/{slug_category}/{course_slug}', 'CourseController@courseDetail')->name('course.courseDetail');
//    Route::get('/lesson-detail', 'CourseController@lessionDetail')->name('course.lessionDetail');
//    Route::get('/lesson-detail/{slug_lesson}', 'CourseController@lessionDetailChapter')->name('course.lessionDetailChapter')->middleware('checklogin');
//
//    /* -- PAGE -- */
//    Route::get('/become-teacher', 'PageController@becomeTeacher')->name('SiteTeacher');
//    Route::get('/list-page', 'PageController@listPage')->name('page.listPage');
//    Route::get('/notification-detail', 'PageController@notificationDetaill')->name('page.notificationDetaill');
//    Route::get('/review', 'PageController@review')->name('page.review');
//    Route::get('/huong-dan', 'PageController@tutorial')->name('page.tutorial');
//    Route::get('/thong-bao/chi-tiet/{id}', 'PageController@showNotice')->name('page.showNotice');
//    Route::get('/su-kien/chi-tiet/{id}', 'PageController@showEvent')->name('page.showEvent');

//    Route::post('/question/update/{id}', 'PageController@updatequestionClient')->name('page.updatequestionClient');
    /* -- BLOG -- */
    Route::get('/tin-tuc/danh-muc/{slug_category}', 'BlogController@blogListByCategory')->name('blogListByCategory.category');
    Route::get('/tin-tuc', 'PageController@newList')->name('siteLvhd');
    Route::get('/huong-dan', 'PageController@introduce')->name('siteIntro');
    Route::get('/huong-dan/danh-muc/{slug_category}', 'BlogController@introduceByCategory')->name('introduceByCategory');
    Route::get('/huong-dan/chi-tiet/{slug}', 'BlogController@introDetail')->name('introDetail');
    Route::get('/chi-tiet-ve-chung-toi', 'HomeController@chitietchungtoi')->name('siteChitiet');

//    Route::get('/tin-tuc/{slug_category}', 'BlogController@courseListInCategory')->name('course.courseListInCategory');
    Route::get('/tin-tuc/chi-tiet/{slug}', 'BlogController@newDetail')->name('new.newDetail');
    Route::get('/tag/{slug}', 'BlogController@getBlog_ls_tag')->name('SiteBlog_Tag');


//    Route::get('/page/{slug}', 'PageController@showDetailPage')->name('page.showDetailPage');
//    Route::get('/wishlist/add/{id}', 'HomeController@addWishlist')->name('wishlist.add');
//    Route::get('/wishlist/danh-sach', 'HomeController@showWishlist')->name('wishlist.show');
});


Route::get('/client/ajax-client', 'AjaxController@ajaxClient')->name('ajaxClient');
Route::post('/popupInterval/ajax-popupInterval', 'AjaxController@ajaxPopup')->name('ajaxPopupInterval');
Route::post('/ajax/lien-he', 'AjaxController@ajaxPopup')->name('ajaxContact');
Route::post('/ajax/ctv', 'AjaxController@ajaxPopup')->name('ajaxPartner');
