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
            <div class="table-responsive">
                <table class="table table-striped text-left">
                    <thead>
                    <tr>
                        <th scope="col" style="max-width: 75px;">A</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-xs-5 col-sm-4 col-md-2">
                                    <img src="https://www.gravatar.com/avatar/04e9be03ee50d2b21da3cea5b58cdc1a?s=75&d=mp" alt="Debbie Schmidt" class="img-fluid rounded-circle d-block">
                                </div>
                                <div class="col-xs-7 col-sm-8 col-md-10">
                                    <h4>Mark <b>Andersson</b></h4>
                                    <address class="ml-3">
                                        <i class="fas fa-phone"></i> +316 46054195<br>
                                        <i class="fas fa-envelope-open"></i> +316 46054195<br>
                                        <i class="fab fa-twitter"></i> +316 46054195<br>
                                    </address>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle text-right">
                            <button class="btn btn-secondary"><i class="fas fa-pencil-alt"></i> </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-xs-5 col-sm-4 col-md-2">
                                    <img src="https://www.gravatar.com/avatar/04e9be03ee50d2b21da3cea5b58cdc1a?s=75&d=mp" alt="Debbie Schmidt" class="img-fluid rounded-circle d-block">
                                </div>
                                <div class="col-xs-7 col-sm-8 col-md-10">
                                    <h4>Mark <b>Andersson</b></h4>
                                    <address class="ml-3">
                                        <i class="fas fa-phone"></i> +316 46054195<br>
                                        <i class="fas fa-envelope-open"></i> +316 46054195<br>
                                        <i class="fab fa-twitter"></i> +316 46054195<br>
                                    </address>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle text-right">
                            <button class="btn btn-secondary"><i class="fas fa-pencil-alt"></i> </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection