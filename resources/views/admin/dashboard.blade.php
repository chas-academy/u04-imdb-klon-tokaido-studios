@include('layouts.app')

@section('Title', 'Admin.Dashboard')

@section('content')

<h1>Välkommen till din dashboard!</h1>

    @if(session('user_role') === 'admin')
        <p>Admin</p>
    @endif

@endsection