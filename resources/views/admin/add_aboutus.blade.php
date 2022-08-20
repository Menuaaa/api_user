@extends('admin.includes.nav')
    @section('content')
    <main>

<div></div>

<div class="dashboard-content">

    <div class="add-title">
       <a href="/aboutus">  
            <a href="aboutus">back</a>
        </a>

        <h2>Add ABout us</h2>
    </div>

    <form action="aboutus/create" class="add-doc-form" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="forms-container">
            <div class="">
                <input type="text" placeholder="title" name="title">
                <input type="text" name="text">
                <input type="file" name="first_image">
                <input type="file" name="second_image">
                <input type="file" name="third_image">
            </div>
        </div>

        <button class="save-btn" type="submit" name="submit">Save</button>
    </form>

</div>

</main>
@endsection
