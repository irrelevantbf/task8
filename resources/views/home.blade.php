@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div>
            <table class="table" style = "margin-top: 5%">
                <tr>
                    <td>N</td>
                    <td>title</td>
                    <td>description</td>
                </tr>
            @foreach ($Products as $Product)
                <tr>
                    <td>{{ ++$loop->index }} </td>
                    <td> {{ $Product->title }}</td>
                    <td> {{ $Product->description }}</td>
                    @if ($Product->user_id === Auth::user()->id)
                        <td style="display: flex;flex-direction: row;">
                            <form action="{{ route('productdelete') }}" method="POST">
                            @csrf
                                <input type="hidden" name="id" value="{{ $Product->id }}">
                                <button class="btn btn-danger">
                                    delete
                                </button>
                            </form>
                            <div>
                                <a href="{{ route('productedit',["id"=>$Product->id ]) }}" class="btn btn-warning">
                                    edit
                                </a>
                            </div>
                        </td>
                    @endif
                </tr>
            @endforeach
            </table>
            <a class="btn btn-primary "  style="margin-left: 45%" href="{{ route('inputproduct') }}" >add product</a>
    </div>
</div>
@endsection
