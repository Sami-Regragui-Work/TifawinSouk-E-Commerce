<div>
    <div>
        <table>
            <thead>
                <tr>
                    @foreach ($columns as $column)
                        <th>{{ $column['label'] ?? ucfirst(str_replace('_', ' ', $column['name'])) }}</th>
                    @endforeach
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rows as $row)
                    <tr>
                        @foreach ($columns as $column)
                            <td>{{ data_get($row, $column['name']) ?? '-' }}</td>
                        @endforeach
                        <td>
                            <div>
                                <a href="{{ route("admin.{$table}.edit", $row) }}">Edit</a>
                                <form action="{{ route("admin.{$table}.delete", $row) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <td colspan="{{ count($columns) + 1}}">No {{ ucfirst(str_replace('_', ' ', $table))}} found.</td>
                @endforelse
            </tbody>
        </table>
    </div>
    @if (method_exists($rows, 'links'))
        <div>{{ $rows->links() }}</div>
    @endif
</div>
