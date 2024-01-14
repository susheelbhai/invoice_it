@if ($type == 'add')
    <div class="mb-3 col-md-6">
        <button type="button" class="btn btn-primary" {{ $attributes }}> <i class="fa fa-plus"></i>
            <span class="btn-icon-end"> {{ $title }} </span>
        </button>
    </div>
@endif

@if ($type == 'submit')
    <div class="mb-3 col-md-6">
        <button type="button" class="btn btn-primary" {{ $attributes }}>
            {{ $title }}
        </button>
    </div>
@endif
