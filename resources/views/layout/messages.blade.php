@if(Session::get('success', false))
        <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <div class="message_success" >
                <i class="fa fa-check"></i>
                {{ $msg }}
            </div>
        @endforeach
    @else
        <div class="success">
            <i class="fa fa-check"></i>
            {{ $data }}
        </div>
    @endif
@endif
