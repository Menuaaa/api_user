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

            <form action="route('users.update')/{{ $user[0]->id }}" class="add-doc-form" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="forms-container">
                    <div class="">
                       <input type="text" placeholder="title" name="name" value="{{ $user[0]->name }}">
                        <input type="number" placeholder="title" name="phone" value="{{ $user[0]->phone }}">
                        <input type="email" placeholder="title" name="email" value="{{ $user[0]->email }}">
                        <input type="password" placeholder="title" name="password" value="{{ $user[0]->password }}">
                        <input type="number" placeholder="title" name="phone" value="{{ $user[0]->phone }}">
                    </div>
                </div>

                <button class="save-btn" type="submit">Save</button>
            </form>

        </div>

    </main>
    @endsection