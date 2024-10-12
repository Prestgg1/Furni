<x-admin-layout title="Categories">
  <main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
      <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
          <div class="col-sm-6">
            <h3 class="mb-0">Categories</h3>
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
            <div class="card-title">Edit Category</div>
          </div> <!--end::Header--> <!--begin::Form-->

          <form action="{{ route('admin.edit.updateCategory') }}" method="POST" enctype="multipart/form-data"> <!--begin::Body-->
            @csrf
            <input type="text" hidden name="id" value="{{ $category->id }}">
            <div class="card-body">
              @foreach ($languages as $language)
          <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Category Title
            {{ $language->name }}</label> <input type="title" value="{{ $category->getTranslations('title')[$language->name] }}" name="title[{{$language->name}}]"
            class="form-control" id="exampleInputPassword1"> </div>
        @endforeach

            </div> <!--end::Body--> <!--begin::Footer-->
            <div class="card-footer"> <button type="submit" class="btn btn-primary">Update</button> </div>
            <!--end::Footer-->
          </form> <!--end::Form-->
        </div>


        <!--begin::Row-->
     
      </div> <!--end::Container-->
    </div> <!--end::App Content-->
  </main> <!--end::App Main--> <!--begin::Footer-->
</x-admin-layout>
