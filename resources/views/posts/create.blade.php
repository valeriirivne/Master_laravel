@extends('layouts.app')

@section('title', 'Create the post')

@section('content')
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
 @include('posts.partials.form')
    <div><input type="submit" value="Create"></div>
</form>
@endsection



{{-- The $errors variable is automatically supplied by Laravel's validation system when you validate form data. It's essentially an instance of the Illuminate\Support\MessageBag class that contains validation error messages.

Here's how it works:

When you submit a form, you typically validate the incoming data using Laravel's validation rules. This is usually done in a controller method that handles the form submission.

If the validation fails, Laravel automatically redirects back to the previous page with the validation error messages. Along with the redirection, Laravel attaches the validation errors to the session so they can be accessed on the next request.

In your Blade template, like the one you provided, Laravel's @if($errors->any()) conditional checks if there are any validation errors in the session. If there are, it means that the form submission had validation failures.

When validation fails, Laravel binds the $errors variable to the view. This variable holds an instance of MessageBag that contains all the validation error messages.

You can then use the $errors variable in your Blade template to display the validation error messages next to the respective form fields. --}}