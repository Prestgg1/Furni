<x-admin-layout title="Edit Menu">
  <script>
    function slugify(str) {
  str = str.replace(/^\s+|\s+$/g, ''); // trim leading/trailing white space
  str = str.toLowerCase(); // convert string to lowercase
  str = str.replace(/[^a-z0-9 -]/g, '') // remove any non-alphanumeric characters
           .replace(/\s+/g, '-') // replace spaces with hyphens
           .replace(/-+/g, '-'); // remove consecutive hyphens
  return str;
}
  </script>
  <main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
      <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
          <div class="col-sm-6">
            <h3 class="mb-0">Edit Menu</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Edit Menu
              </li>
            </ol>
          </div>
        </div> <!--end::Row-->
      </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->
    <div class="app-content"> <!--begin::Container-->
      <div class="container-fluid">

        <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
          <div class="card-header">
            <div class="card-title">Edit Menus</div>
          </div> <!--end::Header--> <!--begin::Form-->

          <form action="{{ route('admin.edit.editingmenu') }}" method="POST"> <!--begin::Body-->
            @csrf
            <input type="text" hidden name="id" value="{{ $menu->id }}">
            <div class="card-body">
              @foreach (json_decode($menu->menu_title) as $key=>$value)
              <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Menu Title {{ $key }}</label> <input
                  type="title" name="title[{{ $key }}]" value="{{ $value }}" class="form-control" id="menu_title_{{$key}}"> </div>
            <!--end::Body--> <!--begin::Footer-->
        @endforeach
        <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Menu Url</label> <input
                  type="title" name="menu_url" disabled   class="form-control" id="menu_url"> </div>
            </div>
            <div class="card-footer"> <button type="submit" class="btn btn-primary">Update</button> </div>
        </div> 
              <!--end::Body--> <!--begin::Footer-->
            
            <!--end::Footer-->
          </form> <!--end::Form-->
        </div>
      </div> <!--end::Container-->
    </div> <!--end::App Content-->
  </main> <!--end::App Main--> <!--begin::Footer-->
  <script>
  document.querySelector('#menu_title_en').addEventListener('input', (e) => {
      document.querySelector('#menu_url').value = slugify(e.target.value);
});
  </script>
</x-admin-layout>
