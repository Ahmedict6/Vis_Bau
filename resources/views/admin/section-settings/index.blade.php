@extends('layouts.admin')

@section('title', 'Section Settings - VIS GmbH')
@section('page-title', 'Section Settings')
@section('page-subtitle', 'Control which sections appear on your website')

@section('header-actions')
    <a href="{{ route('home') }}" class="btn btn-outline-primary" target="_blank">
        <i class="fas fa-external-link-alt me-1"></i>View Website
    </a>
@endsection

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <div class="mb-4">
            <h5 class="card-title mb-2">Homepage Sections</h5>
            <p class="text-muted mb-0">Toggle sections on/off to control what appears on your homepage. When a section is inactive, it will not be displayed anywhere on the website.</p>
        </div>

        @if($sections->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th style="width: 5%;">Order</th>
                            <th style="width: 25%;">Section Name</th>
                            <th style="width: 45%;">Description</th>
                            <th style="width: 15%;" class="text-center">Status</th>
                            <th style="width: 10%;" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="sortable-sections">
                        @foreach($sections as $section)
                        <tr data-id="{{ $section->id }}">
                            <td>
                                <i class="fas fa-grip-vertical text-muted" style="cursor: move;"></i>
                                <span class="ms-2">{{ $section->sort_order }}</span>
                            </td>
                            <td>
                                <strong>{{ $section->section_name }}</strong>
                            </td>
                            <td>
                                <small class="text-muted">{{ $section->section_description }}</small>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('admin.section-settings.toggle', $section) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm {{ $section->is_active ? 'btn-success' : 'btn-secondary' }}"
                                            onclick="return confirm('Are you sure you want to {{ $section->is_active ? 'deactivate' : 'activate' }} this section?')">
                                        @if($section->is_active)
                                            <i class="fas fa-check-circle me-1"></i>Active
                                        @else
                                            <i class="fas fa-times-circle me-1"></i>Inactive
                                        @endif
                                    </button>
                                </form>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $section->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $section->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('admin.section-settings.update', $section) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Section: {{ $section->section_name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="section_name{{ $section->id }}" class="form-label">Section Name</label>
                                                <input type="text" class="form-control" id="section_name{{ $section->id }}"
                                                       name="section_name" value="{{ $section->section_name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="section_description{{ $section->id }}" class="form-label">Description</label>
                                                <textarea class="form-control" id="section_description{{ $section->id }}"
                                                          name="section_description" rows="3">{{ $section->section_description }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sort_order{{ $section->id }}" class="form-label">Sort Order</label>
                                                <input type="number" class="form-control" id="sort_order{{ $section->id }}"
                                                       name="sort_order" value="{{ $section->sort_order }}" min="0" required>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="is_active{{ $section->id }}"
                                                       name="is_active" value="1" {{ $section->is_active ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_active{{ $section->id }}">
                                                    Active
                                                </label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="alert alert-info mt-4">
                <i class="fas fa-info-circle me-2"></i>
                <strong>Tip:</strong> You can drag and drop rows to reorder sections. The order determines how sections appear on your homepage.
            </div>
        @else
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle me-2"></i>
                No sections found. Please run the database seeder to populate section settings.
            </div>
        @endif
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sortableTable = document.getElementById('sortable-sections');

    if (sortableTable) {
        new Sortable(sortableTable, {
            handle: '.fa-grip-vertical',
            animation: 150,
            onEnd: function(evt) {
                const rows = sortableTable.querySelectorAll('tr');
                const sections = [];

                rows.forEach((row, index) => {
                    const id = row.getAttribute('data-id');
                    if (id) {
                        sections.push({
                            id: id,
                            sort_order: index + 1
                        });
                    }
                });

                // Send AJAX request to update order
                fetch('{{ route('admin.section-settings.update-order') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ sections: sections })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update the order numbers in the table
                        rows.forEach((row, index) => {
                            const orderCell = row.querySelector('td:first-child span');
                            if (orderCell) {
                                orderCell.textContent = index + 1;
                            }
                        });

                        // Show success message
                        const alertDiv = document.createElement('div');
                        alertDiv.className = 'alert alert-success alert-dismissible fade show';
                        alertDiv.innerHTML = `
                            ${data.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        `;
                        document.querySelector('.card').insertBefore(alertDiv, document.querySelector('.card-body'));

                        // Auto-dismiss after 3 seconds
                        setTimeout(() => {
                            alertDiv.remove();
                        }, 3000);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to update order. Please try again.');
                });
            }
        });
    }
});
</script>
@endpush

