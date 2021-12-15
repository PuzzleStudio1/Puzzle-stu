@foreach($categories as $sub_category)
    <tr>
        <td>{{str_repeat('____', $level)}} {{$sub_category->name}}</td>
        <td>
            <a href="{{ route('categories.edit', $sub_category->id) }}"
                class="btn btn-icon btn-outline-success btn-sm">
                <i class="flaticon-edit"></i>
            </a>
            <a href="{{ route('categories.destroy', $sub_category->id) }}" class="btn btn-icon btn-outline-danger btn-sm">
                <i class="flaticon-delete-1"></i>
            </a>
        </td>
    </tr>
    @if(count($sub_category->childrenRecursive) > 0)
        @include('partials.categoryList', ['categories' => $sub_category->childrenRecursive, 'level' => $level+1])
    @endif
@endforeach