@extends('admin.includes.nav')
    @section('content')
  <main>
        <div></div>
        <div class="dashboard-content">

            <div class="list-title">
                <h2>Salons</h2>
               <a href="add_salons"><button class="add">Add salon</button></a>
            </div>
            <div class="table-container">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Img</th>
                        <th>Revews</th>
                        <th></th>
                    </tr>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img src="{{$post->img}}" alt="" width="100" height="100"></td>
                        <td>{{$post->revews}}</td>
                        <td>
                            <a href="edit_salon/{{ $post->id }}"><button class="edit">edit</button></a>
                            <a href="salons/delete/{{ $post->id }}"><button class="delete">delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </main>
    @endsection
    