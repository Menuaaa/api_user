@extends('admin.includes.nav')
    @section('content')
    <main>

<div></div>

<div class="dashboard-content">

    <div class="add-title">
       <a href="/services">  
            <a href="services">back</a>
        </a>

        <h2>Add Service</h2>
    </div>

    <form action="services/create" class="add-doc-form" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="forms-container">
            <div class="">
                <input type="text" placeholder="title" name="title">
                <input type="text" placeholder="location" name="location">
                <input type="file" name="img">
            </div>
            <input type="number" name="price" placeholder="price" id="">
            <input type="text" name="worker_level" placeholder="Worker level" id="">
            <input type="text" name="revews" placeholder="Revews" id="">
            <input type="text" name="is_available" placeholder="Available" id="">
            <textarea id="" cols="30" rows="10"  placeholder="description" name="description"></textarea>
        </div>

        <button class="save-btn" type="submit" name="submit">Save</button>
    </form>

</div>

</main>
@endsection
