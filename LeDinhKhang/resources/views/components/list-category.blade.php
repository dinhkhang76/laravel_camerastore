<div class="listcategory mb-4">
    <div class="card" style="width:100%">
    <div class="card-header bg-warning text-center" style="font-weight: bold">
        DANH MỤC SẢN PHẨM
    </div>
    <ul class="list-group list-group-flush">
        @foreach ($list_category as $row_category)
        <li class="list-group-item">
            <a href="{{ $row_category->slug }}" class="text-dark " style="text-decoration: none">{{ $row_category->name }}</a>
        </li>
        @endforeach
                         
    </ul>
</div>
</div>