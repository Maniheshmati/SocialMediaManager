<nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
    <!-- Display the number of results -->
    <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
        نمایش
        <span class="font-semibold text-gray-900 dark:text-white">
            {{ $model->firstItem() }}-{{ $model->lastItem() }}
        </span>
        از
        <span class="font-semibold text-gray-900 dark:text-white">{{ $model->total() }}</span>
    </span>

    <!-- Pagination controls -->
    <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-12">
        <!-- Previous Page Button -->
        <li>
            <a href="{{ $model->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
               @if($model->onFirstPage()) disabled @endif>
                قبل
            </a>
        </li>

        <!-- Page Number Links -->
        @for($i = 1; $i <= $model->lastPage(); $i++)
            <li>
                <a href="{{ $model->url($i) }}" class="flex items-center justify-center px-3 h-8 leading-tight  border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white
                @if ($model->currentPage() == $i) bg-blue-500 text-white @else text-gray-500 bg-white @endif">
                    {{ $i }}
                </a>
            </li>
        @endfor

        <!-- Next Page Button -->
        <li>
            <a href="{{ $model->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
               @if(!$model->hasMorePages()) disabled @endif>
                بعد
            </a>
        </li>
    </ul>
</nav>
