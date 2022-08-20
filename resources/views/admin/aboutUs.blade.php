@extends('admin.includes.nav')
    @section('content')
  <main>
        <div></div>
        <div class="dashboard-content">

            <div class="list-title">
                <h2>About us</h2>
               <a href="{{ route('addAboutUs.index')}}"><button class="add">Add About us</button></a>
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
                        <td>{{mb_substr($i->first_image, 0, 10 ) . '...'}}</td>
                        <td>{{mb_substr($i->second_image, 0, 10 ) . '...'}}</td>
                        <td>{{mb_substr($i->third_image, 0, 10 ) . '...'}}</td>
                        <td>{{mb_substr($i->text, 0, 10 ) . '...'}}</td>
                        <td>
                            <a href="{{ route('editAboutUs.index') }}/{{ $i->id }}"><button class="edit">edit</button></a>
                            <a href="{{ route('deleteAboutUs.index') }}/{{ $i->id }}"><button class="delete">delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </main>
    @endsection
    