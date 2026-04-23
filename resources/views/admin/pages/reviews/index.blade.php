@extends('admin.master')

@section('content')

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1>Kelola Ulasan</h1>
            <hr>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Nama Reviewer</th>
                    <th>Email</th>
                    <th>Item Ulasan</th>
                    <th>Tipe</th>
                    <th>Rating</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($reviews as $review)
                    <tr>
                        <td><strong>#{{ $review->id }}</strong></td>
                        <td>
                            @if($review->image)
                                <img src="{{ asset('storage/' . $review->image) }}" 
                                    alt="Review image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $review->reviewer_name }}</td>
                        <td>{{ $review->email ?? '-' }}</td>
                        <td>
                            @if($review->reviewable)
                                <span class="badge bg-info">{{ $review->reviewable->name ?? 'N/A' }}</span>
                            @else
                                <span class="badge bg-secondary">Tidak Tersedia</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-primary">{{ class_basename($review->reviewable_type) }}</span>
                        </td>
                        <td>
                            <div class="rating-display">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        <i class="fa fa-star" style="color: #ffc107;"></i>
                                    @else
                                        <i class="fa fa-star-o" style="color: #ccc;"></i>
                                    @endif
                                @endfor
                                <span class="ms-2">({{ $review->rating }}/5)</span>
                            </div>
                        </td>
                        <td>
                            <small>{{ Str::limit($review->description, 50) }}</small>
                        </td>
                        <td>
                            @if($review->is_approved)
                                <span class="badge bg-success"><i class="fa fa-check"></i> Disetujui</span>
                            @else
                                <span class="badge bg-warning text-dark"><i class="fa fa-hourglass"></i> Menunggu</span>
                            @endif
                        </td>

                        <td>
                            <div class="btn-group" role="group">
                                {{-- Tombol Approve / Unapprove --}}
                                @if(!$review->is_approved)
                                    <form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-sm" title="Setujui ulasan ini">
                                            <i class="fa fa-check"></i> Setujui
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.reviews.unapprove', $review->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-warning btn-sm" title="Tolak ulasan ini">
                                            <i class="fa fa-times"></i> Tolak
                                        </button>
                                    </form>
                                @endif

                                {{-- Delete --}}
                                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus ulasan ini?')" class="btn btn-danger btn-sm" title="Hapus ulasan ini">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center text-muted py-4">
                            <i class="fa fa-inbox"></i> Belum ada ulasan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    .rating-display {
        white-space: nowrap;
    }
    
    .btn-group {
        gap: 4px;
    }
</style>

@endsection