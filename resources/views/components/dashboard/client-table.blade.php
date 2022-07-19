<x-dashboard.table-search-form />
<x-dashboard.default-table length="{{ count($list) }}">
    <x-slot name="header">
        <th>#</th>
        <th><a href="javascript:;" onclick="order('full_name')">Full Name</a></th>
        <th><a href="javascript:;" onclick="order('id')">ID</a></th>
        <th><a href="javascript:;" onclick="order('phone')">Phone Number</a></th>
        <th>Address</th>
        <th>Last Order Date</th>
        <th>Status</th>
        <th>Password</th>
        <th>Action</th>
    </x-slot>
    <x-slot name="body">
        @foreach ($list as $index => $item)
        <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $item->full_name }}</td>
            <td>#{{ $item->id }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->lastOrderDate() }}</td>
            <td>
                <form action="{{ route('dashboard.clients.verify', $item->id) }}" method="POST"
                    id="verify-from-{{ $item->id }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="false">
                    <input type="checkbox" @if($item->is_active == 1) checked @endif name="status" value="true">
                </form>
            </td>
            <td><input type="password" class="form-control" readonly="true"
                    ondblclick="this.type = this.type == 'text' ? 'password' : 'text'"
                    value="{{ $item->plain_password }}"></td>
            <td>
                <div class="d-flex float-right">

                    <button type="submit" class="btn btn-success mr-2" form="verify-from-{{ $item->id }}">Save</button>
                    <a href="{{ route('dashboard.clients.show', $item->id) }}" class="btn btn-primary mr-2"><i
                            class="fa fa-pen"></i></a>
                    <form action="{{ route('dashboard.clients.delete', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"
                                onclick="return confirm('Are you sure?');"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </x-slot>
</x-dashboard.default-table>

{{ $list->withQueryString()->links() }}