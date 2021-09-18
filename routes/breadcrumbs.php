<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
//Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

//Home > company
Breadcrumbs::for('company', function ($trail) {
    $trail->parent('home');
    $trail->push('Company', route('company.index'));
});

//Home > PetCategory
Breadcrumbs::for('pet_category', function ($trail) {
    $trail->parent('home');
    $trail->push('Pet Category', route('pet_category.index'));
});

// Home > Pet
Breadcrumbs::for('pet', function ($trail) {
    $trail->parent('home');
    $trail->push('Pet', route('pet.index'));
});
// Home > Pet > Create
Breadcrumbs::for('create_pet', function ($trail) {
    $trail->parent('pet');
    $trail->push('Create', route('pet.create'));
});
// Home > Pet > Edit Pet
Breadcrumbs::for('edit_pet', function ($trail,$pet) {
    $trail->parent('pet');
    $trail->push('Edit', route('pet.edit',$pet));
});
// Home > Pet > Image
Breadcrumbs::for('edit_image_pet', function ($trail,$pet) {
    $trail->parent('edit_pet',$pet);
    $trail->push('Image', route('pet.create'));
});

//Home > Product Category
Breadcrumbs::for('product_category', function ($trail) {
    $trail->parent('home');
    $trail->push('Product Category', route('product_category.index'));
});

// Home > Product
Breadcrumbs::for('product', function ($trail) {
    $trail->parent('home');
    $trail->push('Product', route('product.index'));
});

// Home > Product > Create
Breadcrumbs::for('create_product', function ($trail) {
    $trail->parent('product');
    $trail->push('Create', route('product.create'));
});

// Home > Service
Breadcrumbs::for('service', function ($trail) {
    $trail->parent('home');
    $trail->push('Service', route('service.index'));
});
// Home > Service > Create
Breadcrumbs::for('service_create', function ($trail) {
    $trail->parent('service');
    $trail->push('Create', route('service.create'));
});
// Home > Service > Edit
Breadcrumbs::for('service_edit', function ($trail) {
    $trail->parent('service');
    $trail->push('Edit', route('service.create'));
});

// Home > Service Transaction
Breadcrumbs::for('service_transaction', function ($trail) {
    $trail->parent('home');
    $trail->push('Service Transaction', route('service_transaction.index'));
});

// Home > Service Transaction > Create
Breadcrumbs::for('service_transaction_create', function ($trail) {
    $trail->parent('service_transaction');
    $trail->push('Create', route('service_transaction.create'));
});
// Home > Service Transaction > Show
Breadcrumbs::for('service_transaction_show', function ($trail) {
    $trail->parent('service_transaction');
    $trail->push('Show', route('service_transaction.create'));
});

// Home > Product > Edit Product
Breadcrumbs::for('edit_product', function ($trail,$product) {
    $trail->parent('product');
    $trail->push('Edit', route('product.edit',$product));
});

// Home > Product > Image
Breadcrumbs::for('edit_image_product', function ($trail,$product) {
    $trail->parent('edit_product',$product);
    $trail->push('Image', route('product.create'));
});

// Home > Role
Breadcrumbs::for('role', function ($trail) {
    $trail->parent('home');
    $trail->push('Role', route('role.index'));
});
// Home > Role > Create
Breadcrumbs::for('create_role', function ($trail) {
    $trail->parent('role');
    $trail->push('Create Role', route('role.create'));
});
// Home > Role > Edit
Breadcrumbs::for('edit_role', function ($trail) {
    $trail->parent('role');
    $trail->push('Edit Role', route('role.create'));
});

// Home > Users
Breadcrumbs::for('user', function ($trail) {
    $trail->parent('home');
    $trail->push('User', route('user.index'));
});
// Home > Users > Create
Breadcrumbs::for('create_user', function ($trail) {
    $trail->parent('user');
    $trail->push('Create User', route('user.create'));
});
// Home > Users > Edit
Breadcrumbs::for('edit_user', function ($trail) {
    $trail->parent('user');
    $trail->push('Edit User', route('user.create'));
});



?>
