<?php

use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\AdminProfilePasswordController;
use App\Http\Controllers\admin\AdminSolarPanelController;
use App\Http\Controllers\admin\BasePriceController;
use App\Http\Controllers\admin\ContactUsEnquiryController;
use App\Http\Controllers\admin\EmailTemplateController;
use App\Http\Controllers\admin\EnquiryController;
use App\Http\Controllers\admin\OrderController as AdminOrderController;
use App\Http\Controllers\admin\PartnerLogoController;
use App\Http\Controllers\admin\ProductCategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductTagController;
use App\Http\Controllers\admin\ProductVariationController;
use App\Http\Controllers\admin\sections\FaqSectionController;
use App\Http\Controllers\admin\sections\ManageAboutUsController;
use App\Http\Controllers\admin\sections\ManageHomePageController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\StatusChangeController;
use App\Http\Controllers\admin\TeamMembersController;
use App\Http\Controllers\admin\TechnicianController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\UserEmailNotificationController;
use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\customer\AccountPasswordController;
use App\Http\Controllers\customer\AccountProfileAddressController;
use App\Http\Controllers\customer\AccountProfileController;
use App\Http\Controllers\customer\OrderInvoiceController;
use App\Http\Controllers\customer\PendingDocumentsController;
use App\Http\Controllers\customer\PropertyController;
use App\Http\Controllers\customer\UserDefaultAddressController;
use App\Http\Controllers\CustomerOrderController as CustomerOrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PlaceOrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

/* FrontEnd Controller*/

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about-us', 'aboutUs')->name('aboutus');
    Route::get('/contact-us', 'contactUs')->name('contactus');
    Route::get('/privacy-policy', 'privacyPolicy')->name('privacypolicy');
    Route::get('/how-it-works', 'howItWorks')->name('howitworks');
});

Route::post('/contact-us/store', [ContactUsEnquiryController::class, 'store'])->name('contactUs.store');

Route::controller(PropertyController::class)->group(function () {
    Route::post('property/information', 'query')->name('customer.property.query');
    Route::post('property/area-information', 'propertyInformation')->name('customer.property.information');
    Route::post('property/area-details', 'areaDetails')->name('customer.property.areaDetails');
});


/* Dashboard Controller */
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Google  Login Controller */

Route::controller(AuthLoginController::class)->group(function () {
    Route::get('/auth/google', 'redirectToGoogle')->name('redirect.google');
    Route::get('/auth/google/callback', 'callback')->name('google.callback');
});

/* Admin Routes */
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {

    /* Admin Profile Controller*/
    Route::controller(AdminProfileController::class)->group(function () {
        Route::get('/profile', 'view')->name('admin.profile.view');
        Route::put('/profile-update/{user:slug}', 'update')->name('admin.profile.update');
    });

    /* Admin Password Controller */
    Route::controller(AdminProfilePasswordController::class)->group(function () {
        Route::get('/account-password', 'view')->name('admin.profile.password');
        Route::put('/account-password/{user:slug}/update', 'update')->name('admin.password.update');
    });

    /** Manage Users */
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('admin.users');
        Route::get('/users/{user:slug}/view', 'view')->name('admin.user.view');
        Route::get('/users/{user:slug}/edit', 'edit')->name('admin.user.edit');
        Route::put('/users/{user:slug}/update', 'update')->name('admin.user.update');
        Route::delete('/users/{user:slug}/delete', 'delete')->name('admin.user.delete');
        Route::get('/users/{user:slug}/password-reset', 'passwordreset')->name('admin.user.password.reset');
    });

    //Email sent to customer
    Route::get('/users/{user:slug}/view/{notification}/email', [UserEmailNotificationController::class, 'view'])->name('admin.user.email.view');

    /* Manage Technicians */
    Route::controller(TechnicianController::class)->group(function () {
        Route::get('/technicians', 'index')->name('admin.technicians');
        Route::get('/technicians/create', 'create')->name('admin.technician.create');
        Route::post('/technicians/store', 'store')->name('admin.technician.store');
        Route::get('/technicians/{user:slug}/view', 'view')->name('admin.technician.view');
        Route::get('/technicians/{user:slug}/edit', 'edit')->name('admin.technician.edit');
        Route::put('/technicians/{user:slug}/update', 'update')->name('admin.technician.update');
        Route::delete('/technicians/{user:slug}/delete', 'delete')->name('admin.technician.delete');
    });

    /* Manage Products*/

    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('admin.products');
        Route::get('/products/create', 'create')->name('admin.product.create');
        Route::post('/products/store', 'store')->name('admin.product.store');
        Route::get('/products/{product:slug}/view', 'view')->name('admin.product.view');
        Route::get('/products/{product:slug}/edit', 'edit')->name('admin.product.edit');
        Route::put('/products/{product:slug}/update', 'update')->name('admin.product.update');
        Route::delete('/products/{product:slug}/delete', 'delete')->name('admin.product.delete');
    });

    /* Manage product Variations*/

    Route::controller(ProductVariationController::class)->group(function () {
        Route::get('/product/product-variations/{product:slug}', 'create')->name('admin.product.variation.create');
        Route::post('/product/product-variations/store', 'store')->name('admin.product.variation.store');
        Route::delete('/product/product-variations/{product_variation}/delete', 'delete')->name('admin.product.variation.delete');
        Route::put('/product/product-variations/{product_variation}/update', 'update')->name('admin.product.variation.update');
        Route::post('/product/product-variations/{product:slug}/cancel', 'cancelVariation')->name('admin.product.variation.cancel');
    });

    /* Manage Product Tags */
    Route::controller(ProductTagController::class)->group(function () {
        Route::get('/tags', 'index')->name('admin.product.tags');
        Route::post('/tags/store', 'store')->name('admin.tag.store');
        Route::post('/tags/update/{tag}', 'update')->name('admin.tag.update');
        Route::delete('/tags/delete/{tag}', 'delete')->name('admin.tag.delete');
    });

    /* Manage Product Categories */

    Route::controller(ProductCategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('admin.product.categories');
        Route::post('/categories/store', 'store')->name('admin.category.store');
        Route::post('/categories/{category:slug}/update', 'update')->name('admin.category.update');
        Route::delete('/categories/{category:slug}/delete', 'delete')->name('admin.category.delete');
    });

    /* Manage Solar Panels */
    Route::controller(AdminSolarPanelController::class)->group(function () {
        Route::get('/panels', 'index')->name('admin.solarpanels');
        Route::post('/panels/store', 'store')->name('admin.panel.store');
        Route::post('/panels/{panel:slug}/update', 'update')->name('admin.panel.update');
        Route::delete('/panels/{panel:slug}/delete', 'delete')->name('admin.panel.delete');
    });
    /* Manage Enquiries */

    Route::controller(EnquiryController::class)->group(function () {
        Route::get('/enquiries/form', 'index')->name('admin.enquiries');
        Route::get('/enquiries/form/{enquiry:slug}/view', 'view')->name('admin.enquiry.view');
        Route::delete('/enquiries/form/{enquiry:slug}/delete', 'delete')->name('admin.enquiry.delete');
    });

    /* Manage Orders */
    Route::controller(AdminOrderController::class)->group(function () {
        Route::get('orders', 'index')->name('admin.orders');
        Route::get('order/{order:order_number}/details', 'view')->name('admin.order.details');
        Route::post('order/{order:order_number}/status', 'status')->name('admin.order.status');
        Route::get('orderdetails/{order:order_number}/pdf', 'orderDetailsPdf')->name('admin.order.details.download');
        Route::get('assignOrders', 'assignOrder')->name('admin.assignOrder');
        Route::post('assignOrders/{order:order_number}/status', 'assignOrderStatus')->name('admin.assignOrder.status');
        Route::delete('/orders/{order:order_number}/delete', 'delete')->name('admin.order.delete');
    });

    /* Manage Email Marketing*/
    Route::controller(EmailTemplateController::class)->group(function () {
        Route::get('/email-templates', 'index')->name('admin.emailtemplates');
        Route::get('/email-template-edit/{email_template:id}', 'edit')->name('admin.email.template.edit');
        Route::put('/email-template-update/{email_template}', 'update')->name('admin.email.template.update');
    });

    /* Manage Contact us Page Enquiries */
    Route::controller(ContactUsEnquiryController::class)->group(function () {
        Route::get('enquiries/contactus', 'index')->name('admin.contactUs');
        Route::delete('enquiries/contactus/{contact_us_enquiry:id}/delete', 'delete')->name('admin.contactUs.enquiry.delete');
    });

    /* Manage Settings */
    Route::controller(SettingsController::class)->group(function () {
        Route::get('/settings', 'index')->name('admin.settings');
        Route::put('/settings/update/{setting:id}', 'update')->name('admin.settings.update');
    });

    /* Manage Sections */

    Route::controller(FaqSectionController::class)->group(function () {
        Route::get('content/faqs', 'index')->name('admin.faqs');
        Route::get('content/faqs/create', 'create')->name('admin.faq.create');
        Route::post('content/faqs/store', 'store')->name('admin.faq.store');
        Route::delete('content/faqs/{faq}/delete', 'delete')->name('admin.faq.delete');
        Route::get('content/faqs/{faq}/edit', 'edit')->name('admin.faq.edit');
        Route::put('content/faqs/{faq}/update', 'update')->name('admin.faq.update');
    });

    // Manage Partner Logos

    Route::controller(PartnerLogoController::class)->group(function () {
        Route::get('content/partner-logos', 'index')->name('admin.logos');
        Route::get('content/partner-logo/create', 'create')->name('admin.logo.create');
        Route::post('content/partner-logo/store', 'store')->name('admin.logo.store');
        Route::get('content/partner-logo/{partner_logo}/edit', 'edit')->name('admin.logo.edit');
        Route::put('content/partner-logo/{partner_logo}/update', 'update')->name('admin.logo.update');
        Route::delete('content/partner-logo/{partner_logo}/delete', 'delete')->name('admin.logo.delete');
    });

    // Manage About us Page
    Route::controller(ManageAboutUsController::class)->group(function () {
        Route::get('content/about-us', 'index')->name('admin.aboutUs');
        Route::post('content/about-us/store', 'store')->name('admin.aboutUs.store');
    });

    // Manage Team Members
    Route::controller(TeamMembersController::class)->group(function () {
        Route::get('/team-members', 'index')->name('admin.team.members');
        Route::get('/team-members/create', 'create')->name('admin.team.member.create');
        Route::post('/team-members/store', 'store')->name('admin.team.member.store');
        Route::get('/team-members/{team_member}/view', 'view')->name('admin.team.member.view');
        Route::get('/team-members/{team_member}/edit', 'edit')->name('admin.team.member.edit');
        Route::put('/team-members/{team_member}/update', 'update')->name('admin.team.member.update');
        Route::delete('/team-members/{team_member}/delete', 'delete')->name('admin.team.member.delete');
    });

    //Manage Home Page Controller
    Route::controller(ManageHomePageController::class)->group(function () {
        Route::get('content/home-page', 'index')->name('admin.home.page');
        Route::post('content/home-page/store', 'store')->name('admin.home.page.store');
    });

    /* Manage Status of Modules*/
    Route::controller(StatusChangeController::class)->group(function () {
        Route::patch('/products/{product:slug}/update-status', 'productStatusChange')->name('admin.product.update.status');
        Route::patch('/tags/{tag}/update-status', 'tagStatusChange')->name('admin.tag.update.status');
        Route::patch('/categories/{category}/update-status', 'categoryStatusChange')->name('admin.category.update.status');
        Route::patch('/content/faqs/{faq}/update-status', 'faqStatusChange')->name('admin.faq.update.status');
        Route::patch('content/partner-logo/{partner_logo}/update-status', 'partnerLogoStatusChange')->name('admin.logo.update.status');
        Route::patch('/panels/{panel}/update-status', 'panelStatusChange')->name('admin.panel.update.status');
        Route::patch('/base-price/{base_price}/update-status', 'basePriceStatusChange')->name('admin.base.price.update.status');
    });

    /* Manage Base Price */
    Route::controller(BasePriceController::class)->group(function () {
        Route::get('/base-price', 'index')->name('admin.base.price');
        Route::post('/base-price/store', 'store')->name('admin.base.price.store');
        Route::post('/base-price/{base_price}/update', 'update')->name('admin.base.price.update');
    });
});

/* Frontend User Controllers */
Route::middleware(['auth', 'isUser'])->group(function () {
    /* Account Profile */
    Route::controller(AccountProfileController::class)->group(function () {
        Route::get('account-profile', 'index')->name('customer.account.profile');
        Route::put('account-profile/update/{user}', 'update')->name('customer.profile.update');
    });

    Route::controller(AccountPasswordController::class)->group(function () {
        Route::get('/change-password', 'create')->name('customer.profie.change.password');
        Route::put('/update-password/{user:slug}', 'update')->name('customer.profile.update.password');
    });

    /* Manage Addresses */

    Route::controller(AccountProfileAddressController::class)->group(function () {
        Route::get('account-profile/address', 'create')->name('customer.profile.address');
        Route::post('account-profile/address/{user:slug}/store', 'store')->name('customer.profile.address.store');
        Route::get('account-profile/address{id}/edit-address', 'edit')->name('customer.edit.address');
        Route::put('account-profile/address/{id}/update-address', 'update')->name('customer.address.update');
        Route::delete('account-profile/address/{billingAddress:id}/delete', 'destroy')->name('customer.profile.address.delete');
    });

    /* Update Default Address of Customer */
    Route::put('/account-profile/address/defaultAddress/', [UserDefaultAddressController::class, 'update'])->name('customer.profile.default.address');

    // Cart Controller

    Route::controller(CartController::class)->group(function () {
        Route::post('cart', 'store')->name('customer.cart');
        Route::get('/checkout', 'view')->name('customer.checkout');
        Route::get('delete-cart', 'delete')->name('customer.cart.delete');
    });

    Route::post('/complete-order', [PlaceOrderController::class, 'store'])->name('customer.place.order');

    /* Manage Customer's Orders*/
    Route::controller(CustomerOrderController::class)->group(function () {
        Route::get('my-orders', 'index')->name('customer.myOrders');
        Route::get('my-orders/{order:order_number}/order-details', 'view')->name('customer.order.details');
    });

    /* Manage Pending property Images */
    Route::controller(PendingDocumentsController::class)->group(function () {
        Route::get('my-orders/{order:order_number}/order-pending-documents', 'view')->name('customer.pending.document.upload');
        Route::post('my-orders/order-pending-documents/{order:order_number}/upload', 'store')->name('customer.pending.document.store');
    });

    // Download Order Invoice
    Route::get('/order-invoice/{order:order_number}', [OrderInvoiceController::class, 'view'])->name('customer.order.invoice');

    Route::get('property/recommended-products/', [PropertyController::class, 'recommendedProduct'])->name('customer.property.recommendedProduct');
});


require __DIR__ . '/auth.php';

Route::get('/phone', function () {
    return view('pages/phone-number');
});

Route::get('/add-new-card', function () {
    return view('pages/add-new-card');
});

Route::get('/email', function () {
    return view('templates(Emails).test');
});

Route::fallback(function () {
    return back();
});
