<x-app-layout>
    @inject('codegx', 'App\Http\Controllers\CodegxController')
    
    <div class="jumbotron shade pt-5">
    <h1>@lang('system.dashboard')</h1>
    
    <!-- Success message -->
    @if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    </div>
    @endif
    
    
    
    <!-- Search and Items per Page -->
    <div class="row">
    <div class="col-md-6">
    <!-- Search input -->
    <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="@lang('system.search')" id="searchInput">
    </div>
    </div>
   
    </div>
    
    <!-- Table to display recruitments -->
    <div class="table-responsive mt-3">
    <table class="table table-striped">
    <!-- Table header -->
    <thead>
    <tr>
    <th>@lang('system.id')</th>
    <th>@lang('system.first_name')</th>
    <th>@lang('system.last_name')</th>
    <th>@lang('system.email')</th>
    <th>@lang('system.phone_number')</th>
    <th>@lang('system.short_introduction')</th>
    <th>@lang('system.age')</th>
    <th>@lang('system.city')</th>
    <th>@lang('system.degree')</th>
    <th>@lang('system.years_of_experience')</th>
    <th>@lang('system.photo_path')</th>
    <th>@lang('system.resume_path')</th>
    <th>@lang('system.created_at')</th>
    <th>@lang('system.actions')</th>
        
    </tr>
    </thead>
    <!-- Table body -->
    <tbody>
    <!-- Loop through recruitments -->
    @foreach($recruitments as $recruitment)
    <tr>
    <td>{{ $recruitment->id }}</td>
    <td>{{ $recruitment->first_name }}</td>
    <td>{{ $recruitment->last_name }}</td>
    <td>{{ $recruitment->email }}</td>
    <td>{{ $recruitment->phone_number }}</td>
    <td>{{ $recruitment->short_introduction }}</td>
    <td>{{ $recruitment->age }}</td>
    <td>{{ $recruitment->city }}</td>
    <td>{{ $recruitment->degree }}</td>
    <td>{{ $recruitment->years_of_experience }}</td>
    <td><img loading="lazy" class="image-table" src="{{ asset('storage/' . $recruitment->photo_path) }}" alt="{{ $recruitment->first_name }}"></td>
    <td><a target="_bank" href="{{ asset('storage/' . $recruitment->resume_path) }}"> @lang('system.resume_path') </a></td>
    <td>{{ $recruitment->created_at }}</td>
    <td>
    <ul class="list-unstyled d-flex justify-content-around">

    <li>
    <a href="#" class="btn btn-outline-danger delete-recruitment" data-recruitment-id="{{ $recruitment->id }}">
        <i class="fa fa-trash"></i>
    </a>
    <form id="delete-form-{{ $recruitment->id }}" action="{{ route('recruitments.destroy', $recruitment->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
    </li>
    </ul>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
    
    <!-- Pagination links -->
    {{ $recruitments->links('pagination::bootstrap-4') }}
    
    </div>
    
    <script>
    // Add event listener to handle delete action
    document.querySelectorAll('.delete-recruitment').forEach(function(element) {
    element.addEventListener('click', function(event) {
    event.preventDefault();
    var recruitmentId = element.getAttribute('data-recruitment-id');
    if (confirm('Are you sure you want to delete this recruitment?')) {
    document.getElementById('delete-form-' + recruitmentId).submit();
    }
    });
    });
    
    // JavaScript for search auto
    document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('searchInput').addEventListener('keyup', function() {
    var searchText = this.value.toLowerCase();
    var rows = document.querySelectorAll('tbody tr');
    rows.forEach(function(row) {
    var rowData = row.textContent.toLowerCase();
    if (rowData.indexOf(searchText) === -1) {
    row.style.display = 'none';
    } else {
    row.style.display = '';
    }
    });
    });
    });
    
    
    </script>
    
    
    </x-app-layout>
    