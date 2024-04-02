<div class="col-sm-6">
    Showing <strong>{{ $data['rows']->firstItem() }}</strong>  to <strong>{{ $data['rows']->lastItem() }} </strong>  of <strong> {{$data['rows']->total()}}</strong> entries
                            <span> | Takes <b>{{ round((microtime(true) - LARAVEL_START),2) }}</b> seconds to render</span>
</div>