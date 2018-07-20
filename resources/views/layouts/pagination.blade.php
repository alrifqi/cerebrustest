<nav aria-label="Page navigation">
    <ul class="pagination">
    <li class="@if($persons->previousPageUrl() == '') disabled @endif">
        <a href="{{ $persons->previousPageUrl() }}" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li>
    @for($i = 1; $i <= $persons->lastPage(); $i++)
        <li class="@if($persons->currentPage() == $i) disabled @endif">
            <a href="{{ $persons->url($i) }}">{{ $i }}</a>
        </li>
    @endFor
    <li class="@if(!($persons->hasMorePages())) disabled @endif">
        <a href="@if($persons->hasMorePages()) {{ $persons->nextPageUrl() }} @endif" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        </a>
    </li>
    </ul>
</nav>