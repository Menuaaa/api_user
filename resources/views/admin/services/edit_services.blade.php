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
                        <label for="">title</label>
                        <input type="text" placeholder="title" name="title" value="{{ $post[0]->title }}">
                        <label for="">description</label>
                        <textarea name="description" id="" cols="30" rows="10">{{ $post[0]->description }}</textarea>
                        <label for="">worker_level</label>
                        <input type="text" placeholder="title" name="worker_level" value="{{ $post[0]->worker_level }}">
                        <label for="">price</label>
                        <input type="text" placeholder="title" name="price" value="{{ $post[0]->price }}">
                        <label for="">location</label>
                        <input type="text" placeholder="title" name="location" value="{{ $post[0]->location }}">
                        <label for="">revews</label>
                        <input type="text" placeholder="title" name="revews" value="{{ $post[0]->revews }}">
                        <label for="">Available</label>
                        <input type="text" name="is_available" placeholder="Available" value="{{ $post[0]->is_available }}" id="">
                        <label for="">Image</label>
                        <img src="{{ $post[0]->img }}" alt="" width="100" height="100">
                        <input type="file" placeholder="title" name="img" value="{{ $post[0]->img }}">
                    </div>
                </div>

                <button class="save-btn" type="submit">Save</button>
            </form>

        </div>

    </main>
    @endsection