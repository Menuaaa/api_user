@extends('admin.includes.nav')
    @section('content')
    <main>

<div></div>

<div class="dashboard-content">

    <div class="add-title">
       <a href="/services">  
            <a href="services">back</a>
        </a>

        <h2>Add Salons</h2>
    </div>

    <form action="salons/create" class="add-doc-form" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="forms-container">
            <div class="">
                <input type="number" placeholder="revews" name="revews">
                <input type="file" name="img">
            </div>
        </div>

        <button class="save-btn" type="submit" name="submit">Save</button>
    </form>

</div>

</main>
@endsection
