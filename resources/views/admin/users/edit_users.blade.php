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

            <form action="/admin/users/update/{{ $user[0]->id }}" class="add-doc-form" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="forms-container">
                    <div class="">
                        <label for="">Name</label>
                       <input type="text" placeholder="name" name="name" value="{{ $user[0]->name }}">
                       <label for="">Phone</label>
                        <input type="text" placeholder="phone" name="phone" value="{{ $user[0]->phone }}">
                        <label for="">Email</label>
                        <input type="email" placeholder="email" name="email" value="{{ $user[0]->email }}">
                        <label for="">Password</label>
                        <input type="text" placeholder="password" name="password" value="{{ $user[0]->password }}">
                    </div>
                </div>

                <button class="save-btn" type="submit">Save</button>
            </form>

        </div>

    </main>
    @endsection