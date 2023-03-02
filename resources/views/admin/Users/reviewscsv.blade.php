@extends('admin.index')
@section('content')


<div class="card mt-4">
    <div class="card-header text-center">
        <strong>Upload CSV File</strong>
    </div>
    <div class="card-body">
        <div class="mt-2">
            <?php if (session()->has('message')) { ?>
            <div class="alert <?= session()->get('alert-class') ?>">
                <?= session()->get('message') ?>
            </div>
            <?php } ?>
        </div>
        <form action="{{ route('import.productcsv') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <div class="mb-3">
                    <input type="file" name="file" class="form-control" id="file">
                </div>
            </div>
            <div class="d-grid">
                <input type="submit" name="submit" value="Upload" class="btn btn-dark" />
            </div>
        </form>
    </div>
</div>



@endsection