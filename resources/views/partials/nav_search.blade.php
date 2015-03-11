<form class="navbar-form navbar-left" role="search" action="{{ action("HomeController@search") }}">
    <div class="input-group">
        {!! Form::text('title', $searchSelectedTitle, [ 'placeholder' => 'Search', 'class' => 'form-control search-input' ]) !!}
        {!! Form::select('tags[]', $searchTags, $searchSelectedTags, [ 'class' => 'form-control', 'data-select', "multiple" => "multiple", 'data-placeholder' => "Choose tags", "data-allow-clear" ]) !!}

        <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                Search
            </button>
        </span>
    </div>
</form>