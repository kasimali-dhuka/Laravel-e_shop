<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
                <tr id="category{{ $item->id }}" class="align-middle">
                    <td class="text-center">{{ $item->id }}</td>
                    <td class="text-wrap" style="min-width:150px">{{ $item->name }}</td>
                    <td class="text-wrap" style="min-width:350px">{{ $item->description }}</td>
                    <td>
                        <img src="{{ isset($item->image) && Storage::exists($item->image) ? Storage::url($item->image) : Storage::url('category/default.png') }}" alt="{{ $item->name }} image" style="object-fit:cover;" width="100px" height="100px" />
                    </td>
                    <td>
                        <div>
                            @php
                                if ($attributes['table'] === "categories") {
                                    $url = route('admin.categories.edit', ['category' => $item->id]);
                                } else {
                                    $url = route('admin.products.edit', ['product' => $item->id]);
                                }
                            @endphp
                            <a href="{{ $url }}" class="btn btn-primary fs-5 px-3 py-1">
                                <i class="fas fa-pen"></i>
                            </a>
                        </div>
                        <div>
                            <button data-id="{{ $item->id }}" data-name="{{ $attributes['table'] }}" class="btn btn-danger delete-category fs-5 px-3 py-1">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center fw-bold">⚠ It feels lonely here ⚠</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>