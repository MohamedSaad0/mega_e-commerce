<x-layouts-sb-admin>

    <x-slot:title>show all category</x-slot:title>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <a href="#" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">add new category</span>
        </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>description</th>
                            <th>created_at</th>
                            <th>show</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>System Architect</td>
                            <td>2011/04/25</td>
                            <td><a href="#" class="btn btn-primary">show</a></td>
                            <td><a href="#" class="btn btn-warning">edit</a></td>
                            <td><a href="#" class="btn btn-danger">delete</a></td>
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>description</th>
                            <th>created_at</th>
                            <th>show</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


</x-layouts-sb-admin>