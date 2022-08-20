@extends('admin.includes.nav')
    @section('content')
<main>
        <div></div>

        <div class="dashboard-content">

            <div class="add-title">
            <a href="services">  
            <a href="/admin/about">back</a>
        </a>

                <h2>edit About us</h2>
            </div>

            <form action="update/{{ $post[0]->id }}" class="add-doc-form" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="forms-container">
                    <div class="">
                        <input type="hidden" name="id" value="{{ $post[0]->id }}">
                        <input type="hidden" name="id" value="{{ $post[0]->id }}">
                        <input type="text" placeholder="title" name="title" value="{{ $post[0]->title }}">
                        <input type="text" placeholder="title" name="text" value="{{ $post[0]->text }}">
                        <input type="hidden" name="prev_first_img" value="{{ $post[0]->first_image }}">
                        <input type="hidden" name="prev_second_img" value="{{ $post[0]->second_image }}">
                        <input type="hidden" name="prev_third_img" value="{{ $post[0]->third_image }}">
                        <input type="file" placeholder="title" name="first_image" value="{{ $post[0]->first_image }}">
                        <input type="file" placeholder="title" name="second_image" value="{{ $post[0]->second_image }}">
                        <input type="file" placeholder="title" name="third_image" value="{{ $post[0]->third_image }}">
                    </div>
                </div>

                <button class="save-btn" type="submit">Save</button>
            </form>

        </div>

    </main>
    @endsection