@if ($paginator->hasPages())
    <nav class="govuk-pagination" role="navigation" aria-label="Pagination">
        @if ($paginator->onFirstPage())
            <span class="govuk-pagination__prev govuk-pagination__link--disabled">Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="govuk-pagination__prev">
            <svg class="govuk-pagination__icon govuk-pagination__icon--prev" xmlns="http://www.w3.org/2000/svg" height="13" width="15" aria-hidden="true" focusable="false" viewBox="0 0 15 13">
                <path d="m6.5938-0.0078125-6.7266 6.7266 6.7441 6.4062 1.377-1.449-4.1856-3.9768h12.896v-2h-12.984l4.2931-4.293-1.414-1.414z"></path>
            </svg>
                Previous
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="govuk-link govuk-pagination__link govuk-pagination__link--disabled">{{ $element }}</span>
            @endif

            @if (is_array($element))
                <ul class="govuk-pagination__list">
                    @foreach ($element as $page => $url)
                    <li class="govuk-pagination__item {{ $page == $paginator->currentPage() ? 'govuk-pagination__item--current' : '' }}">
                        @if ($page == $paginator->currentPage())
                            <span class="govuk-link govuk-pagination__link govuk-pagination__item--current">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="govuk-pagination__link">{{ $page }}</a>
                        @endif
                    </li>
                    @endforeach
                </ul>
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="govuk-pagination__next">
                Next
                <svg class="govuk-pagination__icon govuk-pagination__icon--next" xmlns="http://www.w3.org/2000/svg" height="13" width="15" aria-hidden="true" focusable="false" viewBox="0 0 15 13">
                    <path d="m8.107-0.0078125-1.4136 1.414 4.2926 4.293h-12.986v2h12.896l-4.1855 3.9766 1.377 1.4492 6.7441-6.4062-6.7246-6.7266z"></path>
                </svg>
            </a>
        @else
            <span class="govuk-pagination__next govuk-pagination__link--disabled">Next</span>
        @endif
    </nav>
@endif
