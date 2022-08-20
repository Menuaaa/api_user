@extends('admin.includes.nav')
    @section('content')
  <main>
        <div></div>
        <div class="dashboard-content">

            <div class="list-title">
                <h2>About us</h2>
               <a href="{{ route('aboutus.add')}}"><button class="add">Add About us</button></a>
            </div>
            <div class="table-container">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>First Img</th>
                        <th>Second Img</th>
                        <th>Third Img</th>
                        <th>Text</th>
                        <th></th>
                    </tr>
                    @foreach($about as $i)
                    <tr>
                        <td>{{$i->id}}</td>
                        <td>{{$i->title}}</td>
                        <td><img src="{{$i->first_image}}" alt="" width="100" height="100"></td>
                        <td><img src="{{$i->second_image}}" alt="" width="100" height="100"></td>
                        <td><img src="{{$i->third_image}}" alt="" width="100" height="100"></td>
                        <td>{{mb_substr($i->text, 0, 10 ) . '...'}}</td>
                        <td>
                            <a href=" edit_aboutus/{{ $i->id }}"><button class="edit">edit</button></a>
                            <a href="about/delete/{{ $i->id }}"><button class="delete">delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </main>
    @endsection
    