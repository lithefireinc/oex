@if ($errors->any())
    <div class="login-error">
        <ul class="alert-modified errors-list alert alert-danger">
            @foreach ($errors->all() as $error)
                <li><strong>Error</strong> - {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif