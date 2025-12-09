@extends('admin.layouts.app')

@section('csrf-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content-body')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Notifications List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="projectlist" class="display">
                                    <thead>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($notifications as $notification)
                                            <tr>
                                                <td>
                                                    <strong>
                                                        <a
                                                            href="{{ route('admin.order.details', json_decode($notification->data)->order_id) }}">{{ json_decode($notification->data)->order_id ?? 'N/A' }}</a>
                                                    </strong>
                                                </td>
                                                <td>
                                                    {{ $notification->fullname }}
                                                </td>
                                                <td>
                                                    {{ $notification->email }}
                                                </td>
                                                <td>
                                                    {{ $notification->read_at ? 'Viewed' : 'Read' }}
                                                </td>
                                                <td>
                                                    {{ $notification->created_at ? \Carbon\Carbon::parse($notification->created_at)->format('d-M-Y h:i A') : '' }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center">
                                                    <h6>No Notifications Found</h6>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection



@section('scripts')
    <script>
        var enableSupportButton = '1'
    </script>
    <script>
        var asset_url = 'assets/index.html'
    </script>

    <script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/toggle-status.js') }}"></script>
    <script src="{{ asset('admin/assets/js/delete-selected.js') }}"></script>
@endsection
