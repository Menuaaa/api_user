@extends('admin.includes.nav')
    @section('content')
  <main>
        <div></div>
        <div class="dashboard-content">

            <div class="list-title">
                <h2>users</h2>
               <a href="users/add"><button class="add">Add User</button></a>
            </div>
            <div class="table-container">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password (hash)</th>
                        <th>Phone</th>
                        <th></th>
                    </tr>
                    @foreach($users as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td>{{$post->email}}</td>
                        <td>{{mb_substr($post->password, 0, 20 ). '...' }}</td>
                        <td>{{ mb_substr($post->phone, 0,30 )}}</td>
                        <td>
                            <a href="users/edit/{{ $post->id }}"><button class="edit">edit</button></a>
                            <a href="users/delete/{{ $post->id }}"><button class="delete">delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </main>
    @endsection
    