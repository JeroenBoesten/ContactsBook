@extends('layouts.app')
@section('title', 'Contacts')
@section('content')
    <contact-book :contacts-data="{{ $contacts }}"></contact-book>
@endsection
