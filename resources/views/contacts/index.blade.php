@extends('layouts.app')
@section('title', 'Contacts')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Contacts</h1>
                <button class="btn btn-primary"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <contact-book :contacts-data="{{ $contacts }}"></contact-book>
        </div>
    </div>
@endsection