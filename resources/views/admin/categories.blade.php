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
            <div class="card-title">Add Category</div>
          </div> <!--end::Header--> <!--begin::Form-->

          <form action="{{ route('admin.edit.addCategory') }}" method="POST" enctype="multipart/form-data"> <!--begin::Body-->
            @csrf
            <div class="card-body">
              @foreach ($languages as $language)
          <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Category Title
            {{ $language->name }}</label> <input type="title" name="title[{{$language->name}}]"
            class="form-control" id="exampleInputPassword1"> </div>
        @endforeach

            </div> <!--end::Body--> <!--begin::Footer-->
            <div class="card-footer"> <button type="submit" class="btn btn-primary">Add</button> </div>
            <!--end::Footer-->
          </form> <!--end::Form-->
        </div>


        <!--begin::Row-->
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>

              @foreach ($languages as $language)
          <th scope="col">Title {{ $language->name }}</th>
        @endforeach
              <th scope="col">Slug</th>
              <th scope="col">CreateAt</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            
            <t>
              <th scope="row">{{ $category->id }} </th>
              @foreach ($languages as $language)
          @isset($category->getTranslations('title')[$language->name])
          <td>{{$category->getTranslations('title')[$language->name]}}</td>
          @else
          <td></td>
          @endisset
        @endforeach
              <td>{{$category->slug}}</td>
              <td>{{$category->created_at}}</td>
              <td class="d-flex gap-2"><a href="{{ route('admin.edit.editCategory', $category->id) }} " class="btn btn-info">Edit</a><a
                  href="{{ route('admin.edit.deleteCategory', $category->id) }}" class="btn btn-danger">Delete</a></td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div> <!--end::Container-->
    </div> <!--end::App Content-->
  </main> <!--end::App Main--> <!--begin::Footer-->
</x-admin-layout>
