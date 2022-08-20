@extends('admin.includes.nav')
    @section('content')
    <main>

<div></div>

<div class="dashboard-content">

    <div class="add-title">
       <a href="/users">  
            <a href="users">back</a>
        </a>

        <h2>Add User</h2>
    </div>

    <form action="create" class="add-doc-form" method="post" >
        {{ csrf_field() }}
        <div class="forms-container">
            <div class="">
                <input type="text" placeholder="name" name="name">
                <input type="text" name="password"placeholder="password">
                <input type="email" name="email"placeholder="email">
                <input type="text" name="phone"placeholder="phone">
            </div>
        </div>

        <button class="save-btn" type="submit" name="submit">Save</button>
    </form>

</div>

</main>
@endsection
