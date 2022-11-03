<div class="listcategory mb-4">
    <div class="card" style="width:100%">
    <div class="card-header bg-warning text-center" style="font-weight: bold">
        DANH SÁCH NHÀ CUNG CẤP
    </div>
    <ul class="list-group list-group-flush">
        @foreach ($list_supplier as $row_supplier)
        <li class="list-group-item">
            <a href="{{ $row_supplier->slug }}" class="text-dark " style="text-decoration: none">{{ $row_supplier->name }}</a>
        </li>
        @endforeach
                         
    </ul>
</div>
</div>