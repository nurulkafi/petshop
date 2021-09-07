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

// Home > Role
Breadcrumbs::for('role', function ($trail) {
    $trail->parent('home');
    $trail->push('Role', route('role.index'));
});



?>
