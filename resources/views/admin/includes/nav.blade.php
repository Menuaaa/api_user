        <nav>
            <h1>Dashboard</h1>
            <ul>
                <li>
                    <a href="{{ route('services.index') }}">Services</a>
                </li>
                <li>
                <a href="{{ route('salons.index') }}">Salons</a>
                </li>
                <li>
                <a href="{{ route('aboutus.index')}}">About us</a>
                </li>  
                  <li>
                <a href="{{ route('users.index')}}">Users</a>
                </li>
                <li>
                    <a href="#">Log out</a>
                </li>
            </ul>
        </nav>
  @yield('content')

        <style>
            
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;800&display=swap');


* {
    margin: 0px;
    padding: 0px;
    background: none;
    box-sizing: border-box;
    list-style: none;
    text-decoration: none;
    border: none;
}

button {
    cursor: pointer;
    transition: 0.3s;
}
label{
    font-size: 20px;
    font-weight: bold;
    color: darkblue;
}
.add {
    background: #09691b;
    color: #f5f5f5;
    padding: 16px 24px;
    border-radius: 4px;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 22px;
}

.edit {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
    font-size: 16px;
    line-height: 22px;
    color: #061A40;
    border: 2px solid #061A40;
    border-radius: 8px;
    padding: 12px 24px;


}

.edit:hover {
    color:#f5f5f5;
     background:   #061A40;

}
.delete {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
    font-size: 16px;
    line-height: 22px;
 
    border-radius: 8px;
    color: #B10000;;
    padding: 12px 24px;
    border: 2px solid #B10000;;
}

.delete:hover {
    background: #B10000;
    color:#f5f5f5
}

.list-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
}


main {
    display: grid;
    grid-template-columns: 284px 1fr;

}


nav {
    background: #061A40;
    padding: 40px;
    position: fixed;
    height: 100vh;
    width: 284px;

}



nav ul {
    display: grid;
    gap: 12px;
    margin-top: 32px;

}

nav ul li a {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 500;
    font-size: 20px;
    line-height: 24px;
    text-align: center;
    color: rgba(255, 255, 255, 0.8);
}


nav ul li:last-child {
    margin-top: 64px;
  }

h1 {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 600;
    font-size: 32px;
    line-height: 39px;
    color: #FFFFFF;
}


.dashboard-content {
    padding: 40px;
}

h2 {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 600;
    font-size: 40px;
    line-height: 48px;

    color: #061A40;
}

.table-container {
    width: 100%;
    margin-top: 52px;
}


table {

    width: 100%;

}

.btn-td {
    max-width: 50px;
}

td,
th {
    padding: 12px ;
   text-align: center;
    font-size: 16px;
    max-width: 300px;

    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 24px;

    color: #061A40;
}

th {
    background-color: #061A40;
    color: #ffffff;
}

tr:nth-child(even) {
    background-color: #f5f5f5;
}


/*--------------- add doctor --------------------*/

.save-btn {
 
    margin-top: 52px;
    background-color: #09691b;
    color:#FFFFFF;
    padding: 16px 24px;
    max-width: 200px;
    border-radius: 8px;
}

.add-title {
    display: flex;
    align-items: center;
    gap:40px
}

.add-doc-form {
    display: grid;
}

.add-doc-form .forms-container {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap:32px;
    margin-top: 40px;
}
.add-doc-form .forms-container div {
    display: grid;
    gap:24px
}

input {
    border: 1px solid rgba(13, 40, 91, 0.4);
    border-radius: 8px;
    padding: 16px 24px;
}

input::placeholder {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 19px;
    color: rgba(60, 84, 129, 0.64);
}



textarea {
    border: 1px solid rgba(13, 40, 91, 0.4);
    border-radius: 8px;
    padding: 16px 24px;
}


textarea::placeholder {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 19px;
    color: rgba(60, 84, 129, 0.64);
}
        </style>
        