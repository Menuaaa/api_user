@extends('admin.includes.nav')
    @section('content')
  <main>
        <div></div>
        <div class="dashboard-content">

            <div class="list-title">
                <h2>Services</h2>
               <a href="add_services"><button class="add">Add Service</button></a>
            </div>
            <div class="table-container">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Img</th>
                        <th>Location</th>
                        <th>Price</th>
                        <th>Worker level</th>
                        <th>description</th>
                        <th>Title</th>
                        <th>Revews</th>
                        <th>Available</th>
                        <th></th>
                    </tr>
                    @foreach($services as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img src="{{$post->img}}" alt="" width="100" height="100"></td>
                        <td>{{$post->location}}</td>
                        <td>{{$post->price}}</td>
                        <td>{{ mb_substr($post->worker_level, 0, 20 ). '...' }}</td>
                        <td>{{mb_substr($post->description, 0, 20 ). '...'}}</td>
                        <td>{{ mb_substr($post->title, 0, 20 )}}</td>
                        <td>{{ mb_substr($post->revews, 0, 20 )}}</td>
                        <td>{{$post->is_available}}</td>
                        <td>
                            <a href="edit_service/{{ $post->id }}"><button class="edit">edit</button></a>
                            <a href="services/delete/{{ $post->id }}"><button class="delete">delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </main>
    @endsection
    