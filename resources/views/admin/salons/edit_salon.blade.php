@extends('admin.includes.nav')
    @section('content')
<main>
        <div></div>

        <div class="dashboard-content">

            <div class="add-title">
            <a href="services">  
            <a href="/admin/services">back</a>
        </a>

                <h2>edit services</h2>
            </div>

            <form action="update/{{ $post[0]->id }}" class="add-doc-form" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="forms-container">
                    <div class="">
                    <input type="hidden" name="id" value="{{ $post[0]->id }}">
                        <input type="hidden" name="id" value="{{ $post[0]->id }}">
                        <label for="">Image</label>
                        <img src="{{$post[0]->img}}" alt="">
                        <input type="hidden" name="prev_img" value="{{ $post[0]->img }}">
                        <input type="file" placeholder="title" name="img" value="{{ $post[0]->img }}">
                        <label for="">Revews</label>
                        <input type="number" placeholder="title" name="revews" value="{{ $post[0]->revews }}">
                    </div>
                </div>

                <button class="save-btn" type="submit">Save</button>
            </form>

        </div>

    </main>
    @endsection