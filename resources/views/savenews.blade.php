@extends("layouts.app")
@section("content")
    <div class="container">
            <table class="table" style = "margin-top: 5%">
                <tr>
                    <td>N</td>
                    <td>title</td>
                    <td>description</td>
                    <td>short description</td>
                    <td>image</td>
                    <td>date</td>
                    <td>edit/delete</td>
                </tr>
            @foreach (App\News::get() as $new)
                <tr>
                    <td>{{ ++$loop->index }} </td>
                    <td> {{ $new->title }}</td>
                    <td> {{ $new->description }}</td>
                    <td> {{ $new->short_description }}</td>
                    <td> {{ $new->image }}</td>
                    <td> {{ $new->add_date }}</td>
                    <td style="display: flex;flex-direction: row;">
                            <form action="{{ route('productdelete') }}" method="POST">
                            @csrf
                                <input type="hidden" name="id" value="{{ $new->id }}">
                                <button class="btn btn-danger">
                                    delete
                                </button>
                            </form>
                            <div>
                                <a href="{{ route('productedit',["id"=>$new->id ]) }}" class="btn btn-warning">
                                    edit
                                </a>
                            </div>
                </td>
                </tr>
                
            @endforeach

                        

            </table>

    </div>
@endsection