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
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="card-title">Sub Category List</h4>
                            <div>
                                <button id="toggleReorderBtn" class="btn btn-outline-primary btn-sm">Enable Reorder</button>
                                <button id="cancelReorderBtn"
                                    class="btn btn-outline-secondary btn-sm d-none">Cancel</button>
                            </div>
                        </div>
                        <div class="dropdown text-sans-serif text-end"><button class="btn btn-primary tp-btn-light sharp"
                                type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport"
                                aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" cx="5" cy="12" r="2">
                                            </circle>
                                            <circle fill="#000000" cx="12" cy="12" r="2">
                                            </circle>
                                            <circle fill="#000000" cx="19" cy="12" r="2">
                                            </circle>
                                        </g>
                                    </svg></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                <div class="py-2"><a class="dropdown-item" id="deleteAll">Delete
                                        All</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="projectlist" class="display no-auto-init">
                                    <thead>
                                        <tr>
                                            <th style="width:50px;">
                                                <div class="form-check custom-checkbox checkbox-primary  me-3">
                                                    <input type="checkbox" class="form-check-input" id="checkAll"
                                                        value="0" required="">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Products</th>
                                            <th>Display Order</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="subCategoryTbody">
                                        @forelse ($subcategories as $subcategory)
                                            <tr data-id="{{ $subcategory->id }}" class="draggable-row">
                                                <td>
                                                    <div class="form-check custom-checkbox checkbox-primary me-3">
                                                        <input type="checkbox" class="form-check-input multiSelectCheckbox"
                                                            id="customCheckBox2" value="{{ $subcategory->id }}"
                                                            required="">
                                                        <label class="form-check-label" for="customCheckBox2"></label>
                                                    </div>
                                                </td>
                                                <td style="width: 30%;">
                                                    <div class="d-flex align-items-center">

                                                        <div>
                                                            <h6 class="w-space-no mb-0 fs-14 font-w600">
                                                                {{ $subcategory->category->category_name ?? '' }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="width: 30%;">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('/uploads/subcategories/' . $subcategory->sub_category_image) }}"
                                                            class="rounded-lg me-2" width="40" alt="">
                                                        <div>
                                                            <h6 class="w-space-no mb-0 fs-14 font-w600">
                                                                {{ $subcategory->sub_category_name }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $subcategory->products_count_count }}</td>
                                                <td class="display-order-cell">{{ $subcategory->display_order }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="drag-handle btn btn-light btn-sm me-1"
                                                            title="Drag to reorder"><i class="fa fa-bars"></i></span>
                                                        <a href="{{ route('admin.edit.subcategory', $subcategory->subcategory_slug) }}"
                                                            class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                        {{-- <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                                class="fa fa-trash"></i></a> --}}
                                                        <form action="{{ route('admin.delete.subcategory') }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="subcategorySlug"
                                                                value="{{ $subcategory->subcategory_slug }}">
                                                            <button type="submit"
                                                                class="btn btn-danger shadow btn-xs sharp">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    <h6>No Records Found</h6>
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
    <script src="{{ asset('admin/assets/js/delete-selected.js') }}"></script>

    <!-- SortableJS (CDN) for drag-and-drop reorder -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <!-- DataTables + RowReorder (CDN) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.0/css/rowReorder.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.4.0/js/dataTables.rowReorder.min.js"></script>

    <style>
        .drag-handle {
            cursor: move;
        }

        .draggable-row:hover {
            background: #f9f9f9;
        }

        /* DataTables pagination tweaks */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.25rem 0.5rem;
            margin: 0 0.2rem;
            border-radius: 0.25rem;
            border: 1px solid transparent;
            color: #495057;
            background: transparent;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #0d6efd;
            color: #fff !important;
            border-color: rgba(13, 110, 253, 0.2);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tbody = document.getElementById('subCategoryTbody');
            if (!tbody) return;

            var table = null;
            var sortableInstance = null;
            var reorderEnabled = false;
            var prevPageLength = null;

            function initServerTable() {
                if (typeof $ === 'undefined' || !$.fn || !$.fn.DataTable) return;
                // if already initialized, destroy it first to avoid reinitialisation errors
                if ($.fn.DataTable.isDataTable('#projectlist')) {
                    try {
                        $('#projectlist').DataTable().clear().destroy();
                    } catch (e) {
                        console.warn('[SubCategory] error destroying existing DataTable', e);
                    }
                    // ensure table variable cleared
                    table = null;
                }
                table = $('#projectlist').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('admin.subcategory.data') }}",
                        type: 'POST',
                        data: function(d) {
                            d._token = document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content');
                        }
                    },
                    columns: [{
                            data: 'id',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                return '<div class="form-check custom-checkbox checkbox-primary me-3"><input type="checkbox" class="form-check-input multiSelectCheckbox" value="' +
                                    data + '"><label class="form-check-label"></label></div>';
                            }
                        },
                        {
                            data: 'category_name'
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                var img = row.sub_category_image ?
                                    '<img src="/uploads/subcategories/' + row.sub_category_image +
                                    '" class="rounded-lg me-2" width="40" alt="">' : '';
                                return '<div class="d-flex align-items-center">' + img +
                                    '<div><h6 class="w-space-no mb-0 fs-14 font-w600">' + row
                                    .sub_category_name + '</h6></div></div>';
                            }
                        },
                        {
                            data: 'products_count_count'
                        },
                        {
                            data: 'display_order'
                        },
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                var editBtn = '<a href="/edit-sub-category/' + row
                                    .subcategory_slug +
                                    '" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>';
                                var form =
                                    '<form action="{{ route('admin.delete.subcategory') }}" method="POST" style="display:inline">@csrf @method('DELETE')<input type="hidden" name="subcategorySlug" value="' +
                                    row.subcategory_slug +
                                    '"><button type="submit" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button></form>';
                                return '<div class="d-flex align-items-center"><span class="drag-handle btn btn-light btn-sm me-1" title="Drag to reorder"><i class="fa fa-bars"></i></span>' +
                                    editBtn + form + '</div>';
                            }
                        }
                    ],
                    ordering: false,
                    language: {
                        paginate: {
                            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                        }
                    },
                    pageLength: 10,
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, 'All']
                    ],
                    drawCallback: function() {
                        // attach data-id to rows for reorder/save
                        $('#projectlist tbody tr').each(function() {
                            var data = table.row(this).data();
                            if (data) $(this).attr('data-id', data.id);
                        });
                        // do not init Sortable here if we are in full Reorder mode (we use standalone Sortable then)
                        if (reorderEnabled) return;
                        try {
                            initSortable();
                            console.log('[SubCategory] Sortable initialized for visible rows');
                        } catch (e) {
                            console.warn('[SubCategory] could not init Sortable on draw', e);
                        }
                    }
                });
            }

            // initialize server table
            initServerTable();;

            function initSortable() {
                if (!tbody) return;
                if (sortableInstance) {
                    try {
                        sortableInstance.destroy();
                    } catch (e) {
                        console.warn(e);
                    }
                }
                sortableInstance = Sortable.create(tbody, {
                    handle: '.drag-handle',
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    onEnd: function(evt) {
                        // update display order numbers locally (1-based)
                        tbody.querySelectorAll('tr').forEach(function(row, index) {
                            var cell = row.querySelector('.display-order-cell');
                            if (cell) cell.textContent = index + 1;
                        });
                    }
                });
            }

            function getCurrentOrder() {
                var order = [];
                tbody.querySelectorAll('tr').forEach(function(row) {
                    order.push(row.getAttribute('data-id'));
                });
                return order;
            }

            function saveOrder() {
                return new Promise(function(resolve, reject) {
                    var order = getCurrentOrder();
                    fetch("{{ route('admin.reorder.subcategory') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify({
                                order: order
                            })
                        }).then(function(response) {
                            return response.json();
                        })
                        .then(function(data) {
                            if (data.success) {
                                resolve(true);
                            } else {
                                alert(data.message || 'Could not save order.');
                                resolve(false);
                            }
                        }).catch(function(err) {
                            console.error(err);
                            alert('Error saving order.');
                            resolve(false);
                        });
                });
            }

            // Toggle reorder
            var toggleBtn = document.getElementById('toggleReorderBtn');
            var cancelBtn = document.getElementById('cancelReorderBtn');

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function() {
                    if (!reorderEnabled) {
                        // enable: fetch *all* rows from server and allow reordering across full set
                        if (table) {
                            prevPageLength = table.page.len();
                            // destroy server-side instance before switching to full client-side list
                            try {
                                $('#projectlist').DataTable().clear().destroy();
                            } catch (e) {
                                console.warn(e);
                            }
                            table = null;
                            fetch("{{ route('admin.subcategory.all') }}", {
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest'
                                    }
                                })
                                .then(function(resp) {
                                    return resp.json();
                                })
                                .then(function(data) {
                                    var html = '';
                                    data.forEach(function(row) {
                                        html += '<tr data-id="' + row.id +
                                            '" class="draggable-row">';
                                        html +=
                                            '<td><div class="form-check custom-checkbox checkbox-primary me-3"><input type="checkbox" class="form-check-input multiSelectCheckbox" value="' +
                                            row.id +
                                            '"><label class="form-check-label"></label></div></td>';
                                        html +=
                                            '<td><div class="d-flex align-items-center"><div><h6 class="w-space-no mb-0 fs-14 font-w600">' +
                                            (row.category_name || '') +
                                            '</h6></div></div></td>';
                                        var img = row.sub_category_image ?
                                            '<img src="/uploads/subcategories/' + row
                                            .sub_category_image +
                                            '" class="rounded-lg me-2" width="40" alt="">' : '';
                                        html += '<td><div class="d-flex align-items-center">' +
                                            img +
                                            '<div><h6 class="w-space-no mb-0 fs-14 font-w600">' +
                                            row.sub_category_name + '</h6></div></div></td>';
                                        html += '<td>' + (row.products_count_count || 0) +
                                            '</td>';
                                        html += '<td class="display-order-cell">' + (row
                                            .display_order || '') + '</td>';
                                        html +=
                                            '<td><div class="d-flex align-items-center"><span class="drag-handle btn btn-light btn-sm me-1" title="Drag to reorder"><i class="fa fa-bars"></i></span>';
                                        html += '<a href="/edit-sub-category/' + row
                                            .subcategory_slug +
                                            '" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>';
                                        html +=
                                            '<form action="{{ route('admin.delete.subcategory') }}" method="POST" style="display:inline">@csrf @method('DELETE')<input type="hidden" name="subcategorySlug" value="' +
                                            row.subcategory_slug +
                                            '"><button type="submit" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button></form>';
                                        html += '</div></td></tr>';
                                    });
                                    tbody.innerHTML = html;
                                    // initialize a lightweight client-side DataTable (no paging) to preserve layout
                                    try {
                                        if ($.fn.DataTable.isDataTable('#projectlist')) {
                                            try {
                                                $('#projectlist').DataTable().clear().destroy();
                                            } catch (e) {
                                                console.warn(e);
                                            }
                                        }
                                        table = $('#projectlist').DataTable({
                                            paging: false,
                                            searching: false,
                                            info: false,
                                            ordering: false,
                                            autoWidth: false,
                                            columnDefs: [{
                                                    targets: 0,
                                                    width: '50px'
                                                },
                                                {
                                                    targets: 1,
                                                    width: '30%'
                                                },
                                                {
                                                    targets: 2,
                                                    width: '30%'
                                                }
                                            ]
                                        });
                                        table.columns.adjust().draw(false);
                                    } catch (e) {
                                        console.warn(
                                            '[SubCategory] could not init client-side DataTable', e);
                                    }

                                    initSortable();
                                    reorderEnabled = true;
                                    toggleBtn.textContent = 'Save Order';
                                    toggleBtn.classList.remove('btn-outline-primary');
                                    toggleBtn.classList.add('btn-success');
                                    if (cancelBtn) cancelBtn.classList.remove('d-none');
                                });
                        } else {
                            initSortable();
                            reorderEnabled = true;
                            toggleBtn.textContent = 'Save Order';
                            toggleBtn.classList.remove('btn-outline-primary');
                            toggleBtn.classList.add('btn-success');
                            if (cancelBtn) cancelBtn.classList.remove('d-none');
                        }
                    } else {
                        // save
                        saveOrder().then(function(success) {
                            if (success) {
                                if (sortableInstance) {
                                    try {
                                        sortableInstance.destroy();
                                    } catch (e) {}
                                    sortableInstance = null;
                                }
                                if (table) {
                                    // re-init server-side table to reflect new order
                                    initServerTable();
                                } else {
                                    location.reload();
                                }
                                reorderEnabled = false;
                                toggleBtn.textContent = 'Enable Reorder';
                                toggleBtn.classList.remove('btn-success');
                                toggleBtn.classList.add('btn-outline-primary');
                                if (cancelBtn) cancelBtn.classList.add('d-none');
                            }
                        });
                    }
                });
            }

            if (cancelBtn) {
                cancelBtn.addEventListener('click', function() {
                    // revert any local reorder by reloading page
                    location.reload();
                });
            }

            // Sortable is initialized only in Reorder mode (when full list is loaded)
        });
    </script>
@endsection
