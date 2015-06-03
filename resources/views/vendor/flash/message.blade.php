@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
        <div class="alert-modified alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @if( Session::get('flash_notification.level') == 'success' || Session::get('flash_notification.level') == 'info')
                <strong>Success</strong> - {{ Session::get('flash_notification.message') }}
            @else
                <strong>Error</strong> - {{ Session::get('flash_notification.message') }}
            @endif
        </div>
    @endif
@endif