@if ($model->paginatorInfo->currentPage > 1)
    <a href="?page={{ $model->paginatorInfo->currentPage-1 }}">قبلی</a>
@endif
    <span>{{ $model->paginatorInfo->currentPage }}</span>
@if ($model->paginatorInfo->hasMorePages)
    <a href="?page={{ $model->paginatorInfo->currentPage+1 }}">بعدی</a>
@endif
