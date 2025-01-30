

<h1>Välkommen till din dashboard!</h1>

    
    @if(session('user_role') === 'admin')
        <p>Admin</p>
    @endif
