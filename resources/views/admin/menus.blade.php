<x-admin-layout title="Menus">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Bootstrap 5 CDN Link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Database CSS link ( includes Bootstrap 5 )  -->
    <link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
      <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
          <div class="col-sm-6">
            <h3 class="mb-0">Menus</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Menus
              </li>
            </ol>
          </div>
        </div> <!--end::Row-->
      </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->
    <div class="app-content"> <!--begin::Container-->
      <div class="container-fluid">

        <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
          @if (session()->has('success'))
        <div class="alert alert-success"> {{ session()->get('success') }}</div>
      @endif
          <div class="card-header">
            <div class="card-title">Add Menus</div>
          </div> <!--end::Header--> <!--begin::Form-->

          <form action="{{ route('admin.edit.addMenus') }}" method="POST"> <!--begin::Body-->
            @csrf
            <div class="card-body">
              @foreach ($languages as $language)
          <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Menu Title
            {{ $language->name }}</label> <input type="title" name="title[{{$language->name}}]"
            class="form-control" id="menu_title_{{ $language->name}}"> </div>
        @endforeach
              <div class="mb-3"> <label for="menu_url" class="form-label">Menu Url</label> <input
                  type="title" name="menu_url" value="" disabled class="form-control" id="menu_url"> </div>
            </div> <!--end::Body--> <!--begin::Footer-->
            <div class="card-footer"> <button type="submit" class="btn btn-primary">Add</button> </div>
            <!--end::Footer-->
          </form> <!--end::Form-->
        </div>


        <!--begin::Row-->

        <table id="table" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="30px">#</th>
                            @foreach ($languages as $language)
          <th scope="col">Title {{ $language->name }}</th>
              @endforeach
              <th scope="col">Menu Url</th>
              <th scope="col">CreateAt</th>
              <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBodyContents">
                        @foreach($menus as $menu)
                            <tr class="tableRow" data-id="{{ $menu->id }}">
                                <td class="pl-3">
                                    <i class="fa fa-bars"></i>
                                </td>
                                @foreach ($languages as $language)
        @isset(json_decode($menu->menu_title, true)[$language->name])
      <td>{{json_decode($menu->menu_title, true)[$language->name]}} </td>
    @else
    <td></td>
  @endisset
      @endforeach
      <td>{{ $menu->menu_url }}</td>
                                <td>{{ date('d-m-Y h:m:s',strtotime($menu->created_at)) }}</td>
                                <td class="d-flex gap-2"><a href="{{route('admin.edit.editMenu', $menu->id)}}"
            class="btn btn-info">Edit</a><a href="{{route('admin.edit.deleteMenu', $menu->id) }} "
            class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
      </div> <!--end::Container-->
    </div> <!--end::App Content-->
  </main> 
            


    <!-- jQuery CDN Link -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <!-- Bootstrap 5 Bundle CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery UI CDN Link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <!-- DataTables JS CDN Link -->
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

    <!-- DataTables JS ( includes Bootstrap 5 for design [UI] ) CDN Link -->
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>


    <script type="text/javascript">
      function slugify(str) {
  str = str.replace(/^\s+|\s+$/g, ''); // trim leading/trailing white space
  str = str.toLowerCase(); // convert string to lowercase
  str = str.replace(/[^a-z0-9 -]/g, '') // remove any non-alphanumeric characters
           .replace(/\s+/g, '-') // replace spaces with hyphens
           .replace(/-+/g, '-'); // remove consecutive hyphens
  return str;
}

document.querySelector('#menu_title_en').addEventListener('input', (e) => {
      document.querySelector('#menu_url').value = slugify(e.target.value);
});

        $(function () {

            $("#table").DataTable();

            $("#tableBodyContents").sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {

                var order = [];
                var token = $('meta[name="csrf-token"]').attr('content');

                $('tr.tableRow').each(function(index,element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index+1
                    });
                });

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('menu-reorder') }}",
                        data: {
                        order: order,
                        _token: token
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log('Olmadi');
                        }
                    }
                });
            }
        });
    </script>
</x-admin-layout>
