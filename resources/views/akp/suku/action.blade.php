   
    <a href="{{ route('suku.edit', $model) }}" class="btn btn-sm btn-warning">Edit</a>
    <form action="{{ route('suku.destroy', $model) }}" method="POST" onsubmit="return confirm('anda yakin ?')" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
    </form>