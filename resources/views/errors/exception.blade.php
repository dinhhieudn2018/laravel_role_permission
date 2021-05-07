@extends('admin.app')

@section('content')
    <div class="px-5 py-3">
        <p class="text-center text-danger font-weight-bold" style="font-size: 20px">User have not permission for this page access.</p>
        <div class="text-center">
            <a class="btn btn-primary" href="{{ url()->previous() }}"> Back</a>
        </div>
    </div>
@endsection
