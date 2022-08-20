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
                        <input type="hidden" name="prev_img" value="{{ $post[0]->img }}">
                        <input type="text" placeholder="title" name="title" value="{{ $post[0]->title }}">
                        <textarea name="description" id="" cols="30" rows="10">{{ $post[0]->description }}</textarea>
                        <input type="text" placeholder="title" name="worker_level" value="{{ $post[0]->worker_level }}">
                        <input type="text" placeholder="title" name="price" value="{{ $post[0]->price }}">
                        <input type="text" placeholder="title" name="location" value="{{ $post[0]->location }}">
                        <input type="text" placeholder="title" name="revews" value="{{ $post[0]->revews }}">
                        <input type="text" name="is_available" placeholder="Available" id="">
                        <input type="file" placeholder="title" name="img" value="{{ $post[0]->img }}">
                    </div>
                </div>

                <button class="save-btn" type="submit">Save</button>
            </form>

        </div>

    </main>
    @endsection