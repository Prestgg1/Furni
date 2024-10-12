<x-admin-layout title="Languages">
  <main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
      <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
          <div class="col-sm-6">
            <h3 class="mb-0">Languages</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Languages
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
                                    <div class="alert alert-success">  {{ session()->get('success') }}</div>
                                @endif
                                <div class="card-header">
                                    <div class="card-title">Add Language</div>
                                </div> <!--end::Header--> <!--begin::Form-->
                               
                                <form action="{{ route('admin.edit.addLanguages') }}" method="POST"> <!--begin::Body-->
                                  @csrf
                                    <div class="card-body">
                                        <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Name</label> <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Title</label> <input type="title" name="title" class="form-control" id="exampleInputPassword1"> </div>
                                    </div> <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Add</button> </div> <!--end::Footer-->
                                </form> <!--end::Form-->
                            </div>


      <!--begin::Row-->
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Title</th>
              <th scope="col">CreateAt</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach ($languages as $language)
            <t>
              <th scope="row">{{ $language->id }}</th>
              <td>{{ $language->name }}</td>
              <td>{{ $language->title }}</td>
              <td>{{ $language->created_at }}</td>
              <td class="d-flex gap-2"><a href="{{ route('admin.edit.editLanguages', $language->id) }} " class="btn btn-info">Edit</a><a href="{{ route('admin.edit.deleteLanguages', $language->id) }} " class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>    
      </div> <!--end::Container-->
    </div> <!--end::App Content-->
  </main> <!--end::App Main--> <!--begin::Footer-->
</x-admin-layout>
