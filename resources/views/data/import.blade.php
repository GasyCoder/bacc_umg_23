@extends('layouts.main')
@section('content')
<div class="p-5 d-flex justify-content-center align-items-center">
    <div class="panel mb-10">
        <div class="panel-heading">
            <span>Data Upload</span>
        </div>
        <div class="panel-body">
            <div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-6">
                    <div class="card rounded-3">
                        <div class="card-body">
                            <div class="justify-content-between align-items-center mb-3">
                                <div class="table-responsive">
                                    <form action="{{ url('importdata') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-4">
                                            <label for="file">Fichier (csv, excel):</label>
                                            <input id="file" type="file" name="file" required class="form-control mt-3">
                                        </div>
                                        <button class="btn btn-success"><i class="fas fa-upload"></i> Importer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection